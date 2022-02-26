<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $sess = $_SESSION['user'];
    include('../includes/config.php');
    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];
?>
    <!doctype html>
    <html lang="en">
    <title>Invoice</title>

    <head>
        <link href="../../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
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

    <body>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Laporan Penjualan
                    <small class="page-info"><br>
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
                                    <img src="../../assets/img/favicon.png" class="col-sm-1" alt="">
                                    <span class="text-default-d3">Dope Wild Sablon's</span><br>
                                    <h6>Laporan Penjualan</h6>
                                    <h6>Tanggal: <?php echo date('d F Y', strtotime($awal)); ?> s/d <?php echo date('d F Y', strtotime($akhir)); ?></h6>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="mt">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-sm-1">No</div>
                                <div class="col-6 col-sm-2">No Invoice</div>
                                <div class="d-none d-sm-block col-2 col-sm-2">Nama Pelanggan</div>
                                <div class="d-none d-sm-block col-2 col-sm-1">Jumlah Kaos</div>
                                <div class="d-none d-sm-block col-sm-1">Tipe</div>
                                <div class="d-none d-sm-block col-sm-2">Tanggal</div>
                                <div class="text-center col-3">Total Harga</div>
                            </div>
                            <?php
                            $arraytotal = [];
                            $nomor = 1;
                            $sql = "SELECT * FROM tbl_order INNER JOIN  tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE tbl_order.status='Pesanan Selesai' AND tbl_order.tanggal_order BETWEEN '$awal' AND '$akhir'";
                            $query = @mysqli_query($koneksidb, $sql);
                            while ($result = @mysqli_fetch_array($query)) {
                                $harga = $result['total_biaya'];
                                $invoice = $result['no_invoice'];

                            ?>
                                <div class="text-95 text-secondary-d3">
                                    <div class="row mb-2 mb-sm-0 py-25">
                                        <div class="d-none d-sm-block col-1"><?php echo $nomor; ?></div>
                                        <div class="col-9 col-sm-2"><?php echo htmlentities($result['no_invoice']); ?></div>
                                        <div class="d-none d-sm-block col-4 col-sm-2"><?php echo htmlentities($result['nama_lengkap']); ?></div>
                                        <?php

                                        $sqlmuncul = "SELECT no_invoice, SUM(ukuran_s) AS s, SUM(ukuran_m) AS m, SUM(ukuran_l) AS l, SUM(ukuran_xl) AS xl
                                         FROM tbl_desain_produk_user WHERE no_invoice='$invoice' GROUP BY no_invoice";
                                        $querymuncul = mysqli_query($koneksidb, $sqlmuncul);
                                        while ($resultmuncul = mysqli_fetch_array($querymuncul)) {
                                            $total = $resultmuncul['s'] + $resultmuncul['m'] + $resultmuncul['l'] + $resultmuncul['xl'];

                                        ?>
                                            <div class="d-none d-sm-block col-4 col-sm-1"><?php echo htmlentities($total); ?></div>

                                        <?php } ?>
                                        <?php
                                        $bukti = $result['bukti'];
                                        if ($bukti == "Offline") {
                                            echo '<div class="d-none d-sm-block col-sm-1">Offline</div>';
                                        } else {
                                            echo '<div class="d-none d-sm-block col-sm-1">Online</div>';
                                        }
                                        ?>
                                        <div class="d-none d-sm-block col-sm-2"><?php echo date('d F Y', strtotime($result['tanggal_order'])); ?></div>
                                        <div class=" text-center d-none d-sm-block col-3"><?php echo "Rp" . number_format($result['total_biaya'], 0, ",", "."); ?></div>
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


                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-6 text-right">
                                            Total Pemasukan
                                        </div>
                                        <div class="col-6">
                                            <span class="text-150 text-success-d3 opacity-2"><?php echo "Rp " . number_format($result['biaya_ongkir'] + $totalharga, 0, ",", "."); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div>
                                <a href="../laporanpenjualan" class="btn btn-primary btn-bold px-4 float-right mt-3 mt-lg-0">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <script type="text/javascript">
        window.print();
    </script>
<?php } ?>