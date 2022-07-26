<?php 
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=kriteria&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteKriteria($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('kriteria',$nama);
	}

	include('headeradmin.php');
?>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<ol class="breadcrumb">
	  			<li><a href="admin.php"><span class="fa fa-home"></span> Beranda</a></li>
	  			<li class="active"><span class="fa fa-bank"></span> Data Kriteria</li>
			</ol>
			<form>
				<div class="row">
					<div class="col-md-6 text-left">
						<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Data Kriteria</strong>
					</div>
				</div>
				<br/>
				<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        			<thead>
            			<tr>
                			<th>No</th>
                			<th>Nama Kriteria</th>
            			</tr>
        			</thead>
        			<tbody>
					<?php
						// Menampilkan list kriteria
						$query = "SELECT id,nama FROM kriteria ORDER BY id";
						$result	= mysqli_query($koneksi, $query);

						$no = 0;
						while ($row = mysqli_fetch_assoc($result)) {
							$no++;
					?>
            		<tr>
						<td style="vertical-align:middle;"><?php echo $no ?></td>
                		<td style="vertical-align:middle;"><?php echo $row['nama'] ?></td>
						<td style="vertical-align:middle;">
							<form method="post" action="kriteria.php">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<button type="submit" name="edit" class="ui mini teal left labeled icon button"><i class="right edit icon"></i>EDIT</button>
								<button type="submit" name="delete" class="ui mini red left labeled icon button"><i class="right remove icon"></i>DELETE</button>
							</form>
						</td>
					</tr>
					<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3">
								<a href="tambah.php?jenis=kriteria">
									<div class="ui right floated small primary labeled icon button">
										<i class="plus icon"></i>Tambah
									</div>
								</a>
							</th>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
	<br>
	<form action="admin.php">
		<button class="ui green left labeled icon button" style="float: right;">
			Kembali<i class="left arrow icon"></i>
		</button>
	</form>

</section>

<?php include('footer.php'); ?>
