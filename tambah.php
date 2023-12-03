
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah Buku</title>
</head>
<body>
<div class="container">
        <h3 style="font-size: 30px;">Tambah Buku</h3>
    </div>
    <br>
    <form action="proses.php" method="post">
        <div class="container">
           <!--  <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" name="id_buku" placeholder="Id Buku" readonly>
            </div> -->
            <div class="form-group">
                <label>Judul :</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
            </div>
            <div class="form-group">
                <label>Pengarang :</label>
                <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang">
            </div>
            <div class="form-group">
                <label>Penerbit :</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit">
            </div>
            <div class="form-group">
                <label>Genre :</label>
                <select name="genre" class="form-control" aria-label="Default select example">
                    <option selected>Plih Genre</option>
                    
                    <?php
                    $sort = $crud->sort('genre','genre');
                    foreach($sort as $rec){
                     ?>
                    <option value="<?= $rec['kdgenre'] ?>"><?= $rec['genre']?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun Terbit :</label>
                <input type="number" class="form-control" name="th_terbit" id="th_terbit" placeholder="Tahun Terbit">
            </div>
            
            <br>
            <div>
                <!-- <a type="submit" class="btn btn-secondary" href="index.php">Kembali</a> -->
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                <!-- <input type="reset" name="Reset" value="Reset"> -->
            </div>
        </div>
    </form>
</body>
</html>  