<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <title>Camagru Login</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Camagru</h1>
        </header>
        <div id="navi">
            <nav>
                <a href="signup.php">Sign Up</a>
                <a href="contact.html">Contact</a>
                <a href="guest_gallery.php">Guest Gallery</a>
            </nav>
        </div>
        <div id="login">
            <form action="Forms/login_form.php" method="POST">
            <input type="text" placeholder="Username/Email" required autocomplete="off" pattern=".{5,100}" title="Username must be between 5 and 100 characters long" name="username_login">
            <input type="password" placeholder="Password" required autocomplete="off" name="password_login">
            <a href="forgot_password.php">Forgot Password?</a>
            <button type="submit" class="button button-block" value="OK" name="submit_login">Login</button>
        </form>
    </div>
</div>
    <div id="footer">
        <footer>
        <p>&copy; fkhan 2018</p> 
        </footer>
    </div>
</body>
</html>