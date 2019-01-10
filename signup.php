<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru Sign-up</title>
</head>
<body>
        <div class="container">

                <header>
                        <h1>Camagru</h1>
                </header>
                <div id="navi">
                        <nav>
                                <a href="login.php">Login</a>
                                <a href="contact.html">Contact</a>
                        </nav>
                </div>
                <div id="signup">
                        <form action="Forms/sign_up_form.php" method="POST">
                        <input type="text" placeholder="Username" pattern=".{5,100}" title="Username must be between 5 and 100 characters long" required autocomplete="off" name="username_signup">
                        <input type="email" placeholder="Email" required autocomplete="off" name="email_signup">
                        <input type="password" placeholder="Password" required autocomplete="off" name="password_signup">
                        <input type="password" placeholder="Confirm Password" required autocomplete="off" name="conf_password_signup">
                        <button type="submit" value="OK" name="submit_signup">Sign Up</button>
                </form>
        </div>
</div>
            <div id="footer">
                    <p>&copy; fkhan 2018</p>
            </div>
</body>
</html>