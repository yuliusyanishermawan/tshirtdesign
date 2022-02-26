<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
    header('location:login.php');
} else {
    include('includes/config.php');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Desain Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="assets/img/favicon.png" rel="icon">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="assets/desain/js/fabric.js"></script>
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <script type="text/javascript" src="assets/desain/js/jquery.miniColors.min.js"></script>
        <script type="text/javascript" src="assets/desain/js/html5.js"></script>
        <script type="text/javascript" src="assets/desain/js/loading.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js" integrity="sha512-Qlv6VSKh1gDKGoJbnyA5RMXYcvnpIqhO++MhIM2fStMcGT9i2T//tSwYFlcyoRRDcDZ+TYHpH8azBBCyhpSeqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link type="text/css" rel="stylesheet" href="assets/desain/css/jquery.miniColors.css" />
        <link href="assets/desain/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="assets/desain/css/loader.css" rel="stylesheet">
        <link href="assets/desain/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">


        <style type="text/css">
            body {
                /* padding-top: 60px; */
                font-family: var(--bs-font-sans-serif) !important;
            }

            .color-preview {
                border: 1px solid #CCC;
                margin: 2px;
                zoom: 1;
                vertical-align: top;
                display: inline-block;
                cursor: pointer;
                overflow: hidden;
                width: 20px;
                height: 20px;
            }

            .rotate {
                -webkit-transform: rotate(90deg);
                -moz-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
                -ms-transform: rotate(90deg);
            }

            .Arial {
                font-family: "Arial";
            }

            .Helvetica {
                font-family: "Helvetica";
            }

            .MyriadPro {
                font-family: "Myriad Pro";
            }

            .Delicious {
                font-family: "Delicious";
            }

            .Verdana {
                font-family: "Verdana";
            }

            .Georgia {
                font-family: "Georgia";
            }

            .Courier {
                font-family: "Courier";
            }

            .ComicSansMS {
                font-family: "Comic Sans MS";
            }

            .Impact {
                font-family: "Impact";
            }

            .Monaco {
                font-family: "Monaco";
            }

            .Optima {
                font-family: "Optima";
            }

            .HoeflerText {
                font-family: "Hoefler Text";
            }

            .Plaster {
                font-family: "Plaster";
            }

            .Engagement {
                font-family: "Engagement";
            }

            .img-polaroid {
                padding: 0;
                margin: 0;
                border: 2px solid transparent;
                max-height: 92px;
                max-width: 92px;
                min-height: 92px;
                min-width: 92px;
            }

            .img-polaroid:hover {
                cursor: pointer;
                border-color: #00a5f7;
            }

            .tt {
                margin-right: 4px;
            }
        </style>

    </head>
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-9 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.html">Dope Wild Sablon's</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>

                            <li><a href="index">Beranda</a></li>
                            <li><a href="pilihkaos">Order</a></li>
                            <li><a href="tentang">Tentang Kami</a></li>
                            <li><a href="berita">Berita</a></li>
                            <li><a href="faq">FAQ</a></li>

                            <?php
                            if (strlen($_SESSION['user']) == 0) {
                                include('includes/topbarnosignin.php');
                            } else {
                                include('includes/topbarsignin.php');
                            }
                            ?>
                </div>
            </div>

        </div>
    </header><!-- End Header -->
    <main style="margin-left: 0px;">

        <section id="typography">
            <div class="page-header">
                <h1 align="center">Desain Kaos Online</h1>
            </div>

            <!-- Headings & Paragraph Copy -->
            <div class="row">
                <div class="span3">

                    <div class="tabbable">
                        <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab">Save</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="well">
                                    <p style="font-family: 'Telex',sans-serif;font-weight: bold;line-height: 1;color: #317eac;text-rendering: optimizelegibility;">
                                        Option Save</p>
                                    <button id="imgsavejpg" class="btn btn-primary" title="Save JPG"><i style="font-size: 25px;" class="fa fa-camera" aria-hidden="true"></i></button>
                                    <button id="rotate" title="Putar" class="btn btn-primary"><i style="font-size: 25px;" class="fa fa-repeat" aria-hidden="true"></i></button>
                                    <button class="btn btn-primary" onclick="location.reload();" title="Bersihkan"><i style="font-size: 25px;" class="fa fa-trash" aria-hidden="true"></i></button>

                                </div>


                            </div>
                        </div>
                    </div>





                    <div class="tabbable">
                        <!-- Only required for left/right tabs -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="well">
                                    <p style="font-family: 'Telex',sans-serif;font-weight: bold;line-height: 1;color: #317eac;text-rendering: optimizelegibility;">
                                        Lanjut Pemesanan</p>
                                    <button onclick="window.location.href='masukkeranjang.php'" style="width: 230px;" id="imgsavejpg" class="btn btn-primary" title="Masukkan Keranjang">Keranjang <i style="font-size: 25px;" class="fa fa-shopping-cart" aria-hidden="true"></i></button>

                                </div>


                            </div>
                        </div>
                    </div>





                </div>
                <div class="span9">
                    <div style="min-height: 32px;">
                        <div class="clearfix">
                            <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                                <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                    <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad
                                            Pro</a></li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic
                                            Sans MS</a></li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler
                                            Text</a></li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a>
                                    </li>
                                    <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                                    </li>
                                </ul>
                                <button id="text-bold" class="btn" data-original-title="Bold">
                                    <img src="assets/desain/img/font_bold.png" height="" width=""></button>
                                <button id="text-italic" class="btn" data-original-title="Italic">
                                    <img src="assets/desain/img/font_italic.png" height="" width=""></button>
                                <button id="text-strike" class="btn" title="Strike">
                                    <img src="assets/desain/img/font_strikethrough.png" height="" width=""></button>
                                <button id="text-underline" class="btn" title="Underline">
                                    <img src="assets/desain/img/font_underline.png"></button>
                                <a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
                                <a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color">
                                    <input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000"></a>
                                <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
                            </div>
                            <div class="pull-right" id="imageeditor" style="display:none">
                                <div class="btn-group">
                                    <button class="btn" id="bring-to-front" title="Bring to Front"><i class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                    <button class="btn" id="send-to-back" title="Send to Back"><i class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                    <button id="flip" type="button" class="btn" title="Show Back View"><i class="icon-retweet" style="height:19px;"></i></button>
                                    <button id="remove-selected" class="btn" title="Delete selected item"><i class="icon-trash" style="height:19px;"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_produk WHERE nama_produk='$id'";
                    $query = mysqli_query($koneksidb, $sql);
                    $result = mysqli_fetch_array($query);
                    ?>


                    <!--	EDITOR      -->
                    <div id="shirtDiv" class="page" style="width: 880px; height: 1046px; position: relative; background-color: #<?php echo htmlentities($result['kode_warna']); ?>;">
                        <!--img id="tshirtFacing" src="img/crew_front.png"></img-->


                        <img id="tshirtFacing" src="assets/desain/img/t-shirts/<?php if ($result['jenis_kaos'] == 'Lengan Pendek') {
                                                                                    echo 'lenganpendek';
                                                                                } else {
                                                                                    echo 'lenganpanjang';
                                                                                } ?>_depan.png"></img>
                        <div id="drawingArea" style="position: absolute;top: 160px;left: 270px;z-index: 10;width: 340px;height: 680px;">
                            <canvas id="tcanvas" width=340 height=680 class="hover" style="-webkit-user-select: none; "></canvas>
                        </div>
                    </div>



                </div>
                <div class="span3">
                    <div class="tabbable">
                        <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab">Template Gambar</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab2">
                                <div class="well">
                                    <h4>Input Gambar</h4>
                                    <div class="input-append">
                                        <input class="span2" style="height: 39px; width: 190px;" id="text-string" type="text" placeholder="Masukkan Text...">
                                        <button id="add-text" class="btn" title="Upload Text"><i class="icon-share-alt"></i>
                                        </button>
                                        <hr>
                                    </div>
                                    <h4>Template Gambar
                                        <form hidden id="form1" runat="server">
                                            <input hidden type='file' id="imgInp" accept="image/*" />
                                        </form>
                                        <button id="addimg" class="btn btn-primary" title="Disarankan resolusi gambar minimal 300px X 300px"><i style="font-size: 15px;" class="fa fa-plus" aria-hidden="true"></i></button>
                                    </h4>

                                    <div id="avatarlist" style="max-height: 500px; overflow: scroll;">

                                        <?php
                                        $sqltblberita = "SELECT * FROM tbl_gambar_referensi";
                                        $querytblberita = @mysqli_query($koneksidb, $sqltblberita);
                                        while ($result = @mysqli_fetch_array($querytblberita)) {
                                        ?>
                                            <img class="img-polaroid tt" src="admin/image/referensi/<?php echo htmlentities($result['gambar']); ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="editor"></div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3 class="text-light">Dope Wild Sablon's</h3>
                        <p>
                            Kadisobo 1<br>
                            Rt 01 Rw 02<br>
                            Trimulyo, Sleman, DIY<br><br>
                            <strong>Phone:</strong>+62 8574-1807-189<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4 class="text-light">Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="index">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="pilihkaos">Order</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="tentang">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="berita">Berita</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="faq">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4 class="text-light">Maps</h4>
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.106614862929!2d110.35807471459754!3d-7.671686294469284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5fc85d1d503f%3A0x48dde0b084dce8cb!2sDope%20Wild%20Sablon&#39;s!5e0!3m2!1sid!2sid!4v1632297637587!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy"></iframe><a href="https://123movies-a.com"></a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 250px;
                                        width: 560px;
                                    }
                                </style>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 250px;
                                        width: 560px;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="mr-md-auto text-center text-md-left">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Dope WIld Sablon's</span></strong>. All Rights Reserved
                    </div>
                </div>
            </div>

        </div>
    </footer><!-- End Footer -->
    <!-- GetButton.io widget -->
    <script>
        var url = 'http://localhost/dopewild/includes/wa.js?94060';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#6f42c1",
                "ctaText": "",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "30",
                "marginRight": "30",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "Dope Wild Sablon's",
                "brandSubTitle": "Desain Kaos Online",
                "brandImg": "http://localhost/dopewild/assets/img/favicon.png",
                "welcomeText": "Hi! Ada yang bisa dibantu?",
                "messageText": "Hai Admin",
                "backgroundColor": "#6f42c1",
                "ctaText": "Mulai Hubungi Kami",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "6281226845428"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/desain/js/bootstrap.min.js"></script>
    <script src="assets/desain/js/jspdf.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            /*******************************************************************************/
            function getContentImage() {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {

                    // document.body.appendChild(canvas)
                    $(canvas).get(0).toBlob(function(blob) {
                        var urlCreator = window.URL || window.webkitURL;
                        var imageUrl = urlCreator.createObjectURL(blob);
                        $('#test').append('<img src="' + imageUrl + '"><br>');

                    });
                });
            }

            function LoadeShirts() {
                $('.loading-blink').loading();
                $('.loading-blink').show();
                getContentImage();

                setTimeout(function() {
                    rotate();
                }, 500);
                setTimeout(function() {
                    getContentImage();
                }, 1200);
            }

            $('#loading-custom-overlay').loading({
                overlay: $('#custom-overlay')
            });
            $('.loading-blink').hide();



            $('#imgsavejpg').on('click', function() {
                function save() {
                    html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                        scale: 2,
                        // document.body.appendChild(canvas)
                        $(canvas).get(0).toBlob(function(blob) {
                            var filesaver = saveAs(blob, "TShirt.png");
                            filesaver.onwriteend = function() {
                                $('.loading-blink').hide();
                                $('#test').empty();
                            }


                        });
                    });
                }





                rotate();
                LoadeShirts();
                setTimeout(function() {
                    save();
                    $('.loading-blink').hide();
                    $('#test').empty();
                }, 1700);

            });


            $('#rotate').click(function(e) {
                e.preventDefault();
                rotate();
            });

            function rotate() {
                $('#flip').click();
            }

            $("#addimg").on('click', function() {
                $('#imgInp').click();
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#avatarlist').append('<img class="img-polaroid tt" src="' + e.target.result + '">');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            })


            $('#imgsavepdf').on('click', function() {
                $('.loading-blink').loading();
                $('.loading-blink').show();
                var doc = new jsPDF();
                doc.setFontSize(20);

                setTimeout(function() {
                    html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                        function convertCanvasToImage(c) {
                            var image = new Image();
                            image.src = c.toDataURL("image/jpeg");
                            doc.addImage(image.src, 'JPEG', 30, 5, 145, 145);
                            return image;
                        }
                        convertCanvasToImage(canvas);

                    });
                }, 100);

                setTimeout(function() {
                    rotate();

                }, 700);

                setTimeout(function() {
                    html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                        function convertCanvasToImage(c) {
                            var image = new Image();
                            image.src = c.toDataURL("image/jpeg");
                            doc.addImage(image.src, 'JPEG', 30, 150, 145, 145);
                            return image;
                        }
                        convertCanvasToImage(canvas);
                    });
                }, 1100);

                setTimeout(function() {
                    doc.save("T-Shirt.pdf");
                    $('.loading-blink').hide();
                    $('#test').empty();
                }, 1700);


            });

        });
    </script>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_produk WHERE nama_produk='$id'";
    $query = mysqli_query($koneksidb, $sql);
    $result = mysqli_fetch_array($query);
    ?>
    <script type="text/javascript">
        var IMAGE_NAME = "<?php if ($result['jenis_kaos'] == 'Lengan Pendek') {
                                echo 'lenganpendek';
                            } else {
                                echo 'lenganpanjang';
                            } ?>";
    </script>
    <script type="text/javascript" src="assets/desain/js/tshirtEditor.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>



    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>



    </body>

    </html>
<?php } ?>