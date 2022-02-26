<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Dashboard";
  include('includes/header.php');
  include('includes/sidebar.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <!-- Main content -->
  <section class="content">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Chart Peningkatan Pengguna</h3>

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
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
          <div class="col-md-6">

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Pie Chart Loyalitas Pelanggan</h3>

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
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </div>


          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart Produk Terlaris</h3>
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
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Chart Penjualan</h3>
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
                <div class="chart">
                  <canvas id="barChartpenjualan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->

          </div>


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </section>
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order WHERE status='Menunggu Pembayaran'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Menunggu Pembayaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="pembayarandata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order WHERE status='Menunggu Konfirmasi'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Menunggu Konfirmasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-load-b"></i>
            </div>
            <a href="konfirmasidata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order WHERE status='Menunggu Dikerjakan'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Menunggu Dikerjakan</p>
            </div>
            <div class="icon">
              <i class="ion ion-paper-airplane"></i>
            </div>
            <a href="dikerjakandata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order WHERE status='Selesai Dikerjakan'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Selesai Dikerjakan</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="selesaidata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order WHERE status='Pesanan Selesai'";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="selesaidata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <?php
              $sql = "SELECT count(no_invoice) AS jumlah FROM tbl_order";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>

              <p>Total Order</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $sql = "SELECT count(id_user) AS jumlah FROM tbl_user";
              $query = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              ?>
              <h3><?php echo htmlentities($result['jumlah']); ?></h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="userdata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
    $(function() {
      var areaChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ],
        datasets: [{
          label: 'Peningkatan User',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  $tahun = date('Y');
                  $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=1 AND YEAR(created)='$tahun'";
                  $query = mysqli_query($koneksidb, $sql);
                  $result = mysqli_fetch_array($query);
                  echo htmlentities($result['jml']);
                  ?>, <?php

                      $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=2 AND YEAR(created)='$tahun'";
                      $query = mysqli_query($koneksidb, $sql);
                      $result = mysqli_fetch_array($query);
                      echo htmlentities($result['jml']);
                      ?>, <?php

                          $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=3 AND YEAR(created)='$tahun'";
                          $query = mysqli_query($koneksidb, $sql);
                          $result = mysqli_fetch_array($query);
                          echo htmlentities($result['jml']);
                          ?>, <?php

                              $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=4 AND YEAR(created)='$tahun'";
                              $query = mysqli_query($koneksidb, $sql);
                              $result = mysqli_fetch_array($query);
                              echo htmlentities($result['jml']);
                              ?>, <?php

                                  $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=5 AND YEAR(created)='$tahun'";
                                  $query = mysqli_query($koneksidb, $sql);
                                  $result = mysqli_fetch_array($query);
                                  echo htmlentities($result['jml']);
                                  ?>, <?php

                                      $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=6 AND YEAR(created)='$tahun'";
                                      $query = mysqli_query($koneksidb, $sql);
                                      $result = mysqli_fetch_array($query);
                                      echo htmlentities($result['jml']);
                                      ?>, <?php

                                          $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=7 AND YEAR(created)='$tahun'";
                                          $query = mysqli_query($koneksidb, $sql);
                                          $result = mysqli_fetch_array($query);
                                          echo htmlentities($result['jml']);
                                          ?>, <?php

                                              $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=8 AND YEAR(created)='$tahun'";
                                              $query = mysqli_query($koneksidb, $sql);
                                              $result = mysqli_fetch_array($query);
                                              echo htmlentities($result['jml']);
                                              ?>, <?php

                                                  $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=9 AND YEAR(created)='$tahun'";
                                                  $query = mysqli_query($koneksidb, $sql);
                                                  $result = mysqli_fetch_array($query);
                                                  echo htmlentities($result['jml']);
                                                  ?>, <?php

                                                      $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=10 AND YEAR(created)='$tahun'";
                                                      $query = mysqli_query($koneksidb, $sql);
                                                      $result = mysqli_fetch_array($query);
                                                      echo htmlentities($result['jml']);
                                                      ?>, <?php

                                                          $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=11 AND YEAR(created)='$tahun'";
                                                          $query = mysqli_query($koneksidb, $sql);
                                                          $result = mysqli_fetch_array($query);
                                                          echo htmlentities($result['jml']);
                                                          ?>, <?php

                                                              $sql = "SELECT COUNT(id_user) as jml FROM tbl_user WHERE MONTH(created)=12 AND YEAR(created)='$tahun'";
                                                              $query = mysqli_query($koneksidb, $sql);
                                                              $result = mysqli_fetch_array($query);
                                                              echo htmlentities($result['jml']);
                                                              ?>]
        }]
      }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(false, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]

      barChartData.datasets[0] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
      //-------------
      //- DONUT CHART -
      //-------------
      var areaChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ],
        datasets: [{
          label: 'Peningkatan Penjualan',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  $tahun = date('Y');
                  $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=1 AND YEAR(tanggal_order)='$tahun'";
                  $query = mysqli_query($koneksidb, $sql);
                  $result = mysqli_fetch_array($query);
                  echo htmlentities($result['jml']);
                  ?>, <?php

                      $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=2 AND YEAR(tanggal_order)='$tahun'";
                      $query = mysqli_query($koneksidb, $sql);
                      $result = mysqli_fetch_array($query);
                      echo htmlentities($result['jml']);
                      ?>, <?php

                          $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=3 AND YEAR(tanggal_order)='$tahun'";
                          $query = mysqli_query($koneksidb, $sql);
                          $result = mysqli_fetch_array($query);
                          echo htmlentities($result['jml']);
                          ?>, <?php

                              $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=4 AND YEAR(tanggal_order)='$tahun'";
                              $query = mysqli_query($koneksidb, $sql);
                              $result = mysqli_fetch_array($query);
                              echo htmlentities($result['jml']);
                              ?>, <?php

                                  $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=5 AND YEAR(tanggal_order)='$tahun'";
                                  $query = mysqli_query($koneksidb, $sql);
                                  $result = mysqli_fetch_array($query);
                                  echo htmlentities($result['jml']);
                                  ?>, <?php

                                      $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=6 AND YEAR(tanggal_order)='$tahun'";
                                      $query = mysqli_query($koneksidb, $sql);
                                      $result = mysqli_fetch_array($query);
                                      echo htmlentities($result['jml']);
                                      ?>, <?php

                                          $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=7 AND YEAR(tanggal_order)='$tahun'";
                                          $query = mysqli_query($koneksidb, $sql);
                                          $result = mysqli_fetch_array($query);
                                          echo htmlentities($result['jml']);
                                          ?>, <?php

                                              $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=8 AND YEAR(tanggal_order)='$tahun'";
                                              $query = mysqli_query($koneksidb, $sql);
                                              $result = mysqli_fetch_array($query);
                                              echo htmlentities($result['jml']);
                                              ?>, <?php

                                                  $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=9 AND YEAR(tanggal_order)='$tahun'";
                                                  $query = mysqli_query($koneksidb, $sql);
                                                  $result = mysqli_fetch_array($query);
                                                  echo htmlentities($result['jml']);
                                                  ?>, <?php

                                                      $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=10 AND YEAR(tanggal_order)='$tahun'";
                                                      $query = mysqli_query($koneksidb, $sql);
                                                      $result = mysqli_fetch_array($query);
                                                      echo htmlentities($result['jml']);
                                                      ?>, <?php

                                                          $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=11 AND YEAR(tanggal_order)='$tahun'";
                                                          $query = mysqli_query($koneksidb, $sql);
                                                          $result = mysqli_fetch_array($query);
                                                          echo htmlentities($result['jml']);
                                                          ?>, <?php

                                                              $sql = "SELECT SUM(total_biaya) as jml FROM tbl_order WHERE MONTH(tanggal_order)=12 AND YEAR(tanggal_order)='$tahun'";
                                                              $query = mysqli_query($koneksidb, $sql);
                                                              $result = mysqli_fetch_array($query);
                                                              echo htmlentities($result['jml']);
                                                              ?>]
        }]
      }

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChartpenjualan').get(0).getContext('2d')
      var barChartData = $.extend(false, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]

      barChartData.datasets[0] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }
      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = {
        labels: [

          <?php
          $nomor = 0;
          $sqltblcount = "SELECT * FROM tbl_user";
          $querytblcount = @mysqli_query($koneksidb, $sqltblcount);
          while ($resultcount = @mysqli_fetch_array($querytblcount)) {
          ?> '<?php echo htmlentities($resultcount['nama_lengkap']); ?>',
          <?php } ?>
        ],
        datasets: [{
          data: [
            <?php
            $nomor = 0;
            $sqltblcount = "SELECT id_user,COUNT(*) AS jumlahorder FROM tbl_order GROUP BY id_user";
            $querytblcount = @mysqli_query($koneksidb, $sqltblcount);
            while ($resultcount = @mysqli_fetch_array($querytblcount)) {
              $sqlcountt = "SELECT *,COUNT(no_invoice) AS jumlahorderr FROM tbl_order";
              $querycountt = mysqli_query($koneksidb, $sqlcountt);
              $resultcountt = mysqli_fetch_array($querycountt);
              $presentase = (($resultcount['jumlahorder'] * 10) / ($resultcountt['jumlahorderr']) * 10);
            ?>
              <?php echo $resultcount['jumlahorder']; ?>,
            <?php } ?>
          ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#d221de', '#d2d63e', '#d2c63e', '#d2f61e', '#d2a6d6'],
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





      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChartterlaris').get(0).getContext('2d')
      var pieData = {
        labels: [

          <?php
          $nomor = 0;
          $sqltblcount = "SELECT * FROM tbl_order INNER JOIN tbl_desain_produk_user ON tbl_order.no_invoice=tbl_desain_produk_user.no_invoice INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_order.status='Pesanan Selesai'";
          $querytblcount = mysqli_query($koneksidb, $sqltblcount);
          while ($resultcount = mysqli_fetch_array($querytblcount)) {
          ?> '<?php echo htmlentities($resultcount['nama_produk']); ?>',
          <?php } ?>
        ],
        datasets: [{
          data: [
            <?php
            $nomor = 0;
            $sqltblcount = "SELECT * FROM tbl_order INNER JOIN tbl_desain_produk_user ON tbl_order.no_invoice=tbl_desain_produk_user.no_invoice INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_order.status='Pesanan Selesai' ";
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