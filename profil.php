<?php 
session_start();
include "konek.php";
if (!isset($_SESSION['statuslogin'])) {
	echo "<script>window.location='log.php'</script>";
	echo "<script>window.location = 'log.php'</script>";
}
$tampung = mysqli_query($konek,"SELECT * FROM admin WHERE adminid ='".$_SESSION['id']."' ");
$d = mysqli_fetch_object($tampung);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil | Warung Sayur</title>
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
			<h3>Profil</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input" value="<?php echo $d->name?>" required>
					<input type="user" name="username" placeholder="Username" required class="input" value="<?php echo $d->username ?>">
					<input type="text" name="hp" placeholder="No.hp/Whatsapp" required class="input" value="<?php echo $d->telepon ?>">
					<input type="email" name="email" placeholder="Email" required class="input" value="<?php echo $d->email ?>">
					<input type="text" name="alamat" placeholder="Alamat" required class="input" value="<?php echo $d->alamat ?>">
					<input type="submit" name="submit" value="Ubah Profil" class="btn">
				</form>

				<?php 

				if (isset($_POST['submit'])) {
					$nama = ucwords($_POST['nama']);
					$user = $_POST['username'];
					$no = $_POST['hp'];
					$email = $_POST['email'];
					$alamat = ucwords($_POST['alamat']);

					$ubah = mysqli_query($konek,"UPDATE admin SET 
						name = '".$nama."',
						username ='".$user."',
						telepon = '".$no."',
						email = '".$email."',
						alamat = '".$alamat."' 
						WHERE adminid = '".$d->adminid."'");
					if ($ubah) {
						echo "<script>alert('Ubah Data Berhasil')</script>";
						echo "<script>window.location='dahsboard.php'</script>";
					}
					else{
						echo "<script>alert('Ubah Data Gagal')</script>".mysqli_error($konek);
					}
				}

				 ?>

			</div>
			<h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pas1" placeholder="Password Baru" class="input" required>
					<input type="password" name="pas2" placeholder="Konfirmasi Password" class="input" required>
					<input type="submit" name="ubahpassword" value="Ubah Password" class="btn">
				</form>
				<?php 
				if (isset($_POST['ubahpassword'])) {
					$pass1 = $_POST['pas1'];
					$pass2 = $_POST['pas2'];
					if ($pass1 != $pass2) {
						echo "<script>alert('Password Tidak Sesuai')</script>".mysqli_error($konek);
					} else {
						$pass = mysqli_query($konek,"UPDATE admin SET 
						password = '".md5($pass1)."'
						WHERE adminid = '".$d->adminid."'");
						if ($pass) {
							echo "<script>alert('Ubah Password Berhasil')</script>";
							echo "<script>window.location='profil.php'</script>";
						}else{
							echo "<script>alert('Ubah Password Gagal')</script>".mysqli_error($konek); }
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