<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM produk WHERE id_produk=$id");
$p = $data->fetch();

if(isset($_POST['update'])){

    $nama = $_POST['nama_produk'];
    $kategori = $_POST['id_kategori'];
    $satuan = $_POST['id_satuan'];
    $beli = $_POST['harga_beli'];
    $jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $reorder = $_POST['reorder_point'];

    $sql="UPDATE produk SET
    nama_produk=:nama,
    id_kategori=:kategori,
    id_satuan=:satuan,
    harga_beli=:beli,
    harga_jual=:jual,
    stok=:stok,
    reorder_point=:reorder
    WHERE id_produk=:id";

    $query=$conn->prepare($sql);

    $query->execute([
        ':nama'=>$nama,
        ':kategori'=>$kategori,
        ':satuan'=>$satuan,
        ':beli'=>$beli,
        ':jual'=>$jual,
        ':stok'=>$stok,
        ':reorder'=>$reorder,
        ':id'=>$id
    ]);

    echo "<script>
    alert('Produk berhasil diupdate');
    window.location='index.php';
    </script>";
}
?>

<h2>Edit Produk</h2>

<form method="POST">

<label>Nama Produk</label>
<input type="text" name="nama_produk"
value="<?= $p['nama_produk']; ?>"
class="form-control">

<br>

<label>Kategori</label>

<select name="id_kategori" class="form-control">

<?php

$kategori=$conn->query("SELECT * FROM kategori_produk");

foreach($kategori as $k){

?>

<option value="<?= $k['id_kategori']; ?>"
<?= $k['id_kategori']==$p['id_kategori']?'selected':'';?>>

<?= $k['nama_kategori']; ?>

</option>
<?php } ?>
</select>
<br>
<label>Satuan</label>
<select name="id_satuan" class="form-control">
<?php
$satuan=$conn->query("SELECT * FROM satuan_ukur");
foreach($satuan as $s){
?>

<option value="<?= $s['id_satuan']; ?>"
<?= $s['id_satuan']==$p['id_satuan']?'selected':'';?>>

<?= $s['nama_satuan']; ?>

</option>

<?php } ?>

</select>

<br>

<label>Harga Beli</label>
<input type="number"
name="harga_beli"
value="<?= $p['harga_beli'];?>"
class="form-control">

<br>

<label>Harga Jual</label>
<input type="number"
name="harga_jual"
value="<?= $p['harga_jual'];?>"
class="form-control">

<br>

<label>Stok</label>
<input type="number"
name="stok"
value="<?= $p['stok'];?>"
class="form-control">

<br>

<label>Reorder Point</label>
<input type="number"
name="reorder_point"
value="<?= $p['reorder_point'];?>"
class="form-control">

<br>

<button class="btn btn-warning"
name="update">

Update
</button>
</form>
<?php
include("../footer.php");
?>