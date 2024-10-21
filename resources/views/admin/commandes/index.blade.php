@extends('admin.layout.master')
@section('title', 'Liste Commandes')
@section('titre', 'Commandes')
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
                                <h3 class="card-title">@yield('title')</h3>
                            </div>
                           
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Réference</th>
                                            <th>Total</th>
                                            <th>Client</th>
                                            <th>Adresse de Livraison</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes as $commande)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $commande->reference }}</td>
                                                <td>{{ formatDevise($commande->total) }}</td>
                                                <td>{{ $commande->user_id }}</td>
                                                <td>{{ $commande->adresse_livraison }}</td>
                                                <td>
                                                    <span class="badge badge-success">{{ $commande->statut }}</span>
                                                </td>
                                                <td>{{ is_null($commande->created_at) ? '' : $commande->created_at->format('d/m/Y à H:i') }}</td>
                                                <td>
                                                   
                                                    <form action="{{ route('commande.delete', $commande->id) }}" method="POST" class="d-inline-block">
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