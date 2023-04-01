<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cute Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Create Product</h1>

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Product Name</label>
                <input name="name" type="text" class="form-control" id="name" autofocus
                    placeholder="Enter name" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="qty">Quantity</label>
                <input name="qty" type="text" class="form-control" id="qty" placeholder="Enter quantity"
                    autocomplete="qty">
            </div>

            <div class="mb-3">
                <label class="form-label" for="price">Price</label>
                <input name="price" type="text" class="form-control" id="price" required
                    placeholder="Enter price" autocomplete="price">
            </div>

            <div class="mt-3 text-end">
                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Create</button>
            </div>

        </form>
    </div>
</body>

</html>
