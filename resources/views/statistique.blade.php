<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Statistiques:
            </h2>
    </x-slot>
    <br><br>
    <div class="container">
        <a href="{{route('pdrsortie')}}">
            <div class="row firstdiv">
                <div class="intoOne">
                </div>
                <div class="intoToo">

                </div>
                <div class="myTitle">
                    <h1 >Etat Mensuel "PDR" Sortie</h1>
                </div>
                <div class="intoTree">

                </div>

            </div>

        </a><br> <br>
        <a href="{{route('pdrentree')}}">
            <div class="row seconddiv">
                <div class="intoFive">
                </div>
                <div class="intoSex">

                </div>
                <div class="myTitle">
                    <h1 >Etat Mensuel "PDR" Entrée</h1>
                </div>
                <div class="intoSeven">

                </div>
            </div>

        </a><br> <br>

        <a href="{{route('hebdo')}}">
            <div class="row thirddiv">
                <div class="intoEight">
                </div>
                <div class="intoNine">

                </div>
                <div class="myTitle">
                    <h1 >Etat Hebdomadaire "IMMOBILISATION"</h1>
                </div>
                <div class="intoTen">

                </div>
            </div>
        </a>


    </div>




    <style>
        .myTitle{
            color:white;
            text-align:center;
            height: 100px;
            width: 700px;
            margin-top:35px;
            font-size:27px;
        }
        a:hover{
            text-decoration:none;
        }
        .firstdiv{

            background: linear-gradient(to right, #004C99,rgb(114, 192, 223));
            border-radius: 20px;
            height: 100px;
        }
        .intoOne{
            margin-top:20px;
            margin-left:80px;
            height: 40px;
            width:40px;
            background-color:#236CEB;
            border-radius: 50%;
        }
        .intoToo{
            margin-top:65px;
            margin-left:80px;
            height: 30px;
            width:30px;
            background-color:rgb(114, 192, 223);
            border-radius: 50%;
        }
        .intoTree{
            margin-top:25px;
            margin-left:-20px;
            height: 30px;
            width:30px;
            background-color:#9AE2F0;
            border-radius: 50%;
        }
        .seconddiv{
            background: linear-gradient(to right, #026953,#83CE5D);
            border-radius: 20px;
            height: 100px;
        }

        .intoFive{
            margin-top:20px;
            margin-left:80px;
            height: 40px;
            width:40px;
            background-color:#3c9757;
            border-radius: 50%;
        }
        .intoSex{
            margin-top:65px;
            margin-left:80px;
            height: 30px;
            width:30px;
            background-color:#6bbb5b;
            border-radius: 50%;
        }
        .intoSeven{
            margin-top:25px;
            margin-left:-20px;
            height: 30px;
            width:30px;
            background-color:#208056;
            border-radius: 50%;
        }

        .thirddiv{
            background: linear-gradient(to right, #322806,#FCC100);
            border-radius: 20px;
            height: 100px;
        }
        .intoEight{
            margin-top:20px;
            margin-left:80px;
            height: 40px;
            width:40px;
            background-color:#a17c03;
            border-radius: 50%;
        }
        .intoNine{
            margin-top:65px;
            margin-left:80px;
            height: 30px;
            width:30px;
            background-color:#ba8f02;
            border-radius: 50%;
        }
        .intoTen{
            margin-top:25px;
            margin-left:-20px;
            height: 30px;
            width:30px;
            background-color:#8c6c03;
            border-radius: 50%;
        }
    </style>

</x-app-layout>
