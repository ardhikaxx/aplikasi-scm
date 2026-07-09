<?php
include("../navbar.php");
include("../config/koneksi.php");

if(isset($_POST['simpan'])){

    $id_po = $_POST['id_po'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO penerimaan_barang
            (id_po, tanggal, keterangan)
            VALUES
            (:id_po, :tanggal, :keterangan)";

    $query = $conn->prepare($sql);

    $query->execute([
        ':id_po' => $id_po,
        ':tanggal' => $tanggal,
        ':keterangan' => $keterangan
    ]);

    echo "<script>
        alert('Data penerimaan berhasil ditambahkan');
        window.location='index.php';
    </script>";
}
?>

<h2>Tambah Penerimaan Barang</h2>

<form method="POST">

<div class="mb-3">
    <label>Purchase Order</label>

    <select name="id_po" class="form-control" required>

        <option value="">-- Pilih Purchase Order --</option>

        <?php

        $po = $conn->query("
        SELECT po.id_po, s.nama_supplier
        FROM purchase_order po
        JOIN supplier s
        ON po.id_supplier = s.id_supplier
        ORDER BY po.id_po DESC
        ");

        foreach($po as $p){

        ?>

        <option value="<?= $p['id_po']; ?>">
            PO-<?= $p['id_po']; ?> | <?= $p['nama_supplier']; ?>
        </option>

        <?php } ?>

    </select>

</div>

<div class="mb-3">
    <label>Tanggal Penerimaan</label>

    <input
        type="date"
        name="tanggal"
        class="form-control"
        value="<?= date('Y-m-d'); ?>"
        required>
</div>

<div class="mb-3">
    <label>Keterangan</label>

    <textarea
        name="keterangan"
        class="form-control"
        rows="3"></textarea>
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