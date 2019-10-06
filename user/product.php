<?php

require_once("../config.php");

if(isset($_POST['belisekarang'])){

    // filter data yang diinputkan
    $nama_barang = filter_input(INPUT_POST, 'nama_barang', FILTER_SANITIZE_STRING);
	$harga_barang = filter_input(INPUT_POST, 'harga_barang', FILTER_SANITIZE_STRING);
	$stock_barang = filter_input(INPUT_POST, 'stock_barang', FILTER_SANITIZE_STRING);
	$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $sql = "INSERT INTO penjualan (nama_barang, harga_barang, jumlah_barang) 
            VALUES (:nama_barang, :harga_barang, :jumlah_barang)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":nama_barang" => $nama_barang,
        ":harga_barang" => $harga_barang,
        ":jumlah_barang" => $jumlah_barang,
        ":status" => $status
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: product.php");
}

?>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<script src="../js/bootstrap.min.js"></script>
</head>
<title>PT MITRA INTEGRASI DIGITAL</title>

</head>
<body>
<?php	
	$pdo_statement = $db->prepare("SELECT * FROM penjualan ORDER BY id_barang DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div class="header">
	<br>
				<h2>PT MITRA INTEGRASI DIGITAL</h2>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-striped table-hover">
				<thead>
				<tr>
						<th>Nama Barang </th>
						<th>Harga Barang</th>
						<th>Stock Barang</th>
				</tr>
				</thead>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["nama_barang"]; ?></td>
		<td><?php echo $row["harga_barang"]; ?></td>
		<td><?php echo $row["stock_barang"]; ?></td>
		<td>

			<a class="ajax-action-links" href='master_barang_beli.php?id_barang=<?php echo $row['id_barang']; 
			?>'><button class='btn btn-success' name="belisekarang" title="Beli">add to Chart</button></a>

	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
</body>
</html>