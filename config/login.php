<?php 
    session_start();

    include("koneksi.php");
    if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con,$_POST['Username']);
    $password = mysqli_real_escape_string($con,$_POST['Password']);

    $result = mysqli_query($con,"SELECT * FROM user WHERE username='$username' AND password='$password'") or die("select error!");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
      $_SESSION['valid'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];

      } else {
      echo "<a href='../index.php'><button class='btn-buy'>Go Back wrong account </button>";
      }

      if (isset($_SESSION['valid'])) {
      header("Location: ../page/home.php");
    }

  } 
    
 ?>