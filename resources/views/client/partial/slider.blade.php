<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_1.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">Nous servons des Légumes &amp; des Fruits frais</h1>
                        <h2 class="subheading mb-4">Nous livrons des légumes &amp; fruits biologiques</h2>
                        <p><a href="{{ route('shop')}}" class="btn btn-primary">Voir Détails</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url({{ asset('frontend/images/bg_2.jpg')}});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2">Aliments 100% Frais &amp; Biologiques</h1>
                        <h2 class="subheading mb-4">Nous livrons des légumes &amp; fruits biologiques</h2>
                        <p><a href="{{ route('shop')}}" class="btn btn-primary">View Details</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>