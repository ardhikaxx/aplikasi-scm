<?php
include("../navbar.php");
include("../config/koneksi.php");
$id=$_GET['id'];
$data=$conn->query("SELECT * FROM supplier WHERE id_supplier=$id");
$d=$data->fetch();
if(isset($_POST['update'])){

    $nama=$_POST['nama_supplier'];
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];
    $email=$_POST['email'];

    $sql="UPDATE supplier
          SET nama_supplier=:nama,
              alamat=:alamat,
              telepon=:telepon,
              email=:email
          WHERE id_supplier=:id";

    $query=$conn->prepare($sql);

    $query->execute([
        ':nama'=>$nama,
        ':alamat'=>$alamat,
        ':telepon'=>$telepon,
        ':email'=>$email,
        ':id'=>$id
    ]);

    echo "<script>
            alert('Data berhasil diubah');
            window.location='index.php';
          </script>";
}
?>
<h2>Edit Supplier</h2>
<form method="POST">
<div class="mb-3">
<label>Nama Supplier</label>
<input type="text"
name="nama_supplier"
value="<?= $d['nama_supplier'];?>"
class="form-control">
</div>
<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"><?= $d['alamat'];?></textarea>
</div>
<div class="mb-3">
<label>Telepon</label>
<input type="text"
name="telepon"
value="<?= $d['telepon'];?>"
class="form-control">
</div>
<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
value="<?= $d['email'];?>"
class="form-control">
</div>
<button class="btn btn-warning"
name="update">
Update
</button>
</form>
<?php
include("../footer.php");
?>