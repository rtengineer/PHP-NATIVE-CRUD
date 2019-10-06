<?php
// including the database connection file
include_once("../config.php");
 
if(isset($_POST['update']))
{    
     // filter data yang diinputkan
     $id_barang = filter_input(INPUT_POST, 'id_barang', FILTER_SANITIZE_STRING);
     $nama_barang = filter_input(INPUT_POST, 'nama_barang', FILTER_SANITIZE_STRING);
     $harga_barang = filter_input(INPUT_POST, 'harga_barang', FILTER_SANITIZE_STRING);
     $stock_barang = filter_input(INPUT_POST, 'stock_barang', FILTER_SANITIZE_STRING);
    
    
        //updating the table
        // menyiapkan query
        $sql = "UPDATE penjualan (id_barang, nama_barang, harga_barang, stock_barang) 
            SET (:id_barang, :nama_barang, :harga_barang, :stock_barang)";
        $stmt = $db->prepare($sql);
        $sql = "UPDATE penjualan SET nama_barang=:nama_barang, harga_barang=:harga_barang, stock_barang=:stock_barang WHERE id_barang=:id_barang";
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
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: timeline.php");
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
            
            <div class="form-group">
                <td>Nama Barang : </td>
                <td><input class="form-control" type="text" name="nama_barang" <?php if(!empty($nama_barang)) echo "value='".$nama_barang."' " ?>></td>
            </div>
            <tr>
            <tr>
            <br>

            <div class="form-group">
                <td>Harga Barang : </td>
                <td><input class="form-control" type="text" name="harga_barang" <?php if(!empty($harga_barang)) echo "value='".$harga_barang."' " ?>></td>
            </div>
            <tr>
            <tr>

            <div class="form-group">
                <td>Stock Barang : </td>
                <td><input class="form-control" type="text" name="stock_barang" <?php if(!empty($stock_barang)) echo "value='".$stock_barang."' " ?>></td>
            </div>
            <tr>
            <tr>

            <div class="form-group">
                <td><input type="hidden" name="id_barang" value=<?php echo $id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : ''?>></td>
                <td><input class="btn btn-success btn-block" type="submit" name="update" value="Update"></td>
            </div>
        </table>
    </form>
    </div>
    </div>
</body>
</html>