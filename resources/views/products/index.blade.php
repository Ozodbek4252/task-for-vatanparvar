<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table Example</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body class="{{ Auth::user()->isAdmin() ? 'admin' : '' }}">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <div class="container">


        @if (Auth::check() && Auth::user()->isAdmin())
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ Route('products.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>VAT</th>
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>${{ $product->total_price_with_vat }}</td>
                                    @if (Auth::check() && Auth::user()->isAdmin())
                                        <td>
                                            <a href="{{ Route('products.edit', $product->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            {{ $products->links() }}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
