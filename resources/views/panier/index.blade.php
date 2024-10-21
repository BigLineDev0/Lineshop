@extends('layout.app')
@section('title', 'Panier ')
@section('titre', 'Mon Panier ')
@section('content')
    <!-- start content -->

    @include('includes.headerHero')

    <section class="ftco-section ftco-cart">
        <div class="container">

            @include('includes.flashMessage')

            @if ($isEmpty)
                <p class="alert alert-warning">Votre panier est vide.</p>
            @else
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>Image</th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paniers as $panier)
                                        <tr class="text-center">
                                            <td class="product-remove">
                                                <form action="{{ route('panier.destroy', $panier->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE') <!-- Spécifie la méthode DELETE -->
                                                    <button type="submit">
                                                        <a href="">
                                                            <span class="ion-ios-close"></span>
                                                        </a>
                                                    </button>
                                                </form>
                                            </td>

                                            <td class="image-prod">
                                                <div class="img"
                                                    style="background-image:url({{ $panier->attributes->image }});">
                                                    {{-- <img class="img-fluid" src="{{ $panier->attributes->image }}" alt=""> --}}
                                                </div>
                                            </td>

                                            <td class="product-name">
                                                <h3>{{ $panier->name }} </h3>
                                                <p>({{ $panier->attributes->option_id }})</p>
                                            </td>
                                            <td class="price">{{ formatDevise($panier->price) }} </td>

                                            <td class="quantity">
                                                <form action="{{ route('panier.update', $panier->id) }}" method="POST"
                                                    class="form-update">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="quantity"
                                                            class="quantity form-control input-number"
                                                            value="{{ $panier->quantity }}" min="1" max="100">
                                                    </div>
                                                    <button class="d-none" type="submit">Mettre à jour</button>
                                                </form>
                                            </td>
                                            <td class="total">{{ formatDevise($panier->quantity * $panier->price) }}</td>
                                            <td>
                                            </td>
                                        </tr><!-- END TR-->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-end">
                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Code Promo</h3>
                            <p>Entrer le code promo si vous en avez ?</p>
                            <form action="#" class="info">
                                <div class="form-group">
                                    <label for="">Code Promo</label>
                                    <input type="text" class="form-control text-left px-3" placeholder="">
                                </div>
                            </form>
                        </div>
                        <p><a href="#" class="btn btn-primary py-3 px-4">Appliquer le Code Promo</a></p>
                    </div>


                    <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Totals Panier</h3>
                            <p class="d-flex">
                                <span>Sous total</span>
                                <span>{{ formatDevise($totalProduit) }}</span>
                            </p>
                            <p class="d-flex">
                                <span>Frais de livraison</span>
                                <span>0.00 Fcfa</span>
                            </p>
                            <p class="d-flex">
                                <span>Taxe</span>
                                <span>0.00 Fcfa</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>{{ formatDevise($totalProduit) }}</span>
                            </p>
                        </div>
                        <p><a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">Passer à la caisse</a></p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @include('includes.newsletter')

    <!-- end content -->

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quantiteInputs = document.querySelectorAll('input[name="quantity"]');

            quantiteInputs.forEach(input => {
                input.addEventListener('input', (e) => {
                    console.log(
                    "Changement de quantité détecté"); // Pour vérifier si l'événement se déclenche

                    // Si la quantité est inférieure à 1, on la remet à 1
                    if (e.target.value < 1) {
                        e.target.value = 1;
                    }

                    // Trouver le formulaire parent avec la classe form-update
                    const form = e.target.closest('.form-update');
                    console.log("Formulaire trouvé :",
                    form); // Pour vérifier si le bon formulaire est trouvé

                    if (form) {
                        form.submit(); // Soumettre le formulaire
                        console.log("Formulaire soumis");
                    } else {
                        console.error("Le formulaire de mise à jour n'a pas été trouvé !");
                    }
                });
            });
        });
    </script>
@endpush
