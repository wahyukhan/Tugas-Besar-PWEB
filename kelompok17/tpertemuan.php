<?php 
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT max(id) as kodeM FROM pertemuan");
	$data = mysqli_fetch_array($query);
	$idpertemuan = $data['kodeM'];
	$idpertemuan++;

$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id = '$id'");
$data1 = mysqli_fetch_array($query);
 
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
		<h3>Tambah Pertemuan <?php echo $data1['kode_kelas']; ?> <?php echo $data1['nama_makul']; ?></h3>
<!-- 		<a href="lkelas.php?id=<?php echo $data1['id']; ?>" class="btn btn-primary text-center rounded-pill mt-5" style="width: 200px">Kembali Ke Detail Kelas</a>
		<h6 class="mt-1 mx-2"> **Kembali jika berhasil menambahkan data</h6> -->
		<hr>
		<form method="post" action="" class="pt-3" style="width: 50%; font-weight: bold">
		  <input type="hidden"  name="id" value="<?php echo $idpertemuan ?>">
		  <div class="mb-3 mt-5">
		    <label class="form-label">ID</label>
		    <input type="text" class="form-control" name="id" required="required" value="<?php echo $idpertemuan ?>" readonly>
		  </div>
		  <div class="mb-3 mt-3">
		    <label class="form-label">Pertemuan Ke-</label>
		    <select name="pertemuan_ke" class="form-control" required="required">
			<option selected="selected"></option>
			<?php
			for($a=1; $a<=14; $a+=1){
			    echo"<option value=$a> $a </option>";
			}
			?>
			</select>
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Tanggal</label>
		    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan NIM Mahasiswa" required="required">
		  </div>
		  <div class="mb-3">
		    <label class="form-label">Kode Kelas</label>
		    <input type="text" class="form-control" name="kode_kelas" required="required" value="<?= $data1["kode_kelas"]; ?>" readonly>
		  </div>
		  <button type="submit" class="btn btn-warning mb-5 mt-3" name="submit" style="width: 49%">Submit</button>
		  <button type="reset" class="btn btn-danger mb-5 mt-3" name="reset" style="width: 49%">Kosongkan</button>
		  <?php 
		  		$open=$data1['id'];
				  if (isset($_POST["submit"])) {
					    if (tambah2($_POST) > 0) {
					        echo "
					        <script>
					            alert ('data berhasil ditambahkan!');
					            document.location.href ='lkelas.php?id=$open';
					        </script>
					        ";

					    } else {
					        echo "
					        <script>
					            alert ('data gagal ditambahkan!');
					            document.location.href ='tpertemuan.php?id=$open';
					        </script>
					        ";
					    }
					}
				?>
		</form>
		
	</div>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>