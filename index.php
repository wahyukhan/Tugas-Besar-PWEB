<!DOCTYPE html>

<html>
<head>
 <title>Login</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
 <?php
 if(isset($_GET['pesan'])){
  if($_GET['pesan']=="gagal"){
   echo "<div class='alert'>Username dan Password Salah !</div>";
  }
 }
 ?>

 <div >
<div class="container">
  <div class="card mx-auto bg-dark" style="width: 35%; margin-top: 10%; box-shadow: 0 3px 20px rgba(0,0,0,0.5); padding: 30px">
    <h2 class="text-center text-white">Login</h2><hr class="bg-light">
    <div class="card-body" >
        <form action="cek_login.php" method="post">
           <div class="form-group ">
            <label class="text-white my-2">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" required>
          </div>
           <div class="form-group mt-2">
            <label class="text-white my-2">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
          </div>
         <button type="submit" class="btn btn-primary mt-4" style="width: 48%">Masuk</button>
         <button type="reset" class="btn btn-warning mt-4" style="width: 48%">Kosongkan</button>
         <br/>
         <br/>
         
        </form>
    </div>
  </div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>