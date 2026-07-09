<?php
include("../navbar.php");
include("../config/koneksi.php");
?>

<h2>Data Satuan</h2>

<a href="tambah.php" class="btn btn-primary mb-3">Tambah Satuan</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Satuan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

<?php
$no=1;
$data=$conn->query("SELECT * FROM satuan_ukur ORDER BY id_satuan");
foreach($data as $d){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_satuan']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id_satuan']; ?>" class="btn btn-warning btn-sm">Edit</a>

        <a href="hapus.php?id=<?= $d['id_satuan']; ?>"
        onclick="return confirm('Yakin ingin menghapus?')"
        class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
<?php include("../footer.php"); ?>