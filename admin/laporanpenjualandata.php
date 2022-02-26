<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Laporan Penjualan";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
  $awal = $_GET['awal'];
  $akhir = $_GET['akhir'];
?>
  <section class="content">
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
                    <th style="width: 10px;">No</th>
                    <th>No Invoice</th>
                    <th>Total Kaos</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sql = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.status='Pesanan Selesai' AND tbl_order.tanggal_order BETWEEN '$awal' AND '$akhir'";
                  $query = @mysqli_query($koneksidb, $sql);
                  while ($result = @mysqli_fetch_array($query)) {
                    $invoice = $result['no_invoice'];
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td style="text-transform: uppercase;"><a href="selesaidetail?id=<?php echo $result['no_invoice']; ?>" class="link-primary"><?php echo htmlentities($result['no_invoice']); ?></td>
                      <?php

                      $sqlmuncul = "SELECT no_invoice, SUM(ukuran_s) AS s, SUM(ukuran_m) AS m, SUM(ukuran_l) AS l, SUM(ukuran_xl) AS xl
                      FROM tbl_desain_produk_user WHERE no_invoice='$invoice' GROUP BY no_invoice";
                      $querymuncul = mysqli_query($koneksidb, $sqlmuncul);
                      while ($resultmuncul = mysqli_fetch_array($querymuncul)) {
                        $total = $resultmuncul['s'] + $resultmuncul['m'] + $resultmuncul['l'] + $resultmuncul['xl'];

                      ?>
                        <td><?php echo htmlentities($total); ?></td>

                      <?php } ?>
                      <td><?php echo htmlentities($result['nama_lengkap']); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['tanggal_order'])); ?></td>
                      <td><?php echo "Rp" . number_format($result['total_biaya'], 2, ",", "."); ?></td>
                    </tr>
                  <?php } ?>
              </table>
            </div>
            <div class="card-footer text-center">
              <a type="button" href="action/cetaklaporan?awal=<?php echo $awal; ?>&akhir=<?php echo $akhir; ?>" class="btn btn-primary col">Cetak</a>
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
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>




<?php
  include('includes/footer.php');
}
?>