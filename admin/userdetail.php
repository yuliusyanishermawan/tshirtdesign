<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data User";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">


        <div class="col-md-12">

          <div class="card card-danger">
            <div class="card-header">
              <?php
              $id = $_GET['id'];
              $sql = "SELECT * FROM tbl_user WHERE id_user='$id'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3 class="card-title">Pie Chart Produk Terlaris <?php echo htmlentities($result['nama_lengkap']); ?></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="pieChartterlaris" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
        </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <form action="userdata">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['email']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['nama_lengkap']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['nomor']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['alamat']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['jenis_kelamin']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mendaftar</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo date('d F Y', strtotime($result['created'])); ?>" disabled>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kembali</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- Input addon -->

        </div>
        <div class="form-group">
        </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    $(function() {






      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChartterlaris').get(0).getContext('2d')
      var pieData = {
        labels: [

          <?php
          $id_user = $result['id_user'];
          $nomor = 0;
          $sqltblcount = "SELECT * FROM tbl_order INNER JOIN tbl_desain_produk_user ON tbl_order.no_invoice=tbl_desain_produk_user.no_invoice INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_order.status='Pesanan Selesai' AND tbl_order.id_user='$id_user'";
          $querytblcount = mysqli_query($koneksidb, $sqltblcount);
          while ($resultcount = mysqli_fetch_array($querytblcount)) {
          ?> '<?php echo htmlentities($resultcount['nama_produk']); ?>',
          <?php } ?>
        ],
        datasets: [{
          data: [
            <?php
            $nomor = 0;
            $sqltblcount = "SELECT * FROM tbl_order INNER JOIN tbl_desain_produk_user ON tbl_order.no_invoice=tbl_desain_produk_user.no_invoice INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_order.status='Pesanan Selesai' AND tbl_order.id_user='$id_user' ";
            $querytblcount = @mysqli_query($koneksidb, $sqltblcount);
            while ($resultcount = @mysqli_fetch_array($querytblcount)) {
            ?> '<?php echo htmlentities($resultcount['ukuran_s'] + $resultcount['ukuran_m'] + $resultcount['ukuran_l'] + $resultcount['ukuran_xl']); ?>',
            <?php } ?>
          ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#d221de', '#d2d63e', '#d2c63e', '#d2f61e', '#d2a6d6', '#d2b4d6'],
        }]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

    })
  </script>


<?php
  include('includes/footer.php');
}
?>