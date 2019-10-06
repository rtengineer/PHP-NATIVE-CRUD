<?php
require_once("../config.php");

$sql = 'SELECT thn_byr, id_pelanggan, id_produk, SUM(jml_byr) AS jml_byr 
		FROM `sales` 
		GROUP BY thn_byr, id_pelanggan, id_produk';
$stmt = $db->prepare($sql);
$stmt->execute();

echo '<html>
		<head>
			<title>Menghitung Total dan Sub Total Dengan PHP</title>
			<style>
				body {font-family:tahoma, arial}
				table {border-collapse: collapse}
				th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
				th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
				.subtotal td {background: #F8F8F8}
				.right{text-align: right}
			</style>
		</head>
		<body>';

function format_ribuan ($nilai){
	return number_format ($nilai, 0, ',', '.');
}

// Ubah hasil query menjadi associative array dan simpan kedalam variabel result
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<table>
		<thead>
			<tr>
				<th>TAHUN</th>
				<th>ID PELANGGAN</th>
				<th>ID PRODUK</th>
				<th>TOTAL</th>
			</tr>
		</thead>
		<tbody>';
		
$subtotal_plg = $subtotal_thn = $total = 0;
foreach ($result as $key => $row)
{
	$subtotal_plg += $row['jml_byr'];
	$subtotal_thn += $row['jml_byr'];
	echo '<tr>
			<td>'.$row['thn_byr'].'</td>
			<td>'.$row['id_pelanggan'].'</td>
			<td>'.$row['id_produk'].'</td>
			<td class="right">'.format_ribuan($row['jml_byr']).'</td>
		</tr>';
	
	// SUB TOTAL per id_pelanggan
	if (@$result[$key+1]['id_pelanggan'] != $row['id_pelanggan']) {
		echo '<tr class="subtotal">
			<td></td>
			<td>SUB TOTAL</td>
			<td></td>
			<td class="right">'.format_ribuan($subtotal_plg).'</td>
		</tr>';
		$subtotal_plg = 0;
	}
	
	// SUB TOTAL per thn_br
	if (@$result[$key+1]['thn_byr'] != $row['thn_byr']) {
		echo '<tr class="subtotal">
			<td></td>
			<td>SUB TOTAL ' . $row['thn_byr'] . '</td>
			<td></td>
			<td class="right">'.format_ribuan($subtotal_thn).'</td>
		</tr>';
		$subtotal_thn = 0;
	} 
	$total += $row['jml_byr'];
}

echo '<tr class="total">
		<td></td>
		<td>GRAND TOTAL</td>
		<td></td>
		<td class="right"> ' . format_ribuan($total) . '</td>
	</tr>
	</tbody>
</table>
</body>
</html>';