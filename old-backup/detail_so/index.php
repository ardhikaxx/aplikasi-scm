<?php
include("../navbar.php");
include("../config/koneksi.php");

$id_so = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM detail_so WHERE id_so=? ORDER BY id_detail");
$stmt->execute([$id_so]);
?>

<h2>Detail Sales Order</h2>

<a href="tambah.php?id=<?= $id_so; ?>" class="btn btn-primary mb-3">
Tambah Produk
</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

foreach($stmt as $d){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_produk']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id_detail']; ?>&id_so=<?= $id_so; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_detail']; ?>&id_so=<?= $id_so; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="../sales_order/index.php" class="btn btn-secondary">
Kembali
</a>