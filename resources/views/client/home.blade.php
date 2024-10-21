@extends('layout.app')
@section('content')
    @include('client.partial.slider')

    @include('client.partial.shoppingService')

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                                style="background-image: url({{ asset('frontend/images/category.jpg') }});">
                                <div class="text text-center">
                                    <h2>Légumes</h2>
                                    <p>Protection de la santé de chaque foyer</p>
                                    <p><a href="{{ route('shop') }}" class="btn btn-primary">Achetez maintenant</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                style="background-image: url({{ asset('frontend/images/category-1.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Fruits</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                style="background-image: url({{ asset('frontend/images/category-2.jpg') }});">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Légumes</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                        style="background-image: url({{ asset('frontend/images/category-3.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Jus</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                        style="background-image: url({{ asset('frontend/images/category-4.jpg') }});">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Séché</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Produits en Vedettes</span>
                    <h2 class="mb-4">Nos Produits</h2>
                    <p>Découvrez notre sélection exclusive de produits spécialement choisis pour vous offrir la meilleure
                        qualité et expérience.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($featuredProducts as $produit)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('show', $produit->slug) }}" class="img-prod"><img class="img-fluid" src="{{ $produit->image }}"
                                    alt="{{ $produit->name }}">
                                <span class="status">-30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{ $produit->nom }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <span class="price-sale">{{ formatDevise($produit->prix) }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{ route('show', $produit->slug) }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="{{ route('show', $produit->slug) }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section img" style="background-image: url({{ asset('frontend/images/bg_3.jpg') }});">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <span class="subheading">Meileur prix pour vous</span>
                    <h2 class="mb-4">L'affaire du jours</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    <h3><a href="#">Epinards</a></h3>
                    <span class="price">En Promo</a></span>
                    <div id="timer" class="d-flex mt-5">
                        <div class="time" id="days"></div>
                        <div class="time pl-3" id="hours"></div>
                        <div class="time pl-3" id="minutes"></div>
                        <div class="time pl-3" id="seconds"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.partial.testimoniage')

    <hr>

    @include('client.partial.partner')

    @include('includes.newsletter')

    <!-- end content -->
@endsection
