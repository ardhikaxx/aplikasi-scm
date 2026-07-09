<?php
include("../config/koneksi.php");

$id = $_GET['id'];

$stmt = $conn->prepare("
DELETE FROM mutasi
WHERE id_mutasi=?
");

$stmt->execute([$id]);

header("Location:index.php");
exit;
?>