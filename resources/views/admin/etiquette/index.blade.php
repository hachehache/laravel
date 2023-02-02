@extends('base')

@section('page_title', 'Admin - Etiquette - Liste')

@section('content')
<h1>Admin - Etiquette - Liste</h1>

<div>
    <!-- pour ajouter nouvelle etiquette -->
    <a href={{ route('admin.etiquette.create')}}>Ajouter</a>
    
</div>
    <table>
        <tr>
              <!--  th*7  on aura 7 balises -->
              <th>nom</th>
              <th>description</th>
             <!-- pour modifier une etiquette -->
              <th>actions</th>
        </tr>
    <!--  on est dans le back coté Admin -->
    {{--dump ($etiquette)--}}
    @foreach ($etiquettes as $etiquette)
    {{-- dump ($etiquettes) --}}
    <tr>
        <td>{{ $etiquette->nom }}</td>
        <td>{{ $etiquette->description }}</td>
        <td>
            <a href="{{route('admin.etiquette.edit' , ['id' => $etiquette->id]) }} ">modifier</a>
        </td>
    </tr> 
    @endforeach
    </table>
@endsection
