<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Kritik Dan Saran";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>
  <?php
  if (isset($_POST['balas'])) {
    $id_kritiksaran = $_POST['id_kritiksaran'];
    $balasan = $_POST['balasan'];
    $sql     = "UPDATE tbl_kritiksaran SET balasan='$balasan' WHERE id_kritiksaran='$id_kritiksaran'";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
      echo "<script type='text/javascript'>
                  alert('Kritik dan Saran Berhasil Dibalaskan.'); 
                  document.location = 'kritiksarandata.php'; 
              </script>";
    } else {
      echo "<script type='text/javascript'>
                  alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = 'kritiksarandata.php';
              </script>";
    }
  } ?>
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
            $sql = "SELECT * FROM tbl_kritiksaran WHERE id_kritiksaran='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($result['nama']); ?>" required readonly>
                  <input type="text" class="form-control" name="id_kritiksaran" value="<?php echo htmlentities($result['id_kritiksaran']); ?>" hidden>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($result['email']); ?>" required readonly>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Jenis</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($result['jenis']); ?>" required readonly>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Isi</label>
                  <textarea class="form-control" rows="3" required name="isi_text" readonly><?php echo htmlentities($result['isi_text']); ?></textarea>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Dibuat</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo htmlentities($result['created']); ?>" required readonly>
                </div>
                <div class=" form-group">
                  <label for="exampleInputPassword1">Balasan</label>
                  <textarea class="form-control" rows="3" required name="balasan" required></textarea>
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="balas">Simpan</button>
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