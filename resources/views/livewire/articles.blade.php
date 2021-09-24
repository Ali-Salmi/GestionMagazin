<div class="container">
    <div >
        <div >
            @if(session()->has('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <br>
        </div>

        <div class="row" style="margin-bottom: 25px;">
            <div class="col-lg-6 col-md-7 col-sm-7">
                <button type="button" class="botona" data-toggle="modal" data-target="#AjouterArticle">
                        Ajouter un nouveau Article
                </button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <form >
                        <input type="Search" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="recherche" wire:model="q">
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4" >
                <select wire:model="sl" class="shadow  border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option selected value="All">Afficher tous les Articles</option>
                    <option value="Non-Archivé">Articles Non-Archivés</option>
                    <option value="Archivé">Articles Archivés</option>
                </select>
            </div>

        </div>


        <table class="table">
            <thead class="table-success">
                <tr style="text-align:center; text-transform:uppercase;">
                <th scope="col">Code Article</th>
                <th scope="col">designation</th>
                <th scope="col">prix</th>
                <th scope="col">Stock</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr style="text-align:center; ">
                    <td>{{$article->codeArticle}}</td>
                    <td>{{$article->designation}}</td>
                    <td>{{$article->prix}}</td>
                    <td>{{$article->stock}}</td>
                    <td>{{$article->archiver}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modifierArticle" wire:click.prevent="edit({{$article->id}})">Modifier</button>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#changerStatus" wire:click.prevent="changer({{$article->id}})">changer Statut</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div>
            {{$articles->links()}}
        </div>
    </div>

<!-- create Article -->
<div wire:ignore.self class="modal fade" id="AjouterArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Articles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="codeAticle">code Article</label>
                <input type="text" class="shadow  border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codeAticle" wire:model="codeArticle" name="codeArticle" placeholder="code de l'article">
                <x-jet-input-error for="codeArticle" class="mt-2" />
                <p style="color:red; font-size:12px;">{{$er}}</p>
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" class="shadow  border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"" id="designation" wire:model="designation" name="designation" placeholder="designation">
                <x-jet-input-error for="designation" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="prix">prix</label>
                <input type="text" class="shadow  border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prix" wire:model="prix" name="prix" placeholder="prix">
                <x-jet-input-error for="prix" class="mt-2" />

            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="addArticle()">Ajouter</button>
            </div>
        </form>
    </div>

    </div>
  </div>
</div>




<!-- modifier Article -->
<div wire:ignore.self class="modal fade" id="modifierArticle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
                <input type="hidden" name="id" wire:model="ids">

                <div class="form-group">
                    <label for="codeAticle">code Article</label>
                    <input type="text" class="form-control" id="codeAticle" wire:model="codeArticle" name="codeArticle" placeholder="code de l'artile">
                </div>
                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" wire:model="designation" name="designation" placeholder="designation">
                </div>
                <div class="form-group">
                    <label for="prix">prix</label>
                    <input type="text" class="form-control" id="prix" wire:model="prix" name="prix" placeholder="prix">
                </div>

            </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" wire:click.prevent="updateArticle()">Enregistrer</button>
      </div>
    </div>
  </div>
</div>


<!-- changer etat -->
<div wire:ignore.self class="modal fade" id="changerStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Changement de status. </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Le status a changé.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
