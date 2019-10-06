<?php
include '../config.php';
// menyimpan data kedalam variabel
$id_barang          = $_POST['id_barang'];
$nama_barang        = $_POST['nama_barang'];
$harga_barang       = $_POST['harga_barang'];
$stock_barang      = $_POST['stock_barang'];
$status             = $_POST['status'];
// query SQL untuk insert data
$query="UPDATE penjualan SET nama_barang='$nama_barang',harga_barang='$harga_barang',stock_barang='$stock_barang', where id_barang='$id_barang'";
mysqli_query($db, $query);
// mengalihkan ke halaman index.php
header("location:daftar_penjualan.php");
?>