<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Visita</title>
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        .vl-body { margin: 0; padding: 0; font-family: 'Poppins', sans-serif; }
        .vl-login-container { display: flex; min-height: 100vh; }
        .vl-left-side { flex: 1; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; }
        .vl-visita-img { max-width: 400px; width: 80%; }
        .vl-right-side { flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 60px; background: #fff; }
        .vl-welcome { font-size: 32px; font-weight: 700; color: #333; margin-bottom: 10px; }
        .vl-subtitle { color: #666; margin-bottom: 40px; }
        .vl-input-group { position: relative; margin-bottom: 20px; }
        .vl-input-group input { width: 100%; padding: 15px 15px 15px 50px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 16px; transition: all 0.3s; }
        .vl-input-group input:focus { outline: none; border-color: #667eea; }
        .vl-icon { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #999; }
        .vl-btn-login { width: 100%; padding: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.3s; }
        .vl-btn-login:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4); }
        .vl-signup-text { text-align: center; margin-top: 30px; color: #666; }
        .vl-signup-text a { color: #667eea; text-decoration: none; font-weight: 600; }
        .alert { padding: 12px; border-radius: 8px; margin-bottom: 20px; }
        .alert-danger { background: #ffebee; color: #c62828; border: 1px solid #ef9a9a; }
        .alert-success { background: #e8f5e9; color: #2e7d32; border: 1px solid #81c784; }
    </style>
</head>
<body class="vl-body">
    <div class="vl-login-container">
        <div class="vl-left-side">
            <img src="{{ asset('images/visita2.png') }}" class="vl-visita-img" alt="Visita">
        </div>

        <div class="vl-right-side">
            <h2 class="vl-welcome">Welcome Back!</h2>
            <p class="vl-subtitle">Masuk untuk melanjutkan</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="vl-login-form" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="vl-input-group">
                    <span class="vl-icon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <div class="vl-input-group">
                    <span class="vl-icon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="vl-btn-login">Log in</button>
            </form>

            <p class="vl-signup-text">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </p>

            <p class="vl-signup-text">
                <a href="{{ route('beranda') }}">← Kembali ke Beranda</a>
            </p>
        </div>
    </div>
</body>
</html>