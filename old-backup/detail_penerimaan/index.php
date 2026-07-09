<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Detail Penerimaan Barang</h2>

<a href="tambah.php?id=<?= $id_penerimaan; ?>" class="btn btn-primary mb-3">
Tambah Detail
</a>

<table class="table table-bordered">

<thead class="table-dark">

<tr>

<th>No</th>
<th>ID Penerimaan</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$id_penerimaan = $_GET['id'];

$data=$conn->query("
SELECT dp.*,p.nama_produk
FROM detail_penerimaan dp
JOIN produk p
ON dp.id_produk=p.id_produk
WHERE dp.id_penerimaan='$id_penerimaan'
ORDER BY dp.id_detail DESC
");

foreach($data as $d){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['id_penerimaan']; ?></td>

<td><?= $d['nama_produk']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td>

<a href="edit.php?id=<?= $d['id_detail']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_detail']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">

Hapus
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php include("../footer.php"); ?>