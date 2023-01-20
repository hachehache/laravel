@extends('base')

@section('page_title', 'Contact')

@section('content')
    <h1>Contact</h1>
    {{-- -- affichage de l'adresse et tel --}}
    {{ $adresse }}<br>
    <br>
    {{$tel }}<br>
    <br>
    {{-- pour affichage de la carte --}}
    {{-- !!$map : oblige a afficher le code et non le nom de la carte, c'est un system de secu passif --}} 
    {{-- tous les caractères dangereux sont echappés      --}}
    {{!! $map !!}}<br>
    <br> 
    {{$horaire }}<br>
    <br>
@endsection
