<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Update</title>
</head>
<body>
    <?php
    
        $id = $_REQUEST['id'];
        $rec = $crud->readId('buku','kdbuku',$id);
        if(isset($_POST['update'])){
             if(!empty($_POST['judul']) && !empty($_POST['pengarang']) && !empty($_POST['penerbit']) && !empty($_POST['genre']) && !empty($_POST['th_terbit'])){
                    $data['id'] = $id;
                    $data['judul'] = $_POST['judul'];
                    $data['pengarang'] = $_POST['pengarang'];
                    $data['penerbit'] = $_POST['penerbit'];
                    $data['genre'] = $_POST['genre'];
                    $data['th_terbit'] = $_POST['th_terbit'];

                    $update = $crud->update('buku',$data);
                    if($update){
                        echo "<script>alert('update berhasil');</script>";
                        echo "<script>window.location.href='index.php';</script>";
                    }else{
                        echo "<script>alert('update gagal');</script>";
                        echo "<script>window.location.href='index.php';</script>";
                    }
            }
    }
    ?>
    <div class="container">
        <h3 style="font-size: 30px;">Update Buku</h3>
    </div>
    <br>
    <form action="" method="post">
        <div class="container">
            <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" name="kdbuku" value="<?= $rec['kdbuku'];?>" readonly>
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= $rec['judul'];?>">
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" class="form-control" name="pengarang" value="<?= $rec['pengarang'];?>">
            </div>
            <div class="form-group">
                <label>penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $rec['penerbit'];?>">
            </div>
            <div class="form-group">
                <label>Genre</label>
                <select name="genre" class="form-control" aria-label="Default select example" value="<?= $rec['genre'];?>">
                    <option selected>Plih Genre</option>
                    
                    <?php
                    $sort = $crud->sort('genre','genre');
                    foreach($sort as $rec){
                     ?>
                    <option value="<?= $rec['kdgenre'] ?>"><?= $rec['genre']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" class="form-control" name="th_terbit" value="<?= $rec['th_terbit'];?>">
            </div>
            <br>
            <div>
                <a type="submit" class="btn btn-secondary" href="index.php">Kembali</a>
                <input type="submit" class="btn btn-warning" name="update" value="Update">
                <input type="hidden" name="action" value="<?= $action;?>">
            </div>
        </div>
    </form>
</body>
</html>