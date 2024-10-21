@extends('admin.layout.master')
@section('title', 'Ajouter un Produit')
@section('titre', 'Produits')
@section('content')
    <div class="content-wrapper">

        @include('admin.partials.header')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@yield('title')</small></h3>
                            </div>

                            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <label>Nom Produit</label>
                                            <input type="text" name="nom" class="form-control" placeholder="Nom du produit"
                                                value="{{ old('nom') }}">
                                            @error('nom')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label>Prix Produit (CFA)</label>
                                            <input type="number" name="prix" class="form-control" placeholder="prix du produit"
                                                value="{{ old('prix') }}">
                                            @error('prix')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>Quantité</label>
                                            <input type="number" name="quantite" class="form-control" placeholder="Quantité du produit"
                                                value="{{ old('quantite') }}">
                                            @error('quantite')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label>Catégorie</label>
                                            <select name="categorie_id" class="form-control">
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('categorie_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="options">Options</label>
                                            @foreach ($options as $option)
                                            <div class="form-check mx-2">
                                                <input type="checkbox" name="options[]" id="options-{{ $option->id }}" class="form-check-input" value="{{ $option->id }}"> 
                                                <label for="options-{{ $option->id }}" class="form-input-label">{{ $option->libelle }}</label>
                                                @error('options')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="vedette" name="vedette" value="0">
                                                    <label class="custom-control-label" for="vedette">Produit en Vedette</label>
                                                </div>
                                                @error('vedette')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="active" name="active" value="1" checked>
                                                    <label class="custom-control-label" for="active">Produit Actif</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    <a href="{{ route('produits.index') }}" class="btn btn-danger">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
