<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $id_penerimaan = $_POST['id_penerimaan'];
$id_produk = $_POST['id_produk'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

$subtotal = $jumlah * $harga;

$sql = "INSERT INTO detail_penerimaan
(id_penerimaan,id_produk,jumlah,harga,subtotal)
VALUES
(:id_penerimaan,:id_produk,:jumlah,:harga,:subtotal)";

    $query=$conn->prepare($sql);

    $query->execute([
    ':id_penerimaan'=>$id_penerimaan,
    ':id_produk'=>$id_produk,
    ':jumlah'=>$jumlah,
    ':harga'=>$harga,
    ':subtotal'=>$subtotal
]);

    echo "<script>
    alert('Detail berhasil disimpan');
    window.location='index.php';
    </script>";
}
?>

<h2>Tambah Detail Penerimaan</h2>

<form method="POST">

<label>Penerimaan</label>

<select name="id_penerimaan" class="form-control">

<?php
$p=$conn->query("SELECT * FROM penerimaan_barang");

foreach($p as $d){
?>

<option value="<?= $d['id_penerimaan']; ?>">
<?= $d['id_penerimaan']; ?>
</option>

<?php } ?>

</select>

<br>

<label>Produk</label>

<select name="id_produk" class="form-control">

<?php

$produk=$conn->query("SELECT * FROM produk");

foreach($produk as $pr){

?>

<option value="<?= $pr['id_produk']; ?>">
<?= $pr['nama_produk']; ?>
</option>

<?php } ?>

</select>
<br>
<label>Jumlah</label>

<input type="number"
name="jumlah"
class="form-control"
required>

<br>

<label>Harga</label>

<input
type="number"
name="harga"
class="form-control"
required>

<br>

<button class="btn btn-success"
name="simpan">

Simpan

</button>
</form>
<?php include("../footer.php"); ?>