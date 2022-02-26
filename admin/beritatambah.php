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
  include('action/beritatambahact.php');

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
            <form method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul Berita</label>
                  <input type="text" class="form-control" name="nama_berita" placeholder="Judul Berita" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Isi Berita</label>
                  <textarea class="form-control" name="isi_berita" rows="3" placeholder="Isi Berita..." required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gambar Berita</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <label class="custom-file-label">Pilih Gambar</label><br>
                      <input type="file" class="custom-file-input" accept="image/*" name="gambar_berita" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="btambah">Tambah</button>
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