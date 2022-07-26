<?php
include('config.php');
include('fungsi.php');

// menjalankan perintah ganti
if(isset($_POST['ganti'])) {
	$id = $_POST['id'];
	gantiEskul($id);
}

// header
include('header.php');

session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if(($_SESSION['level']=="")){
 header("location:index.php?Anda harus Login dahulu");
}
?>

<section class="content">
	<ol class="breadcrumb">
	  <li><a href="user.php"><span class="fa fa-home"></span> Beranda</a></li>
	</ol>
	<div class="kartu" id="navigation">
		<a class="item" href="kriteria_user.php">Data Kriteria
			<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahKriteria(); ?></div>
		</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="alternatif_user.php">Data Alternatif
			<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahAlternatif(); ?></div>
		</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="kuis.php">Kuis</a>
	</div>
	<div class="kartu" id="navigation">
		<a class="item" href="hasil.php">Hasil</a>
	</div>
	<br>
	<div id="container2" style="min-width: 100%; height: 300px; margin: 0 auto"></div>
	<br><br><br>
	<div class="row">
		<div class="col-xs-18 col-sm-18 col-md-18">
		  	<div class="col-xs-6 col-sm-12 col-md-4">
				<div class="panel panel-default">
			  		<div class="panel-heading">
			    		<h3 class="panel-title">Kriteria Dan Bobot</h3>
			  		</div>
			  		<div class="panel-body">
			    		<ol>
			    			<?php
								// Menampilkan list kriteria
								$query = "SELECT id,nama FROM kriteria ORDER BY id";
								$result	= mysqli_query($koneksi, $query);

								$no = 1;
								while ($row = mysqli_fetch_assoc($result)) {
								$no++;
								?>
				  				<li><?php echo $row['nama'] ?></li>
				  			<?php
								}
				  			?>
						</ol>
			  		</div>
				</div>
		  	</div>
		</div>
		<div class="col-xs-18 col-sm-18 col-md-18">
		  	<div class="col-xs-6 col-sm-12 col-md-4">
				<div class="panel panel-default">
			  		<div class="panel-heading">
			    		<h3 class="panel-title" id="rekom">Rekomendasi 4 teratas</h3>
			  		</div>
			  		<div class="panel-body">
			    		<ol>
						<p> Silahkan Pilih Salah Satu Alternatif Sesuai Keinginan Anda. cekbox di bawah ini:
						<table width="100%" class="table table-striped table-bordered" id="tabeldata">
						<tbody>
						<?php
			        		$query  = "SELECT id,nama,id_alternatif,nilai,nisn FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif AND nisn='$_SESSION[nisn]' ORDER BY nilai DESC LIMIT 4";
		        			$result = mysqli_query($koneksi, $query);

				    		$i = 0;
				    		while ($row = mysqli_fetch_array($result)) {
				    		$i++;
						?>
				    	<?php if ($i == 1) {
				    		echo "<td><div class=\"ui red ribbon label\">Pertama</div></td>";
				    	} else if ($i == 2 ){
                            echo "<td><div class=\"ui yellow ribbon label\">Kedua</div></td>";
                        }else if ($i == 3 ){
                            echo "<td><div class=\"ui green ribbon label\">Ketiga</div></td>";
                        }else if ($i == 4 ){
                            echo "<td><div class=\"ui blue ribbon label\">Empat</div></td>";
                        }else{
				    		echo "<td>".$i."</td>";
				    	}
                		?>
						<tr>
							<td><?php echo $row['nama'] ?></td>
							<form method="post" action="user.php">
								<td class="text-center" style="vertical-align:middle;">
									<input type="checkbox" value="<?php echo $row['id'] ?>" name="id" id="id"/>
								</td>
						</tr>
			  			<?php
							}
			  			?>
						</tbody>
								<td>
									<button class="btn btn-success" style="float:left;" type="submit" name="ganti" id="ganti" onclick="return confirm('Yakin Dengan Pilihan Anda?')" >Submit</button>
								</td>
							</form>
						</table>
						</ol>
			  		</div>
				</div>
		  	</div>
		</div>
		<div class="col-xs-18 col-sm-18 col-md-18">
		  	<div class="col-xs-6 col-sm-12 col-md-4">
				<div class="panel panel-default">
			  		<div class="panel-heading">
			    		<h3 class="panel-title">Pilihan</h3>
			  		</div>
			  		<div class="panel-body">
			    		<ol>
						<?php
							// Menampilkan hasil laporan
							$query = "SELECT nisn,username,hasil,nama FROM user,alternatif WHERE level='user' AND hasil=alternatif.id AND nisn='$_SESSION[nisn]'";
							$result	= mysqli_query($koneksi, $query);

							while ($row = mysqli_fetch_assoc($result)) {
						?>
            			<tr>
                			<p style="vertical-align:middle;">Nisn : <?php echo $row['nisn'] ?>
							<p style="vertical-align:middle;">Nama : <?php echo $row['username'] ?>
							<p style="vertical-align:middle;">Pilihan : <?php echo $row['nama'] ?>
            			</tr>
						<?php
							}
						?>
						</ol>
			  		</div>
				</div>
		  	</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
