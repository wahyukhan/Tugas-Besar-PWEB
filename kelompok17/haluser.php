<?php 
require 'koneksi.php';
$id = $_GET["id"];
$data1 = query("SELECT kelas.id, kelas.kode_kelas, kelas.kode_makul, kelas.nama_makul, kelas.tahun, kelas.semester, kelas.sks
				FROM kelas, krs 
				WHERE kelas.id = krs.kelas_id
				AND mahasiswa_id = '$id'");

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
		    <a class="nav-link text-warning" href="logout.php">Logout</a><hr class="bg-light">
		  </li>
		</ul>
	</div>

	<div class="col-md-10 p-5 pt-1">
		<div class="d-flex justify-content-between mt-5">
			<h3>Daftar Kelas</h3>
		</div><hr>
		<table class="table table-bordered table-striped">
				<tr>
					<th>No.</th>
					<th>Kode Kelas</th>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>Tahun</th>
					<th>Semester</th>
					<th>Sks</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($data1 as $row) : ?>
				<tr>
					<td><?= $i++;?></td>
	                <td><?= $row["kode_kelas"]; ?></td>
	                <td><?= $row["kode_makul"]; ?></td>
	                <td><?= $row["nama_makul"]; ?></td>
	                <td><?= $row["tahun"]; ?></td>
	                <td><?= $row["semester"]; ?></td>
	                <td><?= $row["sks"]; ?></td>
	                <td>
	                	<a href="kuser.php?id=<?= $row["id"]; ?>" class="btn btn-dark rounded-pill">Lihat</a>
	                </td>
				</tr>
				<?php endforeach; ?>
			</table>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>