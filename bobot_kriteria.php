<?php
	include('config.php');
	include('fungsi.php');

	include('headeradmin.php');
?>
<section class="content">
	<h2 class="ui header">Perbandingan Kriteria (Metode AHP)</h2>
	<?php showTabelPerbandingan('kriteria','kriteria'); ?>
	<br>

CARA PENILAIAN

Anda disini akan memasukan nilai dari perbandingan setiap Jurusan berdasarkan kriteria

Jika anda memasukan Jurusan 1 & Jurusan 2 # nilai "1" # maka dapat dikatakan bahwa Kriteria 1 dan 2 memiliki kepentingan yang sama terhadap kriteria

Lalu Jika anda memasukan Jurusan 1 & Jurusan 2 #nilai "0,5" atau nilai < 1 , maka dapat dikatakan bahwa kriteria 1 0,5 mendekati lebih penting dari pada kriteria 2 atau bisa di katakan bawah Kriteria 2 sedikti lebih penting dari pada kriteria 1 terhadap kriteria

Anda melakukan proses ini sebanyak 3 kali sesuai engan kriteria. dilakukan peng inputan 1 persatu

	<h3 class="ui header">Tabel Tingkat Kepentingan menurut Saaty (1980)</h3>
		<table class="ui celled green table">
			<thead>
				<tr>
					<th class="collapsing">Nilai Numerik</th>
					<th>Tingkat Kepentingan <em>(Preference)</em></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="center aligned">1</td>
					<td>Sama pentingnya <em>(Equal Importance)</em></td>
				</tr>
				<tr>
					<td class="center aligned">2</td>
					<td>Sama hingga sedikit lebih penting</td>
				</tr>
				<tr>
					<td class="center aligned">3</td>
					<td>Sedikit lebih penting <em>(Slightly more importance)</em></td>
				</tr>
				<tr>
					<td class="center aligned">4</td>
					<td>Sedikit lebih hingga jelas lebih penting</td>
				</tr>
				<tr>
					<td class="center aligned">5</td>
					<td>Jelas lebih penting <em>(Materially more importance)</em></td>
				</tr>
				<tr>
					<td class="center aligned">6</td>
					<td>Jelas hingga sangat jelas lebih penting</td>
				</tr>
				<tr>
					<td class="center aligned">7</td>
					<td>Sangat jelas lebih penting <em>(Significantly more importance)</em></td>
				</tr>
				<tr>
					<td class="center aligned">8</td>
					<td>Sangat jelas hingga mutlak lebih penting</td>
				</tr>
				<tr>
					<td class="center aligned">9</td>
					<td>Mutlak lebih penting <em>(Absolutely more importance)</em></td>
				</tr>
			</tbody>
		</table>
</section>

<?php include('footer.php'); ?>