<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        // Jika user adalah admin, tampilkan semua transaksi
        if ($user->role == 'admin') {
            $transactions = Transactions::with('user', 'product')->get();
        } else {
            // Jika bukan admin, hanya tampilkan transaksi milik user tersebut
            $transactions = Transactions::where('user_id', $user->id)->with('user', 'product')->get();
        }
        return view('pages.products.index', compact('transactions'));
    }

    public function production()
    {
        $dataproduct = Products::all();
        return view('pages.products.products', compact('dataproduct'));
    }

    public function addProduction()
    {
        return view('pages.products.addproduct');
    }

    public function login()
    {
        return view('users.login');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        $dataproduct = Products::all();
        return view('pages.products.products', compact('dataproduct'));
    }
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('pages.products.editproduct', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Products::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect('/products')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully!');
    }
}
