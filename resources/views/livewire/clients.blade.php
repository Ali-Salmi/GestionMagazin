<div class="container-fluid">
    <div  >

    <div class="row" style="margin-top: 25px;margin-bottom: 15px;">
            <div class="col-lg-6 col-md-7 col-sm-7">
                <button type="button" class="botona" data-toggle="modal" data-target="#AjouterClient">
                        Ajouter un nouveau Fournisseur/Preneur
                </button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4">
                <form >
                        <input type="search" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="recherche" wire:model="q">
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4" >
                <select wire:model="sl" class="shadow  border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option selected value="All">Afficher tous les Fournisseur/Preneur</option>
                    <option value="Non-Active">Fournisseur/Preneur Non-Active</option>
                    <option value="Active">Fournisseur/Preneur Active</option>
                </select>
            </div>

        </div>


        <table class="table">
            <thead>
                <tr class="table-success" style="text-align:center; text-transform:uppercase;">
                <th scope="col" >Fournisseur/preneur</th>
                <th scope="col" >Téléphone</th>
                <th scope="col" >Email</th>
                <th scope="col" >Adresse</th>
                <th scope="col" >Statut</th>
                <th scope="col" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr style="text-align:center;">
                    <td>{{$client->nom}}</td>
                    <td>{{$client->tel}}</td>
                    <td>{{$client->email}}</td>
                    <td style="width:300px;">{{$client->adresse}}</td>
                    <td style="width:150px;">{{$client->statusClient}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modifierClient" wire:click.prevent="edit({{$client->id}})">Modifier</button>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#changerStatus" wire:click.prevent="changer({{$client->id}})">changer Statut</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$clients->links()}}
        </div>
    </div>


<!-- create client -->

<div wire:ignore.self class="modal fade" id="AjouterClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Fournisseur/Preneur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="nom">Nom/Prénom</label>
                <input type="text" class="form-control" id="nom" wire:model.defer="nom" name="nom" placeholder="Nom et Prénom">
                <x-jet-input-error for="designation" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="text" class="form-control" id="tel" wire:model.defer="tel" name="tel" placeholder="Téléphone">
                <x-jet-input-error for="tel" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="tel">Adresse</label>
                <input type="text" class="form-control" id="adresse" wire:model.defer="adresse" name="adresse" placeholder="Adresse">
                <x-jet-input-error for="adresse" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="tel">Email</label>
                <input type="email" class="form-control" id="email" wire:model.defer="email" name="email" placeholder="Email">
                <x-jet-input-error for="email" class="mt-2" />
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" wire:click.prevent="addClient()">Ajouter</button>
            </div>
        </form>
    </div>

    </div>
  </div>
</div>


<!-- modifier Client -->
<div wire:ignore.self class="modal fade" id="modifierClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifié Fournisseur/Preneur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
                <input type="hidden" name="id" wire:model="ids">
                <div class="form-group">
                    <label for="nom">Nom/Prénom</label>
                    <input type="text" class="form-control" id="nom" wire:model="nom" name="nom" placeholder="Nom et prénom">
                </div>
                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="text" class="form-control" id="tel" wire:model="tel" name="tel" placeholder="Téléphone">
                </div>
                <div class="form-group">
                    <label for="tel">Email</label>
                    <input type="email" class="form-control" id="email" wire:model="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="tel">Adresse</label>
                    <input type="text" class="form-control" id="adresse" wire:model="adresse" name="adresse" placeholder="Adresse">
                </div>
            </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" wire:click.prevent="updateClient()">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

</div>
