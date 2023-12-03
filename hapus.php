<?php
include "koneksi.php";
$crud = new crud();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hasil = ($crud->delete('buku','kdbuku',$id));

    if($hasil){
         echo "<script>alert('berhasil hapus');</script>";
         echo "<script>window.location.href='index.php';</script>";
    }else{
         echo "<script>alert('gagal hapus');</script>";
         echo "<script>window.location.href='index.php';</script>";
    }
}
?>