  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="image/favicon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/dashboard.php" class="nav-link  <?php if ($title == "Dashboard") {
                                                                                        echo "active";
                                                                                      } ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/beritadata.php" class="nav-link <?php if ($title == "Data Berita") {
                                                                                        echo "active";
                                                                                      } ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Data Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/gambarreferensidata.php" class="nav-link <?php if ($title == "Data Gambar Referensi") {
                                                                                                echo "active";
                                                                                              } ?>">
              <i class="nav-icon fas fa-file-image"></i>
              <p>Data Gambar Referensi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/faqdata.php" class="nav-link <?php if ($title == "Data Frequently Asked Questions") {
                                                                                    echo "active";
                                                                                  } ?>">
              <i class="nav-icon fas fa-question"></i>
              <p>Data FAQ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/ulasandata.php" class="nav-link <?php if ($title == "Data Ulasan") {
                                                                                        echo "active";
                                                                                      } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>Data Ulasan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/userdata.php" class="nav-link <?php if ($title == "Data User") {
                                                                                      echo "active";
                                                                                    } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Data User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/DopeWild/admin/produkdata.php" class="nav-link <?php if ($title == "Data Produk") {
                                                                                        echo "active";
                                                                                      } ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Data Produk</p>
            </a>
          </li>


          <li class="nav-item <?php if ($title == "Pembayaran" || $title == "Konfirmasi" || $title == "Dikerjakan" || $title == "Pesanan Selesai" || $title == "Selesai Dikerjakan") {
                                echo "menu-open";
                              } ?>">
            <a href="" class="nav-link <?php if ($title == "Pembayaran" || $title == "Konfirmasi" || $title == "Dikerjakan" || $title == "Pesanan Selesai" || $title == "Selesai Dikerjakan") {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Pesanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/pembayarandata.php" class="nav-link <?php if ($title == "Pembayaran") {
                                                                                                echo "active";
                                                                                              } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/konfirmasidata.php" class="nav-link <?php if ($title == "Konfirmasi") {
                                                                                                echo "active";
                                                                                              } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu Konfirmasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/dikerjakandata.php" class="nav-link <?php if ($title == "Dikerjakan") {
                                                                                                echo "active";
                                                                                              } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu Dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/selesaidikerjakandata.php" class="nav-link <?php if ($title == "Selesai Dikerjakan") {
                                                                                                      echo "active";
                                                                                                    } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selesai Dikerjakan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/selesaidata.php" class="nav-link <?php if ($title == "Pesanan Selesai") {
                                                                                            echo "active";
                                                                                          } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pesanan Selesai</p>
                </a>
              </li>
            </ul>
          </li>
          <div></div>
          <li class="nav-item <?php if ($title == "Laporan Loyalitas" || $title == "Laporan Penjualan") {
                                echo "menu-open";
                              } ?>">
            <a href="#" class="nav-link <?php if ($title == "Laporan Loyalitas" || $title == "Laporan Penjualan") {
                                          echo "active";
                                        } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/laporanloyalitasdata.php" class="nav-link <?php if ($title == "Laporan Loyalitas") {
                                                                                                      echo "active";
                                                                                                    } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Loyalitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/DopeWild/admin/laporanpenjualan.php" class="nav-link <?php if ($title == "Laporan Penjualan") {
                                                                                                  echo "active";
                                                                                                } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
            </ul>
            </l>
          <li class="nav-item">
            <a href="action/logout.php" class="nav-link">
              <i class="nav-icon fas fa-window-close"></i>
              <p>Log Out</p>
            </a>
          </li>
          <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>