<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('ForgotPass/forgot.css')}}">
    <link rel="shortcut icon" href="{{asset ('Base/layered.png')}}">
    <title>Layered</title>

</head>
<body>
<div class="box">
    <div class="container">
        <div class="content">
            <div class="header">
                <header>Forgot Password</header>
            </div>
        
        <br><br>
	    <form method="POST" action="{{ route('password.email') }}">
            @csrf
        
            <div class="input-field">
                <input id="email" type="email" placeholder="Type Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class='bx bxl-gmail' ></i>
		            @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

            </div>
        
            <div class="input-field">
                <button type="submit" class="submit">Send</button>
             </div>
        </form>
        <br><br><br><br><br>
        
            <div class="socmed">
                <label><a class="" href="/login" id="">Cancel</a></label>
            </div>
        </div>
    </div>
   
</div>
</body>
</html>