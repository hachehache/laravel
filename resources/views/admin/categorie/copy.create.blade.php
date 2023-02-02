@extends('base')

@section('page_title', 'Admin - Catégorie - Création')

@section('content')
<h1>Admin - Catégorie - Création</h1>
<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une reservation, on aura un message au dessus,
qui sig<!nalera que les modifs ont bien été enregitrées-->


<div>
Attention, les donnéees n'ont pas été enregistrées, il y a des erreurs dans le formulaire.
</div>


<!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
<form action="{{route('admin.categorie.create')}}" method="POST">

<!--csrf permet de securiser, empeche piratage -->
{{ csrf_field() }}

    <div class="form-group">
       <label for="nom"> Nom </label>
        <input type="text" name="nom" class="form-control" value= {{($categorie->name)}}> 
    </div>

   <div class="form-group">  
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" value= {{($categorie->description)}}></textarea>
    </div>
  

    <div class="form-group">  
        <input type="submit" value="valider">
</div>

<div class="form-group">
    <label for="categorie">Categorie</label>


    <select name="categorie" class="form-control">
        <option value="">Select Categorie</option>

        
                @foreach ($categories as $categorie)
				<option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
				@endforeach

			</select>


		</div>
    </form>
@endsection
 