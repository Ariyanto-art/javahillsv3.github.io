<?php

require '../function.php';

// Login
$username = mysqli_escape_string($koneksi,$_POST['username']);
$password = mysqli_escape_string($koneksi,$_POST['password']);

$check = mysqli_query($koneksi, " SELECT * FROM user WHERE namauser='$username' ");
$hitung = mysqli_fetch_array($check);

if ($hitung) 
{
	if ($password == $hitung['password']) 
	{
		session_start();
		
		$_SESSION['username'] = $hitung['namauser'];
		header('location:dash.php');
	}
	
}
else
{
	echo "<script>alert('Maav Username Anda Tidak Terdaftar'); document.location='../login.php'</script>";
}

?>