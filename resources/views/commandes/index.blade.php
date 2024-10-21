@extends('layout.app')
@section('title', 'Commande ')
@section('titre', 'Validation Commande ')
@section('content')

    @include('includes.headerHero')

    <section class="ftco-section">
        <div class="container">
            <form action="{{ route('validatedCheckout') }}" method="POST" class="billing-form">
                @csrf
                
                @include('includes.flashMessageAllErrors')

                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <h3 class="mb-4 billing-heading">Informations personnelles</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Prénom et Nom</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adresse Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Numéro de Téléphone</label>
                                    <input type="text" name="telephone" class="form-control" value="{{ Auth::user()->telephone }}">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Adresse de livraison</label>
                                    <input type="text" name="adresse_de_livraison" class="form-control" value="{{ old('adresse_de_livraison') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Détail Panier</h3>
                                    @foreach ($paniers as $panier)
                                        <p class="d-flex">
                                            <span>{{ $panier->name }}</span>
                                            <span>{{ $panier->quantity }}</span>
                                        </p>
                                        @endforeach
                                        <p class="d-flex">
                                            <span>Options</span>
                                            <span>({{ $panier->attributes->option_id }})</span>
                                        </p>

                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span>{{ formatDevise($totalProduit) }}</span>
                                        </p>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Moyen de Paiement</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="type_de_paiement" class="mr-2" value="enligne"
                                                        checked>
                                                    Paiement en ligne
                                                    (<small class="text-danger">Payez par orange money, wave</small>)
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="type_de_paiement" class="mr-2" value="livraison">
                                                    Paiement à la
                                                    livraison</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary py-3 px-4">Terminer la commande</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </form><!-- END -->
        </div>
    </section> <!-- .section -->

    @include('includes.newsletter')
@endsection
