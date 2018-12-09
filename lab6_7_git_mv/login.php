<?php
require_once("config.php");
session_start();
$warn = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) ||empty($_POST['password'])) {
        $warn = "<h1>Niepoprawny login lub haslo</h1>";
    }else {
$stmt = $db->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute(array($_POST['id']));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows)===1){
    if (password_verify($_POST['password'], $rows[0]['password'])) {
        $_SESSION['user'] = $_POST['id'];
        $_SESSION['admin'] = $rows[0]['admin'];
        header("location: history.php");

    } else {

    $warn = "<h1>Niepoprawny login lub haslo</h1>";
    }
} else {
    $warn = "<h1>Niepoprawny login lub haslo</h1>";
}
    }
}
?>
<html><body>
<?php
    echo $warn;
?>
<h1>Zaloguj sie</h1>
<form action="" method="post">
<label>nr klienta:</label>
<input type="text" name="id" placeholder="nr klienta"/><br /><br />
<label>haslo:</label>
<input type="password" name="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
</form>
</body></html>
