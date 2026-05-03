<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('ChangePass/reset.css')}}">
    <link rel="shortcut icon" href="{{asset('Base/layered.png')}}">
    <title>Layered</title>
</head>
<body>
<div class="box">
    <div class="container">
        <div class="header">
            <header>Reset Password</header>
        </div>

        <br><br><br>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
	
		    <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-field">
                <input type="email" class="form-control" placeholder="Type Your Email" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <i class='bx bx-lock-alt'></i>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <input type="password" class="form-control" placeholder="Type Your New Password" id="password" name="password" required autocomplete="new-password">
                <i class='bx bx-lock-alt'></i>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <input type="password" class="form-control" placeholder="Confirm Password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <button type="submit" class="submit">Reset Password </button>
            </div>
        </form>

        <br><br><br><br><br>

        <div class="socmed">
            <label><a class="" href="/login" id="linkCreateAccount">Cancel</a></label>
        </div>
    </div>
</div>
</body>
</html>
