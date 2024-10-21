@extends('layout.app')
@section('title', 'Produit')
@section('titre', 'Détail Produit ')
@section('content')

    @include('includes.headerHero')

    @include('includes.flashMessage')
    
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="#" class="image-popup">
                        <img src="{{ str_starts_with($produit->image, 'http') ? $produit->image : asset('storage/'.$produit->image) }}" class="img-fluid"
                            alt="{{ $produit->image }}"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $produit->nom }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #bbb;">Catégorie:
                                <span style="color: #000;">{{ $produit->category->libelle }}
                                </span>
                            </a>
                        </p>

                    </div>
                    <p class="price"><span>{{ number_format($produit->prix) }} Fcfa</span></p>
                    <p>
                        {{ $produit->description }}
                    </p>
                    <div class="row mt-4">
                        <form action="{{ route('panier.store') }}" method="POST" class="input-group col-md-6 d-flex mb-3">
                        @csrf
                        
                        <div class="form-group d-flex">
                            @if ($produit->options->count() > 0)
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="option_id" class="form-control">
                                        @foreach ($produit->options as $option)
                                            <option value="{{ $option->libelle }}">{{ $option->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                        
                        <div class="w-100"></div>
                            <input type="hidden" value="{{ $produit->id }}" name="produit_id">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" class="form-control input-number" value="1"
                                min="1" max="100" name="quantite">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                            <div class="w-100"></div>
                            <input type="submit" class="btn btn-black py-3 px-5 mt-5" value="Ajouter au panier">
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Prénom et Nom">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Sujet">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Envoyer Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Produits</span>
                    <h2 class="mb-4">Produits Similaires</h2>
                    <p>Si vous avez aimé ce produit, vous pourriez aussi être intéressé par ces produits</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($similarProducts as $item)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('show', $produit->slug) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ $item->image }}" alt="image produit">
                                <span class="status">{{ $produit->category->libelle }}</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ route('show', $produit->slug) }}">{{ $item->nom }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc"></span><span
                                                class="price-sale">{{ $item->prix }} FCFA</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#"
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



@endsection
