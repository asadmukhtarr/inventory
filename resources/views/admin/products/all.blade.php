@extends('layouts.header')
@section('title','Dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> All Products
    </div>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Supliar</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>#{{ $product->id }}</td>
            <td><img src="{{ asset('storage/products') }}/{{ $product->picture }}" height="40px" class="img-circle" /> {{ $product->title }}</td>
            <td>{{ $product->stock }} {{ $product->unit  }}</td>
            <td>{{ $product->price }} per {{ $product->unit }}</td>
            <td>{{ $product->suppliar->title }}</td>
            <td>
                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection