<div class="hero-wrap hero-bread" style="background-image: url({{ asset('frontend/images/bg_1.jpg') }});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Accueil</a></span> <span>@yield('title')</span>
                </p>
                <h1 class="mb-0 bread">@yield('titre')</h1>
            </div>
        </div>
    </div>
</div>