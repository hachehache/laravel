<x-app-layout>
    <x-slot name="header">
     <!--   <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- __('Dashboard') --}}
        </h2> -->
    </x-slot>
<!------------------------------>
<h1> Tableau de Bord  Administrateur</h1>

        <!----------- TABLEAU DE BORD ADMIN - GESTION ADMIN    -------->
        <fieldset class="dashboard">
            <legend class=""><p><strong>Tableau administration</strong></p></legend> 
           <!-- <li><a href="{{-- route('dashboard') --}}">Tableau de bord</a></li>   --> 
            <li><a class="link_dashboard" href="{{ route('admin.reservation.index') }}">Réservation</a></li>
            <li><a class="link_dashboard" href="{{ route('admin.etiquette.index') }}">Etiquette</a></li>
            <li><a class="link_dashboard" href="{{ route('admin.categorie.index') }}">Catégorie</a></li>
            <li><a class="link_dashboard" href="{{ route('admin.plat.index') }}">Plat</a></li>
            <li><a class="link_dashboard" href="{{ route('admin.photoplat.index') }}">PhotoPlat</a></li>
            <li><a class="link_dashboard" href="{{ route('admin.actu.index') }}">Actu</a></li>
    <br>
            <li class="deconnexion">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="link_dashboard_logout" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">déconnexion</a>
                </form>
            </li>
        </fieldset>
<!------------------------------>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
