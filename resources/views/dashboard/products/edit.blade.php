@extends('dashboard.layouts.master')

@section ('content')
<div class="container"> 
    <h1>adhca</h1>
<form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">name</label>
            <input class="form-control" name="name" value="{{ old('name', $product->name) }}">
        </div>
        <div class="form-group">
            <label for="">price</label>
            <input class="form-control" name="price" value="{{ old('price', $product->price) }}">
        </div>
        
        <div class="form-group">
            <label for="">Loại</label>
            <select class="form-control" name="category_id" class="">
            @if(!empty($categroies))
            @foreach($categroies as $key => $value)
            <option  value="{{ $key }}" {{ old('category_id', $product->category_id) == $key ? 'selected':'' }}>{{ $value }}</option>
           @endforeach
            @endif
            </select>
        </div>
        <div class="form-group">
            <label for="">image</label>
            <input  class="form-control-file" type="file" value="{{ old('images', $product->image) }}" name="image" id="fileToUpload">
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>
    @endsection