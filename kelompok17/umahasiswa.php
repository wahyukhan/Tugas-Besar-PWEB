<?php 
require 'koneksi.php';
$id = $_GET["id"];
$data = query("SELECT * FROM mahasiswa WHERE id = '$id'")[0];
if (isset($_POST["submit"])) {
    if (ubah1($_POST) > 0) {
        echo "
        <script>
            alert ('data berhasil diubah!');
            document.location.href = 'dmahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('data gagal diubah!');
            document.location.href = 'umahasiswa.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="stylenav.css">
</head>
<body>
	 <?php
	 session_start();
	 if($_SESSION['tipe']==""){
	  header("location:index.php?pesan=gagal");
	 }
	 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top ml-5 justify-content-center">
	<a class="navbar-brand px-3" >Selamat Datang Mr. <?php echo $_SESSION['nama']; ?> || <b>Universitas Nun Jauh Disana</b></a>
</nav>
<div class="row no-gutters mt-4 ">
	<div class="col-md-2 bg-dark pr-4 pt-3">
		<ul class="nav flex-column ml-3 mb-5 px-3 mt-4">
		  <li class="nav-item">
		  	<a class="nav-link active text-white" aria-current="page" href="dmahasiswa.php">Daftar Mahasiswa</a>
		  	<hr class="bg-light">
		  </li>
		  <li class="nav-item">
		  	<a class="nav-link active text-white " aria-current="page" href="dkelas.php">Daftar Kelas</a>
		  	<hr class="bg-light">
		  </li>
		  <li class="nav-item">
		    <a class="nav-link text-warning" href="logout.php">Logout</a><hr class="bg-light">
		  </li>
		</ul>
	</div>

	<div class="col-md-10 p-5 pt-5">
		<h3>Ubah Data Mahasiswa</h3><hr>
		<form method="post" action="" class="pt-3" style="width: 50%; font-weight: bold">
		  <div class="mb-3 " >
		    <label class="form-label">ID</label>
		    <input type="text" class="form-control" name="id"  value="<?= $data["id"]; ?>" readonly>
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Nama</label>
		    <input type="text" class="form-control" name="nama"  required="required" value="<?= $data["nama"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">NIM</label>
		    <input type="text" class="form-control" name="nim"  required="required" value="<?= $data["nim"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="text" class="form-control" name="email" required="required" value="<?= $data["email"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Tipe</label>
		    <input type="text" class="form-control" name="tipe" value="2" readonly value="<?= $data["tipe"]; ?>">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="text" class="form-control" name="password" required="required" value="<?= $data["password"]; ?>">
		  </div>
		  <button type="submit" class="btn btn-warning" name="submit" style="width: 49%">Submit</button>
		  <button type="reset" class="btn btn-danger" name="reset" style="width: 49%">Kosongkan</button>
		</form>
		
	</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>