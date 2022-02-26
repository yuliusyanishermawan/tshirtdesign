<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Frequently Asked Questions";
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
            <form method="POST" enctype="multipart/form-data" action="action/faqtambahact">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pertanyaan</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="pertanyaan" placeholder="Masukkan Pertanyaan">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jawaban</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jawaban" name="jawaban">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="Tampil" selected>Tampil</option>
                    <option value="Tidak Tampil">Tidak Tampil</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
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




<?php
  include('includes/footer.php');
}
?>