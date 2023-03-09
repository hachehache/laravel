@extends('base')

@section('page_title', 'Admin - Photoplat - Modification')

@section('content')


            <h1>Admin - Photoplat- Modification</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

 <!----- Retour a Dashboard ---->
 <div class="retour_dashboard">
    <a href="{{ route('dashboard') }}">Retour au Tableau de bord</a>
</div>
<!----------------------------->

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une etiquette, on aura un message au dessus,
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
    <form action="{{route('admin.photoplat.update',['id' => $photoplat ->id]) }}" method="post">
            <!--csrf permet de securiser, empeche piratage -->
        @csrf
        <!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
        <!-- PUT maj complète et PATCH maj partielle -->
        <!-- @@method('PUT') -->
        <br>
           
<fieldset class="photoplat-modification">

    <div class="photoplat-modif">
                <label for="chemin" style="padding-right: 60px";>Chemin:</label>
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                <input class="@error('nom') form--input--error @enderror" type="text" name="chemin" id="" value="{{ old('chemin', $photoplat->chemin) }}">
                @error('nom')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                @enderror
    </div>
                <br>
    <div class="photoplat-modif">
                    <!--  pour avoir le libellé Description, devant le champs description -->
                    <label for="description" style="padding-right: 35px";>Description:</label>
                    <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{ old('description', $photoplat->description) }}">
                    @error('description')
                        <div class="form--error-message">
                            {{ $message }}
                        </div>
                     @enderror 
    </div>

</fieldset>
            <br>
                    <br>
            <div>
    <!-- OK - pour avoir le libellé Categorie modifiable, devant le champs description -->
       <!--         <label for="categorie_id">id:</label>
                <input class="@@error('categorie_id') form--input--error @@enderror" type="" name="categorie_id" id="" value="{{-- old('categorie_id', $photoplat->categorie_id) --}}"> -->
            <!--        @@error('categorie_id')
                    <div class="form--error-message">
                        {{-- $message --}}
                    </div>
                 @@enderror -->
            </div>
        <br>
            <div class="photoplat-modif" align="center">  
                <button type="submit">Valider</button>
            </div>
        <br>
        </form>
<!----- Retour a page précédente ---->
<div class="retour_page_precedente">
    <a href="{{ route('admin.photoplat.index') }}">Page précédente</a>
</div>
<!----------------------------->
@endsection