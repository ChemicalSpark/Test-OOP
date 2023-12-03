<?php 
include "koneksi.php";
$crud = new crud();

if($_POST['simpan']){
	$arr = array(
		'kdbuku'=>$_POST['kdbuku'],
		'judul'=>$_POST['judul'], 
		'pengarang'=>$_POST['pengarang'], 
		'penerbit'=>$_POST['penerbit'], 
		'genre'=>$_POST['genre'],
        'th_terbit'=>$_POST['th_terbit']);
	$hasil = $crud->create('buku',$arr);
}
if($hasil){
	 echo "<script>alert('berhasil ditambahkan');</script>";
     echo "<script>window.location.href='index.php';</script>";
}else{
	 echo "<script>alert('gagal ditambahkan');</script>";
     echo "<script>window.location.href='index.php';</script>";
}
?>
