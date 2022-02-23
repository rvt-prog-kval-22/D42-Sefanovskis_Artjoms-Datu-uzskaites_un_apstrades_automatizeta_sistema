<?php

  if (!isset($_GET['where'])) {
    $where_statement = " ";
    $where = 'all';
  }
  else{
    $where = $_GET['where'];
    switch ($_GET['where']) {
      case 'draft':
        $where_statement = "where c.comment_status = 'draft' ";
        break;

      case 'approve':
        $where_statement = "where c.comment_status = 'approve' ";
        break;

      case 'deny':
        $where_statement = "where c.comment_status = 'deny' ";
        break;
      
      default:
        $where_statement = " ";
        break;
    }
  }
?>
<div class="where-box">
  <a class="where-btn" href="admin_comments.php?where=all">View Recieved</a>
  <a class="where-btn" href="admin_comments.php?where=draft">View In Progress</a>
  <a class="where-btn" href="admin_comments.php?where=approve">View Waiting for Payment</a>
  <a class="where-btn" href="admin_comments.php?where=deny">View Completed</a>
  <a class="where-btn" href="admin_comments.php?where=deny">View Canceled</a>
</div>
<table class="users-table"> 
  <thead class="users-table-head" >
    <tr>
      <th>ID</th>
      <th>User</th>
      <th>Service</th>
      <th>Car</th>
      <th>Order Date</th>
      <th>Appointment Date</th>
      <th>Status</th>
      <th>Date of Completion</th>
      <th>End Price</th> 
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody class="users-table-body" >
    
    <?php  
    $query = "select o.order_id, concat_ws(' ',u.user_first, u.user_last) as 'user', s.service_title, concat_ws(' ',c.car_producer, c.car_model, c.car_number_sign) as 'car', o.order_date,o.order_appointment_date, o.order_status, ifnull(o.order_completion_date,'Not completed') as 'order_completion_date', ifnull(o.order_end_price,'Not defined') as 'order_end_price' ";
    $query.= "FROM orders as o JOIN users as u on u.user_id = o.order_user_id ";
    $query.= "JOIN cars as c on c.car_id = o.order_car_id ";
    $query.= "JOIN services as s on s.service_id = o.order_service_id ";
    $query.= "ORDER BY o.order_date DESC ";
    $select_orders = mysqli_query($conn,$query);
    
    while ($row = mysqli_fetch_assoc($select_orders)) {
      
      $order_id = $row['order_id'];
      $order_user = $row['user'];
      $order_title = $row['service_title'];
      $order_car = $row['car'];
      $order_date = $row['order_date'];
      $order_appointment_date = $row['order_appointment_date'];
      $order_status = $row['order_status'];
      $order_completion_date = $row['order_completion_date'];
      $order_end_price = $row['order_end_price'];
      
      echo "<tr class='users-table-row'>";
      echo "<td>{$order_id}</td>";
      echo "<td>{$order_user}</td>";
      echo "<td>{$order_title}</td>";
      echo "<td>$order_car</td>";
      echo "<td>{$order_date}</td>";
      echo "<td>{$order_appointment_date}</td>";
      echo "<td>{$order_status}</td>";
      echo "<td>{$order_completion_date}</td>";
      echo "<td>{$order_end_price}</td>";
      echo "<td><a href='admin_comments.php?change_to_approve=$order_id&where=$where'>Approve</a></td>";
      echo "<td><a href='admin_comments.php?change_to_deny=$order_id&where=$where'>Deny</a></td>";
      echo "<td><a href='admin_comments.php?source=view_comment&c_id=$order_id&where=$where'>Full View</a></td>";
      echo "<td><a href='admin_comments.php?delete=$order_id&where=$where'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<?php
  if(isset($_GET['change_to_approve'])){
    $the_comment_id = $_GET['change_to_approve'];
    global $conn;

    $query = "update comments set comment_status = 'approve' ";
    $query.= "where comment_id = $the_comment_id";
    $change_to_approve_query = mysqli_query($conn,$query);
    header("Location: admin_comments.php?where=$where");
  }

  if(isset($_GET['change_to_deny'])){
    $the_comment_id = $_GET['change_to_deny'];
    global $conn;

    $query = "update comments set comment_status = 'deny' ";
    $query.= "where comment_id = $the_comment_id";
    $change_to_deny_query = mysqli_query($conn,$query);
    header("Location: admin_comments.php?where=$where");
  }

  if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];
    global $conn;

    $query = "delete from comments where comment_id = $the_comment_id ";
    $delete_query = mysqli_query($conn,$query);
    header("Location: admin_comments.php?where=$where");
  }
?>