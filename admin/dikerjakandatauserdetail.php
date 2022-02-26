<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
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
              <h3 class="card-title">Detail User Offline</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_user WHERE id_user='$id'";
            $query = mysqli_query($koneksidb, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <form method="POST" enctype="multipart/form-data" action="action/dikerjakandatauserubahact">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap User</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['nama_lengkap']); ?>" name="nama_lengkap">
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['id_user']); ?>" name="id" hidden>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Telfon</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo htmlentities($result['nomor']); ?>" name="nomor">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <textarea class="form-control" rows="3" value="" name="alamat"><?php echo htmlentities($result['alamat']); ?></textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a type="button" href="dikerjakandatauser" class="btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
                <a type="button" href="dikerjakandesaintambah?id=<?php echo $id; ?>" class="btn btn-primary float-right">Tambah Desain</a>
              </div>

            </form>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Desain</th>
                  <th>Nama Produk</th>
                  <th style="width: 70px;">Ukuran</th>
                  <th>Total Harga</th>
                  <th>Gambar Depan</th>
                  <th>Gambar Belakang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $nomor = 0;
                $sql = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_user.id_user='$id' AND tbl_desain_produk_user.no_invoice= 'NULL'";
                $query = @mysqli_query($koneksidb, $sql);
                while ($result = @mysqli_fetch_array($query)) {
                  $nomor++;
                ?>
                  <tr>
                    <td><?php echo htmlentities($nomor); ?></td>
                    <td><?php echo htmlentities($result['nama_order']); ?></td>
                    <td><?php echo htmlentities($result['nama_produk']); ?></td>
                    <td>Ukuran S:<?php echo htmlentities($result['ukuran_s']); ?>, Ukuran M:<?php echo htmlentities($result['ukuran_m']); ?>, Ukuran L:<?php echo htmlentities($result['ukuran_l']); ?>, Ukuran XL:<?php echo htmlentities($result['ukuran_xl']); ?></td>
                    <td><?php echo "Rp " . number_format($result['total_harga_desain_produk_user'], 2, ",", "."); ?></td>
                    <td><a href="../imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>" target="blank"><img src="../imagedesainuser/<?php echo htmlentities($result['gambar_depan']); ?>" width="100" height="100"></a></td>
                    <td><a href="../imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>" target="blank"><img src="../imagedesainuser/<?php echo htmlentities($result['gambar_belakang']); ?>" width="100" height="100"></a></td>
                    <td class="text-right">
                      <a href="dikerjakandesainedit?id=<?php echo htmlentities($result['id_desain_produk_user']); ?>" class="btn btn-primary"> Edit</a>
                      <a href="action/dikerjakandesainhapusact?id=<?php echo htmlentities($result['id_desain_produk_user']); ?>" onclick="return confirm('Apakah anda yakin akan menghapus desain judul <?php echo $result['nama_order']; ?>?');" class="btn btn-danger"> Remove</a>
                    </td>
                  </tr>
                <?php } ?>
            </table>
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