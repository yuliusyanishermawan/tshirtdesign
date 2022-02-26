<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $title = "Dikerjakan";
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
              <h3 class="card-title">Tambah User Offline</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="action/dikerjakandatausertambahact.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap User</label>
                  <input type="text" class="form-control" name="nama_user" placeholder="Nama User..." required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Telfon</label>
                  <input type="text" class="form-control" name="nomor_telfon" placeholder="Nomor Telfon..." required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat..." required></textarea>
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

<?php
  include('includes/footer.php');
}
?>