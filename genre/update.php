<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Update</title>
</head>
<body>
    <?php
    
        $id = $_REQUEST['id'];
        $rec = $crud->readId('genre','kdgenre',$id);
        if(isset($_POST['update'])){
                if(!empty($_POST['genre'])){
                    $data['id'] = $id;
                    $data['genre'] = $_POST['genre'];

                    $update = $crud->updateGenre('genre',$data);
                    if($update){
                        echo "<script>alert('update berhasil');</script>";
                        echo "<script>window.location.href='../index.php?p=genre';</script>";
                    }else{
                        echo "<script>alert('update gagal');</script>";
                        echo "<script>window.location.href='../index.php?p=genre';</script>";
                    }
                }
        }
    ?>
    <div class="container">
        <h3 style="font-size: 30px;">Update Genre</h3>
    </div>
    <br>
    <form action="" method="post">
        <div class="container">
            <div class="form-group">
                <label>Id</label>
                <input type="text" class="form-control" name="kdbuku" value="<?= $rec['kdgenre'];?>" readonly>
            </div>
            <div class="form-group">
                <label>Genre</label>
                <input type="text" class="form-control" name="genre" value="<?= $rec['genre'];?>">
            </div>
            <br>
            <div>
                <a type="submit" class="btn btn-secondary" href="index.php?p=genre">Kembali</a>
                <input type="submit" class="btn btn-warning" name="update" value="Update">
                <input type="hidden" name="action" value="<?= $action;?>">
            </div>
        </div>
    </form>
</body>
</html>