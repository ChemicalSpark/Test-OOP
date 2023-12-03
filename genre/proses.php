<?php 
include "../koneksi.php";
$crud = new crud();

if($_POST['simpan']){
	$arr = array(
		'kdgenre'=>$_POST['kdgenre'],
		'genre'=>$_POST['genre']);
	$hasil = $crud->create('genre',$arr);
}
if($hasil){
	 echo "<script>alert('berhasil ditambahkan');</script>";
     echo "<script>window.location.href='../index.php?p=genre';</script>";
}else{
	 echo "<script>alert('gagal ditambahkan');</script>";
     echo "<script>window.location.href='../index.php?p=genre';</script>";
}
?>
