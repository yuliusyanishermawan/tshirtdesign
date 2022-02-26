<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Ubah Password";
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
            <form method="POST" enctype="multipart/form-data" action="action/ubahpasswordact.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Lama</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password Lama" name="passwordlama">
                  <input type="password" class="form-control" id="exampleInputEmail1" value="<?php $is_admin ?>" name="id" hidden>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password Baru</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password Baru" name="passwordbaru">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Konfirmasi Password" name="passwordbaruconfirm">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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