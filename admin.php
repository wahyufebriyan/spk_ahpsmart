<?php
include('config.php');
include('fungsi.php');

// header
include('headeradmin.php');

session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if(($_SESSION['level']=="")){
 header("location:index.php?Anda harus Login dahulu");
}
?>

<section class="content">
	<ol class="breadcrumb">
	  <li><a href="admin.php"><span class="fa fa-home"></span> Beranda</a></li>
	</ol>

	<div class="kartu" id="navigation">
		<a class="item" href="kriteria.php">Data Kriteria
			<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahKriteria(); ?></div>
		</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="alternatif.php">Data Alternatif Jurusan
			<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahAlternatif(); ?></div>
		</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="bobot_kriteria.php">Analisis Kriteria</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="data_user.php">Data Siswa</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="Laporan.php">Laporan</a>
	</div>
	
</section>

<?php include('footer.php'); ?>
