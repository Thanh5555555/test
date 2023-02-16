@extends('dashboard.layouts.master')

@section('page_title','EMPLOYEES')

@section ('content')
    <div class="container">
        <h2>List Customer</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($categories as $category)
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><a href="#">View</a></td>
                    <td><a href="#">Edit</a></td>
                    <td>
                        <form action="#" method="POST">
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