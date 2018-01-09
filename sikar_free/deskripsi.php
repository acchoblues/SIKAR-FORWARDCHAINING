<?php include "conn.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SISTEM PAKAR DIAGNOSA PENYAKIT SAYUR ORGANIK | www.hakkoblogs.com">
    <link rel="icon" href="">

    <title>SISTEM PAKAR DIAGNOSA PENYAKIT SAYUR ORGANIK | www.hakkoblogs.com</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <?php include "header.php"; ?>

      <main role="main">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-12">
            <h2>Penjelasan Detail</h2>
            <?php     
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
            <td><?php echo $row['nama_penyakit']; ?></td>
            <td><a href="cetak-deskripsi.php?id=<?php echo $row['kode']; ?>" class="btn btn-sm btn-primary" target="_blank">Download</a></td>
            
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
            <td>Nama Obat</td>
            <td>:</td>
            <td colspan="2"><?php echo $row['nama_obat']; ?></td>
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
            <a class="btn btn-sm btn-danger" href="daftar.php">Kembali</a>
          </div>
        </div>
<br /><br />
      </main>

      <!-- Modal Popup -->
      <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
                </div>
                <div class="modal-body">
                    <p>Selamat datang di sistem pakar gejala penyakit pada tumbuhan.</p>
                    <p>Di aplikasi ini anda bisa mengetahui penyakit tumbuhan dengan gejala yang ditimbulkannya</p>
                    <b>Sistem Pakar Penyakit Tumbuhan</b>
                </div>
            </div>
        </div>
    </div>
<!-- end Modal Popup -->

      <!-- Site footer -->
     <footer class="footer">
        <p>Copyright &copy; 2017 <a href="http://www.hakkoblogs.com">www.hakkoblogs.com</a></p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="js/jquery-slim.min.js"></script> -->
    <!-- <script>window.jQuery || document.write('<script src="js/jquery.js"><\/script>')</script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <!--  <script type="text/javascript">
      $(document).ready(function(){
          $("#myModal").modal('show');
      });
  </script>-->
  </body>
</html>
