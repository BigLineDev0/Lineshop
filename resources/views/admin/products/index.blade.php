@extends('admin.layout.master')
@section('title', 'Produits')
@section('titre', 'Produits')
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
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tous les Produits</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Nom Produit</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                            <th>Catégorie</th>
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <!-- Modal -->
                                            <div class="modal fade" id="productModal-{{ $product->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="productModalLabel-{{ $product->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="productModalLabel-{{ $product->id }}">
                                                                Détail du produit</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Contenu du modal -->
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <small class="mx-2 text-muted">Nom du Produit</small>
                                                                        <div class="pl-4">{{ $product->nom }}</div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <small class="mx-2 text-muted">Prix (CFA)</small>
                                                                        <div class="pl-4">{{ $product->prix }}</div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <small class="mx-2 text-muted">Catégorie</small>
                                                                        <div class="pl-4">{{ $product->category->libelle }}</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <div class="col-md-4">
                                                                        <small class="mx-2 text-muted">Quantité</small>
                                                                        <div class="pl-4">{{ $product->quantite }}</div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <small class="mx-2 text-muted">Disponible</small>
                                                                        @if ($product->active == true)
                                                                            <div class="pl-4">
                                                                                <span class="badge badge-success px-2 rounded-pill">Oui</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="pl-4">
                                                                                <span class="badge badge-danger px-2 rounded-pill">Non</span>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <small class="mx-2 text-muted">Vedette</small>
                                                                        @if ($product->vette == true)
                                                                         <div class="pl-4">
                                                                            <span class="badge badge-success px-2 rounded-pill">Oui</span>
                                                                         </div>
                                                                            @else
                                                                            <div class="pl-4">
                                                                                <span class="badge badge-danger px-2 rounded-pill">Non</span>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    @if ($product->options)
                                                                        <div class="col-md-6">
                                                                            <small class="mx-2 text-muted">Options</small>
                                                                                @foreach ($product->options as $option)
                                                                                    <div class="form-check mx-2">
                                                                                        <input type="checkbox" name="options[]" id="options-{{ $option->id }}" class="form-check-input" value="{{ $option->id }}"
                                                                                        checked> 
                                                                                        <label for="options-{{ $option->id }}" class="form-input-label">{{ $option->libelle }}</label>
                                                                        
                                                                                    </div>
                                                                                @endforeach
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-md-6">
                                                                        <small class="mx-2 text-muted">Image</small>
                                                                        <div class="pl-2">
                                                                            <img src="
                                                                            {{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                                                                width="100" height="100">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <fieldset>
                                                                        <legend>Description</legend>
                                                                        <p>{{ $product->description }}</p>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">
                                                                Fermer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>
                                                    <img src="
                                                    {{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}"
                                                        width="50" height="50">
                                                </td>
                                                <td>{{ $product->nom }}</td>
                                                <td>{{ formatDevise($product->prix) }}</td>
                                                <td>{{ $product->quantite }}</td>
                                                <td>{{ $product->category->libelle }}</td>
                                                <td>
                                                    @if ($product->active == true)
                                                        <span class="badge badge-success px-2 rounded-pill">Disponible</span>
                                                    @else
                                                        <span class="badge badge-danger px-2 rounded-pill">Non disponible</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <button class="btn btn-info" data-toggle="modal"
                                                        data-target="#productModal-{{ $product->id }}">
                                                        <i class="nav-icon fas fa-eye"></i>
                                                    </button>
                                                    <a href="{{ route('produits.edit', $product->id) }}"
                                                        class="btn btn-primary">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('produits.destroy', $product->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr?')">
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
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })
        });
    @endpush
