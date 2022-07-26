<?php
include('config.php');

session_start();
error_reporting(0);
// Mencegah user secara paksa masuk halaman admin
if(isset($_SESSION['level']))
{
    if(($_SESSION['level'] == "admin"))
    {
    }else if(($_SESSION['level'] == "user"))
    {
        header("location:user.php");
    }
}
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['level']))
{
 header("location:index.php?Anda harus Login dahulu");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sistem Pendukung Keputusan Metode AHP & SMART</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
<header>
	<h3>Sistem Pendukung Keputusan Metode AHP & SMART</h3>
</header>
	<nav class="navbar bg-success">
            <div class="container-fluid">
				<div class="navbar-header">
                    <a class="navbar-brand" href="admin.php"><span class="fa fa-home"></span> Beranda</a>
                </div> 
                <div class="navbar-header">
                    <a class="navbar-brand" href="bobot_kriteria.php"><span class="fa fa-cog"></span> Analisis Kriteria</a>
                </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-file "></i> Data Kriteria & Alternatif <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a href="kriteria.php"><span class="fa fa-book"></span> Data Kriteria</a></li>
                            <li role="presentation"><a href="alternatif.php"><span class="fa fa-book"></span> Data Alternatif</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li><a href=""><span class="fa fa-user"></span> <?php echo $_SESSION['username'] ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="wrapper">