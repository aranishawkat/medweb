<?php

//connecting to database

$conn = mysql_connect("localhost");
$db = mysql_select_db("registration","$conn");

//Featching data
$query = "SELECT * from users";
$result = mysql_query($query) or die(mysql_error());
echo "<table border = '1px'>";

while ($row = mysql_fetch_array(result))
{
$id = $row[0];
$username = $row[1];
$email = $row[2];

echo "<tr>";
echo "<td> {$id} </td>";
echo "<td> {$username} </td>";
echo "<td> {$email} </td>";
echo "</tr>";
}

echo "</table>";
?>