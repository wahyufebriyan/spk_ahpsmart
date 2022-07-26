<?php 
	include('config.php');

?>

				<table class="ui celled green table" border="1">
            			<tr>
                			<th>No</th>
							<th>Nisn</th>
                			<th>Nama</th>
							<th>Hasil Pilihan Siswa</th>
            			</tr>
						<?php
							// Menampilkan list laporan
							$query = "SELECT nisn,username,hasil,nama FROM user,alternatif WHERE level='user' AND hasil=alternatif.id";
							$result	= mysqli_query($koneksi, $query);

							$no = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$no++;
						?>
            			<tr>
							<td style="vertical-align:middle;"><?php echo $no ?></td>
                			<td style="vertical-align:middle;"><?php echo $row['nisn'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['username'] ?></td>
							<td style="vertical-align:middle;"><?php echo $row['nama'] ?></td>
            			</tr>
						<?php
							}
						?>
				</table>