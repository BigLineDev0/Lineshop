@extends('layout.app')
@section('title', 'A propos ')
@section('titre', 'Qui somme Nous ? ')
@section('content')

    @include('includes.headerHero')

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url({{ asset('frontend/images/about.jpg') }});">
                    <a href="https://vimeo.com/45830194"
                        class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0">
                            <h2 class="mb-4">A propos de Lineshop</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>
                            Bienvenue sur Lineshop, votre destination en ligne dédiée à la vente de produits de qualité soigneusement sélectionnés. Nous sommes une boutique en ligne axée sur la satisfaction client, en vous offrant des produits variés et des services qui facilitent votre expérience d'achat.
                        </p>
                        <p>
                            Notre mission est de rendre votre shopping simple, rapide et agréable, tout en vous garantissant des prix compétitifs et un service de livraison rapide. Chez Lineshop, nous croyons en l'importance d'une relation de confiance avec nos clients, c'est pourquoi nous mettons un point d'honneur à offrir des produits qui répondent à vos attentes.
                        </p>
                        <p>
                            Que vous soyez à la recherche de nouveautés ou de produits en vedette, nous sommes ici pour vous accompagner tout au long de votre parcours d'achat.
                        </p>
                        <p><a href="{{ route('shop') }}" class="btn btn-primary">Achetez maintenant</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.newsletter')

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{ asset('frontend/images/bg_3.jpg')}});">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10000">0</strong>
                                    <span>Clients Satisfaits</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Partenaires</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Prix</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   @include('client.partial.testimoniage')

   @include('client.partial.shoppingService')

@endsection
