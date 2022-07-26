<?php
session_start();

    include ('config.php');

?>
    <h2 class="ui header">Normalisasi Nilai Alternatif (Nilai Utility)</h2>
        <table class="ui celled green table">
            <thead>
                <tr>
                    <th class="collapsing">No</th>
                    <th>Nama Alternatif</th>
                    <th>Nilai Akademik</th>
                    <th>Nilai seni</th>
                    <th>Nilai olahraga</th>
                    <th>Nilai Peminatan</th>
                    <th>Nilai Bobot Evaluasi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $n = 1;

                $sqljumlah ="SELECT SUM(nilai) FROM pv_kriteria ";
                $queryjumlah= mysqli_query($koneksi,$sqljumlah);
                $jumlah0=mysqli_fetch_array($queryjumlah);
                $jumlah = $jumlah0[0];
                                    
                // bobot
                $sqlkriteria ="SELECT nilai FROM pv_kriteria ";
                $querykriteria = mysqli_query($koneksi, $sqlkriteria);
                $bobot=[];
                while ($bariskriteria= mysqli_fetch_array($querykriteria)) {
                    $bobot[]=$bariskriteria['nilai'];
                }
                
                //nilai 
                $sqlnilai = "SELECT id, nama, id_alternatif, a, b, c, d, nisn FROM alternatif,nilai_kuis WHERE alternatif.id = nilai_kuis.id_alternatif AND nisn='$_SESSION[nisn]' ORDER BY nisn='$_SESSION[nisn]' ASC";
                $querynilai = mysqli_query($koneksi,$sqlnilai);
                                    
                while ($Cout=mysqli_fetch_array($querynilai)) {  
                    $id= $Cout['id'];
                    $sqlnamaAL = "SELECT nama FROM alternatif WHERE id = $id";
                    $namaAlternatif= mysqli_fetch_array(mysqli_query($koneksi,$sqlnamaAL));
                    //nilai
                    $Cmax=100;
                    $Cmin=25;
                    $nilaiP = ($Cout['a']-$Cmin)/($Cmax-$Cmin);
                    $nilaiK = ($Cout['b']-$Cmin)/($Cmax-$Cmin);
                    $nilaiA = ($Cout['c']-$Cmin)/($Cmax-$Cmin);
                    $nilaiS = ($Cout['d']-$Cmin)/($Cmax-$Cmin);
                    $nilaievaluasi = ($nilaiP*$bobot[0]) + ($nilaiK*$bobot[1]) + ($nilaiA*$bobot[2]) + ($nilaiS*$bobot[3]);
                    $query = "INSERT INTO ranking VALUES ($id, $nilaievaluasi, '$_SESSION[nisn]') ON DUPLICATE KEY UPDATE nilai=$nilaievaluasi";
	                $result = mysqli_query($koneksi,$query);
	                    if (!$result) {
	                        echo "Gagal mengupdate ranking";
	                        exit();
	                    };
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$namaAlternatif['nama'] ?></td>
                <td><?= round($nilaiP,6)?></td>
                <td><?= round($nilaiK,6)?></td>
                <td><?= round($nilaiA,6)?></td>
                <td><?= round($nilaiS,6)?></td>
                <td><?= round($nilaievaluasi,6)?></td>
            </tr>
            <?php $n++;}?>
            </tbody>
        </table>
        <br>
        <h2 class="ui header">Perangkingan</h2>
	        <table class="ui celled green table">
		        <thead>
			        <tr>
				        <th class="collapsing">Peringkat</th>
				        <th>Alternatif</th>
				        <th>Nilai</th>
                        <th>Nisn</th>
			        </tr>
		        </thead>
		        <tbody>
			    <?php
			        $query  = "SELECT id,nama,id_alternatif,nilai,nisn FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif AND nisn='$_SESSION[nisn]' ORDER BY nilai DESC";
		        	$result = mysqli_query($koneksi, $query);

				    $i = 0;
				    while ($row = mysqli_fetch_array($result)) {
				    	$i++;
				?>
				<tr>
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

					<td><?php echo $row['nama'] ?></td>
					<td><?php echo $row['nilai'] ?></td>
                    <td><?php echo $row['nisn'] ?></td>
				</tr>

				<?php	
				}
                ?>
                
		    </tbody>
	    </table>
        <br>
	    <form action="user.php?#rekom">
	        <button class="ui green right labeled icon button" style="float: right;">
		    Lanjut Ke Pemilihan Alternatif<i class="right arrow icon"></i>
	        </button>
	    </form>