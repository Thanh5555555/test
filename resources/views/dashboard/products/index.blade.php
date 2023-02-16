@extends('dashboard.layouts.master')

@section('page_title','EMPLOYEES')

@section ('content')
    <div class="container">
    <h1>Task List</h1>
<p><a href="{{ route('products.create') }}">Create a Tasks</a></p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Giá</th>
                    <th>hình ảnh</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($products as $product)
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><img src="{{ asset('images/product/'.$product->image) }}" height="70px" width="70px" alt="image" /></td>
                    <td><a href="{{ route('products.edit',['id' =>$product->id]) }}" class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="{{ route('products.destroy', ['id' =>$product->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @endsection