<?php

  if (!isset($_GET['where'])) {
    $where_statement = " ";
    $where = 'all';
  }
  else{
    $where = $_GET['where'];
    switch ($_GET['where']) {
      case 'recieved':
        $where_statement = "where o.order_status = 'recieved' ";
        break;

      case 'progress':
        $where_statement = "where o.order_status = 'in progress' ";
        break;

      case 'waiting':
        $where_statement = "where o.order_status = 'waiting for payment' ";
        break;

      case 'completed':
        $where_statement = "where o.order_status = 'completed' ";
        break;
  
      case 'canceled':
        $where_statement = "where o.order_status = 'canceled' ";
        break;
      
      default:
        $where_statement = " ";
        break;
    }
  }
?>

<div class="page-header-box">
  <div>
    <h2 class="page-heading">View Orders</h2>
    <span class="page-heading-line"></span>
  </div>
</div>

<div class="where-box">
  <a class="where-btn" href="admin_orders.php?where=all">View All</a>
  <a class="where-btn" href="admin_orders.php?where=recieved">View Recieved</a>
  <a class="where-btn" href="admin_orders.php?where=progress">View In Progress</a>
  <a class="where-btn" href="admin_orders.php?where=waiting">View Waiting for Payment</a>
  <a class="where-btn" href="admin_orders.php?where=completed">View Completed</a>
  <a class="where-btn" href="admin_orders.php?where=canceled">View Canceled</a>
</div>
<table class="hor-table"> 
  <thead class="hor-table-head" >
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
  <tbody>
    <?php  
    $query = "select o.order_id, concat_ws(' ',u.user_first, u.user_last) as 'user', s.service_title, concat_ws(' ',c.car_producer, c.car_model, c.car_number_sign) as 'car', o.order_date,o.order_appointment_date, o.order_status, if(o.order_completion_date<>'0000-00-00',o.order_completion_date,'Not completed') as 'order_completion_date', if(o.order_end_price = 0,'Not defined' , o.order_end_price) as 'order_end_price' ";
    $query.= "FROM orders as o JOIN users as u on u.user_id = o.order_user_id ";
    $query.= "JOIN cars as c on c.car_id = o.order_car_id ";
    $query.= "JOIN services as s on s.service_id = o.order_service_id ";
    $query.= $where_statement;
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
      
      echo "<tr>";
      echo "<td>{$order_id}</td>";
      echo "<td>{$order_user}</td>";
      echo "<td>{$order_title}</td>";
      echo "<td>$order_car</td>";
      echo "<td>{$order_date}</td>";
      echo "<td>{$order_appointment_date}</td>";
      echo "<td>{$order_status}</td>";
      echo "<td>{$order_completion_date}</td>";
      echo "<td>{$order_end_price}</td>";
      echo "<td><a href='admin_orders.php?source=view_order&o_id=$order_id&where=$where'>View</a></td>";
      echo "<td><a href='admin_orders.php?delete=$order_id&where=$where'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<?php

  if(isset($_GET['delete'])){
    $the_order_id = $_GET['delete'];
    global $conn;

    $query = "delete from orders where order_id = $the_order_id ";
    $delete_query = mysqli_query($conn,$query);
    header("Location: admin_orders.php?where=$where");
  }
?>