<?php
// Initialize  the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
<form action="insert.php" method="post">
<table border="0">
<tr><td>ACCOUNT NUMBER</td><td><input type="text" name="account_number" maxlenght="50" size="13"></td></tr>
<tr><td>VALUE</td><td><input type="text" name="value" maxlenght="10" size="13"></td></tr>
<tr><td><input type="submit" value="SEND"></td></tr>
</table>
</form>
<form action="history.php" method="post">
<table border="0">
<tr><td><input type="submit" value="HISTORY"></td></tr>
</table>
</form>
</body>
</html>