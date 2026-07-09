<?php

include("../navbar.php");
include("../config/koneksi.php");

$id=$_GET['id'];

$data=$conn->query("SELECT * FROM satuan_ukur
WHERE id_satuan=$id");
$d=$data->fetch();
if(isset($_POST['update'])){
$nama=$_POST['nama'];
$conn->query("UPDATE satuan_ukur
SET nama_satuan='$nama'
WHERE id_satuan=$id");

echo "<script>
alert('Berhasil diubah');
window.location='index.php';
</script>";
}
?>
<h2>Edit Satuan</h2>
<form method="POST">
<input type="text"
name="nama"
class="form-control"
value="<?= $d['nama_satuan'];?>">

<br>
<button class="btn btn-warning"
name="update">

Update
</button>
</form>
<?php include("../footer.php"); ?>