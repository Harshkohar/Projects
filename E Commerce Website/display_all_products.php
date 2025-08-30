<!-- Connect File -->
<?php
include("includes/connect.php");
include("functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce website</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- External CSS -->
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>

  <!-- Navbar -->
  <?php 
    $active_page ='display_all_products';  
    include("./includes/navbar.php") 
  ?>

  <!-- calling cart function -->
  <?php cart(); ?>

  <!-- Second Navbar -->
  <?php include("./includes/second_nav.php") ?>

  <!-- Central text -->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
  </div>

  <!-- Main Data Section -->
  <div class="d-flex flex-wrap" style="height:57.8vh;">
    <div style="width:80%;" class="align-items-center">

      <!-- Product Tiles -->
      <div class="row">
        
        <!-- fetching products -->
        <?php
        fetch_all_products();
        fetch_products_using_category();
        fetch_products_using_brand();
        ?>
      </div>
    </div>

    <!-- Side Navbar -->
    <?php include("./includes/side_nav.php") ?>
    
    <!-- Footer -->
    <?php include("./includes/footer.php") ?>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>