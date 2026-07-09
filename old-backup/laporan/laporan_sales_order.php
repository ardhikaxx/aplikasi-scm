<?php
include("../navbar.php");
include("../config/koneksi.php");

$data = $conn->query("
SELECT *
FROM sales_order
ORDER BY id_so DESC
");
?>

<h2>Laporan Sales Order</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Customer</th>
<th>Status</th>

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

<td><?= $d['nama_customer']; ?></td>

<td><?= $d['status']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>