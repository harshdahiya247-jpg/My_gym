<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Gym Management</a>
    <div>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="text-center">
    <h3>Welcome, <span class="text-primary"><?php echo $_SESSION['user']; ?></span></h3>
  </div>
  <div class="d-flex justify-content-center mt-4">
    <?php if ($_SESSION['role'] == 'admin') { ?>
      <a href="add_member.php" class="btn btn-primary m-2">Add Member</a>
      <a href="view_members.php" class="btn btn-success m-2">View Members</a>
    <?php } else { ?>
      <div class="alert alert-info">Member access only - view limited options.</div>
    <?php } ?>
  </div>
</div>
</body>
</html>
