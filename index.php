<?php
    
    require_once "cek_login.php";

?>

<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-all">
		<div class="ctn-form">
			<h1 class="title">Login</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

					<label for="">Nisn</label>
					<input type="text" name="nisn">
					<span class="msg-error"><?php echo $nisn_err; ?></span>
					<label for="">Nama</label>
					<input type="text" name="username">
					<span class="msg-error"><?php echo $username_err; ?></span>
					<label for="">Password</label>
					<input type="password" name="password">
					<span class="msg-error"><?php echo $password_err; ?></span>

					<input type="submit" value="Login">

				</form>
				<span class="text-footer">Belum punya akun?
					<a href="register.php">Register</a>
				</span>
	</div>
	<div class="ctn-text">
		<div class="capa"></div>
			<h1 class="title-description">SYSTEM PENUNJANG KEPUTUSAN METODE AHP DAN SMART </h1>
			<p class="text-description">PEMILIHAN EKTRAKULIKULER</p>
		</div>
	</div>
</body>

</html>
