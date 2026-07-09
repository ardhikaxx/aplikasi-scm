<?php
include("../navbar.php");
include("../config/koneksi.php");

$id_so = $_GET['id'];

if(isset($_POST['simpan'])){

    $stmt = $conn->prepare("
    INSERT INTO detail_so
    (id_so,nama_produk,jumlah)
    VALUES (?,?,?)
    ");

    $stmt->execute([
        $id_so,
        $_POST['nama_produk'],
        $_POST['jumlah']
    ]);

    header("Location:index.php?id=".$id_so);
    exit;
}
?>

<h2>Tambah Detail Sales Order</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Produk</label>
<input
type="text"
name="nama_produk"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Jumlah</label>
<input
type="number"
name="jumlah"
class="form-control"
required>
</div>

<button
type="submit"
name="simpan"
class="btn btn-success">
Simpan
</button>

<a
href="index.php?id=<?= $id_so;?>"
class="btn btn-secondary">
Kembali
</a>

</form>