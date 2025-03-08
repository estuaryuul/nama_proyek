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
        <a href="/register" class="btn btn-success">Add Product <i class="fas fa-plus-square"></i></a>
        <!-- /.card-header -->
        <!-- form start -->
    </div>
@endsection
