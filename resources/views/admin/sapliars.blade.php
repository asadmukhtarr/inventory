@extends('layouts.header')
@section('title','Dashboard')
@section('content')
@include('flash')
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> Sapliars
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>
                Title
            </th>
            <th>Action</th>
        </tr>
        <form action="{{ route('sap.save') }}" method="post">
        @csrf
        <tr>
            <td>
                <input type="text" name="title" class="form-control" />
                @error('title')
                <small><font color="red">{{ $message }}</font></small>
                @enderror
            </td>
            <td>
                <button class="btn btn-success btn-sm"><i class="fa fa-save"></i></button>
            </td>
        </tr>
        </form>
        @foreach($suppliars as $suppliar)
        <tr>
            <td>
                {{ $suppliar->title }}
                <span class="badge badge-danger">{{ $suppliar->products->count() }}</span>
            </td>
            <td>
                <a href="{{ route('sap.delete',$suppliar->id) }}">
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection