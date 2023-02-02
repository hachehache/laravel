@extends('base')

@section('page_title', 'Admin - Catégorie - Liste')

@section('content')
<h1>Admin - Catégorie - Liste</h1>


<div>
    <!-- pour ajouter nouvelle categorie -->
    <a href={{ route('admin.categorie.create')}}>Ajouter</a>
    
</div>

    <table>
        <tr>
              <!--  th*7  on aura 7 balises -->
              <th>nom</th>
              <th>description</th>
              <!-- pour modifier une categorie -->
              <th>actions</th>
        </tr>
    <!--  on est dans le back coté Admin -->
    {{--dump ($categories)--}}
    @foreach ($categories as $categorie)
    {{--  dump ($categories)--}}
    <tr>
        <td>{{ $categorie->nom }}</td>
        <td>{{ $categorie->description }}</td>
        <td>
            <a href="{{route('admin.categorie.edit' , ['id' => $categorie->id]) }} ">modifier</a>
        </td>
    </tr> 
    @endforeach
    </table>
@endsection
