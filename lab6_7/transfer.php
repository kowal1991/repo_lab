<?php
require_once("config.php");
include("mustlogin.php");

$stmt = $db->prepare("INSERT INTO transactions VALUES (NULL, '".$_SESSION["user"]."', '".$_POST['account']."', '0', '".$_POST['title']."', '', 0)");
$stmt->execute();
?>

<html><head></head><body>
<h4>Zalogowany jako: <?php echo $_SESSION["user"];?></h4><br/>
<a href="history.php">Historia</a><br/>
<h2>Wyslano</h2><br/>
nr konta: <?php echo $_POST['account'];?><br/>
tytul: <?php echo $_POST['title'];?><br/>
</body>
</html>
