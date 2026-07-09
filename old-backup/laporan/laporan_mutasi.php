<?php
include("../navbar.php");
include("../config/koneksi.php");

$data = $conn->query("
SELECT *
FROM mutasi
ORDER BY id_mutasi DESC
");
?>

<h2>Laporan Mutasi Stok</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Produk</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Keterangan</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

foreach($data as $d){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['tanggal']; ?></td>

<td><?= $d['nama_produk']; ?></td>

<td><?= $d['jenis_mutasi']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td><?= $d['keterangan']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>