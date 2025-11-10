<?php
include 'db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Members</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="text-center text-success mb-4">Gym Members List</h3>
  <a href="add_member.php" class="btn btn-primary mb-3">➕ Add Member</a>
  <table class="table table-bordered table-hover shadow-sm">
    <thead class="table-dark text-center">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Plan</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr class="text-center">
        <td><?php echo $row['member_id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['plan']; ?></td>
        <td>
          <a href="edit_member.php?id=<?php echo $row['member_id']; ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
          <a href="delete_member.php?id=<?php echo $row['member_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?');">🗑 Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
