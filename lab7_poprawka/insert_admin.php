<?php
// Initialize the session
session_start();
 


/* Attempt to connect to MySQL database */
$link2 = mysqli_connect('localhost', 'mysql_user', 'tajnehaslo', 'lab6');
 
// Check connection
if($link2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$user_t = $_POST['user'];
$account_number = $_POST['account_number'];
$value = $_POST['value'];

if (!$account_number || !$value || $user_t ) {
echo "Some values of fields are null";
}

$user_t = addslashes($user_t );
$account_number = addslashes($account_number);
$value = doubleval($value);




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