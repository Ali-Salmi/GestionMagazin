
<div>

<div class="container-fluid">
<div class="container">
    <label >Date début:</label>
    <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" wire:model="dateDebut">
    <br> <label style="margin-right:20px">Date Fin:</label>
    <input class="shadow appearance-none border rounded text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" wire:model="dateFin">
</div>

<table class="table">
        <thead class="table-success">
            <tr style="text-align:center;">
            <th scope="col">Type</th>
            <th scope="col">Date</th>
            <th scope="col">Réference commande</th>
            <th scope="col">Code article</th>
            <th scope="col">Désignation</th>
            <th scope="col">Fournisseur/Preneur</th>
            <th scope="col">Quantité</th>
            <th scope="col">Observation</th>

            </tr>
        </thead>
        <tbody>
            @foreach($infos as $info)
            <tr>
                <td>{{$info->type}}</td>
                <td>{{$info->date}}</td>
                <td>{{$info->codeCommande}}</td>
                <td>{{$info->codeArticle}}</td>
                <td>{{$info->designation}}</td>
                <td>{{$info->nom}}</td>
                <td>{{$info->quantite}}</td>
                <td>{{$info->observation}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align:center;">
            <h1 class="btn btn-success">le montant des entrées: {{ $prixEntree }} (MAD)</h1>
            <h1 class="btn btn-danger">le montant des sorties: {{ $prixSortie }} (MAD)</h1>
    </div>

</div>
</div>
