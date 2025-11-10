<?php
include 'db.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM members WHERE member_id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: view_members.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
