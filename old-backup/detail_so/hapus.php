<?php
include("../config/koneksi.php");

$id = $_GET['id'];
$id_so = $_GET['id_so'];

$stmt = $conn->prepare("
DELETE FROM detail_so
WHERE id_detail=?
");

$stmt->execute([$id]);

header("Location:index.php?id=".$id_so);
exit;
?>