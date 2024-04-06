<?php 
session_start();
include "konek.php";
if (!isset($_SESSION['statuslogin'])) {
	echo "<script>Anda Belum Login</script>";
	echo "<script>window.location = 'log.php'</script>";
}

$edit = mysqli_query($konek, "SELECT * FROM produk WHERE produkid = '".$_GET['id']."' ");
if (mysqli_num_rows($edit)==0) {
	echo "<script>window.location = 'Produk.php'</script>";
}
$e = mysqli_fetch_object($edit);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Produk | Warung Sayur</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
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
			<h3>Edit Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$prod = mysqli_query($konek, "SELECT * FROM kategori ORDER BY kategoriid DESC");
							while ($o = mysqli_fetch_array($prod)) {
						 ?>
						<option value="<?php echo $o['kategoriid'] ?>" <?php echo ($o['kategoriid'] == $e->kategoriid)?'selected':''; ?>><?php echo $o['kategoriname'] ?></option>
						<?php } ?>
					</select>
					<input type="text" name="nama" placeholder="Nama Produk" class="input" value="<?php echo $e->produkname ?>" required>
					<input type="text" name="harga" placeholder="Harga Produk" class="input" value="<?php echo $e->produkprice ?>" required>

					<img src="./produk/<?php echo $e->image ?>" width='100px'>
					<input type="hidden" name="poto" value="<?php echo $e->image ?>">
					<input type="file" name="gambar" class="input">
					<textarea class="input" name="deskripsi" placeholder="Deskripsi Produk"><?php echo $e->deskripsi?></textarea><br>
					<select class="input" name="status">
						<option value="">--Pilih--</option>
						<option value="1" <?php echo ($e->status == 1)?'selected':'';?>>Aktif</option>
						<option value="0"<?php echo ($e->status == 0)?'selected':''; ?>>Tidak Aktif<option>
					</select>
					<input type="submit" name="submit" value="submit" class="btn">
				</form>
				<?php 
				if (isset($_POST['submit'])) {

					//tampung data 
					$kategori = $_POST['kategori'];
					$nama = $_POST['nama'];
					$harga = $_POST['harga'];
					$deskripsi = $_POST['deskripsi'];
					$status = $_POST['status'];
					$poto = $_POST['poto'];

					$namefile = $_FILES['gambar']['name'];
					$tmpname = $_FILES['gambar']['tmp_name'];
					
					if ($namefile !='') {
						$tipe1 = explode('.', $namefile);
						$tipe2 = $tipe1[1];
						$prodnama = 'produk'.time().'.'.$tipe2;
						$izin = array('jpg', 'jpeg', 'png', 'gif');
						if (!in_array($tipe2, $izin)) {
							//format tidak sesuai
							echo "<script>alert('Jenis File Ini Tidak Dapat di Upload')</script>";
						} else{
							unlink('./produk/'.$poto);
							move_uploaded_file($tmpname, './produk/'.$prodnama);
							$tampung = $prodnama;
							}
					}else {

						$tampung = $poto;

					}

					$l = mysqli_query($konek,"UPDATE produk SET 
						kategoriid ='".$kategori."',
						produkname ='".$nama."',
						produkprice ='".$harga."',
						deskripsi ='".$deskripsi."',
						status = '".$status."',
						image ='".$tampung."' WHERE produkid = '".$e->produkid."' ");
					if ($l) {
						echo "<script>alert('Berhasi Mengedit Produk')</script>";
						echo "<script>window.location='produk.php'</script>";
					} else{
						echo "<script>alert('Gagal Mengedit Produk')</script>" . mysqli_query($konek);
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
	 <script>
       CKEDITOR.replace( 'deskripsi' );
     </script>
</body>
</html>
