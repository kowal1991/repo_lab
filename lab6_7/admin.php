<?php
require_once("config.php");
include("mustlogin.php");
if (!$_SESSION['admin']) die("");

if (isset($_POST['accept'])) {
$stmt = $db->prepare("UPDATE `bk`.`transactions` SET `confirmed` = '1' WHERE `transactions`.`id` = ?");
$stmt->execute(array($_POST['accept']));

}
?>

<html><head></head><body>
<h4>Zalogowany jako: <?php echo $_SESSION["user"];?> [admin]</h4><br/>
<form method="post" action="">
<table>
<?php
$stmt = $db->prepare("SELECT * FROM transactions WHERE confirmed=0");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row) {
    echo '<tr data-id="'.$row['id'].'"><td>'.$row['account'].'</td><td>'.$row['title'].'</td><td><button value="'.$row['id'].'" type="submit" name="accept">ZATWIERDZ</button></td></tr>';
}
?>
    </table>
</form>

</body>
</html>
