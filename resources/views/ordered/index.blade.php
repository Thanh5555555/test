<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>List Customer</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> products Name</th>
                    <th>users Name</th>
                    <th>quantity</th>
                    <th>name</th>
                    <th>price</th>
                    <th>address</th>
                    <th>note</th>
                    <th></th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($ordered as $order)
                    <td>{{ $order->products->name }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->note }}</td>
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
</body>


</html>