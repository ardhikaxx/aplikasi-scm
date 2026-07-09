<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Data Produk</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
    Tambah Produk
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Kategori</th>
    <th>Satuan</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no=1;

$sql=$conn->query("
SELECT p.*,k.nama_kategori,s.nama_satuan
FROM produk p
JOIN kategori_produk k ON p.id_kategori=k.id_kategori
JOIN satuan_ukur s ON p.id_satuan=s.id_satuan
ORDER BY p.id_produk
");

foreach($sql as $d){

?>

<tr>

<td><?= $no++; ?></td>
<td><?= $d['nama_produk']; ?></td>
<td><?= $d['nama_kategori']; ?></td>
<td><?= $d['nama_satuan']; ?></td>
<td>Rp <?= number_format($d['harga_beli']); ?></td>
<td>Rp <?= number_format($d['harga_jual']); ?></td>
<td><?= $d['stok']; ?></td>
<td>

<a href="edit.php?id=<?= $d['id_produk']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id_produk']; ?>"
onclick="return confirm('Yakin?')"
class="btn btn-danger btn-sm">

Hapus
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php
include("../footer.php");
?>