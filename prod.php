<?php 
	error_reporting(0);
	include 'konek.php'; 
	$foot = mysqli_query($konek, "SELECT telepon, email, alamat FROM admin WHERE adminid = 1");

	$f = mysqli_fetch_object($foot);
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
			<h3 style="color: white;">Produk</h3>
			<div class="boxes">
				<?php 
				if ($_GET['search']!='' || $_GET['kat']!='') {
					$w = "AND produkname LIKE '%".$_GET['search']."%' AND kategoriid LIKE '%".$_GET['kat']."%' ";
				}
					$prod = mysqli_query($konek, "SELECT * FROM produk WHERE status = 1 $w ORDER BY produkid DESC");
					if (mysqli_num_rows($prod)>0) {
						while($p = mysqli_fetch_array($prod)){
				 ?>
				 <a href="detail.php?idl=<?php echo $p['produkid'] ?>">
				 	<div class="news">
						<img src="./produk/<?php echo $p['image'] ?>">
						<p class="nama"><?php echo substr($p['produkname'] ,0,20) ?></p>
						<p class="harga">Rp. <?php echo  number_format($p['produkprice']) ?></p>
					</div>
				 </a>
				<?php }}else{ ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
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