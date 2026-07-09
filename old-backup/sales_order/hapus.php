<?php
include("../config/koneksi.php");

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM sales_order WHERE id_so=?");
$stmt->execute([$id]);

header("Location:index.php");
exit;
?>