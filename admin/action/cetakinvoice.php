<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $sess = $_SESSION['user'];
    include('../includes/config.php');
?>
    <!doctype html>
    <html lang="en">
    <title>Invoice</title>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            body {
                margin-top: 20px;
                color: #484b51;
            }

            .text-secondary-d1 {
                color: #728299 !important;
            }

            .page-header {
                margin: 0 0 1rem;
                padding-bottom: 1rem;
                padding-top: .5rem;
                border-bottom: 1px dotted #e2e2e2;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -ms-flex-align: center;
                align-items: center;
            }

            .page-title {
                padding: 0;
                margin: 0;
                font-size: 1.75rem;
                font-weight: 300;
            }

            .brc-default-l1 {
                border-color: #dce9f0 !important;
            }

            .ml-n1,
            .mx-n1 {
                margin-left: -.25rem !important;
            }

            .mr-n1,
            .mx-n1 {
                margin-right: -.25rem !important;
            }

            .mb-4,
            .my-4 {
                margin-bottom: 1.5rem !important;
            }

            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, .1);
            }

            .text-grey-m2 {
                color: #888a8d !important;
            }

            .text-success-m2 {
                color: #86bd68 !important;
            }

            .font-bolder,
            .text-600 {
                font-weight: 600 !important;
            }

            .text-110 {
                font-size: 110% !important;
            }

            .text-blue {
                color: #478fcc !important;
            }

            .pb-25,
            .py-25 {
                padding-bottom: .75rem !important;
            }

            .pt-25,
            .py-25 {
                padding-top: .75rem !important;
            }

            .bgc-default-tp1 {
                background-color: rgba(121, 169, 197, .92) !important;
            }

            .bgc-default-l4,
            .bgc-h-default-l4:hover {
                background-color: #f3f8fa !important;
            }

            .page-header .page-tools {
                -ms-flex-item-align: end;
                align-self: flex-end;
            }

            .btn-light {
                color: #757984;
                background-color: #f5f6f9;
                border-color: #dddfe4;
            }

            .w-2 {
                width: 1rem;
            }

            .text-120 {
                font-size: 120% !important;
            }

            .text-primary-m1 {
                color: #4087d4 !important;
            }

            .text-danger-m1 {
                color: #dd4949 !important;
            }

            .text-blue-m2 {
                color: #68a3d5 !important;
            }

            .text-150 {
                font-size: 150% !important;
            }

            .text-60 {
                font-size: 60% !important;
            }

            .text-grey-m1 {
                color: #7b7d81 !important;
            }

            .align-bottom {
                vertical-align: bottom !important;
            }
        </style>
    </head>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_order INNER JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.no_invoice='$id'";
    $query = mysqli_query($koneksidb, $sql);
    $result = mysqli_fetch_array($query);
    ?>

    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        ID: <?php echo htmlentities($result['no_invoice']); ?>
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <button class="btn bg-white btn-light mx-1px text-95" onclick="window.print()"><i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print</button>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <img src="assets/img/favicon.png" class="col-sm-1" alt="">
                                    <span class="text-default-d3">Dope Wild Sablon's</span><br>
                                    <p style="font-size: 15px;">Kadisobo 1 Rt 01 Rw 02 Trimulyo, Sleman, DIY<br>
                                        <strong>Phone:</strong>+62 8574-1807-189<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle" style="text-transform: uppercase;"><?php echo htmlentities($result['nama_lengkap']); ?></span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1">
                                        <?php echo htmlentities($result['alamat_pengiriman']); ?>, <?php echo htmlentities($result['kota']); ?>
                                    </div>
                                    <div class="my-1">
                                        Indonesia
                                    </div>
                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo htmlentities($result['nomor']); ?></b></div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #<?php echo htmlentities($result['no_invoice']); ?></div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?php echo date('d F Y', strtotime($result['tanggal_order'])); ?></div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <?php echo htmlentities($result['status']); ?></div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">No</div>
                                <div class="col-9 col-sm-5">Nama Desain</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Jumlah</div>
                                <div class="d-none d-sm-block col-sm-2">Harga Satuan</div>
                                <div class="col-2">Total Harga</div>
                            </div>

                            <?php
                            $arraytotal = [];
                            $nomor = 0;
                            $sqltblberita = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_desain_produk_user.no_invoice='$id'";
                            $querytblberita = @mysqli_query($koneksidb, $sqltblberita);

                            while ($result = @mysqli_fetch_array($querytblberita)) {
                            ?>
                                <div class="text-95 text-secondary-d3">
                                    <div class="row mb-2 mb-sm-0 py-25">
                                        <div class="d-none d-sm-block col-1"><?php echo $nomor + 1; ?></div>
                                        <div class="col-9 col-sm-5"><?php echo htmlentities($result['nama_order']); ?></div>
                                        <div class="d-none d-sm-block col-2">Size S: <?php echo htmlentities($result['ukuran_s']); ?>,<br>Size M: <?php echo htmlentities($result['ukuran_m']); ?>,<br>Size L: <?php echo htmlentities($result['ukuran_l']); ?>,<br>Size XL: <?php echo htmlentities($result['ukuran_xl']); ?>,</div>
                                        <?php
                                        $harga = ($result['ukuran_s'] + $result['ukuran_m'] + $result['ukuran_l'] + $result['ukuran_xl']) * $result['harga_produk'];
                                        ?>
                                        <div class="col-2 text-secondary-d2"><?php echo "Rp " . number_format($result['harga_produk'], 0, ",", "."); ?></div>
                                        <div class="d-none d-sm-block col-2 text-95"><?php echo "Rp " . number_format($harga, 0, ",", "."); ?></div>
                                    </div>
                                </div>
                            <?php
                                array_push($arraytotal, $harga);
                                $nomor++;
                            }
                            $totalharga = array_sum($arraytotal);

                            ?>
                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-4">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-6 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-6">
                                            <span class="text-120 text-secondary-d1"><?php echo "Rp " . number_format($totalharga, 0, ",", "."); ?></span>
                                        </div>
                                    </div>
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM tbl_order INNER JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.no_invoice='$id'";
                                    $query = mysqli_query($koneksidb, $sql);
                                    $result = mysqli_fetch_array($query);
                                    ?>
                                    <div class="row my-2">
                                        <div class="col-6 text-right">
                                            Ongkos Kirim
                                        </div>
                                        <div class="col-6">
                                            <span class="text-110 text-secondary-d1"><?php echo "Rp " . number_format($result['biaya_ongkir'], 0, ",", "."); ?></span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-6 text-right">
                                            Total Bayar
                                        </div>
                                        <div class="col-6">
                                            <span class="text-150 text-success-d3 opacity-2"><?php echo "Rp " . number_format($result['biaya_ongkir'] + $totalharga, 0, ",", "."); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />


                            <div>
                                <a href="../dikerjakandata" class="btn btn-primary btn-bold px-4 float-right mt-3 mt-lg-0">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php } ?>