<?php 
    
    include 'register_user.php';
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>

    <div class="container-all">

        <div class="ctn-form">
            <h1 class="title">Register</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="">Nisn</label>
                <input type="text" name="nisn">
                <span class="msg-error"><?php echo $nisn_err; ?></span>
                <label for="">Username</label>
                <input type="text" name="username">
                <span class="msg-error"><?php echo $username_err; ?></span>
                <label for="">Password</label>
                <input type="password" name="password">
                <span class="msg-error"> <?php echo $password_err; ?></span>

                <input type="submit" value="Register">

            </form>

            <span class="text-footer">Sudah punya akun?
                <a href="index.php">Login</a>
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
