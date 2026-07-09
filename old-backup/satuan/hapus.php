<?php

include("../config/koneksi.php");

$id=$_GET['id'];

$conn->query("DELETE FROM satuan_ukur
WHERE id_satuan=$id");

header("Location:index.php");