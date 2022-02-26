<?php
session_start();
error_reporting(0);
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
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_faq WHERE id_faq='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" action="action/faqubahact" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pertanyaan</label>
                  <input type="text" class="form-control" id="a" placeholder="Enter email" name="isi_faq" value="<?php echo htmlentities($result['isi_faq']); ?>" required>
                  <input type="number" class="form-control" placeholder="Enter email" name="id_faq" value="<?php echo htmlentities($result['id_faq']); ?>" hidden required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jawaban</label>
                  <input type="text" class="form-control" id="b" placeholder="Enter email" name="tanggapan" value="<?php echo htmlentities($result['tanggapan']); ?>" required>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" id="c">
                    <?php
                    if ($result['status'] == 'Tampil') {
                      echo '<option value="Tampil" selected>Tampil</option>';
                      echo '<option value="Tidak Tampil">Tidak Tampil</option>';
                    } else {
                      echo '<option value="Tidak Tampil" selected>Tidak Tampil</option>';
                      echo '<option value="Tampil">Tampil</option>';
                    }
                    ?>
                  </select>
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
  <!-- /.content -->




<?php
  include('includes/footer.php');
}
?>