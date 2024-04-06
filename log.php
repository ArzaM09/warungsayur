<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Warung Sayur</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<input type="submit2" name="submit2" value="Daftar" class="btn">
				</form>
			</div>

			<div class="login">
				<form action="" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="user" placeholder="Username" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<input type="submit" name="submit" value="Login" class="btn">
				</form>
				<?php 
					if (isset($_POST['submit'])) {
						include 'konek.php';
						session_start();
						$user = mysqli_escape_string($konek,$_POST['user']);
						$pass = mysqli_escape_string($konek,$_POST['pass']);

						$cek = mysqli_query($konek,"SELECT * FROM admin WHERE username = '".$user."' AND password ='".MD5($pass)."' ");
						if(mysqli_num_rows($cek)>0) {
							$t = mysqli_fetch_object($cek);
							$_SESSION['statuslogin'] = true;
							$_SESSION['adminglobal'] = $t;
							$_SESSION['id'] = $t->adminid;
							echo '<script>window.location="dahsboard.php"</script>';
						} else{
							echo '<script>alert("Username atau Password anda Salah")</script>';
						}
					}
				 ?>
			</div>
	</div>
</body>
</html>