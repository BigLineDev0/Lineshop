<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
         // Compter le nombre de catégories, produits, commandes, et clients
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $ordersCount = Commande::count();
        $clientsCount = User::where('role', 'client')->count(); // Supposons que les utilisateurs admins aient une colonne role
        $adminsCount = User::where('role', 'admin')->count(); // Supposons que les utilisateurs admins aient une colonne role
 
        return view('admin.index', compact('categoriesCount', 'productsCount', 'ordersCount', 'clientsCount', 'adminsCount'));
    }

    public function listClients()
    {
        $clients = User::where('role', 'client')->latest()->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function deleteClient(User $user)
    {
        $admin = $user->delete();
        if ($admin) {
            return redirect()->route('admin.client')->with('success', 'Client supprimé avec succès.');
        } else {
            return redirect()->route('admin.client')->with('error', 'Echec de la suprression.');

        }    
    }

    // ================= ADMINISTRATEUR =========================
    public function listAdmins()
    {
        $admins = User::where('role', 'admin')->latest()->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function createAdmin(){
        return view('admin.admins.create');
    }

    public function storeAdmin(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required',
            'password' => 'required|min:6',
        ]);

        // Créer un admin
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'telephone' => $request->telephone,
            'password' => $request->password,
            'created_at' => now(),
        ]);

        if ($user) {
            return redirect()->route('admin.index')->with('success', 'Admin crée avec succès.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Echec de l\'ajout.');
        } 
    }

    public function editAdmin(User $user){
        return view('admin.admins.edit', compact('user'));
    }

    public function updateAdmin(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        // Mise à jour des données
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'telephone' => $request->telephone,
        ]);

        if ($user) {
            return redirect()->route('admin.index')->with('success', 'Admins mis à jour avec succès.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Echec de la modification.');
        } 
    }

    public function deleteAdmin(User $user)
    {
        $admin = $user->delete();
        if ($admin) {
            return redirect()->route('admin.index')->with('success', 'Admins supprimé avec succès.');
        } else {
            return redirect()->route('admin.index')->with('error', 'Echec de la suprression.');
        }    
    }

    public function listCommandes()
    {
        $count = 1;
        $commandes = Commande::latest()->get();
        return view('admin.commandes.index', compact('commandes', 'count'));
    }

    public function deleteCommande(Commande $commande)
    {
        $commandes = $commande->delete();
        if ($commandes) {
            return redirect()->route('admin.commande')->with('success', 'Commande supprimée avec succès.');
        } else {
            return redirect()->route('admin.commande')->with('error', 'Echec de la suprression.');
        }    
    }
}
