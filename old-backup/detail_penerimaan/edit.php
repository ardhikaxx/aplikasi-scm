<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$data = $conn->query("
SELECT * FROM detail_penerimaan 
WHERE id_detail='$id'
")->fetch();

if(isset($_POST['update'])){

    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    $conn->query("
    UPDATE detail_penerimaan SET
    id_produk='$id_produk',
    jumlah='$jumlah'
    WHERE id_detail='$id'
    ");

    header("location:index.php");
}
?>

<h2>Edit Detail Penerimaan</h2>

<form method="POST">

<div class="mb-3">
<label>Produk</label>

<select name="id_produk" class="form-control">

<?php
$produk=$conn->query("SELECT * FROM produk");

foreach($produk as $p){
?>

<option value="<?= $p['id_produk']; ?>"
<?= ($p['id_produk']==$data['id_produk'])?'selected':''; ?>>

<?= $p['nama_produk']; ?>

</option>

<?php } ?>

</select>
</div>


<div class="mb-3">

<label>Jumlah</label>

<input type="number" 
name="jumlah" 
class="form-control"
value="<?= $data['jumlah']; ?>">

</div>


<button name="update" class="btn btn-primary">
Update
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>
</form>
<?php include("../footer.php"); ?>