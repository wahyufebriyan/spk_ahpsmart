<?php
	include('config.php');
	include('fungsi.php');
	include('header.php');

?>


<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<ol class="breadcrumb">
	  			<li><a href="user.php"><span class="fa fa-home"></span> Beranda</a></li>
	  			<li class="active"><span class="fa fa-bank"></span> Data Alternatif</li>
			</ol>
			<form>
				<div class="row">
					<div class="col-md-6 text-left">
						<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Data Alternatif</strong>
					</div>
				</div>
				<br/>

				<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        			<thead>
            			<tr>
                			<th>No</th>
							<th>Nama Alternatif</th>
            			</tr>
        			</thead>
        			<tbody>
						<?php
							// Menampilkan list alternatif
							$query = "SELECT id,nama FROM alternatif ORDER BY id";
							$result	= mysqli_query($koneksi, $query);

							$no = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$no++;
						?>
            			<tr>
                			<td style="vertical-align:middle;"><?php echo $no ?></td>
                			<td style="vertical-align:middle;"><?php echo $row['nama'] ?></td>
            			</tr>
						<?php } ?>
        			</tbody>
    			</table>
			</form>	
		</div>
	</div>
	<br>
    <form action="user.php">
	    <button class="ui green left labeled icon button" style="float: right;">
	    Kembali<i class="left arrow icon"></i>
        </button>
	</form>
</section>

<?php include('footer.php'); ?>