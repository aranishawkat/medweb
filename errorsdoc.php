<?php

include('server.php');

$db = mysqli_connect('localhost', 'root', '', 'registration');

$sql="SELECT * FROM users";
$record = mysql_query($db, $sql) ;

echo "<table>" ;
echo "<tr><th>ID</th><th>username</th><th>email</th></tr>";
	while($row = mysqli_fetch_array($record, MYSQLI_ASSOC)) { 
	
	   echo "<tr><td>";
	   echo $row['id'];
	   echo "</td><td>";
	   echo $row['username'];
	   echo "</td><td>";
	   echo $row['email'];
	   echo "</td></tr>";
}
echo "</table>";
	     ?>


<!DOCTYPE html>
<html>
<head>
	<title>View registration Information</title>
	
</head>
<body>


		

	<table width ="600" border = "1" cellpadding="1" cellspacing="1">

       <tr>

    <th >username</th>
    <th>email</th>

  </tr>

	
	</table>



</body>
</html>