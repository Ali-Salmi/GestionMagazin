<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Article;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Hebdo extends Component
{
    public $dateDebut;
    public $dateFin;
    public $prixEntree=0;
    public $prixSortie=0;
    public $infos;

    use WithPagination;
    public function render()
    {
        $this->prix=0;
        $this->infos = Detail::where('commandes.etatCommande', 'Confirmer')
        ->join('commandes', 'commandes.id', '=', 'details.commande_id')
        ->join('articles', 'articles.id', '=', 'details.article_id')
        ->join('clients', 'clients.id', '=', 'commandes.client_id')
        ->select('commandes.*', 'clients.nom', 'details.quantite','details.prixVente', 'articles.*')
        ->orderByRaw('commandes.date')
        ->whereBetween('commandes.date', [$this->dateDebut, $this->dateFin])
        ->get();

        foreach($this->infos as $info){
            if($info->type=="Sortie"){
                $this->prixSortie=$this->prixSortie+($info->prixVente * $info->quantite);
            }
            else{
                $this->prixEntree=$this->prixEntree+($info->prixVente * $info->quantite);
            }
        }
        return view('livewire.hebdo',[
            'infos'=>$this->infos,
            'prixEntree' => $this->prixEntree,
            'prixSortie' => $this->prixSortie,
        ]);
    }
}
