
<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$dbb = mysqli_connect('localhost', 'root', '', 'docreg');


if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($dbb, $_POST['username']);
  $email = mysqli_real_escape_string($dbb, $_POST['email']);
  $password_1 = mysqli_real_escape_string($dbb, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($dbb, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "Password doesn't match!");
  }

  $user_check_query = "SELECT * FROM doc WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($dbb, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already registered");
    }
  }

 
  if (count($errors) == 0) {
    $password = md5($password_1);

    $query = "INSERT INTO doc (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($dbb, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: docindecx.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($dbb, $_POST['username']);
  $password = mysqli_real_escape_string($dbb, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM doc WHERE username='$username' AND password='$password'";
    $results = mysqli_query($dbb, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: view1.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>