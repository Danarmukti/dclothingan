<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>dclothingan</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <style>
      a {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <main class="container loginmain">
      <h1>CREATE ACCOUNT dclothingan</h1>
      <?php

        include("../config/koneksi.php");
        if (isset($_POST['create'])) {
          $username = $_POST['Username'];
          $email = $_POST['email'];
          $password = $_POST['Password'];
          
          //verifying the unique email
          $verify_query = mysqli_query($con,"SELECT email FROM user WHERE email='$email'");
          
          if (mysqli_num_rows($verify_query) !=0 ) {
            echo "<div class='editmsg'> 
            <p> This email is used, Try another one please!</p>
            </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn-buy'>Go Back</button>";
          } 
          else {
            mysqli_query($con,"INSERT INTO user(id,username,password,email) VALUES(NULL,'$username','$password','$email')") or die("Erroe Occured");
            
            echo "<div class='editmsg'>
            <p>Registration successfully!</p>
            </div> <br>";
            echo "<a href='../index.html'><button class='btn-buy'>Login Now</button>";
          }  
        } else {
          ?>
      <form action="" method="post" class="loginform">
        <label for="Username">Username : </label>
        <input type="text" name="Username" required />
        <label for="Password">Password : </label>
        <input type="password" name="Password" required />
        <label for="email">Email : </label>
        <input type="text" name="email" required />
        <button class="btn-buy" name="create">Sign up</button>
        <a href="../index.html" class="btn-buy">Login</a>
      </form>
      <?php } ?>
    </main>
  </body>
</html>
