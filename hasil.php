<?php
    include ('header.php');
?>

<section class="content">
    <h2 class="ui header">SPK Perhitungan Metode SMART</h2>
        <table class="ui celled green table">
            <thead>
                <tr>
                    <th class="collapsing">No</th>
                    <th>Nama Alternatif</th>
                    <th>Nilai Akademik</th>
                    <th>Nilai seni</th>
                    <th>Nilai olahraga</th>
                    <th>Nilai Peminatan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $n = 1 ;

                $sqljumlah ="SELECT SUM(nilai) FROM pv_kriteria ";
                $queryjumlah= mysqli_query($koneksi,$sqljumlah);
                $jumlah0=mysqli_fetch_array($queryjumlah);
                $jumlah = $jumlah0[0];
                                    
                // bobot
                $sqlkriteria ="SELECT nilai FROM pv_kriteria  ";
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
            
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$namaAlternatif['nama'] ?></td>
                <td><?=$Cout['a']?></td>
                <td><?=$Cout['b']?></td>
                <td><?=$Cout['c']?></td>
                <td><?=$Cout['d']?></td>
            </tr>
            <?php $n++;}?>
            </tbody>
        </table>
    <br>
    <?php include 'nilai_utility_dan_hasil.php'; ?>
</section>

<?php include('footer.php'); ?>
