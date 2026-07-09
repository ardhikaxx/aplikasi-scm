<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];
$id_so = $_GET['id_so'];

$stmt = $conn->prepare("SELECT * FROM detail_so WHERE id_detail=?");
$stmt->execute([$id]);

$d = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $stmt = $conn->prepare("
    UPDATE detail_so
    SET
    nama_produk=?,
    jumlah=?
    WHERE id_detail=?
    ");

    $stmt->execute([
        $_POST['nama_produk'],
        $_POST['jumlah'],
        $id
    ]);

    header("Location:index.php?id=".$id_so);
    exit;
}
?>

<h2>Edit Detail Sales Order</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Produk</label>

<input
type="text"
name="nama_produk"
class="form-control"
value="<?= $d['nama_produk'];?>"
required>

</div>

<div class="mb-3">
<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
value="<?= $d['jumlah'];?>"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-warning">
Update
</button>

<a
href="index.php?id=<?= $id_so;?>"
class="btn btn-secondary">
Kembali
</a>

</form>