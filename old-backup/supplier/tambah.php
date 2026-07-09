<?php
include("../navbar.php");
include("../config/koneksi.php");
if(isset($_POST['simpan'])){

    $nama=$_POST['nama_supplier'];
    $alamat=$_POST['alamat'];
    $telepon=$_POST['telepon'];
    $email=$_POST['email'];

    $sql="INSERT INTO supplier(nama_supplier,alamat,telepon,email)
          VALUES(:nama,:alamat,:telepon,:email)";

    $query=$conn->prepare($sql);

    $query->execute([
        ':nama'=>$nama,
        ':alamat'=>$alamat,
        ':telepon'=>$telepon,
        ':email'=>$email
    ]);

    echo "<script>
            alert('Data berhasil disimpan');
            window.location='index.php';
          </script>";
}
?>
<h2>Tambah Supplier</h2>
<form method="POST">
<div class="mb-3">
<label>Nama Supplier</label>
<input type="text" name="nama_supplier" class="form-control" required>
</div>
<div class="mb-3">
<label>Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>
<div class="mb-3">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control">
</div>
<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
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