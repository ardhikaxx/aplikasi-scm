<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM mutasi WHERE id_mutasi=?");
$stmt->execute([$id]);

$d = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $stmt = $conn->prepare("
    UPDATE mutasi
    SET
    tanggal=?,
    nama_produk=?,
    jenis_mutasi=?,
    jumlah=?,
    keterangan=?
    WHERE id_mutasi=?
    ");

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['nama_produk'],
        $_POST['jenis_mutasi'],
        $_POST['jumlah'],
        $_POST['keterangan'],
        $id
    ]);

    header("Location:index.php");
    exit;
}
?>

<h2>Edit Mutasi Stok</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input
type="date"
name="tanggal"
class="form-control"
value="<?= $d['tanggal']; ?>"
required>
</div>

<div class="mb-3">
<label>Nama Produk</label>
<input
type="text"
name="nama_produk"
class="form-control"
value="<?= $d['nama_produk']; ?>"
required>
</div>

<div class="mb-3">
<label>Jenis Mutasi</label>

<select
name="jenis_mutasi"
class="form-control">

<option value="Masuk" <?= $d['jenis_mutasi']=="Masuk" ? "selected" : ""; ?>>
Masuk
</option>

<option value="Keluar" <?= $d['jenis_mutasi']=="Keluar" ? "selected" : ""; ?>>
Keluar
</option>

</select>

</div>

<div class="mb-3">
<label>Jumlah</label>
<input
type="number"
name="jumlah"
class="form-control"
value="<?= $d['jumlah']; ?>"
required>
</div>

<div class="mb-3">
<label>Keterangan</label>
<textarea
name="keterangan"
class="form-control"
rows="3"><?= $d['keterangan']; ?></textarea>
</div>

<button
type="submit"
name="update"
class="btn btn-warning">
Update
</button>

<a
href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>