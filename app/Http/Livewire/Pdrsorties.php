<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Article;
use App\Models\Detail;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Pdrsorties extends Component
{
    public $dateDebut;
    public $dateFin;
    public $prix=0;
    public $infos;

    use WithPagination;
    public function render()
    {
        $this->prix=0;
        $this->infos = Detail::where([
            ['commandes.type', 'LIKE', 'Sortie'],
            ['commandes.etatCommande', 'Confirmer']
        ])
        ->join('commandes', 'commandes.id', '=', 'details.commande_id')
        ->join('articles', 'articles.id', '=', 'details.article_id')
        ->join('clients', 'clients.id', '=', 'commandes.client_id')
        ->select('commandes.*', 'clients.nom', 'details.quantite','details.prixVente', 'articles.*')
        ->orderByRaw('commandes.date')
        ->whereBetween('commandes.date', [$this->dateDebut, $this->dateFin])
        ->get();

        foreach($this->infos as $info){
            $this->prix=$this->prix+($info->prixVente * $info->quantite);
        }
        return view('livewire.pdrsorties',[
            'infos'=>$this->infos,
            'prix' => $this->prix,
        ]);
    }
}
