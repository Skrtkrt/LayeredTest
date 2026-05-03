
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sign-up.css">
    <link rel="shortcut icon" href="layered.png">
    <title>Layered</title>

</head>
<body>
    <div class="box">
    <div class="container">

        <div class="header">
            <header>Create Account</header>
        </div>
        <?php echo $message  ?>
        <form name="form" action="signup.php" onsubmit="return isvalid()" method="POST">
            
            <div class="input-field">
                    <input type="text" id="email" name="email" class="input" placeholder="Type Your Email">
                    <i class='bx bx-user' ></i>
            </div>
        
            <div class="input-field">
                    <input type="password" id="pass" name="pass" class="input" placeholder="Type Your Password">
                    <i class='bx bx-lock-alt'></i>
            </div>
            <div class="input-field">
                <input type="password" id="c-pass" name="c-pass" class="input" placeholder="Confirm Password">
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <input type="submit" id="btn" class="submit" value="Login" name = "submit"/>
            </div>

            <br><br>
        </form>

        <div class="socmed">or Sign-up using</div>

        <div class="socmed">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-google"></a>
        </div>

        <br><br><br><br><br>

        <div class="socmed">
            <div><a>Already have an account?</a></div>     
            <label><a class="" href="index.php" id="linkCreateAccount">Log-in</a></label>
        </div>
        </div>
        </body>
                
    </div>
</body>
</html>