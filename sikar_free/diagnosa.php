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
            <h2>Diagnosa</h2>
            <?php if (isset($_GET['error'])) {echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
  <strong>Ups! </strong> $_GET[error]
</div>";} else { echo "";} ?>
            <form method="POST" action="hasil.php" name="diagnosa" enctype="form-data/multipart">
            <?php 
		  $query = mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY kd_gejala ASC");
          $no=0;
		  while ($data=mysqli_fetch_array($query)) {
		      $a = $data['gejala'];
              $no++;
		?>
        <?php echo $no; ?>.    <input type="checkbox" value="<?php echo $data['kd_gejala'];?>" name="cek[]" /> <?php echo $data['gejala']; ?><br />
            <?php }?><br />
            <input type="submit" class="btn btn-medium btn-primary" value="Cek Diagnosa" name="proses" />
            </form>
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
