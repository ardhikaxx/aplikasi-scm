<?php

include("../config/koneksi.php");

$id=$_GET['id'];

$conn->query("DELETE FROM kategori_produk
WHERE id_kategori=$id");

header("Location:index.php");