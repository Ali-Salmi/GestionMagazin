<?php

namespace App\Http\Livewire;
use App\Models\Client;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Clients extends Component
{
    public $ids;
    public $nom;
    public $tel;
    public $email;
    public $adresse;
    public $q;
    public $sl='All';


    public function edit($id){
        $client=Client::where('id', $id)->first();
        $this->ids= $client->id;
        $this->nom= $client->nom;
        $this->tel=$client->tel;
        $this->adresse=$client->adresse;
        $this->email=$client->email;
    }

    public function updateClient(){
        $this->validate([
            'nom' => 'required',
            'tel' => 'required',
            'adresse'=> 'required',
            'email' => 'required',
        ]);

        if($this->ids){
            $client=Client::findOrFail($this->ids);
            $client->update([
                'nom' => $this->nom,
                'tel'=> $this->tel,
                'adresse'=> $this->adresse,
                'email' => $this->email,
            ]);
            session()->flash('upd','client est modifié');
            $this->resetData();
        }

    }


    public function resetData(){
        $this->nom='';
        $this->tel='';
        $this->adresse='';
        $this->email='';
    }
    public function addClient(){
         $validator=$this->validate([
            'nom' => 'required',
            'tel' =>  'required',
            'adresse'=> 'required',
            'email' => 'required',
         ]);
        Client::create($validator);
        $this->resetData();
    }

    use WithPagination;
    public function render()
    {
        if($this->sl=='All'){
            $clients= Client::where('nom', 'LIKE','%'.$this->q .'%')
                ->paginate(6);
        }else{
            $clients= Client::where('nom', 'LIKE','%'.$this->q .'%')
                ->Where('statusClient', '=',$this->sl)
                ->paginate(6);
        }
        return view('livewire.clients', [
            'clients'=>$clients
        ]);
    }

    public function updatingQ(){
        $this->resetPage();
    }
    public function updatingSl(){
        $this->resetPage();
    }

    public function changer($id){
        $client=Client::where('id', $id)->first();
       if($client->statusClient=="Non-Active"){
        $client->update([
            'statusClient' => 'Active',
        ]);
       }
       else{
            $client->update([
                'statusClient' => 'Non-Active',
            ]);
       }
    }
}
