<?php
// Initialize the session
session_start();

if (isset($_GET['query']))
{
	
  echo " Your query : ".$_GET['query'];
}

if (isset($_GET['id'])){
  $id = $_GET['id'];
  
  /* Setup the connection to the database */
  $mysqli = new mysqli('localhost', 'mysql_user', 'tajnehaslo', 'lab6');
  
  /* Check connection before executing the SQL query */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }
  
  /* SQL query vulnerable to SQL injection */
  $sql = "SELECT *
      FROM transact
      WHERE id = $id"; 
  
  /* Select queries return a result */
  if ($result = $mysqli->query($sql)) {
    while($obj = $result->fetch_object()){
      print($obj->id." ");
      print($obj->autor." ");
      print($obj->account_number);
    }
  }
  /* If the database returns an error, print it to screen */
  elseif($mysqli->error){
    print($mysqli->error);
  }
}



?>
 
<!DOCTYPE html>
<html lang="en">

<body>

<form action="insert_admin.php" method="post">
<table border="0">
<tr><td>USER</td><td><input type="text" name="user" maxlenght="50" size="13" id="account_user3"></td></tr>
<tr><td>ACCOUNT NUMBER</td><td><input type="text" name="account_number" maxlenght="50" size="13" id="account_number2"></td></tr>
<tr><td>VALUE</td><td><input type="text" name="value" maxlenght="10" size="13" id="my_value"></td></tr>
<tr><td><input type="submit" value="ADD" id="changebutton"></td></tr>
</table>
</form>

</body>
</html>