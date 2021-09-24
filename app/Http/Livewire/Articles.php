<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class Articles extends Component
{
    public $ids;
    public $codeArticle;
    public $designation;
    public $prix;
    public $q='';
    public $sl='All';
    public $er='';

    public $article;


    public function resetData(){
    $this->codeArticle='';
    $this->designation='';
    $this->prix='';
    }

    public function addArticle(){

        if(Article::where('codeArticle', $this->codeArticle)->first()){
            $this->er='se code est déja existe';
            return;
        }else{
            $this->er='';
            $validator=$this->validate([
                'codeArticle' => 'required',
                'designation' => 'required',
                'prix' => 'required',
            ]);
            Article::create($validator);
            $this->resetData();
            session()->flash('msg','l\'article est ajouté avec success');
            return redirect()->route('article');
        }

    }

    public function edit($id){
        $article=Article::where('id', $id)->first();
        $this->ids= $article->id;
        $this->codeArticle= $article->codeArticle;
        $this->designation=$article->designation;
        $this->prix=$article->prix;
    }

    public function updateArticle(){
        $this->validate([
            'codeArticle' => 'required',
            'designation' => 'required',
            'prix' => 'required',
        ]);

        if($this->ids){
            $article=Article::findOrFail($this->ids);
            $article->update([
                'codeArticle' => $this->codeArticle,
                'designation'=> $this->designation,
                'prix'=> $this->prix,
            ]);
            $this->resetData();
        }
    }
    use WithPagination;
    public function render()
    {
        if($this->sl=='All'){
            $articles= Article::where('codeArticle', 'LIKE','%'.$this->q .'%')
            ->orWhere('designation', 'LIKE','%'.$this->q .'%')
                ->paginate(8);
        }else{
            $articles= Article::where([
                ['codeArticle', 'LIKE','%'.$this->q .'%'],
                ['archiver', '=',$this->sl]
            ])
            ->orWhere([
                ['designation', 'LIKE','%'.$this->q .'%'],
                ['archiver', '=',$this->sl]
            ])
            ->paginate(8);
        }
        return view('livewire.articles', [
            'articles'=>$articles,
        ]);
    }
    public function updatingQ(){
        $this->resetPage();
    }
    public function updatingSl(){
        $this->resetPage();
    }

    public function changer($id){
        $article=Article::where('id', $id)->first();
       if($article->archiver=="Non-Archivé"){
        $article->update([
            'archiver' => 'Archivé',
        ]);
       }
       else{
            $article->update([
                'archiver' => 'Non-Archivé',
            ]);
       }
    }

}
