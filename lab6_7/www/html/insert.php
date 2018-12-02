<?php
// Initialize the session
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



$account_number = $_POST['account_number'];
$value = $_POST['value'];

if (!$account_number || !$value) {
echo "Some values of fields are null";
}


$account_number = addslashes($account_number);
$value = doubleval($value);

$user_t = addslashes($_SESSION["username"]);


$my_quer = "insert into transact (autor, account_number, value) values ('".$user_t."','".$account_number."',".$value.")";


        if($stmt = mysqli_prepare($link2, $my_quer)){
           
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "<p><strong>SEND TO:  ".$account_number."  VALUE: ".$value."  STATUS: DONE</strong></p>";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($link2);


?>

<html>
<body>
<form action="welcome.php" method="post">
<table border="0">
<tr><td><input type="submit" value="BACK"></td></tr>
</table>
</form>
    <div class="wrapper">
            <div class="form-group <?php echo (!empty($account_number)) ? 'has-error' : ''; ?>">
                <label>podmianka</label>
                <input type="text" name="confirm_password" id="myxtest" class="form-control" value="">
                <span class="help-block"><?php echo 1; ?></span>
            </div>

        </form>
    </div>
</body>
</html>