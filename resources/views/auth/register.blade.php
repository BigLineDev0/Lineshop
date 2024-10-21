@extends('layout.app')
@section('title', 'Inscription ')
@section('titre', 'S\'Inscrire ')
@section('content')

    @include('includes.headerHero')

    <section class="ftco-section contact-section bg-light">
        <div class="container">

            @include('includes.flashMessage')

            @include('includes.flashMessageAllErrors')

            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                    <form action="{{ route('register') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Prénom et Nom" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Adresse Email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telephone" class="form-control" placeholder="Numéro de téléphone" value="{{ old('telephone') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <p>
                                    <input type="submit" value="S'Inscrire" class="btn btn-primary py-3 px-5">
                                    <span class="ml-3">Avez-vous déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a> </span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection