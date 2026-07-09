<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $nama=$_POST['nama'];

    $conn->query("INSERT INTO satuan_ukur(nama_satuan)
    VALUES('$nama')");

    echo "<script>
    alert('Berhasil ditambah');
    window.location='index.php';
    </script>";
}
?>

<h2>Tambah Satuan</h2>
<form method="POST">
<div class="mb-3">
<label>Nama Satuan</label>

<input type="text"
name="nama"
class="form-control"
required>

</div>
<button class="btn btn-success"
name="simpan">

Simpan
</button>
</form>
<?php include("../footer.php"); ?>