<?php include 'inc/header.php'; ?>

<link rel="stylesheet" href="style/orders.css">
<main class="main">
  <?php 

    if (isset($_GET['source'])) {
      $source = $_GET['source'];
    } else {
      $source = '';
    }
    switch ($source) {
      case 'view_order':
        include "inc/view_order.php";
        break;
          
      default:
      include 'inc/view_all_orders.php';
      break;
    }
  ?>
</main>

<?php include 'inc/footer.php'; ?>