<?php
require_once("config.php");
include("mustlogin.php");
?>

<html><head></head><body>
<h4>Zalogowany jako: <?php echo $_SESSION["user"];?></h4><br/>
<a href="newtransfer.php">Nowy przelew</a><br/>
<form action="" method="post">
filtruj po tytule: <input name="title" type="text"> <input type="submit" name="submit"><br/>

<table>
<?php
$query = "SELECT * FROM transactions WHERE user=?";
if (isset($_POST['title'])) {
    $query .= " AND title LIKE '%".$_POST['title']."%'";
}
$stmt = $db->prepare($query);
$stmt->execute(array($_SESSION['user']));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row) {
    echo '<tr data-id="'.$row['id'].'"><td>'.$row['account'].'</td><td>'.$row['title'].'</td><td>'.((!$row['confirmed']) ? "NIE" : "").'ZATWIERDZONY</td></tr>';
}
?>
    </table>

</body>
</html>
