@extends('base')

@section('page_title', 'Admin - Actu - Modification')

@section('content')


            <h1>Admin - Actu - Modification</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une actu, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
    @if (Session::has('confirmation'))
        <div>
           {{Session::get('confirmation')}}
        </div>
    @endif

    @if ($errors->any())
        <div>
            Attention, les donnéees n'ont pas été enregistrées, il y a des erreurs dans le formulaire.
        </div>
    @endif

        <!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
    <form action="{{route('admin.actu.update',['id' => $actu ->id]) }}" method="post">
            <!--csrf permet de securiser, empeche piratage -->
        @csrf
        <!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
        <!-- PUT maj complète et PATCH maj partielle -->
        <!-- @@method('PUT') -->
        <fieldset>
        <br>
            <div class="actu-modif" align="center">
                <label for="jour_publication">Jour de publication:</label><br />
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                <input class="@error('jour_publication') form--input--error @enderror" type="date" name="" id="" value="{{ old('jour_publication', $actu->jour_publication) }}">
                @error('jour_publication')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
<br>
                <div class="actu-modif" align="center">
                    <label for="heure_publication">Heure de publication:</label><br />
                <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                    <input class="@error('jour_publication') form--input--error @enderror" type="time" name="" id="" value="{{ old('heure_publication', $actu->heure_publication) }}">
                    @error('jour_publication')
                        <div class="form--error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
<br>
            <div class="actu-modif" align="center">
                <!--  pour avoir le libellé Description, devant le champs description -->
                <label for="texte">Texte:</label><br />
                <input class="@error('texte') form--input--error @enderror" type="text" name="" id="" value="{{ old('texte', $actu->texte) }}">
                @error('texte')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                 @enderror 
            </div>

        </fieldset>
            <div class="actu-modif" align="center">
        <br>
                <button type="submit">Valider</button>
            </div>
        <br>
        </form>

@endsection