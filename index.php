<?php
require "koneksi.php";
$crud = new crud();

if(isset($_GET['p'])) $p=$_GET['p'];
else $p='';

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    // session isn't started
    session_start();
  }
  if(!(isset($_SESSION['user']))) header("Location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
    <!--nav-->
    <nav class="navbar navbar-expand-lg" style="background :#fff;">
        <div class="container-fluid">
            <span class="navbar-brand">CRUD BUKU</span>
         <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button> -->
         |
         <div class="collapse navbar-collapse">
           <div class="navbar-nav">
             <a class="nav-item nav-link" href="index.php">Home</a>
            </div>
            |
            <div class="navbar-nav">
             <a class="nav-item nav-link" href="index.php?p=tambah">Tambah Buku</a>
            </div>
            |
            <div class="navbar-nav">
             <a class="nav-item nav-link" href="index.php?p=genre">Genre</a>
            </div>
            |
            <div class="navbar-nav">
             <a class="nav-item nav-link" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');">Logout</a>
           </div>
         </div>
        <form class="form-inline my-2 my-lg-0" action="cari.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari berdasarkan judul" aria-label="Search" name="cari">
            <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button> -->
        </form>
    </div>  
  </nav>  
    <br>
    <div class="container-fluid">
    <?php
          if(empty($p)) 
          { ?>
    <table class="table">
        <thead>
        <?php
           
        ?>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Genre</th>
                <th>Tahun Terbit</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $buku = $crud->read('buku','genre','genre','kdgenre','judul');
                foreach($buku as $rec){
            ?>
            <tr>
                <td><?= $rec['kdbuku']?></td>
                <td><?= $rec['judul']?></td>
                <td><?= $rec['pengarang']?></td>
                <td><?= $rec['penerbit']?></td>
                <td><?= $rec['genre']?></td>
                <td><?= $rec['th_terbit']?></td>
                <td>
                    <a href="index.php?p=update&id=<?=$rec['kdbuku'];?>" class="btn btn-warning">Update</a>
                    |
                    <a href="hapus.php?id=<?=$rec['kdbuku'];?>" class="btn btn-danger" onclick= "return confirm('Apakah data ingin dihapus?');">Hapus</a>
                </td>           
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } 
    elseif($p == 'tambah') include("tambah.php"); 
    elseif($p == 'update') include("update.php"); 
    elseif($p == 'genre') include("genre/genre.php");
    elseif($p == 'updategenre') include("genre/update.php");
    elseif($p == '') include("");
    ?>
    </div>
</body>
</html>