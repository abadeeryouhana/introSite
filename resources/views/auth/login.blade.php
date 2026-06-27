<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; display: flex; align-items: center; justify-content: center; height: 100vh; background: #F5F7FA; }
        .login-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 400px; box-sizing: border-box; }
        .login-box h2 { margin-top: 0; color: #2BB295; text-align: center; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #333; }
        .form-group input { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        .form-group input:focus { outline: none; border-color: #3D81C3; }
        .btn { width: 100%; padding: 12px; background: #3D81C3; color: white; text-decoration: none; border: none; cursor: pointer; border-radius: 4px; font-size: 16px; font-weight: bold; transition: background 0.3s; }
        .btn:hover { background: #2b5f93; }
        .alert-error { padding: 12px; background: #f8d7da; color: #721c24; margin-bottom: 20px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        @if($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" id="remember" name="remember" style="width: auto;">
                <label for="remember" style="margin: 0; font-weight: normal;">Remember Me</label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
