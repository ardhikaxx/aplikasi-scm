<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $stmt = $conn->prepare("
    INSERT INTO sales_order
    (tanggal,nama_customer,status)
    VALUES (?,?,?)
    ");

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['nama_customer'],
        $_POST['status']
    ]);

    header("Location:index.php");
    exit;
}
?>

<h2>Tambah Sales Order</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama Customer</label>
<input type="text" name="nama_customer" class="form-control" required>
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
    <option value="Pending">Pending</option>
    <option value="Diproses">Diproses</option>
    <option value="Selesai">Selesai</option>
</select>
</div>

<button type="submit" name="simpan" class="btn btn-success">
Simpan
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>