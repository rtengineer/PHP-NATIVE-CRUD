<?php

require_once("../config.php");

if(isset($_POST['Penjualan'])){

    // filter data yang diinputkan
    $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_SANITIZE_STRING);
    $nama_barang = filter_input(INPUT_POST, 'nama_barang', FILTER_SANITIZE_STRING);
    $harga_barang = filter_input(INPUT_POST, 'harga_barang', FILTER_SANITIZE_STRING);
    $stock_barang = filter_input(INPUT_POST, 'stock_barang', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO penjualan (id_barang, nama_barang, harga_barang, stock_barang) 
            VALUES (:id_barang, :nama_barang, :harga_barang, :stock_barang)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":id_barang" => $id_barang,
        ":nama_barang" => $nama_barang,
        ":harga_barang" => $harga_barang,
        ":stock_barang" => $stock_barang
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: ../adminis/timeline.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT MITRA INTEGRASI DIGITAL</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <h4>PT MITRA INTEGRASI DIGITAL</h4>
        <p>Tambahkan Stock Barang : </p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="id_barang">ID Barang</label>
                <input class="form-control" type="text" name="id_barang" placeholder="Identitas barang" />
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang" />
            </div>

            <div class="form-group">
                <label for="harga_barang">Harga Barang</label>
                <input class="form-control" type="text" name="harga_barang" placeholder="Harga Barang" />
            </div>

            <div class="form-group">
                <label for="stock_barang">Stock Barang</label>
                <input class="form-control" type="text" name="stock_barang" placeholder="Stock Barang" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="Penjualan" value="Masukan Barang" />

        </form>
            
        </div>

    </div>
</div>

</body>
</html>