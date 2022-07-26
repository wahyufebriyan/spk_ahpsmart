<?php 
	include('config.php');

	$query1 = "SELECT * FROM user,alternatif WHERE hasil=alternatif.id AND nama='Pramuka'";
	$query2 = "SELECT * FROM user,alternatif WHERE hasil=alternatif.id AND nama='Animasi Dan Vidiografik'";
	$query3 = "SELECT * FROM user,alternatif WHERE hasil=alternatif.id AND nama='Web Desain'";
	$query4 = "SELECT * FROM user,alternatif WHERE hasil=alternatif.id AND nama='Paskibra'";
	$query5 = "SELECT * FROM user,alternatif WHERE hasil=alternatif.id AND nama='Bahasa Arab'";
	$result1 = mysqli_query($koneksi, $query1);
	$result2= mysqli_query($koneksi, $query2);
	$result3= mysqli_query($koneksi, $query3);
	$result4= mysqli_query($koneksi, $query4);
	$result5= mysqli_query($koneksi, $query5);
	$a=0;
	while ($row = mysqli_fetch_array($result1)) {
		$a++;
	};
	$b=0;
	while ($row = mysqli_fetch_array($result2)) {
		$b++;
	};
	$c=0;
	while ($row = mysqli_fetch_array($result3)) {
		$c++;
	};
	$d=0;
	while ($row = mysqli_fetch_array($result4)) {
		$d++;
	};
	$e=0;
	while ($row = mysqli_fetch_array($result5)) {
		$e++;
	};

?>