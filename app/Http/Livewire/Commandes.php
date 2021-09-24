<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Article;
use App\Models\Detail;
use Livewire\WithPagination;



class Commandes extends Component
{
    public $idc;
    public $codeCommande;
    public $observation;
    public $date;
    public $type="Entrée";
    public $client_id;
    public $tst;
    public $testRef='';
    public $infos;
    public $q='';

    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Article::where('archiver', 'Non-Archivé')->get();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1 , 'error' => '']
        ];
    }


    public function supp($id){
        $com=Commande::where('id', $id)->first();
        $this->idc=$com->id;
    }
    public function suppCom(){
        $com=Commande::find($this->idc);
        $com->delete();
    }

    public function confirmerCommande($id){
        $this->infos = Detail::where('commandes.id', $id)
        ->join('commandes', 'commandes.id', '=', 'details.commande_id')
        ->join('articles', 'articles.id', '=', 'details.article_id')
        ->join('clients', 'clients.id', '=', 'commandes.client_id')
        ->select('details.quantite', 'articles.codeArticle','articles.stock')
        ->get();
        foreach($this->infos as $info){
            $article=Article::where('codeArticle', $info->codeArticle);
            $article->update([
                'stock' => $info->stock + $info->quantite,
            ]);
        }
        $com=Commande::where('id', $id)->first();
        $com->update([
            'etatCommande'=>'Confirmer',
        ]);
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1, 'error' => ''];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function resetCom(){
        $this->codeCommande='';
        $this->observation='';
        $this->date='';
    }


    public function enregistrer(){
        if(Commande::where('codeCommande', $this->codeCommande)->first()){
            $this->testRef='ce code est deja existe'; return ;
        }else{
            $this->testRef='';
        }
        if($this->type=='Sortie'){
            $i=0;
            foreach($this->orderProducts as $index => $orderProduct){
                $article=Article::where('id',$orderProduct['product_id'] )->first();
                if($article->stock < $orderProduct['quantity']){
                    $this->orderProducts[$index]['error']='Quantité indisponible';
                    $i++;
                }
                else{
                    $this->orderProducts[$index]['error']='';
                }
            }
            if($i!=0){
                return ;
            }
        }

            $this->addCommande();
            $com= Commande::where('codeCommande', $this->codeCommande)->first();
            if($this->type=='Sortie'){
                foreach($this->orderProducts as $orderProduct){
                    $article=Article::where('id',$orderProduct['product_id'] )->first();
                    if($article->stock < $orderProduct['quantity']){
                    }else{
                        $this->tst=$article->stock - $orderProduct['quantity'];
                        $article->update([
                            'stock'=> $this->tst,
                        ]);
                        Detail::create([
                            'commande_id' => $com->id,
                            'article_id'=> $article->id,
                            'prixVente'=>$article->prix+($article->prix * 0.1),
                            'quantite'=> $orderProduct['quantity'],
                        ]);
                    }
                }
                $com->update([
                        'etatCommande'=>'Confirmer',
                ]);

            }else{
                foreach($this->orderProducts as $orderProduct){
                    $article=Article::where('id',$orderProduct['product_id'] )->first();
                    Detail::create([
                        'commande_id' => $com->id,
                        'article_id'=> $article->id,
                        'prixVente'=> $article->prix,
                        'quantite'=> $orderProduct['quantity'],
                    ]);
                }
                $com->update([
                    'etatCommande'=>'enReception',
                ]);
            }
            $this->resetCom();
            return redirect()->route('commande');

        }

    public function addCommande(){
        $validator=$this->validate([
            'codeCommande' => 'required',
            'observation' => 'required',
            'date' => 'required',
        ]);
        Commande::create([
            'codeCommande' => $this->codeCommande,
            'observation' => $this->observation,
            'date' => $this->date,
            'type' => $this->type,
            'client_id'=> $this->client_id,
        ]);
    }



    use WithPagination;
    public function render()
    {
        $clients=Client::all()->where('statusClient','Active');
        $commandes=Commande::where([
            ['etatCommande', 'enReception'],
            ['codeCommande', 'LIKE','%'.$this->q .'%']
            ])
            ->paginate(8);
        return view('livewire.commandes',[
            'clients'=> $clients,
            'commandes' => $commandes,
            'testRef'=>$this->testRef,
        ]);
    }
    public function updatingQ(){
        $this->resetPage();
    }
}
