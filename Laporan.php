<?php 
	include('config.php');
	include('headeradmin.php');

?>


<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<ol class="breadcrumb">
	  			<li><a href="admin.php"><span class="fa fa-home"></span> Beranda</a></li>
	  			<li class="active"><span class="fa fa-bank"></span> Laporan</li>
			</ol>
			<form>
				<div class="row">
					<div class="col-md-6 text-left">
						<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Laporan</strong>
					</div>
					<a href="export.php">
						<div class="ui right floated small primary labeled icon button">
							<i class="download icon"></i>Export To Excel
						</div>
					</a>
				</div>
				<br/>
				<br>
				<?php include 'data-laporan.php'; ?>
			</form>
		</div>
	</div>
	<br><br>
	<form action="admin.php">
		<button class="ui green left labeled icon button" style="float: right;">
			Kembali<i class="left arrow icon"></i>
		</button>
	</form>
</section>

<?php include('footer.php'); ?>
