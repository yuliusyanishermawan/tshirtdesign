<?php
$title = 'Tentang Kami';
session_start();
error_reporting(0);
include('includes/config.php');
include('action/loginact.php');
include('includes/header.php');
include('includes/hero.php');
?>
<?php
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jenis = $_POST['jenis'];
    $pesan = $_POST['pesan'];
    $created = date('y-m-d');
    $sql     = "INSERT INTO tbl_kritiksaran VALUES (NULL,'$nama','$email','$jenis','$pesan','','$created')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo "<script type='text/javascript'>
                  alert('Terimakasih telah memberikan kritik dan saran kepada kami.'); 
                  document.location = 'tentang.php'; 
              </script>";
    } else {
        echo "<script type='text/javascript'>
                  alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = 'tentang.php';
              </script>";
    }
} ?>
<section id="about" class="about">
    <div class="container">
        <div class="section-title">
            <h2>Tentang Kami</h2>
        </div>

        <div class="row">
            <div class="col-lg-5 order-2 order-lg-5" data-aos="zoom-in" data-aos-delay="150">
                <img src="assets/img/favicon.png" style="margin-left: 50px;" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                <h3>Dope Wild Sablon's</h3>
                <p class="font-italic">
                    Merupakan perusahaan di industri konveksi berupa sablon kaos sablon satuan yang menggunakan teknik sablon digital yang di cetak di dalam kaos sesuai keinginan pelanggan. Dan Kami telah menetapkan untuk mengubah cara kaos custom dilakukan. Tujuan kami adalah untuk membuatnya lebih mudah, lebih cepat, dan lebih nyaman dari sebelumnya untuk mendapatkan pakaian berkualitas yang dicetak dan dikirim langsung kepada pelanggan kami. Mulai dari bisnis yang membangun merek, gadis-gadis yang sedang berlibur berkelompok, para remaja yang melakukan pengaturan tren – kami memberikan kepada individu dan organisasi untuk menyelesaikan kontrol kreatif. Dengan studio desain interaktif terbaru kami, kami pikir kami telah mempermudah pembuatan t-shirt khusus. Tidak perlu mengunjungi toko cetak. Hanya sebuah studio desain kaos di ujung jari Anda.
                </p>
                <a href="#" class="read-more">Read More <i class="icofont-long-arrow-right"></i></a>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
<section id="pricing" class="pricing section-bg">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="box  featured">
                    <h3>Komitmen Terhadap Produk</h3>
                    <ul>
                        <li><img src="assets/img/tshirtt.jpg" style="height:232px;" alt="" class="img-fluid" alt=""></li>
                        <li class="text-justify">Kami mementingkan kualitas dan kenyamanan, dan kami telah memilih bahan yang kuat dan tahan lama sehingga tidak hanya untuk sekali pakai, namun dapat digunakan berkali-kali bahkan setelah dicuci. Karena itu, produk ini akan sangat disukai dan digunakan dalam waktu yang lama. Kami memiliki kaos yang dapat digunakan untuk berbagai kegiatan seperti olahraga dan pakaian sehari-hari. Dan lagi, hasil cetakan yang berkualitas baik dan warna tidak mudah pudar.</li>
                    </ul>
                    <div class="btn-wrap">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                    <h3>Mudah, Cepat, Dan Praktis</h3>
                    <ul>
                        <li><img src="assets/img/polyflex.png" style="height:232px;" alt="" class="img-fluid" alt=""></li>
                        <li class="text-justify">Dope Wild Sablon's merupakan sistem desain interaktif terbaru untuk memudahkan dalam mendesain kaos. Kami adalah revolusi terbaru dalam cara mendesain kaos. Anda tidak perlu lagi mendatangi tempat percetakan. Anda dapat dengan mudah mendesain kaos hanya dengan jari Anda. Kami terus berusaha untuk mencetak produk dengan teknologi berkualitas tinggi serta mengirimkannya langsung ke pelanggan kami dengan mudah, cepat dan praktis</li>
                    </ul>
                    <div class="btn-wrap">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="box  featured">
                    <h3>Komitmen Terhadap Pelanggan</h3>
                    <ul>
                        <li><img src="assets/img/123.png" style="height:232px;" alt="" class="img-fluid" alt=""></li>
                        <li class="text-justify">Kami sangat menghargai dukungan dari pelanggan sama seperti kami berkomitmen terhadap kualitas produk kami. Bagi pelanggan adalah hal yang sangat penting untuk menghasilkan suatu produk yang tak tergantikan, bahkan untuk mencetak satu buah kaos. Kami akan membantu dan memberikan saran terhadap keluhan yang Anda miliki mengenai produk kami. Silahkan, jangan ragu untuk menghubungi kami apabila terdapat pertanyaan serta permintaan lainnya.</li>
                    </ul>
                    <div class="btn-wrap">
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->
<hr>
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Alamat</h3>
                    <p> Kadisobo 1
                        Rt 01 Rw 02
                        Trimulyo, Sleman, Daerah Istimewa Yogyakarta</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email </h3>
                    <p>dopewildsablon@gmail.com</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call</h3>
                    <p>+62 8574-1807-189</p>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.106614862929!2d110.35807471459754!3d-7.671686294469284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5fc85d1d503f%3A0x48dde0b084dce8cb!2sDope%20Wild%20Sablon&#39;s!5e0!3m2!1sid!2sid!4v1632297637587!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 430px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-lg-6">

                <form action="" method="post" role="form" class="php-email-form">
                    <h3 align="center">Kritik dan Saran</h3>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" required name="jenis">
                            <option value="Kritik">Kritik</option>
                            <option value="Saran">Saran</option>
                        </select>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="pesan" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit" name="kirim">Send Message</button></div>
                </form>
            </div>

        </div>


    </div>
</section><!-- End Contact Section -->

<?php
include('includes/footer.php');
?>