<?php
require_once("../config.php");
// menyimpan data id kedalam variabel

$pdo_statement=$db->prepare("DELETE from penjualan where id_barang=" . $_GET['id_barang']);
$pdo_statement->execute();

// mengalihkan ke halaman index.php
header("location:master_daftar_penjualan.php");
?>
