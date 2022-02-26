<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Gambar Referensi";
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
            $sql = "SELECT * FROM tbl_gambar_referensi WHERE id_gambar_referensi='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" action="action/gambarreferensiubahact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Gambar</label>
                  <input type="text" class="form-control" name="nama_gambar" value="<?php echo htmlentities($result['nama_gambar']); ?>" required>
                  <input type="text" class="form-control" name="id" value="<?php echo htmlentities($result['id_gambar_referensi']); ?>" required hidden>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" disabled>
                      <label class="custom-file-label" for="exampleInputFile"><?php echo htmlentities($result['gambar']); ?></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="exampleInputFile">Gambar Referensi</label>
                    <img style="margin-top: 40px; margin-left: -120px;" src="image/referensi/<?php echo htmlentities($result['gambar']); ?>" width="200px" height="200px" class="img-thumbnail" alt="image/referensi/<?php echo htmlentities($result['gambar']); ?>">
                  </div>
                </div>
                <a href="gambarreferensigambarubah?id=<?php echo htmlentities($result['id_gambar_referensi']); ?>" type="button" class="btn btn-primary">Ubah Gambar</a>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
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