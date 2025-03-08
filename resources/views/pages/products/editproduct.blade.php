@extends('layouts.main')

@section('crumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="productStock">Stock</label>
                    <input type="number" class="form-control" id="productStock" name="stock"
                        value="{{ $product->stock }}">
                </div>
                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price"
                        value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea class="form-control" id="productDescription" name="description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
@endsection
