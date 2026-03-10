<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GBI Victory</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css') }}">
    <!-- Custom Login CSS -->
    <link rel="stylesheet" href="{{ asset('Template/css/login.css') }}">
</head>
<body>

    <!-- Single full-screen background -->
    <div class="bg-wrapper"></div>

    <div class="split-container">

        <!-- LEFT: Branding -->
        <div class="left-side">
            <div class="logo-wrap">
                <img src="{{ asset('Template/img/logo-gbi-victory.png') }}" alt="Logo GBI Victory">
            </div>
            <div class="divider"></div>
            <h1>Gereja Bethel Indonesia Victory</h1>
            <p class="tagline">
                Damai Sejahtera Bagi Kita Seluruhnya
                <small>Selamat datang kembali, mari kita layani Tuhan bersama-sama</small>
            </p>
        </div>

        <!-- RIGHT: Login Form -->
        <div class="right-side">
            <div class="login-box">
                <div class="card">
                    <div class="card-header">
                        Masuk ke Dashboard Admin
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Masukkan username dan password Anda</p>

                        <form action="{{ url('/admin/login') }}" method="POST">
                            @csrf

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                </div>
                            @endif

                            <div class="input-group">
                                <input type="text"
                                       class="form-control @error('username') is-invalid @enderror"
                                       name="username"
                                       placeholder="Username"
                                       value="{{ old('username') }}"
                                       required autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       placeholder="Password"
                                       required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                            </button>
                        </form>

                        <a href="{{ url('/') }}" class="back-link">
                            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('Admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/dist/js/adminlte.min.js') }}"></script>

</body>
</html>