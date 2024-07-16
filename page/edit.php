<?php 
  session_start();

  include("../config/koneksi.php");
  if (!isset($_SESSION['valid'])) {
    header("Location: home.php");
  }
?>
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
    <?php 

        if (isset($_POST['signup'])) {
        $username = $_POST['Username'];
        $email = $_POST['email'];      
        $id = $_SESSION['id'];
        
        $edit_query = mysqli_query($con,"UPDATE user SET username='$username',email='$email' WHERE id=$id") or die("error occured!");
   
        if ($edit_query) {
            echo " <div class='editmsg' >
            <p class='btn-buy'>Profile updated!</p> 
           <a href='home.php'><button class='btn-buy'>HOME</button> </div>";
        }
        } else {
        $id = $_SESSION['id'];
        $query = mysqli_query($con,"SELECT * FROM user WHERE id=$id");

        while ($result = mysqli_fetch_assoc($query)) {
          $res_Username = $result['username'];
          $res_Email = $result['email'];
        }


        ?>
      <h1>EDIT PROFILE</h1>
      <form action="" method="post" class="loginform">
        <label for="Username">Username : </label>
        <input type="text" name="Username" value="<?php echo $res_Username; ?>" required />
        <label for="email">Email : </label>
        <input type="text" name="email" value="<?php echo $res_Email; ?>" required />
        <button class="btn-buy" name=signup>Update</button>
        <a href="home.php" class="btn-buy">Cancel</a>
      </form>
      <?php } ?> 
    </main>
  </body>
</html>
