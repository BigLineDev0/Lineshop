@extends('layout.app')
@section('title', 'Connexion ')
@section('titre', 'Se Connecter ')
@section('content')
    
    @include('includes.headerHero')

    <section class="ftco-section contact-section bg-light">
        <div class="container">

            @include('includes.flashMessage')

            @include('includes.flashMessageAllErrors')

            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                    <form action="{{ route('login') }}" method="POST" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Adresse Email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <p>
                                    <input type="submit" value="Se Connecter" class="btn btn-primary py-3 px-5">
                                    <span class="ml-3">Vous n'avez pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a> </span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection