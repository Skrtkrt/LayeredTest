<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('LoginAssets/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('Base/layered.png') }}">
    <title>Layered</title>
</head>
<body>
<div class="box">
    <div class="container">

    <div class="header">
        <header>Login</header>
    </div>

    <br><br><br>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-field">
            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <i class='bx bx-user'></i>
            <label for="email">Type Your Email</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-field">
            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <i class='bx bx-lock-alt'></i>
            <label for="password">Type Your Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="two-col">
            <div class="one">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Remember Me</label>
            </div>
            <div class="two">
                <label><a href="/password/reset">Forgot password?</a></label>
            </div>
        </div>

        <br><br>

        <div class="input-field">
            <input type="submit" class="submit" value="Login">
        </div>

        <br><br>

    </form>


    <br><br>

    <div class="socmed">
        <div><a>Don't have an account?</a></div>     
        <label><a class="" href="/register" id="linkcreateaccount">Create account</a></label>
    </div>

    <br>

    <div class="socmed">     
        <label><a class="" href="/main" id="linkcreateaccount">Home</a></label>
    </div>
</div>
</body>
</html>
