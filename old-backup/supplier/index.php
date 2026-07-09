<?php
include("../navbar.php");
include("../config/koneksi.php");
?>
<h2>Data Supplier</h2>
<a href="tambah.php" class="btn btn-primary mb-3">
Tambah Supplier
</a>
<table class="table table-bordered">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Nama Supplier</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no=1;
$data=$conn->query("SELECT * FROM supplier ORDER BY id_supplier");
foreach($data as $d){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama_supplier']; ?></td>
<td><?= $d['alamat']; ?></td>
<td><?= $d['telepon']; ?></td>
<td><?= $d['email']; ?></td>
<td>
    <a href="edit.php?id=<?= $d['id_supplier']; ?>" class="btn btn-warning btn-sm">
        Edit
    </a>

    <a href="hapus.php?id=<?= $d['id_supplier']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin ingin menghapus data ini?')">
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