<?php

include("../config/koneksi.php");

$id = $_GET['id'];

$conn->query("DELETE FROM penerimaan_barang WHERE id_penerimaan=$id");

header("Location:index.php");

?>