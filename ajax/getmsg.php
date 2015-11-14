<?php
	session_start();
	require("../config/classes.php");
	$class = new user_panel();
	$msg_id=mysqli_real_escape_string($class->conexion(),$_GET['id']);
	$sql=mysqli_query($class->conexion(),"SELECT * FROM account.messages WHERE id='".$msg_id."'");
	$rows=mysqli_fetch_array($sql,MYSQLI_ASSOC);
?>
<br>
<div class="well" style="width:90%; margin-left:5%;">
<?php
$class->update_msg($_SESSION['id']);
$file = fopen("".$rows['text_src']."", "r");
while(!feof($file)) {
echo fgets($file);
}
fclose($file);
?>
</div>
