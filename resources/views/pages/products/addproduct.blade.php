@extends('layouts.main')

@section('crumb')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name"
                        placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="productDescription">Description</label>
                    <textarea class="form-control" id="productDescription" name="description" placeholder="Enter product description"></textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="productStock">Stock</label>
                    <input type="number" class="form-control" id="productStock" name="stock"
                        placeholder="Enter stock quantity">
                </div>
                {{-- <div class="form-group">
                    <label for="productImage">Product Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="productImage" name="image">
                            <label class="custom-file-label" for="productImage">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>

    </div>
@endsection
