<div class="wrapper">
<div class="create-button-box">
  <a href="admin-users.php?source=add_user" class="btn--cta user-create-btn">
    <i class="fas fa-plus"></i>
    <span>Create User</span>
  </a>
</div>

<table class="users-table"> 
  <thead class="users-table-head" >
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Role</th>
      <th>Options</th>
      <th></th>
      <th></th> 
      <th></th>
    </tr>
  </thead>
  <tbody class="users-table-body" >
    
    <?php  
    $query = "select*from users";
    $select_users = mysqli_query($conn,$query);
    
    while ($row = mysqli_fetch_assoc($select_users)) {
      
      $user_id = $row['user_id'];
      $user_first = $row['user_first'];
      $user_last = $row['user_last'];
      $user_email = $row['user_email'];
      $user_phone = $row['user_phone'];
      $user_phone_code = $row['user_phone_code'];
      $user_role = $row['user_role'];
      
      echo "<tr class='users-table-row'>";
      echo "<td>{$user_id}</td>";
      echo "<td>{$user_first}</td>";
      echo "<td>{$user_last}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td>+{$user_phone_code} {$user_phone}</td>";
      echo "<td>{$user_role}</td>";
      echo "<td><a href='admin-users.php?change_to_user=$user_id'>Change to User</a></td>";
      echo "<td><a href='admin-users.php?change_to_admin=$user_id'>Change to Admin</a></td>";
      echo "<td><a href='admin-users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
      echo "<td><a href='admin-users.php?delete=$user_id'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
</div>


<?php 
  if (isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];
  
    global $conn;
    $query = "delete from users where user_id = $the_user_id";
    $delete_query = mysqli_query($conn,$query);
    header("Location: admin-users.php");
  }

  if (isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];

    global $conn;
    $query = "update users set user_role = 'admin' ";
    $query.= "where user_id = $the_user_id";
    $change_to_admin_query = mysqli_query($conn,$query);
    header("Location: admin-users.php");
  }
  if (isset($_GET['change_to_user'])) {
    $the_user_id = $_GET['change_to_user'];

    global $conn;
    $query = "update users set user_role = 'user' ";
    $query.= "where user_id = $the_user_id";
    $change_to_user_query = mysqli_query($conn,$query);
    header("Location: admin-users.php");
  }
  
?>