<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $stmt = $conn->prepare("
    INSERT INTO mutasi
    (tanggal,nama_produk,jenis_mutasi,jumlah,keterangan)
    VALUES (?,?,?,?,?)
    ");

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['nama_produk'],
        $_POST['jenis_mutasi'],
        $_POST['jumlah'],
        $_POST['keterangan']
    ]);

    header("Location:index.php");
    exit;
}
?>

<h2>Tambah Mutasi Stok</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input
type="date"
name="tanggal"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Nama Produk</label>
<input
type="text"
name="nama_produk"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Jenis Mutasi</label>

<select
name="jenis_mutasi"
class="form-control">

<option value="Masuk">Masuk</option>
<option value="Keluar">Keluar</option>

</select>

</div>

<div class="mb-3">
<label>Jumlah</label>
<input
type="number"
name="jumlah"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Keterangan</label>
<textarea
name="keterangan"
class="form-control"
rows="3"></textarea>
</div>

<button
type="submit"
name="simpan"
class="btn btn-success">
Simpan
</button>

<a
href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>