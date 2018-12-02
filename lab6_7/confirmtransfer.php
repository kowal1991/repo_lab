<?php
require_once("config.php");
include("mustlogin.php");
?>

<html><head></head><body>
<h4>Zalogowany jako: <?php echo $_SESSION["user"];?></h4><br/>
<a href="history.php">Historia</a><br/>
<form action="transfer.php" method="post">
nr konta: <?php echo $_POST['account'];?><input type="text" value="<?php echo $_POST['account'];?>" name="account" hidden><br/>
tytul: <?php echo $_POST['title'];?><input type="text" value="<?php echo $_POST['title'];?>" name="title" hidden><br/>
<input type="submit" name="submit">
</form>
</body>
</html>
