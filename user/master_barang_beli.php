<?php

require_once("../config.php");

if(isset($_POST['addnow'])){

     // filter data yang diinputkan
     $nama_pembeli = filter_input(INPUT_POST, 'nama_pembeli', FILTER_SANITIZE_STRING);
     $jenis_pembelian = filter_input(INPUT_POST, 'jenis_pembelian', FILTER_SANITIZE_STRING);
     $no_handphone = filter_input(INPUT_POST, 'no_handphone', FILTER_SANITIZE_STRING);
     $jumlah_pembelian = filter_input(INPUT_POST, 'jumlah_pembelian', FILTER_SANITIZE_STRING);
     


    // menyiapkan query
    $sql = "INSERT INTO pengeluaran (nama_pembeli, jenis_pembelian, no_handphone, jumlah_pembelian) 
            VALUES (:nama_pembeli, :jenis_pembelian, :no_handphone, :jumlah_pembelian)";
    $stmt = $db->prepare($sql);

      // bind parameter ke query
      $params = array(
        ":nama_pembeli" => $nama_pembeli,
        ":jenis_pembelian" => $jenis_pembelian,
        ":no_handphone" => $no_handphone,
        ":jumlah_pembelian" => $jumlah_pembelian
        );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: product.php");
}

?>
<?php
//getting id from url
$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : '';
 
//selecting data associated with this particular id
$sql = "SELECT * FROM penjualan WHERE id_barang=:id_barang";
$query = $db->prepare($sql);
$query->execute(array(':id_barang' => $id_barang));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $nama_barang = $row['nama_barang'];
    $harga_barang = $row['harga_barang'];
    $stock_barang = $row['stock_barang'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Edit Barang</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-12">
    <div class="row">
        <div class="col-md-12">
        <br>

        <h4>PT MITRA INTEGRASI DIGITAL</h4>
    
    <form name="form1" method="post" action="">
        <table border="0">
        <tr>

            <tr>
            <tr>
            <br>
            <div class="form-group">
            <td>Harga  : </td>
                <td><input class="form-control" type="text" for="id_pembelian" name="id_pembelian" <?php if(!empty($harga_barang)) echo "value='".$harga_barang."' " ?>></td>
            </tr>
            <tr>
            </div>
                <td>Nama Barang : </td>
                <td><input class="form-control" type="text" name="jenis_pembelian" <?php if(!empty($nama_barang)) echo "value='".$nama_barang."' " ?>></td>
            </div></tr>
            <tr>
            <div class="form-group">
                <td>Jumlah : </td>
                <td><input class="form-control" type="text" name="jumlah_pembelian"></td>
            </div></tr>
            <tr>
            <div class="form-group">
                <td>Nama Pemesan : </td>
                <td><input class="form-control" type="text" name="nama_pembeli"></td>
            </div></tr>
            <tr>
            <div class="form-group">
                <td>No Handphone : </td>
                <td><input class="form-control" type="text" name="no_handphone"></td>
            </div></tr>
            <tr>
            <div class="form-group">
                <td><input class="btn btn-success btn-block" type="submit" name="addnow" value="Beli Sekarang"></td>
            </div></tr>
        </table>
    </form>
    </div>
    </div>
</body>
</html>