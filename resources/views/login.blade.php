<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-box login">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                     <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                     <i class='bx bx-lock'></i>
                     <span class="toggle-password" onclick="togglePassword('loginPassword', this)">
                     <i class='bx bx-show'></i></span>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <div class="form-box register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Daftar Akun</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bx-envelope'></i>
                </div>
                <div class="input-box">
                     <input type="password" name="password" id="registerPassword" placeholder="Password" required>
                     <i class='bx bx-lock'></i>
                     <span class="toggle-password" onclick="togglePassword('registerPassword', this)">
                     <i class='bx bx-show'></i></span>
                </div>
                <button type="submit" class="btn">Register</button>
                @if($errors->any())<br> <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul><br>@endif
            </form>
        </div>
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Selamat Datang Di Notaris/PPAT</h1>
                <p>Belum Punya Akun ? Daftar Di Bawah Ini</p>
                <button class="btn register-btn">Daftar</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Selamat Datang Di Notaris/PPAT</h1>
                <p>Sudah Punya Akun ? Login Di Bawah Ini</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
