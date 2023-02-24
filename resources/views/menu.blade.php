@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu Côté CLIENT -LISTAGE</h1>


    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">

            <!--  th*7  on aura 7 balises -->
            <!-- pour modifier une etiquette -->
            <tr>      
            <th colspan='1'>Nom de la Catégorie</th>
            <th colspan='1'>Description Catégorie</th>
            <th colspan='1'>Nom de l'Etiquette</th>
            <th colspan='1'>Description de l'étiquette</th>
            </tr>
        </thead>


    @foreach ($categories as $categorie)
        <h2>{{ $categorie->nom }}</h2>
        <p>{{ $categorie->description }}</p>

        <ul>
            @foreach ($categorie->platsSortedByPrix as $plat)
            <li>
                <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
                {{ $plat->nom }} {{ $plat->prix }} eur<br>
                {{ $plat->description }}<br>
                @foreach ($plat->etiquettes as $etiquette)
                    {{ $etiquette->nom }}
                @endforeach
            </li>
            @endforeach
        </ul>
    @endforeach
@endsection
