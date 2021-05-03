<?php
/* include file konfigurasi */
$pdo = new PDO('sqlite:uploads.sqlite');

$name = $_POST['name'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];

$sql = null;
/* operasi tambah atau edit? */
if($aksi) {
	$sql = "INSERT INTO zippy(name)
		VALUES('$name')";
}

$result = $pdo -> exec($sql);

//apakah operasi data sukses?
if($result) {
	echo '<script>alert("Berhasil!!")</script>';
	header('location:index.php');
} else {
	echo '<script>alert("Gagal!")</script>';
	header('location:index.php');
}
sqlite_close();?>
