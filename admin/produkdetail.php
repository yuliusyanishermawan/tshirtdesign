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
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_produk WHERE id_produk='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form action="produkdata" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Produk</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['nama_produk']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kaos</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['jenis_kaos']); ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Warna Kaos</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['warna_kaos']); ?>" disabled>
                </div>
                <div class="row">
                  <div class="form-group col-3">
                    <label for="exampleInputEmail1">Stok S</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['stok_s']); ?>" disabled>
                  </div>
                  <div class="form-group col-3">
                    <label for="exampleInputEmail1">Stok M</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['stok_m']); ?>" disabled>
                  </div>
                  <div class="form-group col-3">
                    <label for="exampleInputEmail1">Stok L</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['stok_l']); ?>" disabled>
                  </div>
                  <div class="form-group col-3">
                    <label for="exampleInputEmail1">Stok XL</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['stok_xl']); ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga Produk</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['harga_produk']); ?>" disabled>
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
<?php
  include('includes/footer.php');
}
?>