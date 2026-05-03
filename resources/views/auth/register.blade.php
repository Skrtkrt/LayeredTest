<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('LoginAssets/signup.css') }}">
    <link rel="shortcut icon" href="{{ asset('Base/layered.png') }}">
    <title>Layered</title>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="header">
                <header>Create Account</header>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-field">
                    <input type="text" id="name" name="name" class="input @error('name') is-invalid @enderror" placeholder="Type Your Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <i class='bx bx-user'></i>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <input type="email" id="email" name="email" class="input @error('email') is-invalid @enderror" placeholder="Type Your Email" value="{{ old('email') }}" required autocomplete="email">
                    <i class='bx bx-envelope'></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" class="input @error('password') is-invalid @enderror" placeholder="Type Your Password" required autocomplete="new-password">
                    <i class='bx bx-lock-alt'></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <input type="password" id="password-confirm" name="password_confirmation" class="input" placeholder="Confirm Password" required autocomplete="new-password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                <input type="text" id="number" name="contact_number" class="input" placeholder="Type Your Contact Number">
                <i class='bx bx-phone'></i>
                </div>
                <div class="input-field">
                    <input type="text" id="age" name="age" class="input" placeholder="Type Your Age">
                    <i class='bx bx-calendar'></i>
                </div>
                <div class="input-field">
                    
                    <select id="gender" name="gender" class="input" required>
                        <option value="" disabled selected>Select Your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <i class='bx bx-user' style="transform: translateY(0%); right:-89%;"></i>
                </div>
                <div class="input-field">
                    <button type="submit" id="btn" class="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
            
            <br><br><br>
            <div class="socmed">
                <div><a>Already have an account?</a></div>     
                <label><a class="" href="/login" id="linkCreateAccount">Log-in</a></label>
            </div>
            <br>

            <div class="socmed">     
                <label><a class="" href="/main" id="linkcreateaccount">Home</a></label>
            </div>
        </div>
    </div>
</body>
</html>
