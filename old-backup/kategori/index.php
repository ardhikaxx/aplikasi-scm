<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Data Kategori</h2>

<a href="tambah.php" class="btn btn-primary mb-3">
    Tambah Kategori
</a>

<table class="table table-bordered">

<tr class="table-dark">
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>
<?php
$no=1;
$data=$conn->query("SELECT * FROM kategori_produk ORDER BY id_kategori");
foreach($data as $d){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama_kategori']; ?></td>
<td>
<a href="edit.php?id=<?= $d['id_kategori']; ?>" class="btn btn-warning btn-sm">
Edit
</a>
<a href="hapus.php?id=<?= $d['id_kategori']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin?')">
Hapus
</a>
</td>
</tr>
<?php } ?>
</table>
<?php
include("../footer.php");
?>