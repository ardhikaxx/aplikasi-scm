<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_produk'];
    $kategori = $_POST['id_kategori'];
    $satuan = $_POST['id_satuan'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $reorder = $_POST['reorder_point'];

    $sql = "INSERT INTO produk
    (nama_produk,id_kategori,id_satuan,harga_beli,harga_jual,stok,reorder_point)
    VALUES
    (:nama,:kategori,:satuan,:beli,:jual,:stok,:reorder)";

    $query = $conn->prepare($sql);

    $query->execute([
        ':nama'=>$nama,
        ':kategori'=>$kategori,
        ':satuan'=>$satuan,
        ':beli'=>$harga_beli,
        ':jual'=>$harga_jual,
        ':stok'=>$stok,
        ':reorder'=>$reorder
    ]);

    echo "<script>
    alert('Produk berhasil ditambahkan');
    window.location='index.php';
    </script>";
}
?>

<h2>Tambah Produk</h2>

<form method="POST">

<div class="mb-3">
<label>Nama Produk</label>
<input type="text" name="nama_produk" class="form-control" required>
</div>

<div class="mb-3">
<label>Kategori</label>

<select name="id_kategori" class="form-control" required>

<option value="">-- Pilih Kategori --</option>

<?php

$data = $conn->query("SELECT * FROM kategori_produk");

foreach($data as $k){

?>

<option value="<?= $k['id_kategori']; ?>">
<?= $k['nama_kategori']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Satuan</label>

<select name="id_satuan" class="form-control" required>

<option value="">-- Pilih Satuan --</option>

<?php

$data = $conn->query("SELECT * FROM satuan_ukur");
foreach($data as $s){

?>

<option value="<?= $s['id_satuan']; ?>">
<?= $s['nama_satuan']; ?>
</option>

<?php } ?>
</select>
</div>

<div class="mb-3">
<label>Harga Beli</label>
<input type="number" name="harga_beli" class="form-control" required>
</div>

<div class="mb-3">
<label>Harga Jual</label>
<input type="number" name="harga_jual" class="form-control" required>
</div>

<div class="mb-3">
<label>Stok Awal</label>
<input type="number" name="stok" class="form-control" value="0">
</div>

<div class="mb-3">
<label>Reorder Point</label>
<input type="number" name="reorder_point" class="form-control" value="10">
</div>
<button type="submit" name="simpan" class="btn btn-success">
Simpan
</button>
<a href="index.php" class="btn btn-secondary">
Kembali
</a>
</form>
<?php
include("../footer.php");
?>