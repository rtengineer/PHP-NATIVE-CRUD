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
						<th>ID Barang</th>
						<th>Nama Barang </th>
						<th>Harga Barang</th>
						<th>Stock Barang</th>
						<th>Status</th>
						<th>Pengaturan</th>
				</tr>
				</thead>
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id_barang"]; ?></td>
		<td><?php echo $row["nama_barang"]; ?></td>
		<td><?php echo $row["harga_barang"]; ?></td>
		<td><?php echo $row["stock_barang"]; ?></td>
		<td><?php echo $row["status"]; ?></td>
		<td>

			<a class="ajax-action-links" href='master_barang_edit.php?id_barang=<?php echo $row['id_barang']; 
			?>'><button class='btn btn-success' title="Delete">Edit</button></a>
			
			<a class="ajax-action-links" href='master_barang_delete.php?id_barang=<?php echo $row['id_barang']; 
			?>'><button class='btn btn-success' title="Delete">Delete</button></a></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>
</body>
</html>