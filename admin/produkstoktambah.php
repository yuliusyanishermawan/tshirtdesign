<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Produk";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <?php
            $sql = "SELECT * FROM tbl_produk";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Produk</label>
                  <select class="form-control" name="produk">
                    <?php
                    $nomor = 0;
                    $sqltblfaq = "SELECT * FROM tbl_produk";
                    $querytblfaq = @mysqli_query($koneksidb, $sqltblfaq);
                    while ($result = @mysqli_fetch_array($querytblfaq)) {
                      $nomor++;
                    ?>
                      <option value="<?php echo htmlentities($result['nama_produk']); ?>"><?php echo htmlentities($result['nama_produk']); ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="bpilih" class="btn btn-primary">Pilih</button>
              </div>
            </form>
            <hr>
            <?php
            if (isset($_POST['bpilih'])) {
              $produk = $_POST['produk'];
              $sql = "SELECT * FROM tbl_produk WHERE nama_produk='$produk'";
              $query     = mysqli_query($koneksidb, $sql);
              $result = mysqli_fetch_array($query);
              include('includes/stoktampil.php');
            }
            ?>
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



<?php
  include('includes/footer.php');
}
?>