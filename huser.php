<!DOCTYPE html>
<html>
<head>
 <title>Halaman Pimpinan</title>
</head>
<body>
 <?php
 session_start();
 if($_SESSION['tipe']==""){
  header("location:index.php?pesan=gagal");
 }
 ?>

 
 <h1>Halaman Pengguna Biasa</h1>
 <p>Halo <b><?php echo $_SESSION['nama']; ?><br>
 <a href="logout.php">LOGOUT</a>

 <br/>
 <br/>

</body>
</html>