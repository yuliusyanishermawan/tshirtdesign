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
            <form method="POST" action="action/beritaubahact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Berita</label>
                  <input type="text" class="form-control" name="nama_berita" value="<?php echo htmlentities($result['nama_berita']); ?>" required>
                  <input type="text" class="form-control" name="id_berita" value="<?php echo htmlentities($result['id_berita']); ?>" hidden>
                  <input type="text" class="form-control" name="gambar_berita_lama" value="<?php echo htmlentities($result['gambar_berita']); ?>" hidden>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Isi Berita</label>
                  <textarea class="form-control" rows="3" required name="isi_text"><?php echo htmlentities($result['isi_text']); ?></textarea>
                </div>
                <div class=" form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" name="gambar_berita" disabled>
                      <label class="custom-file-label" for="exampleInputFile"><?php echo htmlentities($result['gambar_berita']); ?></label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <label for="exampleInputFile">Gambar Berita</label>
                    <img style="margin-top: 40px; margin-left: -100px;" src="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>" width="200px" height="200px" class="img-thumbnail" alt="image/berita/<?php echo htmlentities($result['gambar_berita']); ?>">
                  </div>
                </div>
                <a href="beritagambarubah?id=<?php echo htmlentities($result['id_berita']); ?>" type="button" class="btn btn-primary">Ubah Gambar</a>

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