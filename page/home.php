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
  </head>
  <body>
    <body>
    <?php 
      
      $id = $_SESSION['id'];
      $query = mysqli_query($con,"SELECT * FROM user WHERE id=$id;");

      while ($result = mysqli_fetch_assoc($query)) {
        $res_Username = $result['username'];
        $res_Email = $result['email'];
        $res_id = $result['id'];
      }

      

    ?>
      <header class="header">
        <nav class="navbar container">
          <!-- logo -->
          <section class="logo">dclothingan.</section>
          <!-- logo -->

          <!-- link button -->
          <section class="menu">
            <a href="#home">Home</a>
            <a href="#product">Product</a>
            <a href="#">About</a>
          </section>
          <!-- link button -->

          <!-- account -->
          <section class="account-menu">
            <p>Hello <?php echo $res_Username; ?></p>
            <?php echo "<a href='../page/edit.php?id=$res_id'>Change Profile</a>"; ?>
            <a href="../config/logout.php"><button class="btn-logout">Log out</button></a>
          </section>
          <!-- account -->
        </nav>
      </header>

      <!-- jumbotron -->
      <section class="jumbotron container" id="home">
        <h2>Selamat Datang <span><?php echo $res_Username ?></span></h2>
      </section>
      <!-- jumbotron -->

      <main class="maincontent" id="product">
        <section class="product-section">
          <form id="filterForm" method="GET" action="">
             <label for="category">Filter :</label>
             <select class="btn-category" name="category" id="category" onchange="filterCategory()">
                <option value="">All</option>
                <option value="baju" <?php echo (isset($_GET['category']) && $_GET['category'] == 'baju') ? 'selected' : ''; ?>>Baju</option>
                <option value="celana" <?php echo (isset($_GET['category']) && $_GET['category'] == 'celana') ? 'selected' : ''; ?>>Celana</option>
                <option value="sepatu" <?php echo (isset($_GET['category']) && $_GET['category'] == 'sepatu') ? 'selected' : ''; ?>>Sepatu</option>
              </select>
           </form>
          <article class="product-card" id="product-list">
              <?php
                $jsonFile = '../data/product.json';

                $jsonContents = file_get_contents($jsonFile);

                $products = json_decode($jsonContents, true);

                $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';
              
                if ($products !== null) {
                
                  foreach ($products as $product) {
                      
                      if ($selectedCategory === '' || $product['category'] === $selectedCategory) {
                        echo '<form class="card">';
                        echo '<img src='.$product["image"].' name="product-img"/>';
                        echo '<h3 class="title-product" name="title">'. $product['name'] .'</h3>';
                        echo '<p class="category" name="kategori">'. $product['category'] .'</p>';
                        echo '<p class="desc-product" name="description">'. $product['description'] .' </p>'; 
                        echo '<p class="price" name="price">Harga : Rp '. number_format($product['price'], 0) . '</p>';
                        echo '<button class="btn-buy" name="buy">Beli</button>';
                        echo '</form>';
                      }
                  }
              } else {
                  echo 'Data Tidak Terdeteksi';;
              }
            ?>
          </article>
        </section>
      </main>

      <footer class="footer">
        <!-- logo -->
        <section class="logo-footer">dclothingan.</section>
        <!-- logo -->

        <section class="social-media-footer">
          <p>Social Media</p>
          <a href="">Instagram</a>
          <a href="">Facebook</a>
          <a href="">Youtube</a>
        </section>

        <!-- copyright -->
        <section class="menu-footer">
          <p>©ClothesShop est 2024</p>
        </section>
        <!-- copyright -->

        <!-- account -->
        <section class="contact-menu-footer">
          <span>Contact</span>
          <p>+6289531234567</p>
          <p>danar@gmail.com</p>
          <p>dclothingan.my.id</p>
        </section>
        <!-- account -->
      </footer>
      <script src="../js/script.js"></script>
    </body>
  </body>
</html>
