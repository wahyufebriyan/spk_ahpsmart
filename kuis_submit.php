<?php
include('config.php');
include('header.php');

if(isset($_POST["submit"])) {
    
    //Mengambil nilai jawaban tiap soal
    $a1 = $_POST['a1'];$a2 = $_POST['a2'];$a3 = $_POST['a3'];$a4 = $_POST['a4'];
    $b1 = $_POST['b1'];$b2 = $_POST['b2'];$b3 = $_POST['b3'];$b4 = $_POST['b4'];
    $c1 = $_POST['c1'];$c2 = $_POST['c2'];$c3 = $_POST['c3'];$c4 = $_POST['c4'];
    $d1 = $_POST['d1'];$d2 = $_POST['d2'];$d3 = $_POST['d3'];$d4 = $_POST['d4'];
    $e1 = $_POST['e1'];$e2 = $_POST['e2'];$e3 = $_POST['e3'];$e4 = $_POST['e4'];
    $f1 = $_POST['f1'];$f2 = $_POST['f2'];$f3 = $_POST['f3'];$f4 = $_POST['f4'];
    $g1 = $_POST['g1'];$g2 = $_POST['g2'];$g3 = $_POST['g3'];$g4 = $_POST['g4'];
    $h1 = $_POST['h1'];$h2 = $_POST['h2'];$h3 = $_POST['h3'];$h4 = $_POST['h4'];
    $i1 = $_POST['i1'];$i2 = $_POST['i2'];$i3 = $_POST['i3'];$i4 = $_POST['i4'];
    $j1 = $_POST['j1'];$j2 = $_POST['j2'];$j3 = $_POST['j3'];$j4 = $_POST['j4'];
    //Mengambil nilai id alternatif
    $id1 = $_POST['id1'];$id2= $_POST['id2'];$id3 = $_POST['id3'];$id4 = $_POST['id4'];$id5 = $_POST['id5'];
    $id6 = $_POST['id6'];$id7 = $_POST['id7'];$id8 = $_POST['id8'];$id9 = $_POST['id9'];$id10 = $_POST['id10'];

    $query = "INSERT INTO nilai_kuis (id_alternatif,a,b,c,d,nisn) VALUES 
    ($id1,$a1,$a2,$a3,$a4,'$_SESSION[nisn]'),
    ($id2,$b1,$b2,$b3,$b4,'$_SESSION[nisn]')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      echo "<script>alert('Anda Belum Menjawab Semuanya..! Harap Pilih Salah Salah Satu Jawaban Yang Ada');location.href='javascript:history.back()';</script>";
      exit();
    }
}
?>
<section class="content">
  <h2><center>Silahkan Lihat Hasil Anda</center></h2>
  <center><button class="ui gray submit button" type="submit" ><a href="hasil.php">Hasil</a></button></center>
</section>
<?php include('footer.php'); ?>