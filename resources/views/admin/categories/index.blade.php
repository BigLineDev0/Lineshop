@extends('admin.layout.master')
@section('title', 'Catégories')
@section('titre', 'Catégories')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">

        @include('admin.partials.header')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Toutes les catégories</h3>
                            </div>
                           
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Nom Catégorie</th>
                                            <th>Nombre de produits</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>
                                                    <img src="{{ str_starts_with($categorie->image, 'http') ? $product->image : asset('storage/' .$categorie->image) }}" width="50" height="50" alt="{{ $categorie->libelle }}">
                                                </td>
                                                <td>{{ $categorie->libelle }}</td>
                                                <td>{{ $categorie->products->count() }}</td>
                                                <td>{{ is_null($categorie->created_at) ? '' : $categorie->created_at->format('d/m/Y à H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $categorie->id)}}" class="btn btn-primary">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
                   
                </div>
                
            </div>
        
        </section>

    </div>
@endsection
@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush
