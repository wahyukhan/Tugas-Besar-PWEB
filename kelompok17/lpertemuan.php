
<?php 
require 'koneksi.php';
$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// $data1 = query("SELECT * FROM pertemuan WHERE kelas_id = '$id'");
// $data2 = query("SELECT krs.id, mahasiswa.nama, mahasiswa.nim, mahasiswa.email FROM mahasiswa 
// 				JOIN krs ON mahasiswa.id=krs.mahasiswa_id
// 				JOIN kelas ON krs.kelas_id=kelas.id where kelas.id='$id' ");
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
			<h3>Detail Pertemuan <?php echo $data['kode_kelas']; ?> <?php echo $data['nama_makul']; ?></h3>
			
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
<!--                 <td>Pertemuan Ke</td>
                <td width="1%">-</td>
                <td><?php echo $data1['pertemuan_ke']; ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td width="1%">:</td>
                <td><?php echo $data1['tanggal']; ?></td>
            </tr> -->
           
        </table><hr>

      		<div class="d-flex justify-content-between mt-5">
			<h3>Import File Absen (.CSV)</h3>
		</div><hr>
      <?php
		$message = '';
		if(isset($_POST["upload"]))
		{
		 if($_FILES['absen_file']['name'])
		 {
		  $filename = explode(".", $_FILES['absen_file']['name']);
		  if(end($filename) == "csv")
		  {
		   $handle = fopen($_FILES['absen_file']['tmp_name'], "r");
		   while($data = fgetcsv($handle))
		   {
		   	$id = mysqli_real_escape_string($koneksi, $data[0]);
		    $jam_masuk = mysqli_real_escape_string($koneksi, $data[1]);  
		    $jam_keluar = mysqli_real_escape_string($koneksi, $data[2]);
		    $durasi = mysqli_real_escape_string($koneksi, $data[3]);
		    $query = "
		     UPDATE absensi 
		     SET jam_masuk = '$jam_masuk', 
		     jam_keluar = '$jam_keluar', 
		     durasi = '$durasi' 
		     WHERE id = '$id'
		    ";
		    mysqli_query($koneksi, $query);
		   }
		   fclose($handle);
		   header("location: import.php?updation=1");
		  }
		  else
		  {
		   $message = '<label class="text-danger">Hanya File CSV</label>';
		  }
		 }
		 else
		 {
		  $message = '<label class="text-danger">Silahkan Masukkan File</label>';
		 }
		}

		if(isset($_GET["updation"]))
		{
		 $message = '<label class="text-success">Import Selesai</label>';
		}

		$query = "SELECT * FROM absensi";
		$result = mysqli_query($koneksi, $query);
		?>  
	   <br />
	   <form method="post" enctype='multipart/form-data'>
	    <label class="form-label">Please Select File(Only CSV Formate)</label>
	    <input class="form-control" type="file" name="absen_file"  />
	    <br />
	    <input  type="submit" name="upload" class="btn btn-warning" value="Upload" style="width: 30%" />
	   </form>
	   <br />
	   		<?php echo $message; ?>
	   <hr>
	   <h3>Tabel Absensi Mahasiswa</h3>
	   <br />
	   <div class="table-responsive">
	    <table class="table table-bordered table-striped">
	     <tr>
	      <th>Jam Masuk</th>
	      <th>Jam Keluar</th>
	      <th>Durasi</th>
	     </tr>
		     <?php
		     while($row = mysqli_fetch_array($result))
		     {
		      echo '
		      <tr>
		       <td>'.$row["jam_masuk"].'</td>
		       <td>'.$row["jam_keluar"].'</td>
		       <td>'.$row["durasi"].'</td>
		      </tr>
		      ';
		     }
		     ?>
	    </table>

	    </div>
<hr>
</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>





