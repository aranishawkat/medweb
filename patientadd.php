<link rel="stylesheet" type="text/css" href="index.css">
<?php
include_once 'server.php';


$pid = mysqli_real_escape_string($db,$_POST['pid']);
$pname = mysqli_real_escape_string($db,$_POST['pname']);
$page = mysqli_real_escape_string($db,$_POST['page']);
$psex = mysqli_real_escape_string($db,$_POST['gender']);
$pphone = mysqli_real_escape_string($db,$_POST['pphone']);
$paddress = mysqli_real_escape_string($db,$_POST['paddress']);


if(empty($pid))
	echo "<h1>"."Field Empty"."</h1>";
else{
$sql = "insert into patient (pid,pname,page,psex,pphone,paddress) values ('$pid', '$pname', '$page', '$gender', '$pphone', '$paddress');";
mysqli_query($db,$query);     

header("Location: register.php?update=success");
}
?>