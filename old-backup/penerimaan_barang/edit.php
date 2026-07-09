<?php
include("../navbar.php");
include("../config/koneksi.php");

$id = $_GET['id'];

$data = $conn->query("SELECT * FROM penerimaan_barang WHERE id_penerimaan=$id");
$p = $data->fetch();

if(isset($_POST['update'])){

    $id_po = $_POST['id_po'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE penerimaan_barang
            SET id_po=:id_po,
                tanggal=:tanggal,
                keterangan=:keterangan
            WHERE id_penerimaan=:id";

    $query = $conn->prepare($sql);

    $query->execute([
        ':id_po'=>$id_po,
        ':tanggal'=>$tanggal,
        ':keterangan'=>$keterangan,
        ':id'=>$id
    ]);

    echo "<script>
    alert('Data penerimaan berhasil diupdate');
    window.location='index.php';
    </script>";
}
?>

<h2>Edit Penerimaan Barang</h2>

<form method="POST">

<div class="mb-3">
<label>Purchase Order</label>

<select name="id_po" class="form-control">

<?php

$po = $conn->query("
SELECT po.id_po, s.nama_supplier
FROM purchase_order po
JOIN supplier s
ON po.id_supplier=s.id_supplier
");

foreach($po as $d){

?>

<option value="<?= $d['id_po']; ?>"
<?= ($d['id_po']==$p['id_po']) ? 'selected' : ''; ?>>

PO-<?= $d['id_po']; ?> | <?= $d['nama_supplier']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label>Tanggal</label>

<input
type="date"
name="tanggal"
value="<?= $p['tanggal']; ?>"
class="form-control">

</div>

<div class="mb-3">

<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"><?= $p['keterangan']; ?></textarea>

</div>

<button
class="btn btn-warning"
name="update">

Update
</button>

<a href="index.php"
class="btn btn-secondary">

Kembali
</a>
</form>
<?php include("../footer.php"); ?>