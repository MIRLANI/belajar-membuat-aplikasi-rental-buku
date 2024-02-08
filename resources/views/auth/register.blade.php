<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Buku | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .register-box {
            border: solid 1px;
            width: 500px;
            padding: 30px
        }
    </style>
</head>

<body>

    <div class="main d-flex justify-content-center align-items-center">
        <div class="register-box">
            <form action="register" method="post">
                @csrf
                <div class="mb-3">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="username" class="form-label">Username: </label>
                    <input type="username" name="username" class="form-control" id="username" placeholder="username"
                        value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password: </label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password"
                        value="{{ old('password') }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone: </label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"
                        value="{{ old('phone') }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address: </label>
                    <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="mb-3">
                    Sudah mempunyai akun? <a href="/login" class="text-center">Log In</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
