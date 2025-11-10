<?php
include 'db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

// Get member ID from URL
$id = $_GET['id'];
$sql = "SELECT * FROM members WHERE member_id = $id";
$result = mysqli_query($conn, $sql);
$member = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $plan = $_POST['plan'];

    $update = "UPDATE members SET name='$name', age='$age', plan='$plan' WHERE member_id=$id";
    if (mysqli_query($conn, $update)) {
        $msg = "✅ Member updated successfully!";
        header("refresh:2;url=view_members.php");
    } else {
        $msg = "❌ Error updating record: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card mx-auto shadow p-4" style="max-width: 500px;">
    <h3 class="text-center text-primary mb-3">Edit Member</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" value="<?php echo $member['name']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" value="<?php echo $member['age']; ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Plan</label>
        <select name="plan" class="form-select" required>
          <option value="Monthly" <?php if($member['plan']=='Monthly') echo 'selected'; ?>>Monthly</option>
          <option value="Quarterly" <?php if($member['plan']=='Quarterly') echo 'selected'; ?>>Quarterly</option>
          <option value="Yearly" <?php if($member['plan']=='Yearly') echo 'selected'; ?>>Yearly</option>
        </select>
      </div>
      <button type="submit" name="update" class="btn btn-success w-100">Update Member</button>
    </form>
    <?php if(isset($msg)) echo "<div class='mt-3 text-center text-success'>$msg</div>"; ?>
  </div>
</div>
</body>
</html>
