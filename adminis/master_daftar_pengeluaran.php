<?php
require_once("../config.php");
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
	$pdo_statement = $db->prepare("SELECT * FROM pengeluaran ORDER BY id_pembelian DESC");
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div class="header">
	<br>
				<h2>PT MITRA INTEGRASI DIGITAL</h2>
                <h4>Order Stock : </h4>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-striped table-hover">
				<thead>
				<tr>
						<th>ID Barang</th>
						<th>Nama Pembeli </th>
						<th>No Handphone</th>
						<th>Jumlah Pembelian</th>
                        <th>Nama Barang</th>
						<th>Check Harga</th>
				</tr>
				</thead>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id_pembelian"]; ?></td>
		<td><?php echo $row["nama_pembeli"]; ?></td>
		<td><?php echo $row["no_handphone"]; ?></td>
		<td><?php echo $row["jumlah_pembelian"]; ?>
        <td><?php echo $row["jenis_pembelian"]; ?></td></td>
		<td>

			<a class="ajax-action-links" href='master_daftar_penjualan.php'><button class='btn btn-success' title="Delete">Check Now</button></a>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
</body>
</html>