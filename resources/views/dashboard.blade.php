<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Acceuil
        </h2>
    </x-slot>

    <div class="container-fluid" style="margin-top:100px; padding-bottom:120px; margin-left:40px;">
        <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card cadre" style="width: 18rem;">
                <img class="image" src="https://previews.123rf.com/images/limbi007/limbi0071303/limbi007130300196/18566060-personnages-de-dessin-anim%C3%A9-orange-avec-un-ordinateur-portable-un-casque-et-des-palettes-sur-le-fond.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mesTittres">Gestion des Articles</h5>
                    <p class="card-text">Ajouter, modifier, changer le statut d'un article, ainsi que la recherche et le filtrage des articles selon leurs code, leurs désignation et leurs statut.</p>
                    <div class="myLink" style="margin-top:25px;">
                        <a href="{{ route('article') }}"> <button class="botona">Gérer</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="card cadre" style="width: 18rem;">
                <img class="image" src="https://novalog-project.org/wp-content/uploads/2019/08/relation-fournisseur-e1565192303379.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mesTittres">Gestion des Fournisseurs/Preneurs</h5>
                    <p class="card-text">Ajouter, modifier, changer le statut d'un fournisseur/preneur, ainsi que la recherche et le filtrage des Fournisseurs/Preneurs selon leurs nom et leurs statut.</p>
                    <div class="myLink" style="margin-top:10px;">
                        <a href="{{ route('client') }}"> <button class="botona">Gérer</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        <div class="card cadre" style="width: 18rem;">
                <img class="image" src="https://www.supplychaininfo.eu/wp-content/uploads/2019/03/gestion-de-stock-wms.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mesTittres">Ajouter des commandes</h5>
                    <p class="card-text">Ajouter, supprimer, et confirmer une commande, ainsi que la recherche des commandes selon leurs code.</p>
                   <div class="myLink" style="margin-top:60px;">
                        <a href="{{ route('commande') }}"> <button class="botona">Gérer</button></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
        <div class="card cadre" style="width: 18rem;">
                <img class="image" src="https://static.ons.gov.uk/visual/2020/in-focus/weekly-death-statistics@2x.png" style="heigth:250px;" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title mesTittres">Afficher les statistique</h5>
                    <p class="card-text">Afficher les statistiques des commandes: état mensuel "PDR" SORTIE, état mensuel "PDR" ENTRÉE et état hebdomadaire "IMMOBILISATION"</p>
                    <div class="myLink" style="margin-top:30px;">
                        <a href="{{ route('statistique') }}"> <button class="botona">Gérer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>

        .image{
            width:250px; margin-left:20px; margin-top:20px; border-radius:10px; height: 250px;
        }
        .mesTittres{
            text-align:center;
            font-family:cursive;
            font-weight: bold;
            padding-bottom:10px;
        }
        .cadre{
            height: 530px;
        }
        .myLink{
            text-align:center;
        }

    </style>







</x-app-layout>
