<%php
//Try connection
$db=mysqli_connect('localhost', 'pi', 'kowal', 'lab6') or die ("Failed to connect: ".mysqli_error());
echo "Connected OK.";

?>