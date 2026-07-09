<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM sales_order WHERE id_so=?");
$stmt->execute([$id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $stmt = $conn->prepare("
    UPDATE sales_order
    SET tanggal=?,
        nama_customer=?,
        status=?
    WHERE id_so=?
    ");

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['nama_customer'],
        $_POST['status'],
        $id
    ]);

    header("Location:index.php");
    exit;
}
?>

<h2>Edit Sales Order</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" value="<?= $d['tanggal']; ?>" required>
</div>

<div class="mb-3">
<label>Nama Customer</label>
<input type="text" name="nama_customer" class="form-control" value="<?= $d['nama_customer']; ?>" required>
</div>

<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="Pending" <?= $d['status']=="Pending" ? "selected" : ""; ?>>Pending</option>

<option value="Diproses" <?= $d['status']=="Diproses" ? "selected" : ""; ?>>Diproses</option>

<option value="Selesai" <?= $d['status']=="Selesai" ? "selected" : ""; ?>>Selesai</option>

</select>

</div>

<button type="submit" name="update" class="btn btn-warning">
Update
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>