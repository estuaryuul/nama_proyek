@extends('layouts.main')

@section('crumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>

            <div class="card-tools">
                @if (auth()->user()->role == 'admin')
                    <a href="/addproduct" class="btn btn-success">Add Product <i class="fas fa-plus-square"></i></a>
                @endif
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataproduct as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>Rp {{ number_format($product->price) }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if (auth()->user()->role == 'admin')
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                @else
                                    <form action="{{ route('transactions.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="number" name="quantity" min="1" max="{{ $product->stock }}"
                                            required>
                                        <button type="submit" class="btn btn-success btn-sm">Buy</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
