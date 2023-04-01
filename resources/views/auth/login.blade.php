<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cute Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #111;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login Form</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="username">User Name</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Enter username">
            </div>

            <div class="mb-3">
                <label class="form-label" for="userpassword">Password</label>
                <input name="password" type="password" class="form-control" id="userpassword"
                    placeholder="Enter password">
            </div>

            @error('username')
                <span style="color: red;">{{ $message }}</span>
            @enderror

            <div class="mt-3 text-end">
                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                    In</button>
            </div>


            <div class="mt-4 text-center">
                <p class="mb-0">Do not have an account ? <a href="{{ Route('register') }}"
                        class="fw-medium text-primary">
                        Signup now </a> </p>
            </div>
        </form>

    </div>
</body>

</html>
