<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



$account_number = $_POST['account_number'];
$value = $_POST['value'];

if (!$account_number || !$value) {
echo "Some values of fields are null";
}


$account_number = addslashes($account_number);
$value = doubleval($value);

$user_t = addslashes($_SESSION["username"]);


?>

<html>
<body>


<form action="approve.php" method="post">
APPROVE ?<br />
<select name="metoda_szukania">
<option value="yes">YES</option>
<option value="no">NO</option>
</select>
<br />
<table border="0">
<tr><td>ACCOUNT NUMBER</td><td><input type="text" name="account_number" maxlenght="50" size="13" id="account_number" value="<?php echo $account_number; ?>"></td></tr>
<tr><td>VALUE</td><td><input type="text" name="value" maxlenght="10" size="13" value="<?php echo $value; ?>"></td></tr>
<tr><td><input type="submit" value="SEND" id="changebutton"></td></tr>
</table>
</form>


</body>
</html>