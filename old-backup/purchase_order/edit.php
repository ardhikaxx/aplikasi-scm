<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM purchase_order WHERE id_po=$id");
$po = $data->fetch();

if(isset($_POST['update'])){

    $tanggal = $_POST['tanggal'];
    $supplier = $_POST['id_supplier'];
    $total = $_POST['total'];

    $sql = "UPDATE purchase_order
            SET tanggal=:tanggal,
                id_supplier=:supplier,
                total=:total
            WHERE id_po=:id";

    $query = $conn->prepare($sql);

    $query->execute([
        ':tanggal'=>$tanggal,
        ':supplier'=>$supplier,
        ':total'=>$total,
        ':id'=>$id
    ]);

    echo "<script>
    alert('Purchase Order berhasil diupdate');
    window.location='index.php';
    </script>";
}
?>

<h2>Edit Purchase Order</h2>

<form method="POST">

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal"
value="<?= $po['tanggal']; ?>"
class="form-control" required>
</div>

<div class="mb-3">
<label>Supplier</label>

<select name="id_supplier" class="form-control">

<?php
$supplier = $conn->query("SELECT * FROM supplier");

foreach($supplier as $s){
?>

<option value="<?= $s['id_supplier']; ?>"
<?= ($s['id_supplier']==$po['id_supplier'])?'selected':''; ?>>

<?= $s['nama_supplier']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Total</label>
<input type="number"
name="total"
value="<?= $po['total']; ?>"
class="form-control">
</div>

<button class="btn btn-warning" name="update">
Update
</button>

<a href="index.php" class="btn btn-secondary">
Kembali
</a>

</form>

<?php
include("../footer.php");
?>