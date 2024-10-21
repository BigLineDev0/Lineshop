@extends('admin.layout.master')
@section('title', 'Modifier une catégorie')
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

                            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nom Catégorie</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="Libelle"
                                            value="{{ old('libelle', $category->libelle ) }}">
                                        @error('libelle')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Image Catégorie</label>
                                        <input type="file" class="form-control" name="image" value="{{ old('image', $category->image) }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if ($category->image)
                                        <div class="col mt-2">
                                            <label>Image actuelle :</label>
                                            <img src="{{ str_starts_with($category->image, 'http') ? $category->image : asset('storage/'.$category->image) }}"
                                                width="100" height="100">
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Mettre à jour">
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
