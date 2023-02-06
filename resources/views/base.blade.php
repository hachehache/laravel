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

</head>

<body>

    <header>
        <div class="entete">
            <div id="logo-fixe">
                <img class  src="img/fitness-logo-hommefemme.jpg" alt="logo">
            </div>
    
           
        <nav>
            <ul>
                <!----------- TABLEAU DE BORD ADMIN - GESTION ADMIN    -------->
                @auth
                    <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li><a href="{{ route('admin.reservation.index') }}">Réservation - Liste</a></li>
                    <li><a href="{{ route('admin.reservation.create') }}">Réservation - Création</a></li>

                    <li><a href="{{ route('admin.etiquette.index') }}">Etiquette - Liste</a></li>
                    <li><a href="{{ route('admin.etiquette.create') }}">Etiquette - Création</a></li>
                
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">déconnexion</a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('reservation') }}">Réservation</a></li>
                @endauth

                <!------------------------------------------------------------->
            </ul>
        </nav>
    </div>
    </header>
    @section('content')
    @show
</body>
    <footer class="container-footer">
        <ul>
            <div class="footer-font">
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('mentions-legales') }}">Mentions légales</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                @endguest
                <br>
                    <li>Copyright O Cnamo 2023</li>
            </div>
        </ul>
    </footer>
     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</div>

</body>
</html>