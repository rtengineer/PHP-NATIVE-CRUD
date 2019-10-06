<?php 
  require_once("../auth.php"); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PT MITRA INTEGRASI DIGITAL</title>
  <link rel="stylesheet" href="../css/prism.css" />
  <link rel="stylesheet" href="../css/cust.css">
</head>
<body>

<nav>
  
  <header>
    <span></span>
    ADMINISTRATOR
    <a></a>
  </header>
  
  <ul>
    <li>Navigation</li>
    <li><a class="active">Dashboard</a></li>
    <li><a>Charts</a></li>
    <li><a href="input_penjualan.php" >Penjualan</a></li>
    <li><a href="master_daftar_penjualan.php">Stock Orders</a></li>
    <li><a href="master_daftar_pengeluaran.php">Pengeluaran</a></li>
    <li><a>Logout</a></li>
  </ul>
  
</nav>

<main>
  
  <h1>Dashboard</h1>
  
  <div class="flex-grid">
    
    <div>
      <h2>Customers</h2>
    </div>
    
    <div>
      <h2>Stock Orders</h2>
    </div>
    
    <div>
      <h2>Pengeluaran</h2>
    </div>
    
  </div>
 
  <div class="flex-grid">
    
    <div class="wrapper">
      <canvas id='c'></canvas>
      <div class="label">PT MITRA INTEGRASI DIGITAL</div>
    </div>
    <!-- <p>Please mouse over the dots</p> -->
    
  </div>
  
</main>

<script src="../js/charts.js"></script>

</body>
</html>

