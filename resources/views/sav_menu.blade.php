@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu</h1>

    @foreach ($categories as $categorie)
        <h2>{{ $categorie->nom }}</h2>
        <p>{{ $categorie->description }}</p>

        <ul>
            @foreach ($categorie->platsSortedByPrix as $plat)
            <table>
                <thead>
                    <tr>
           <!--  <td>($plat->photo)</td> -->
                {{-- dump($plat->photo)--}}
                <!-- asset va fournir http:\\localhost:8000   -->
              <td>  <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt=""> </td>
                {{--$plat->photo->chemin--}}
              <td>  {{ $plat->nom }}  {{ $plat->prix }} eur </td>
              <td>  {{ $plat->description }}</td>
                @foreach ($plat->etiquettes as $etiquette)
            
                {{$etiquette->nom}}
                
                @endforeach
            
            @endforeach

            


    @endforeach
</table>
<br>
@endsection
