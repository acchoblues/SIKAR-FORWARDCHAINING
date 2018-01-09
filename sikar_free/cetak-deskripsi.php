 <?php
 //Define relative path from this script to mPDF
 $nama_file='cetak-deskripsi'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH . "mpdf.php");
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

$mpdf->useGraphs = true;

?>
 <h2>Penjelasan Detail</h2>
            <?php  
            include "conn.php";   
  $id = $_GET['id'];
  $sql = mysqli_query($koneksi, "SELECT pencegahan.*, penyakit.*, solusi.*, rule.* 
                                FROM pencegahan, penyakit, solusi, rule  
                                WHERE penyakit.kode=rule.maka AND
                                penyakit.kode=pencegahan.kode AND
                                solusi.kd_pencegahan=pencegahan.kd_pencegahan AND
                                penyakit.kode='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: daftar.php");
			}else{
				$row = mysqli_fetch_array($sql);
			}
 
 ?>  
            <table class="table table-bordered table-hover">
            <tr>
            <td>Penyakit</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['nama_penyakit']; ?></td>
            </tr>
            <tr>
            <td>Penyebab</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['penyebab']; ?></td>
            </tr>
            <tr>
            <td>Gejala</td>
            <td>:</td>
            <td colspan="2">
            
            <?php 
            $ab = $row['jika'];
            $a = explode("AND", $ab);
            if(isset($a[0])){
            $sql1 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[0]'");
				$row1 = mysqli_fetch_array($sql1);
                echo "<ul><li>$row1[gejala]</li>";
                } else {echo "";}
                 ?>
                 <?php
                 if(isset($a[1])){
            $sql2 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[1]'");
				$row2 = mysqli_fetch_array($sql2);
                echo "<li>$row2[gejala]</li>";
                } else {echo "";}
                 ?>
                  <?php
                 if(isset($a[2])){
            $sql3 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[1]'");
				$row3 = mysqli_fetch_array($sql3);
                echo "<li>$row3[gejala]</li>";
                } else {echo "";}
                 ?>
                  <?php
                 if(isset($a[3])){
            $sql4 = mysqli_query($koneksi, "SELECT * FROM  gejala WHERE kd_gejala='$a[1]'");
				$row4 = mysqli_fetch_array($sql4);
                echo "<li>$row4[gejala]</li></ul>";
                } else {echo "";}
                 ?>
                 </td>
            </tr>
            <tr>
            <td>Pencegahan</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['deskripsi']; ?></td>
            </tr>
            <tr>
            <td>Solusi</td>
            <td>:</td>
            <td colspan="2">
            <ul>
            <?php
            $nomor = $row['kd_pencegahan'];
            $query = mysqli_query($koneksi,"SELECT * FROM solusi WHERE kd_pencegahan='$nomor'");
          $no=0;
		  while ($data=mysqli_fetch_array($query)) {
              ?>
              
            <li><?php echo $data['solusi']; ?></li>
            
            <?php }
            ?>
            </ul>
            </td>
            
            </tr>
            </table>
            <?php

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".date("Y/m/d H:i:s").".pdf" ,'I');

 


exit; 
?>