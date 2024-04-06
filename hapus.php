<?php 
include 'konek.php';

if (isset($_GET['id2'])) {
	$del = mysqli_query($konek, "DELETE FROM kategori WHERE kategoriid ='".$_GET['id2']."' ");
	echo "<script>window.location='data.php'</script>";
}

if (isset($_GET['idp2'])) {
	$hilang = mysqli_query($konek, "SELECT image FROM produk WHERE produkid = '".$_GET['idp2']."' ");
	$h = mysqli_fetch_object($hilang);
	unlink('./produk/'.$h->image);
	$hapus = mysqli_query($konek, "DELETE FROM produk WHERE produkid = '".$_GET['idp2']."' ");
	echo "<script>window.location='produk.php'</script>";
}


 ?>