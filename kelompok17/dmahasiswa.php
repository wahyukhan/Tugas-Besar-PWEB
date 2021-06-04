<?php 
require 'koneksi.php';
$data = query("SELECT * FROM mahasiswa WHERE tipe= 2 ORDER BY nim ASC");

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

	<div class="col-md-10 p-5 pt-1">
		<div class="d-flex justify-content-between mt-5">
			<h3>Daftar Mahasiswa</h3>
			<a href="tmahasiswa.php" class="btn btn-primary text-center rounded-pill" style="width: 200px">Tambah</a>
		</div><hr>
		<table class="table table-bordered table-striped">
				<tr>
					<th>No.</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>Email Mahasiswa</th>
					<th>Password</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($data as $row) : ?>
				<tr>
					<td><?= $i++;?></td>
	                <td><?= $row["nama"]; ?></td>
	                <td><?= $row["nim"]; ?></td>
	                <td><?= $row["email"]; ?></td>
	                <td><?= $row["password"]; ?></td>
	                <td>
	                	<a href="umahasiswa.php?id=<?= $row["id"]; ?>" class="btn btn-warning rounded-pill">Ubah</a>
	                	<a href="hmahasiswa.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin?')" class="btn btn-danger rounded-pill">Hapus</a>
	                </td>
				</tr>
				<?php endforeach; ?>
			</table>
	</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>