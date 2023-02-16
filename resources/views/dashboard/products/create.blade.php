@extends('dashboard.layouts.master')

@section('page_title','CREATE Employee')

@section ('content')
    <div class="container">
    <h1>Task List</h1>
<p><a href="{{ route('products.create') }}">Create a Tasks</a></p>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
            <label for="name">Name</label>
            <input name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Enter Name" >
        </div>
            <div class="form-group row">
        <label for="price">giá:</label>
        <input name="price" value="{{ old('price') }}" class="form-control" id="" >
       
    </div>
    <div class="form-group row" >
        <label for="category_id">Loại: </label>
        <select name="category_id" class="form-control" >
            @if(!empty($categories))
            @foreach($categories as $key => $value)
            <option value="{{ $key }}" {{ old('category_id') == $key ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">

        <label for="image">Hình ảnh:</label>
        <!-- <input type="content" value="" class="form-control" id="" name="content"> -->
        <input type="file" value="{{ old('images') }}" class="form-control-file" name="image" id="">
       
    </div>
    <button type="submit">Submit</button>
</form>
</div>
@endsection