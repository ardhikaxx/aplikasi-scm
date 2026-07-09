<?php
include("../navbar.php");
include("../config/koneksi.php");

$data = $conn->query("
SELECT
purchase_order.*,
supplier.nama_supplier
FROM purchase_order
JOIN supplier
ON purchase_order.id_supplier = supplier.id_supplier
ORDER BY id_po DESC
");
?>

<h2>Laporan Purchase Order</h2>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Supplier</th>
<th>Total</th>

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

<td><?= $d['nama_supplier']; ?></td>

<td>Rp <?= number_format($d['total'],0,',','.'); ?></td>

</tr>

<?php } ?>

</tbody>

</table>