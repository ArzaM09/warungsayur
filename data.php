<?php 
session_start();
include "konek.php";
if (!isset($_SESSION['statuslogin'])) {
	echo "<script>alert(' Anda Belum Login :( ')</script>";
	echo "<script>window.location = 'log.php'</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Kategori | Warung Sayur</title>
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
			<h3>Kategori</h3>
			<div class="box">
				<p><a href="tambah.php"><i class="fas fa-plus"></i> Tambah Kategori</a></p>
				<table border="1" cellspacing="0" class="tab">
					<thead>
					<tr>
						<th width="50px">No</th>
						<th>Kategori</th>
						<th width="150px">Aksi</th>
					</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$test = mysqli_query($konek,"SELECT * FROM kategori ORDER BY kategoriid DESC");
						if (mysqli_num_rows($test) >0) {
						
						while ($kt = mysqli_fetch_array($test)) {
						 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $kt["kategoriname"] ?></td>
							<td>
								<a href="edit.php?id=<?php echo $kt['kategoriid'] ?>">Edit</a> || <a href="hapus.php?id2=<?php echo $kt['kategoriid'] ?>" onclick = "return confirm('Yakin Ingin Hapus ?') ">Hapus</a>
							</td>
						</tr>
					    <?php }}else{ ?>
					    	<tr><td colspan="3">Tidak Ada Data</td></tr>
						<?php } ?>
					</tbody>
				</table>
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