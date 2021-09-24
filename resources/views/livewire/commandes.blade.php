<div class="container">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <button type="button" class="botona" data-toggle="modal" data-target="#AjouterCommande">
                        Ajouter un nouveau Commande
                </button>
            </div>

            <div class="col-4">
                <form >
                        <input type="Search" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="recherche" wire:model="q">
                </form>
            </div>
        </div>

    <table class="table" style="margin-top:10px;">
            <thead class="table-success">
                <tr style="text-align:center; text-transform:uppercase;">
                <th scope="col">Code Commande</th>
                <th scope="col">Observation</th>
                <th scope="col">date</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                <tr style="text-align:center;">
                    <td>{{$commande->codeCommande}}</td>
                    <td>{{$commande->observation}}</td>
                    <td>{{$commande->date}}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#confirmerCommande" wire:click="confirmerCommande({{$commande->id}})">Confirmer</button>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#supprimerCommande" wire:click="supp({{$commande->id}})">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$commandes->links()}}
        </div>
    </div>

<div wire:ignore.self class="modal fade" id="AjouterCommande" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form style="border: 3px #026953 solid; border-radius:8px; padding:20px; margin-bottom:10px;">
            <div class="form-group">
                <label for="refcom">Réference Commande</label>
                <input type="text" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="codeCommande" wire:model="codeCommande" name="codeCommande" placeholder="Réference du Commande">
                <x-jet-input-error for="codeCommande" class="mt-2" />
                <p style="color:red; font-size:12px;">{{ $testRef }}</p>
            </div>
            <div class="form-group">
                <label for="observation">Observation</label>
                <input type="text" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="observation" wire:model="observation" name="observation" placeholder="Observation">
                <x-jet-input-error for="observation" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" wire:model="date" name="date">
                <x-jet-input-error for="date" class="mt-2" />
            </div>
            <label >Fournisseur/Preneur: </label>
            <select required class="custom-select" wire:model="client_id">
                <option selected>Open this select menu</option>
                @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }}</option>
                @endforeach
            </select> <br>
            <label for="type">Type du commande: </label>
            <select class="custom-select" id="type" wire:model="type">
                <option value="Entrée" selected>Entrée</option>
                <option value="Sortie">Sortie</option>
            </select> <br>

        </form>
        <h5 class="modal-title" id="exampleModalLongTitle"> Séléctioner les Articles pour cette commande: </h5>

          <form style="border: 3px #026953 solid; border-radius:8px; padding:20px;">
          @foreach ($orderProducts as $index => $orderProduct)

                                <select name="orderProducts[{{$index}}][product_id]"
                                        wire:model="orderProducts.{{$index}}.product_id"
                                        class="form-control">
                                    <option >-- Choisir un produit --</option>
                                    @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->designation }} ({{ number_format($product->prix, 2) }}MAD)
                                            <p class="text-danger">Stock restent: {{ $product->stock }}</p>
                                        </option>
                                    @endforeach

                                </select>
                                <input type="number"
                                       name="orderProducts[{{$index}}][quantity]"
                                       class="form-control"
                                       wire:model="orderProducts.{{$index}}.quantity" />

                                        <p style="color:red; font-size:13px;">{{ $orderProduct['error']}}</p>

                               <div style="margin-bottom:15px;">
                                   <button class="btn btn-danger" wire:click.prevent="removeProduct({{$index}})">Supprimer</button>
                               </div>
            @endforeach

                    <div class="row">
                    <div class="col-md-12">
                            <x-jet-button wire:click.prevent="addProduct">
                                + Ajouter un autre produit
                            </x-jet-button>
                    </div>

                </div>
          </form>
      </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
            <button wire:click.prevent="enregistrer" class="btn btn-success">Enregistrer</button>
      </div>
    </div>
  </div>
</div>




<div wire:ignore.self class="modal fade" id="supprimerCommande" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer Commande:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>vous étes sur que vous voullez suprimmer cette commande??</p>
          <input type="hidden" wire:model="idc">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click.prevent="suppCom()">Supprimer</button>
        </div>
      </div>

    </div>

  </div>

</div>

</div>


<div wire:ignore.self class="modal fade" id="confirmerCommande" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmer la commande. </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La commande est confirmé.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>





