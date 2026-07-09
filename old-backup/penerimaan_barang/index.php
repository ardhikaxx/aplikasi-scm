<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Penerimaan Barang</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
Tambah Penerimaan
</a>
<table class="table table-bordered">
<thead class="table-dark">
<tr>

<th>No</th>
<th>Tanggal</th>
<th>Purchase Order</th>
<th>Keterangan</th>
<th>Aksi</th>

</tr>
</thead>
<tbody>
<?php

$no=1;

$data=$conn->query("
SELECT pb.*,po.id_po
FROM penerimaan_barang pb
JOIN purchase_order po
ON pb.id_po=po.id_po
ORDER BY pb.id_penerimaan DESC
");

foreach($data as $d){

?>

<tr>
<td><?= $no++; ?></td>
<td><?= $d['tanggal']; ?></td>
<td>PO-<?= $d['id_po']; ?></td>
<td><?= $d['keterangan']; ?></td>
<td>
 <a href="../detail_penerimaan/index.php?id=<?= $d['id_penerimaan']; ?>" 
class="btn btn-info btn-sm">
Detail
</a>

<a href="edit.php?id=<?= $d['id_penerimaan']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_penerimaan']; ?>"
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