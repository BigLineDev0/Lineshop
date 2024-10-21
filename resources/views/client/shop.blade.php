@extends('layout.app')
@section('title', 'Boutique')
@section('titre', 'Produits')
@section('content')
    <!-- start content -->
    
    @include('includes.headerHero')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li>
                            <a href="{{ route('shop') }}" class="{{ request()->is('shop') ? 'active' : '' }}" class="active">
                                Tout
                            </a>
                        </li>
                        @foreach ($categories as $categorie)
                            <li>
                                <a href="{{ route('shop.category', $categorie->slug) }}"  class="{{ request()->is('shop/categorie/'.$categorie->slug) ? 'active' : '' }}">
                                    {{ $categorie->libelle }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-10 mb-5 text-center">
                    {{-- @if (isset($categorie) && $categorie)
                        <h2>Produits dans la catégorie : {{ $categorie->libelle }}</h2>
                    @else
                        <h2>Tous les produits</h2>
                    @endif --}}
                </div>
            </div>
            <div class="row">
                @foreach ($produits as $produit)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('show', $produit->slug) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ str_starts_with($produit->image, 'http') ? $produit->image : asset('storage/'.$produit->image) }}" alt="{{ $produit->name }}">
                                <span class="status">{{ $produit->category->libelle }}</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ route('show', $produit->slug) }}">{{ $produit->nom }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc"></span><span
                                                class="price-sale">{{ number_format($produit->prix) }}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#"
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
            <div class="row mt-5">
                <div class="col-md-10 mb-5 text-center">
                    {{ $produits->links() }}
                </div>
            </div>
        </div>
    </section>
    @include('includes.newsletter')
@endsection
