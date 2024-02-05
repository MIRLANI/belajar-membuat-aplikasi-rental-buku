<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Buku | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .login-box {
            border: solid 1px;
            width: 500px;
            padding: 30px
        }
    </style>
</head>

<body>

    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box">
            <form action="/login" method="post">
                @csrf
                <div class="mb-3">

                    @if (session('status'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                   
                    <label for="username" class="form-label">Username: </label>
                   
                    <input type="txt" name="username" class="form-control @error('username') is-invalid @enderror"
                        id="username" placeholder="username" value="{{ old('username') ?: session('username') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password: </label>
                 
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="password" value="{{ old('password') ?:session('password') }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="mb-3">
                    <a href="/register" class="text-center">Sign Up</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
