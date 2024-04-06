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
	<title>Produk | Warung Sayur</title>
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
			<h3>Data Produk</h3>
			<div class="box">
				<p><a href="tambahprod.php"><i class="fas fa-plus"></i> Tambah Produk</a></p> <br>
				<table border="1" cellspacing="0" class="tab">
					<thead>
					<tr>
						<th width="50px">No</th>
						<th>Kategori</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Gambar</th>
						<th>Status</th>
						<th width="150px">Aksi</th>
					</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$produk = mysqli_query($konek,"SELECT * FROM produk LEFT JOIN Kategori USING(Kategoriid) ORDER BY produkid DESC");
						if (mysqli_num_rows($produk) > 0) {
						while ($kt = mysqli_fetch_array($produk)) {
						 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $kt["kategoriname"] ?></td>
							<td><?php echo $kt["produkname"] ?></td>
							<td>Rp. <?php echo number_format($kt["produkprice"]) ?></td>
							<td><a href="produk/<?php echo $kt['image'] ?>" target ="_blank"><img src="produk/<?php echo $kt['image'] ?>" width ="50px"></a></td>
							<td><?php echo ($kt["status"]== 0 )? 'Tidak Aktif': 'aktif'; ?></td>
							<td>
								<a href="editprod.php?id=<?php echo $kt['produkid'] ?>">Edit</a> || <a href="hapus.php?idp2=<?php echo $kt['produkid'] ?>" onclick = "return confirm('Yakin Ingin Hapus Data ini ?') ">Hapus</a>
							</td>
						</tr>
					    <?php }} else{ ?>
					    	<tr>
					    		<td colspan="7">Tidak Ada Data</td>
					    	</tr>


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