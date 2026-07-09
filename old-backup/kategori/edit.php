<?php
include("../navbar.php");
include("../config/koneksi.php");
$id=$_GET['id'];
$data=$conn->query("SELECT * FROM kategori_produk
WHERE id_kategori=$id");
$d=$data->fetch();
if(isset($_POST['update'])){
$nama=$_POST['nama'];
$conn->query("UPDATE kategori_produk
SET nama_kategori='$nama'
WHERE id_kategori=$id");
echo "<script>
alert('Berhasil diubah');
window.location='index.php';
</script>";
}
?>
<h2>Edit Kategori</h2>
<form method="POST">
<input type="text"
name="nama"
class="form-control"
value="<?= $d['nama_kategori'];?>">
<br>
<button class="btn btn-warning"
name="update">
Update
</button>
</form>
<?php
include("../footer.php");
?>