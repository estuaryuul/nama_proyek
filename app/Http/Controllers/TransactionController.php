<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Products::findOrFail($request->product_id);

        // Pastikan stok mencukupi
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stock is not enough!');
        }

        $total_price = $product->price * $request->quantity;

        // Buat transaksi
        Transactions::create([
            'date' => now(),
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        // Kurangi stok produk
        $product->decrement('stock', $request->quantity);

        return redirect()->route('transactions.index')->with('success', 'Transaction successful!');
    }
}
