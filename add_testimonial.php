<?php include 'inc/header.php'; ?>
<link rel="stylesheet" href="css/add_testimonial.css">

<?php 

  if(!isset($_POST['user_id'])){
    header('Location: need_to_login.php');
  }
  $service_id = $_GET['r_id'];
  
  $query = "select service_title from services where service_id = $service_id";
  $select_title = mysqli_query($conn,$query);

  while ($row = mysqli_fetch_assoc($select_title)) {
    $title = $row['service_title'];
  }

  if(isset($_POST['submit_review'])){
    $comment_topic_id = $_GET['r_id'];
    $comment_user = $_SESSION['user_id'];
    $comment_rating = $_POST['comment_rating'];
    if(isset($_POST['comment_isanonyme'])){
      $comment_isanonyme = 1;
    }
    else{
      $comment_isanonyme = 0;
    }
    $comment_content = $_POST['comment_content'];

    $query = "insert into comments(comment_topic_id, comment_user_id, comment_rating, comment_content, comment_date, comment_isanonyme) ";
    $query.= "values($comment_topic_id, $comment_user, $comment_rating, '$comment_content', now(), $comment_isanonyme)";
    
    $create_review_query = mysqli_query($conn,$query);

    if (!$create_review_query) {
      die('Query Failed ' . mysqli_error($conn));
    }
    else {
      header('Location: testimonials.php');
    }
  }
?>
<main class="container">
  <div class="testimonials-header-box">
    <div>
      <h2 class="testimonials-header"><?php echo $title; ?> Review</h2>
      <span class="header-line"></span>
    </div>
  
    <a class="btn--cta create-testimonial" onclick="history.back()">
      <i class="fas fa-angle-right"></i>
      <span>Back</span>
    </a>
  </div>

  <form action="" method="post">

    <div class="input-group">
      <label class="review-label" for="comment_isanonyme">Stay Anonime:</label>
      <input class="review-checkbox" type="checkbox" name="comment_isanonyme">
    </div>

    <div class="input-group">
      <label class="review-label" for="comment_rating">Rating(1-5):</label>
      <input class="review-rating" type="number" name="comment_rating">
    </div>

    <label class="review-label" for="comment_content">Your review:</label>
    <textarea class="review-textarea text" name="comment_content" rows="15"></textarea>

    <div class="review-create-btn-box">
      <button class="btn--cta" name="submit_review" type="submit">
        <i class="fas fa-plus"></i>
        <span>Create</span>
      </button>
    </div >
  </form>
</main>
<?php include 'inc/footer.php'; ?>