<?php
require_once("config.php");
include("mustlogin.php");
?>

<html><head></head><body>
<h4>Zalogowany jako: <?php echo $_SESSION["user"];?></h4><br/>
<a href="history.php">Historia</a><br/>
<form action="confirmtransfer.php" method="post">
<input type="text" name="account" placeholder="nr konta"><br/>
<input type="text" name="title" placeholder="tytul"><br/>
<input type="submit" name="submit">
</form>
</body>
</html>
