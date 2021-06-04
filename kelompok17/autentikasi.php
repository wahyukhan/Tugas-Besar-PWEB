<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE nama='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 if($data['tipe']==1){
  $_SESSION['nama'] = $username;
  $_SESSION['tipe'] = 1;
  header("location:dmahasiswa.php");

 }else if($data['tipe']==2){
  $_SESSION['nama'] = $username;
  $_SESSION['tipe'] = 2;
  header("location:haluser.php?id=".$data['id']."");

 }else{
  header("location:index.php?pesan=gagal");
 } 
}else{
 header("location:index.php?pesan=gagal");
}

?>