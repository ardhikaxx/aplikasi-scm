<?php

include("../config/koneksi.php");

$id = $_GET['id'];

$conn->query("
DELETE FROM detail_penerimaan
WHERE id_detail='$id'
");


header("location:index.php");

?>