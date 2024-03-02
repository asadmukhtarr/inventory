@extends('layouts.header')
@section('title','Dashboard')
@section('content')
@include('flash')
<form action="{{ route('save.product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus-circle"></i> Create Product
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Upload Picture</label> <br />
                <input type="file" name="picture" />
                @error('picture')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" name="title" />
                @error('title')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                @error('description')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" name="price" />
                @error('price')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="number" class="form-control" name="stock" />
                @error('stock')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Unit</label>
                <input type="text" class="form-control" name="unit" />
                @error('unit')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Select Sappliar</label>
                <select name="sup" id="" class="form-control">
                    <option value="">Select Here</option>
                    @foreach($suppliars as $suppliar)
                    <option value="{{ $suppliar->id }}">{{ $suppliar->title }}</option>
                    @endforeach
                </select>
                @error('sup')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-danger float-right"> <i class="fa fa-save"></i> Save</button>
            </div>
    
        </div>
    </div>
</form>

@endsection