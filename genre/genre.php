<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Genre </title>
</head>
<body>
<div class="container">
        <h3 style="font-size: 30px;">Genre Buku</h3>
    </div>
    <br>
    <form action="genre/proses.php" method="post">
        <div class="container">
           <!--  <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" name="id_buku" placeholder="Id Buku" readonly>
            </div> -->
            <div class="form-group">
                <label>Genre :</label>
                <input type="text" class="form-control" name="genre" id="genre" placeholder="Genre">
            </div>
            
            <br>
            <div>
                <!-- <a type="submit" class="btn btn-secondary" href="../index.php">Kembali</a> -->
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                <!-- <input type="reset" name="Reset" value="Reset"> -->
            </div>
        </div>
    </form>
    <br>
    <div class="container-fluid">
    <table class="table">
        <thead style="thead-dark">
            <tr>
                <th>Kode Genre</th>
                <th>Genre</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                $buku = $crud->sort('genre','genre');
                foreach($buku as $rec){
            ?>
            <tr>
                <td><?= $rec['kdgenre']?></td>
                <td><?= $rec['genre']?></td>
                <td>
                    <a href="index.php?p=updategenre&id=<?=$rec['kdgenre'];?>" class="btn btn-warning">Update</a>
                    <a href="genre/hapus.php?id=<?=$rec['kdgenre'];?>" class="btn btn-danger" onclick= "return confirm('Apakah data ingin dihapus?');">Hapus</a>
                </td>           
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>  