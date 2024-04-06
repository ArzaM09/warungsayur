<?php 
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
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
			
		</div>
	</div>

	<div class="bode" >
		<div class="content">
			<h3 style="color: white;">Kategori</h3>
			<div class="box">
				<?php $kategori= mysqli_query($konek, "SELECT * FROM kategori ORDER BY kategoriid DESC");
					if (mysqli_num_rows($kategori) > 0) {
						while ($s = mysqli_fetch_array($kategori)) {
				?>

					<a href="prod.php?kat=<?php echo $s['kategoriid'] ?>">
						<div class="kat">
							<img src="img/fruit.png" width="50px" style="margin-bottom: 5px;">
							<p style="margin-left: 5px;" ><?php echo $s['kategoriname'] ?></p>
						</div>
					</a>
			<?php }} else{ ?>
				<p>Kategori Tidak Ada</p>
			<?php } ?>
		</div>
	</div>

	<div class="bod">
		<div class="cont">
			<h3 style="color: white;">Produk Terbaru</h3>
			<div class="boxe">
				<?php 
					$prod = mysqli_query($konek, "SELECT * FROM produk WHERE status = 1 ORDER BY produkid DESC LIMIT 8");
					if (mysqli_num_rows($prod)>0) {
						while($p = mysqli_fetch_array($prod)){
				 ?>
				 <a href="detail.php?idl=<?php echo $p['produkid'] ?>">
				 	<div class="new">
						<img src="./produk/<?php echo $p['image'] ?>">
						<p class="nama"><?php echo substr($p['produkname'] ,0,20) ?></p>
						<p class="harga">Rp.  <?php echo number_format($p['produkprice']) ?></p>
					</div>
				 </a>
				<?php }}else{ ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="foot">
		<div class="content">
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