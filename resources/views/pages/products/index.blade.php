@extends('layouts.main')

@section('crumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Transactions</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Transactions</a></li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transaction History</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->user->id }}</td> <!-- Menampilkan ID user -->
                            <td>{{ $transaction->product->name }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            <td>{{ $transaction->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
