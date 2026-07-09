<?php
include("../config/koneksi.php");
include("../navbar.php");

$supplier = $conn->query("SELECT COUNT(*) FROM supplier")->fetchColumn();
$produk   = $conn->query("SELECT COUNT(*) FROM produk")->fetchColumn();
$po       = $conn->query("SELECT COUNT(*) FROM purchase_order")->fetchColumn();
$stok     = $conn->query("SELECT COALESCE(SUM(stok),0) FROM produk")->fetchColumn();
?>
<h2>Dashboard</h2>
<hr>
<div class="row">
<div class="col-md-3">
<div class="card text-white bg-primary mb-3">
<div class="card-body">
<h5>Supplier</h5>
<h2><?= $supplier ?></h2>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card text-white bg-success mb-3">
<div class="card-body">
<h5>Produk</h5>
<h2><?= $produk ?></h2>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card text-white bg-warning mb-3">
<div class="card-body">
<h5>Purchase Order</h5>
<h2><?= $po ?></h2>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card text-white bg-danger mb-3">
<div class="card-body">
<h5>Total Stok</h5>
<h2><?= $stok ?></h2>
</div>
</div>
</div>
</div>
<?php
include("../footer.php");
?>