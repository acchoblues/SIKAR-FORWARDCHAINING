<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:login.php?error=Username dan Password Kosong');
	
} else if (empty($username)) {
	header('location:login.php?error=Username Kosong');
	
} else if (empty($password)) {
	header('location:login.php?error=Password Kosong');
	
}

$q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['fullname'] = $row['fullname'];
	$_SESSION['level'] = $row['level'];
    
    header('location:admin/index.php');
    /** if ($level == "Ketua"){
        header('location:admin/index.php');
    } else if ($level == "Admin"){
        header('location:admin/index.php');
    } else if ($level == "Pengurus"){
        header('location:admin/index.php');
    } else if ($level == "Anggota"){
        header('location:admin/index.php');
    } **/
	
} else {
	header('location:login.php?error=Anda belum terdaftar');
}
?>