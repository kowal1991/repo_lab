<?php
// Initialize the session
session_start();

?>
 
<!DOCTYPE html>
<html lang="en">

<body>

<form action="insert_admin.php" method="post">
<table border="0">
<tr><td>USER</td><td><input type="text" name="user" maxlenght="50" size="13" id="account_user3"></td></tr>
<tr><td>ACCOUNT NUMBER</td><td><input type="text" name="account_number" maxlenght="50" size="13" id="account_number2"></td></tr>
<tr><td>VALUE</td><td><input type="text" name="value" maxlenght="10" size="13"></td></tr>
<tr><td><input type="submit" value="ADD" id="changebutton"></td></tr>
</table>
</form>

</body>
</html>