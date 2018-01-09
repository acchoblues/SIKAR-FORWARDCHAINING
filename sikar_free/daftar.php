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
            <h2>Daftar Penyakit Tanaman Sayur Organik</h2>
            <table class="table table-bordered table-hover">
		<tr>
            <th><center>NO</center></th>
			<th><center>KODE </center></th>
			<th><center>NAMA PENYAKIT</center></th>
            <th><center>PENYEBAB</center></th>
            <th><center>DESKRIPSI</center></th>
		</tr>
		<?php 
        include "conn.php";
          $query = mysqli_query($koneksi,"SELECT * FROM penyakit ORDER BY kode ASC");
          $no=0;
		  while ($data=mysqli_fetch_array($query)) {
              $no++;
		?>
		<tr>
        <td><?php echo $no; ?></td>
			<td><?php echo $data['kode']; ?></td>
			<td><?php echo $data['nama_penyakit']; ?></td>
  	        <td><?php echo $data['penyebab']; ?></td>
            <td><a href="deskripsi.php?id=<?php echo $data['kode']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
            </tr>
            <?php } ?>
            </table>
          </div>
        </div>

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
