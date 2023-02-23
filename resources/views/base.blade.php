<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @yield('page_title')</title>
   
    <!-- Bootstrap CSS dans le head-->
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @section('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @show

<title>O Cnamo / Restaurant Camerounais / Lille </title>

    
</head>    
            <!--========================================================================= -->        
            <!------------------  FIN DE LA PARTIE ENTETE  ET DEBUT DU HEADER ADMIN -------->
            <!--========================================================================= --> 
    <body>
        <header> 
        <a href="" class="logo"><span>0'</span>CNAMO</a>

            
            <!--========================================================================= --> 
            <!----------- TABLEAU DE BORD ADMIN - GESTION ADMIN    ------------------------->
            <!------------------------------------------------------------------------------>
           
        @auth   <!--===DROIT ADMIN=====-->
        <nav>
            <ul class="navbar">
                <!----------- TABLEAU DE BORD ADMIN - GESTION ADMIN    -------->
           
                    <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>    
                    <li><a href="{{ route('admin.reservation.index') }}">Réservation</a></li>
                    <li><a href="{{ route('admin.etiquette.index') }}">Etiquette</a></li>
                    <li><a href="{{ route('admin.categorie.index') }}">Catégorie</a></li>
                    <li><a href="{{ route('admin.plat.index') }}">Plat</a></li>
                    <li><a href="{{ route('admin.photoplat.index') }}">PhotoPlat</a></li>
            </ul>  
        </nav>
        
    <li>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">déconnexion</a>
        </form>
    </li>
   
       @else    

                <!--============================= ACCUEIL UTILISATEUR ========================================= -->
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('reservation') }}">Réservation</a></li>
                    <li><a href="{{ route('actus') }}"> Actus </a></li>
                    <li><a href="{{ route('contact') }}"> Contact </a></li>
                    <li><a href="{{ route('mentions-legales') }}">MentionsLegales</a></li>
                </ul>
            </nav>
            <!-- ==============================FIN  NAV UTILISATEUR =========================== -->

            
         @endauth
        </header>

        @section('content')
        @show
    
        <footer class="site-footer">
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('contact') }}"> Contact </a></li>
                <!-- Lien vers les mentions Légales dans le footer -->
                <li><a href="{{ route('mentions-legales') }}">Mentionslegales</a></li>
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li>Copyright O'Cnamo 2023</li>
            </ul>

            @guest
            <ul>
                
             
            </ul>
            @endguest
               
    

        </footer>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    </html>