<?php  
$server="localhost";
$dbusername="root";
$dbpassword=""; //tanpa spasi
$dbname="crudbuku";

$koneksi = mysqli_connect($server,$dbusername,$dbpassword,$dbname);
?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS yang sudah di pindah ke lokal, tidak lagi membutuhkan akses online-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Cari</title>
  </head>
  <body>

<!--Nav-->
    <nav class="navbar navbar-expand-lg" style="background :#fff;">
        <div class="container-fluid">
            <span class="navbar-brand">CRUD BUKU</span>
         <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button> -->
         |
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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

<!--
<div class="container mb-10" style="padding : 20px; ">
    
        <form class=" " action="" method="post">
            <div class="form-group row mx-sm-3">
                <input name="cari" style="" class="form-control form-control-lg" type="search" <?php if(isset($_POST['cari'])) { ?> value="<?= $_POST['cari'] ?>" <?php } else { ?> placeholder="Silahkan cari di sini" <?php } ?> >
                    <button class="btn btn-navbar" type="submit">Cari</button>
            </div>
        </form>
  
 -->
</div>
<div class="container-fluid">
            <br>
        <table class="table">
        <thead>
            <tr>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Genre</th>
            <th>Tahun Tebit</th>
            <th>Menu</th>
            
            </tr>
        </thead>
        <tbody>
            <?php 
           
            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $qrec = mysqli_query($koneksi,"SELECT * FROM buku LEFT JOIN genre ON buku.genre = genre.kdgenre WHERE judul LIKE '%$cari%' ");
              
            $no = 1;
           // $qrec = mysqli_query($koneksi, "SELECT * FROM `produk` LEFT JOIN kategori 
            //ON produk.kategori = kategori.kd_kategori");

                //SELECT * FROM produk
                //SELECT * FROM produk, kategori WHERE produk.kategori = kategori.kd_kategori
                //SELECT * FROM `produk` LEFT JOIN kategori ON produk.kategori = kategori.kd_kategori 
                //SELECT * FROM `produk` INNER JOIN kategori ON produk.kategori = kategori.kd_kategori 


                while ($rec = mysqli_fetch_array($qrec)){            
            ?>
            <tr>
                <td><?= $rec['kdbuku'] ?></td>
                <td><?= $rec['judul'] ?></td>
                <td><?= $rec['pengarang'] ?></td>
                <td><?= $rec['penerbit'] ?></td>
                <td><?= $rec['genre'] ?></td>
                <td><?= $rec['th_terbit'] ?></td>
                <td>
                    <a href="index.php?p=update&id=<?= $rec['kdbuku'];?>" class="btn btn-warning">Update</a>
                    |
                    <a href="hapus.php?id=<?= $rec['kdbuku'];?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
            <?php } ?>
        </table>
        </div>
</body>
</html>