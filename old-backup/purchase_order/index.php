<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Purchase Order</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
    Tambah Purchase Order
</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Supplier</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

<?php

$no=1;

$sql=$conn->query("
SELECT po.*, s.nama_supplier
FROM purchase_order po
JOIN supplier s
ON po.id_supplier=s.id_supplier
ORDER BY po.id_po DESC
");

foreach($sql as $d){

?>

<tr>
<td><?= $no++; ?></td>
<td><?= $d['tanggal']; ?></td>
<td><?= $d['nama_supplier']; ?></td>
<td>Rp <?= number_format($d['total']); ?></td>
<td>
<a href="edit.php?id=<?= $d['id_po']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_po']; ?>"
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