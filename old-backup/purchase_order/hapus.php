<?php

include("../config/koneksi.php");

$id = $_GET['id'];

$conn->query("DELETE FROM purchase_order WHERE id_po=$id");

header("Location:index.php");