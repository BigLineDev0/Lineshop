<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Lineshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Accueil</a></li>
                <li class="nav-item active"><a href="{{ route('about') }}" class="nav-link">A propos</a></li>
                <li class="nav-item active"><a href="{{ route('shop') }}" class="nav-link">Boutique</a></li>
                <li class="nav-item active"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="{{ route('panier.index') }}" class="nav-link">
                        <span class="icon-shopping_cart"></span>[{{ $nombreProduit }}]
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenue {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{ route('logout') }}">Se déconnecter</a>
                                </div>
                            </li>    
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{ route('logout') }}">Se déconnecter</a>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon Compte</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ route('register') }}">S'inscrire</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
                            </div>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->