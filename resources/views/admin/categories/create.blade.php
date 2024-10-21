@extends('admin.layout.master')
@section('title', 'Ajouter une catégorie')
@section('titre', 'Catégories')
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

                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nom Catégorie</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="Libelle"
                                            value="{{ old('libelle') }}">
                                        @error('libelle')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Image Catégorie</label>
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Annuler</a>
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
