<?php  
 $connect = mysqli_connect("localhost", "root", "");  
 $sql = "SELECT * FROM users";  
 $result = mysqli_query($connect, $sql) or die(mysqli_error()) ;  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Patient List</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Patient List</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Patient ID</th>  
                               <th>Patient Name</th>  
                               <th>Email</th>  
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_assoc($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["username"];?></td>  
                               <td><?php echo $row["email"]; ?></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  