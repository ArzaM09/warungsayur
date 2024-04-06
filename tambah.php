<?php 
session_start();
include "konek.php";
if (!isset($_SESSION['statuslogin'])) {
	echo "<script>window.location='log.php'</script>";
	echo "<script>window.location = 'log.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Kategori | Warung Sayur</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title></title>
</head>
<body>
	<input type="checkbox" id="check">
	<label for = "check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
	<div class="das">
		<header>
		<h1 > <a href="dahsboard.php"><font color="white"> Warung Sayur</font></a></h1>
		<ul>
			<li><a href="dahsboard.php"><i class="fas fa-qrcode"></i> Dashboard</a></li>
			<li><a href="profil.php"><i class="fas fa-user"></i> Profil</a></li>
			<li><a href="data.php"><i class="fas fa-carrot"></i> Data Kategori</a></li>
			<li><a href="produk.php"><i class="fas fa-shopping-cart "></i> Produk</a></li>
			<li><a href="exit.php"><i class="fas fa-times"></i>  Keluar</a></li>
		</ul>
	</header>
	</div>

	<div class="bode">
		<div class="content">
			<h3>Tambah Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input" required>
					<input type="submit" name="submit" value="submit" class="btn">
				</form>
				<?php 
				if (isset($_POST['submit'])) {
					$nama = ucwords($_POST['nama']);
					$tambah = mysqli_query($konek,"INSERT INTO kategori VALUES (null,'".$nama."')");

						if ($tambah){
							echo "<script>alert('Tambah Data Berhasil')</script>";
							echo "<script>window.location='data.php'</script>";
						} else{
							echo "<script>alert('Tambah Data Gagal')</script>".mysqli_error($konek);
						}
				}

				 ?>
			</div>
	
			</div>
		</div>

	<footer>
		<div class="content">
			<small>Copyright &copy; 2022 - WarungSayur</small>
		</div>
	</footer>
</body>
</html>