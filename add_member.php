<?php
include 'db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['add'])) {
    $n = $_POST['name'];
    $a = $_POST['age'];
    $p = $_POST['plan'];

    $sql = "INSERT INTO members (name, age, plan) VALUES ('$n', '$a', '$p')";
    if (mysqli_query($conn, $sql)) {
        $msg = "✅ Member added successfully!";
    } else {
        $msg = "❌ Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card mx-auto shadow p-4" style="max-width: 500px;">
    <h3 class="text-center mb-3 text-primary">Add New Member</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Plan</label>
        <select name="plan" class="form-select" required>
          <option>Monthly</option>
          <option>Quarterly</option>
          <option>Yearly</option>
        </select>
      </div>
      <button type="submit" name="add" class="btn btn-primary w-100">Add Member</button>
    </form>
    <?php if(isset($msg)) echo "<div class='mt-3 text-center text-success'>$msg</div>"; ?>
  </div>
</div>
</body>
</html>
 