<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $tanggal = $_POST['tanggal'];
    $supplier = $_POST['id_supplier'];
    $total = $_POST['total'];

    $sql = "INSERT INTO purchase_order(tanggal,id_supplier,total)
            VALUES(:tanggal,:supplier,:total)";

    $query = $conn->prepare($sql);

    $query->execute([
        ':tanggal'=>$tanggal,
        ':supplier'=>$supplier,
        ':total'=>$total
    ]);

    echo "<script>
        alert('Purchase Order berhasil disimpan');
        window.location='index.php';
    </script>";
}
?>

<h2>Tambah Purchase Order</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" required>
</div>

<div class="mb-3">
<label>Supplier</label>

<select name="id_supplier" class="form-control" required>

<option value="">-- Pilih Supplier --</option>

<?php
$data = $conn->query("SELECT * FROM supplier");

foreach($data as $s){
?>

<option value="<?= $s['id_supplier']; ?>">
<?= $s['nama_supplier']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Total Purchase Order</label>
<input type="number" name="total" class="form-control" required>
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