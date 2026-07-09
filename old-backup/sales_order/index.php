<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Sales Order</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
Tambah Sales Order
</a>


<table class="table table-bordered">
<thead class="table-dark">

<tr>
<th>No</th>
<th>Tanggal</th>
<th>Customer</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php

$no=1;

$data=$conn->query("
SELECT * FROM sales_order
ORDER BY id_so DESC
");


foreach($data as $d){
?>

<tr>
<td><?= $no++; ?></td>
<td><?= $d['tanggal']; ?></td>
<td><?= $d['nama_customer']; ?></td>
<td><?= $d['status']; ?></td>
<td>

<a href="../detail_so/index.php?id=<?= $d['id_so']; ?>"
class="btn btn-info btn-sm">
Detail
</a>

<a href="edit.php?id=<?= $d['id_so']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_so']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin?')">
Hapus
</a>

</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php include("../footer.php"); ?>