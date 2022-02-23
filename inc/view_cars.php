<?php
  if(isset($_SESSION['user_id'])){

  $user_id = $_SESSION['user_id'];

?>

    <div class="profile-header-box">
      <div>
        <h2 class="profile-heading">My Cars</h2>
        <span class="profile-header-line"></span>
    </div>
    <a href="profile.php?source=add_car" class="btn--cta user-edit-btn" >
      <i class="fas fa-plus"></i>
      <span>Add Car</span>
    </a>
  </div>

  <?php
    $query = "select*from cars where car_owner_id = $user_id ";

    $select_cars = mysqli_query($conn,$query);

    if(empty($select_cars)){
      echo "<h3 class='no-carr-message'>Looks like you havend added any car yet...</h3>";
    }
    else{ 
    ?>
      <table class="users-table"> 
        <thead class="users-table-head" >
          <tr>
            <th></th>
            <th>Number</th> 
            <th>Car Model</th>
            <th>Producer</th>
            <th>Year of Production</th>
            <th>Color</th>
            <th>Interior Materieal</th>
            <th>Details</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="users-table-body" >
          
          <?php  
          $query = "select*from cars where car_owner_id = $user_id";
          $select_cars = mysqli_query($conn,$query);
          
          $counter = 1;
          while ($row = mysqli_fetch_assoc($select_cars)) {
            
            $car_id = $row['car_id'];
            $car_model = $row['car_model'];
            $car_producer = $row['car_producer'];
            $car_year = $row['car_year'];
            $car_color = $row['car_color'];
            $car_interior = $row['car_interior_material'];
            $car_details = $row['car_details'];
            
            echo "<tr class='users-table-row'>";
            echo "<td><a href='profile.php?source=view_cars&delete={$car_id}'>Delete</a></td>";
            echo "<td>{$counter}</td>";
            echo "<td>{$car_producer}</td>";
            echo "<td>{$car_model}</td>";
            echo "<td>{$car_year}</td>";
            echo "<td>{$car_color}</td>";
            echo "<td>{$car_interior}</td>";
            echo "<td>{$car_details}</td>";
            echo "<td><a href='profile.php?source=edit_car&c_id={$car_id}'>Edit</a></td>";
            echo "</tr>";
            $counter+=1;
          }
          ?>
        </tbody>
      </table>
    <?php
    }
  }

  if (isset($_GET['delete'])) {
    $the_car_id = $_GET['delete'];
  
    global $conn;
    $query = "delete from cars where car_id = $the_car_id";
    $delete_query = mysqli_query($conn,$query);
    header("Location: profile.php?source=view_cars");
  }
?>