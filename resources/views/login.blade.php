<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="bg-welcome-login pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center text-white">
                    <h1>SELAMAT DATANG KEMBALI</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group">
                                <input placeholder="E-Mail" id="email" type="email" class="form-control border-danger" name="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <input placeholder="Password" id="password" type="password" class="form-control border-danger" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block bg-danger border-0">Masuk</button>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary btn-block text-danger bg-white border-danger">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
