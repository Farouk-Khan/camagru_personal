<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camagru contact</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <?php 
        session_start();
        if ($_SESSION['username'] == "" ||empty($_SESSION))
            echo '<script>alert("Please login or create an account first!!!!");window.location.href="login.php";</script>';
    ?>
</head>
<body>
<div class="container">

    <div id="header">
        <header>
            <h1>Camagru</h1>
        </header>
    </div>
    <div id="navi">
        <nav></nav>
        <a href="javascript:history.back()">Back</a>
    </nav>
</div>
<div id="account">
    <form action="Forms/account_form.php" method="POST">
    <input class="input" type="text" placeholder="Username" required autocomplete="off" name="username_account" pattern=".{5,100}" title="Username must be between 5 and 100 characters long" required>
    <input class="input" type="password" placeholder="Password" required autocomplete="off" name="password_account" required>
    <div class="field_wrap">
        <input type="checkbox" name="new_username_check" value="1" id="new_username_check">
        <label>New Username</label>
        <input type="text" autocomplete="off" name="new_username_account" pattern=".{5,100}" title="Username must be between 5 and 100 characters long" id="new_username_account">
    </div>
    <div class="field_wrap">
        <input type="checkbox" name="new_email_check" value="1" id="new_email_check">
        <label>New Email</label>
        <input type="email" autocomplete="off" name="new_email_account" id="new_email_account">
    </div>
    <div class="field_wrap">
        <input type="checkbox" name="new_password_check" value="1" id="new_password_check">
        <label>New Password</label>
        <input type="password" autocomplete="off" name="new_password_account" id="new_password_account">
    </div>
    <div class="field_wrap">
        <input type="checkbox" name="new_comment_email_check" value="1" id="new_comment_email_check">
        <label>Recieve notifications?</label>
        <select name="new_comment_email_account" id="new_comment_email_account">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="options">
        <button type="submit" class="button button-block" value="OK" name="submit_account">Submit</button>
        <button type="submit" class="button button-block" value="OK" name="submit_delete_account">Delete Account</button>
    </div>
</form>
</div>
</div>
<div id="footer">
        <p>&copy; fkhan 2018</p>
        <script src="js/account.js"> </script>
</div>
</body>

</html>