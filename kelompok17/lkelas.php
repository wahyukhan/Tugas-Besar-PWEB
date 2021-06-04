
<?php 
require 'koneksi.php';
$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id = '$id'");
$data = mysqli_fetch_array($query);
$data1 = query("SELECT * FROM pertemuan WHERE kelas_id = '$id'");
$data2 = query("SELECT krs.id, mahasiswa.nama, mahasiswa.nim, mahasiswa.email FROM mahasiswa 
				JOIN krs ON mahasiswa.id=krs.mahasiswa_id
				JOIN kelas ON krs.kelas_id=kelas.id where kelas.id='$id' ");
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
			<h3>Detail Kelas <?php echo $data['kode_kelas']; ?> <?php echo $data['nama_makul']; ?></h3>
			
		</div><hr>
     <div class="content" >
        <table class="table-form" style="font-weight: bold; font-size: 18px" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">Kode Kelas</td>
                <td width="1%">:</td>
                <td><?php echo $data['kode_kelas']; ?></td>
            </tr>
            <tr>
                <td>Kode Matakuliah</td>
                <td width="1%">:</td>
                <td><?php echo $data['kode_makul']; ?></td>
            </tr>
            <tr>
                <td>Nama Matakuliah</td>
                <td width="1%">:</td>
                <td><?php echo $data['nama_makul']; ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td width="1%">:</td>
                <td><?php echo $data['tahun']; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td width="1%">:</td>
                <td><?php echo $data['semester']; ?></td>
            </tr>
            <tr>
                <td>Sks</td>
                <td width="1%">:</td>
                <td><?php echo $data['sks']; ?></td>
            </tr>
        </table>
        <div class="pt-5">
        	<a href="tpeserta.php?id=<?php echo $data['id']; ?>" class="btn btn-primary text-center rounded-pill" style="width: 200px">Tambah Mahasiswa</a>
			<a href="tpertemuan.php?id=<?php echo $data['id']; ?>" class="btn btn-primary text-center rounded-pill" style="width: 200px">Tambah Pertemuan</a>
		</div><hr>
		<div class="d-flex justify-content-between mt-5">
			<h3>Daftar Mahasiswa</h3>
		</div><hr>
		<table class="table table-bordered table-striped" style="width: 50%">
				<tr>
					<th>No.</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>Email</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($data2 as $row) : ?>
				<tr>
					<td><?= $i++;?></td>
	                <td><?= $row["nama"]; ?></td>
	                <td><?= $row["nim"]; ?></td>
	                <td><?= $row["email"]; ?></td>
	                <td>
	                	<a href="hpeserta.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda yakin?')" class="btn btn-danger rounded-pill">Hapus</a>
	                </td>
				</tr>
				<?php endforeach; ?>
			</table><hr>
		<div class="d-flex justify-content-between mt-5">
			<h3>Daftar Pertemuan</h3>
		</div><hr>
		<table class="table table-bordered table-striped" style="width: 50%">
				<tr>
					<th>No.</th>
					<th>Pertemuan Ke-</th>
					<th>Tanggal</th>
					<th>Aksi</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($data1 as $row) : ?>
				<tr>
					<td><?= $i++;?></td>
	                <td><?= $row["pertemuan_ke"]; ?></td>
	                <td><?= $row["tanggal"]; ?></td>
	                <td>
	                	<a href="lpertemuan.php?id=<?php echo $data['id']; ?> pertemuan_ke=<?= $row["pertemuan_ke"]; ?>" class="btn btn-dark rounded-pill"> Lihat </a>
	                </td>
				</tr>
				<?php endforeach; ?>
			</table><hr>
    </div>
<hr>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>