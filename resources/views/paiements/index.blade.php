@extends('layout.app')
@section('title', 'Commande')
@section('titre', 'Paiement en ligne ')
@section('content')

    @include('includes.headerHero')

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row m-auto">
                <div class="col-md-12 order-md-last d-flex bg-white">
                   <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Récapitulatif de la commande</h3>
    					<p class="d-flex">
    						<span>Reference</span>
    						<span>{{  $commande->reference }}</span>
    					</p>
    					<p class="d-flex">
    						<span>Statut</span>
    						<span>{{ $commande->statut }}</span>
    					</p>
						
                        <p class="d-flex">
    						<span>Nombre de produit</span>
    						<span>{{ $nombreProduit }}</span>
    					</p>
    					<p class="d-flex">
    						<span>Prenom et Nom</span>
    						<span>{{ Auth::user()->name }}</span>
    					</p>
                        <p class="d-flex">
    						<span>Numéro de téléphone</span>
    						<span>{{ Auth::user()->telephone }}</span>
    					</p>
                        <p class="d-flex">
    						<span>Adresse de livraison</span>
    						<span>{{ $commande->adresse_livraison }}</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>{{  formatDevise($commande->total) }}</span>
    					</p>
    				</div>
    				<p><a href="{{ route('shop') }}" class="btn btn-primary py-3 px-4">Retour à la boutique</a></p>
    			
            </div>
        </div>
    </section>
@endsection
