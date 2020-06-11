

<?php
include_once 'serverdoc.php';
$sql = "select username,email from doc;";
$result = mysqli_query($dbb,$sql);
$resultCheck = mysqli_num_rows($result);
echo "<table>";
echo "<tr>";
echo "<th>" . "NAME" ."</th>"."<th>" . "email" ."</th>" ;


echo "</tr>";
if($resultCheck > 0){
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . $row['username'] . " </td>";
    echo "<td>" .$row['email'] . " </td>";

  
    echo "</tr>";
  }
  echo "</table>";
}
?>
