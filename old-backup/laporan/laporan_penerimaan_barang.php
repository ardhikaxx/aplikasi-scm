<?php
include("../navbar.php");
include("../config/koneksi.php");

$data = $conn->query("
SELECT
    pb.id_penerimaan,
    pb.tanggal,
    s.nama_supplier
FROM penerimaan_barang pb
JOIN purchase_order po ON pb.id_po = po.id_po
JOIN supplier s ON po.id_supplier = s.id_supplier
ORDER BY pb.id_penerimaan DESC
");
?>

<h2>Laporan Penerimaan Barang</h2>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Supplier</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($data as $d){ ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['tanggal']; ?></td>
            <td><?= $d['nama_supplier']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>