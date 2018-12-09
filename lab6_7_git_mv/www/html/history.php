<?php
// Initialize  the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/* Attempt to connect to MySQL database */
$link2 = mysqli_connect('localhost', 'mysql_user', 'tajnehaslo', 'lab6');
 
// Check connection
if($link2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$my_quer = "select * from transact where autor = '".$_SESSION["username"]."'";


if ($result = mysqli_query($link2,$my_quer)){
      $rowcount = mysqli_num_rows($result);
      
      for($i=0; $i < $rowcount; $i++){
	$row=mysqli_fetch_assoc($result);
	echo "<p><strong>".($i+1).". ACCOUNT NUMBER: ";
	echo stripslashes($row['account_number']);
	echo "      VALUE: ";
	echo stripslashes($row['value']);
	echo "</strong><br /></p>";
      }
      mysqli_free_result($result);
   }
   mysqli_close($link2);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YOUR HISTORY</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. YOUR ACCOUNT HISTORY.</h1>
    </div>
</body>
</html>