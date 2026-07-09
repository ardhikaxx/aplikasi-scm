<?php

include("../config/koneksi.php");

$id=$_GET['id'];

$conn->query("DELETE FROM supplier WHERE id_supplier=$id");

header("Location:index.php");