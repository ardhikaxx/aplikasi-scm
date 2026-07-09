<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Mutasi Stok</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
Tambah Mutasi
</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Produk</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Keterangan</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data = $conn->query("
SELECT *
FROM mutasi
ORDER BY id_mutasi DESC
");

foreach($data as $d){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['tanggal']; ?></td>

<td><?= $d['nama_produk']; ?></td>

<td><?= $d['jenis_mutasi']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td><?= $d['keterangan']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id_mutasi']; ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_mutasi']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">
Hapus
</a>

</td>
</tr>

<?php } ?>

</tbody>
</table>