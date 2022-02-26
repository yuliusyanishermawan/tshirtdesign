<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Berita";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
  include('includes/uploadview.php');
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
            $sql = "SELECT * FROM tbl_berita WHERE id_berita='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" action="action/beritagambarubahact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class=" form-group">
                  <label for="exampleInputFile">Ubah Gambar</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imgInp" accept="image/*" name="gambar_berita" required>
                      <input type="text" class="custom-file-input" id="imgInp" accept="image/*" value="<?php echo htmlentities($result['id_berita']); ?>" name="id_berita" hidden>
                      <label class="custom-file-label" for="exampleInputFile"></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="exampleInputFile">Gambar Lama</label>
                    <img style="margin-top: 40px; margin-left: -100px;" src="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>" width="200px" alt="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>">
                    <label for="exampleInputFile" style="margin-left: 100px;">Gambar Baru</label>
                    <img style="margin-top: 40px; margin-left: -95px;" id='img-upload' width="200px">
                  </div>
                </div>
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