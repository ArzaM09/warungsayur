<?php 
	error_reporting(0);
	include 'konek.php'; 
	$foot = mysqli_query($konek, "SELECT telepon, email, alamat FROM admin WHERE adminid = 1");

	$f = mysqli_fetch_object($foot);

	$select = mysqli_query($konek, "SELECT * FROM produk WHERE produkid='".$_GET['idl']."'");

	$s = mysqli_fetch_object($select);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/utama.css">
	<title>Beranda || Warungsayur</title>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<main>
		<div class="sidebar">
			<div class="judul">
				WarungSayur
			</div>
			<ul>
				<li><a href="utama.php"><i class="fas fa-home"></i>Beranda</a></li>
				<li><a href="prod.php"><i class="fas fa-shopping-basket"></i> Produk</a></li>
				<p class="con">Contact us : </p>
				<a href="#"><i class="fab fa-instagram"> Instagram</i></a>
				<a href="" class="wa"><i class="fab fa-whatsapp"> Whatsapp</i></a>
			</ul>
		</div>
	</main>

	<div class="pencarian">
		<div class="content">
			<form action="prod.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat']?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
			
		</div>
	</div>

	<div class="bods">
		<div class="conts">
			<h3 style="color: white;">Detail Produk</h3>
			<div class="boxess">
				<div class="det">
					<img src="./produk/<?php echo $s->image ?>" width="100%">
				</div>
				<div class="det">
					<h3><?php echo $s->produkname ?></h3>
					<h4>Rp. <?php echo number_format($s->produkprice) ?></h4>
					<p>Deskripsi : <br>
						<?php echo $s->deskripsi ?></p>
					<p class="wa"><a href=" https://api.Whatsapp.com/send?phone=<?php echo $f->telepon?>&text= Hai, Saya Tertarik Dengan Sayur/Buah Anda." target="_blank">Klik disini Untuk Order <img src="./img/wa (2).png" width="35px" style="color:green; border: none;"></a></p>
				</div>
			</div>
		</div>
	</div>


	<div class="foots">
		<div class="conts">
			<h4>Alamat</h4>
			<p><?php echo $f->alamat ?></p>

			<h4>Email</h4>
			<p><?php echo $f->email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $f->telepon ?></p>
			<small>copyright &copy; 2022 - WarungSayur</small>
		</div>
	</div>
</body>
</html>