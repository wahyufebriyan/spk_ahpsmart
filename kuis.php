<?php
include('config.php');
// header
include('header.php');

$query  = "SELECT * FROM nilai_kuis";
	$result = mysqli_query($koneksi, $query);
 
	// cek result (mencegah user  mengisi kuis ke 2 kalinya)
	if (mysqli_num_rows($result) == 0) {
	} else{
		echo "<script>alert('Anda sudah mengisi kuis !');location.href='kuis_submit.php';</script>";
	}

session_start();
?>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<ol class="breadcrumb">
	  			<li><a href="user.php"><span class="fa fa-home"></span> Beranda</a></li>
	  			<li class="active"><span class="fa fa-bank"></span> Kuis</li>
			</ol>
		</div>
	</div>
	<form method="post" action="kuis_submit.php">
		<div class="row">
			<div class="col-xs-18 col-sm-18 col-md-18">
		  		<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="panel panel-default">
			  			<div class="panel-heading">
			    			<h3 class="panel-title"><center>Harap Jawab Pertanyaan Berikut Ini</center></h3>
			  			</div>
			  			<div class="panel-body">
			    			<ol>
							<?php
									// Mendefinisikan tiap alternatif
									$query = "SELECT id FROM alternatif";
									$result	= mysqli_query($koneksi, $query);

									$n=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$n++;
									?>
									<tr>
									<?php if ($n == 1) {
				    					echo "<p><input type=\"hidden\" name=\"id1\" value=".$row['id']."></input>";
									} else if ($n == 2 ){
										echo "<p><input type=\"hidden\" name=\"id2\" value=".$row['id']."></input>";
									}else if ($n == 3 ){
                            			echo "<p><input type=\"hidden\" name=\"id3\" value=".$row['id']."></input>";
									}else if ($n == 4 ){
                            			echo "<p><input type=\"hidden\" name=\"id4\" value=".$row['id']."></input>";
									}else if ($n == 5 ){
                            			echo "<p><input type=\"hidden\" name=\"id5\" value=".$row['id']."></input>";
									}else if ($n == 6 ){
                            			echo "<p><input type=\"hidden\" name=\"id6\" value=".$row['id']."></input>";
									}else if ($n == 7 ){
                            			echo "<p><input type=\"hidden\" name=\"id7\" value=".$row['id']."></input>";
									}else if ($n == 8 ){
                            			echo "<p><input type=\"hidden\" name=\"id8\" value=".$row['id']."></input>";
									}else if ($n == 9 ){
                            			echo "<p><input type=\"hidden\" name=\"id9\" value=".$row['id']."></input>";
									}else if ($n == 10 ){
                            			echo "<p><input type=\"hidden\" name=\"id10\" value=".$row['id']."></input>";
									}else{
				    					echo "<td>".$n."</td>";
				    				}
                					?>
									</tr>
				  				<?php
									}
					  			?>

			    				<?php
									// Menampilkan soal
									$query = "SELECT soal, jwb_a, jwb_b, jwb_c, jwb_d FROM soal";
									$result	= mysqli_query($koneksi, $query);

									$i=0;
									while ($row = mysqli_fetch_assoc($result)) {
										$i++;
									?>
									<tr>
									<?php if ($i == 1) {
				    					echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"a1\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a1\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a1\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a1\" value=\"10\"> ".$row['jwb_d']." </input>";
				    				} else if ($i == 2 ){
										echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"a2\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a2\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a2\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a2\" value=\"10\"> ".$row['jwb_d']." </input>";
                       				}else if ($i == 3 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"a3\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a3\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a3\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a3\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else if ($i == 4 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"a4\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a4\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a4\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"a4\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else if ($i == 5 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"b1\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b1\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b1\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b1\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else if ($i == 6 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"b2\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b2\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b2\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b2\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else if ($i == 7 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"b3\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b3\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b3\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b3\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else if ($i == 8 ){
                            			echo "<p>".$i.". ".$row['soal']."";
										echo "<p><input type=\"checkbox\" name=\"b4\" value=\"40\"> ".$row['jwb_a']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b4\" value=\"30\"> ".$row['jwb_b']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b4\" value=\"20\"> ".$row['jwb_c']." </input>";
										echo "<p><input type=\"checkbox\" name=\"b4\" value=\"10\"> ".$row['jwb_d']." </input>";
                        			}else{
				    					echo "<td>".$i."</td>";
				    				}
                					?>
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
		<button class="ui green submit button" type="submit" name="submit">Submit</button>
	</form>
</section>

<?php include('footer.php'); ?>
