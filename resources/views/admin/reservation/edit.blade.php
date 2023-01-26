@extends('base')

@section('page_title', 'Admin - Réservation - Modification')

@section('content')
<h1>Admin - Réservation - Modification</h1>
<!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
<form action="{{route('admin.reservation.update',['id' => $reservation ->id]) }}" method="POST">

    <!--csrf permet de securiser, empeche piratage -->
@csrf
        <div>
        <input type="text" name="" id="" value="{{ $reservation->nom }}">
        </div>
        <div>
        <input type="text" name="" id="" value="{{ $reservation->prenom }}">
        </div>
        <div>
        <input type="date" name="" id="" value="{{ $reservation->jour }}">
        </div>
        <div>
        <input type="time" name="" id="" value="{{ $reservation->heure }}">
        </div>
        <div>
        <input type="number" name="" id="" value="{{ $reservation->nombre_personnes }}">
        </div>
        <div>
        <input type="tel" name="" id="" value="{{ $reservation->tel }}">
        </div>
        <div>
        <input type="email" name="" id="" value="{{ $reservation->email }}">
        </div>
        <div>
        <!-- date de creation de la reservation -->
        <input type="datetime" name="" id="" value="{{ $reservation->created_at  }}">
        </div>
        <button type="submit">Valider</button>

    </form>
@endsection