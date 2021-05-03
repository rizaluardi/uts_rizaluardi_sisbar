<?php
/* include file konfigurasi */
$dir = 'sqlite:uploads.db';
$db = new PDO($dir) or die("cannot open the database");

$name = $_POST['name'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;
/* operasi tambah atau edit? */
if($aksi) {
	$sql = "INSERT INTO book(title,price,writer)
		VALUES('$title','$price','$writer')";
}

$result = $db -> exec($sql);

//apakah operasi data sukses?
if($result) {
	echo '<script>alert("Berhasil!!")</script>';
	header('location:index.php');
} else {
	echo '<script>alert("Gagal!")</script>';
	header('location:index.php');
}
sqlite_close();?>
