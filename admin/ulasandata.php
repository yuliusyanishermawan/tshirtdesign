<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Ulasan";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Chart Ratings Perbulan</h3>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title ?></h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Invoice</th>
                    <th>Nama</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblberita = "SELECT * FROM tbl_order INNER JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.ulasan >='0' ";
                  $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                  while ($result = @mysqli_fetch_array($querytblberita)) {
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><?php echo htmlentities($result['no_invoice']); ?></td>
                      <td><?php echo htmlentities($result['nama_lengkap']); ?></td>
                      <td><?php echo htmlentities($result['ulasan']); ?></td>
                      <td><?php echo htmlentities($result['ratings']); ?></td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <script>
    $(function() {
      var areaChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ],
        datasets: [{
          label: 'Max Rating = 5',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?php
                  $tahun = date('Y');
                  $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=1 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                  $query = mysqli_query($koneksidb, $sql);
                  $result = mysqli_fetch_array($query);
                  if ($result['jumlah'] == 0) {
                    echo 0;
                  } else {
                    $hasil = $result['jumlah'] / $result['jml'];
                    echo $hasil;
                  }
                  ?>, <?php
                      $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=2 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                      $query = mysqli_query($koneksidb, $sql);
                      $result = mysqli_fetch_array($query);
                      if ($result['jumlah'] == 0) {
                        echo 0;
                      } else {
                        $hasil = $result['jumlah'] / $result['jml'];
                        echo $hasil;
                      }
                      ?>, <?php
                          $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)= AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                          $query = mysqli_query($koneksidb, $sql);
                          $result = mysqli_fetch_array($query);
                          if ($result['jumlah'] == 0) {
                            echo 0;
                          } else {
                            $hasil = $result['jumlah'] / $result['jml'];
                            echo $hasil;
                          }
                          ?>, <?php
                              $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=4 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                              $query = mysqli_query($koneksidb, $sql);
                              $result = mysqli_fetch_array($query);
                              if ($result['jumlah'] == 0) {
                                echo 0;
                              } else {
                                $hasil = $result['jumlah'] / $result['jml'];
                                echo $hasil;
                              }
                              ?>, <?php
                                  $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=5 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                  $query = mysqli_query($koneksidb, $sql);
                                  $result = mysqli_fetch_array($query);
                                  if ($result['jumlah'] == 0) {
                                    echo 0;
                                  } else {
                                    $hasil = $result['jumlah'] / $result['jml'];
                                    echo $hasil;
                                  }
                                  ?>, <?php
                                      $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=6 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                      $query = mysqli_query($koneksidb, $sql);
                                      $result = mysqli_fetch_array($query);
                                      if ($result['jumlah'] == 0) {
                                        echo 0;
                                      } else {
                                        $hasil = $result['jumlah'] / $result['jml'];
                                        echo $hasil;
                                      }
                                      ?>, <?php
                                          $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=7 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                          $query = mysqli_query($koneksidb, $sql);
                                          $result = mysqli_fetch_array($query);
                                          if ($result['jumlah'] == 0) {
                                            echo 0;
                                          } else {
                                            $hasil = $result['jumlah'] / $result['jml'];
                                            echo $hasil;
                                          }
                                          ?>, <?php
                                              $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=8 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                              $query = mysqli_query($koneksidb, $sql);
                                              $result = mysqli_fetch_array($query);
                                              if ($result['jumlah'] == 0) {
                                                echo 0;
                                              } else {
                                                $hasil = $result['jumlah'] / $result['jml'];
                                                echo $hasil;
                                              }
                                              ?>, <?php
                                                  $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=9 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                                  $query = mysqli_query($koneksidb, $sql);
                                                  $result = mysqli_fetch_array($query);
                                                  if ($result['jumlah'] == 0) {
                                                    echo 0;
                                                  } else {
                                                    $hasil = $result['jumlah'] / $result['jml'];
                                                    echo $hasil;
                                                  }
                                                  ?>, <?php
                                                      $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=10 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                                      $query = mysqli_query($koneksidb, $sql);
                                                      $result = mysqli_fetch_array($query);
                                                      if ($result['jumlah'] == 0) {
                                                        echo 0;
                                                      } else {
                                                        $hasil = $result['jumlah'] / $result['jml'];
                                                        echo $hasil;
                                                      }
                                                      ?>, <?php
                                                          $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=11 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                                          $query = mysqli_query($koneksidb, $sql);
                                                          $result = mysqli_fetch_array($query);
                                                          if ($result['jumlah'] == 0) {
                                                            echo 0;
                                                          } else {
                                                            $hasil = $result['jumlah'] / $result['jml'];
                                                            echo $hasil;
                                                          }
                                                          ?>, <?php
                                                              $sql = "SELECT *,COUNT(ratings) as jml, SUM(ratings) as jumlah FROM tbl_order WHERE MONTH(tanggal_order)=12 AND ratings>'0' AND YEAR(tanggal_order)='$tahun'";
                                                              $query = mysqli_query($koneksidb, $sql);
                                                              $result = mysqli_fetch_array($query);
                                                              if ($result['jumlah'] == 0) {
                                                                echo 0;
                                                              } else {
                                                                $hasil = $result['jumlah'] / $result['jml'];
                                                                echo $hasil;
                                                              }
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
    })
  </script>
<?php
  include('includes/footer.php');
} ?>