-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2021 pada 11.27
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dopewild`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(15) NOT NULL,
  `lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `fullname`, `email`, `token`, `lastupdate`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Yulius Yanis', 'dope.wild.sablons@gmail.com', 'N58MIWCGRK2L6V7', '2021-10-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(20) NOT NULL,
  `nama_berita` text NOT NULL,
  `isi_text` text NOT NULL,
  `gambar_berita` varchar(50) NOT NULL,
  `create` date NOT NULL,
  `lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `nama_berita`, `isi_text`, `gambar_berita`, `create`, `lastupdate`) VALUES
(22, 'Size chart Kaos Dope Wild Sablon\'s', '(S : P50cm, L72cm)<br>\r\n(M : P52cm, L74cm)<br>\r\n(L : P56cm, L76cm)<br>\r\n(XL : P58cm, L78cm)', '24092021105208Desaintanpajudul.jpg', '2021-09-24', '2021-09-24'),
(23, 'Cara Merawat Kaos Dan Sablonan Kaos', '1. Rendam Secukupnya <br>\r\n2. Pisahkan saat dicuci<br>\r\n3. Jangan disikat<br>\r\n4. Hindari mencuci dengan Mesin cuci<br> \r\n5. Setrika dalam keaadan kaos terbalik..', '24092021110437cara-merawat-kaos-dan-sablon.jpg', '2021-09-24', '2021-11-18'),
(24, 'Bahan Kaos Cotton Combed 30s', 'Kain Cotton Combed 30s merupakan kain yang terbuat dari serat kapas murni alami dengan karakteristik halus, nyaman, dan menyerap keringat. Cotton Combed 30s ini mengalami proses combing dimana proses ini membuat kain akan lebih halus. Cotton Combed 30s ini sering kita temukan di Clothing line kota besar yang memiliki udara agak terik , pasalnya combed dengan kerapatan jarak benang 30, serta rajutan single ini dikenal dengan bahanya yang sangat menyerap keringat. Bahan kaos combed 30s ini adalah bahan yang paling digemari di Indonesia.', '24092021111926Bikin.co-Cotton-Combad-30s.jpg', '2021-09-24', '2021-09-24'),
(25, 'Pengertian Sablon Digital Polyflex', 'Ada berbagai-ragam teknik sablon digital, salah satunya yaitu sablon digital polyflex. Apa itu polyflex? Sablon polyflex merupakan teknik sablon yang memakai bahan sejenis stiker atau vinyl yang dipress memakai mesin heat press. Sablon polyflex ini memiliki banyak jenis polyflex serta warna yang bervariasi.\r\n\r\nPolyflex bersifat elastis sehingga lebih tahan lama, awet, kuat, menempel pada kaos dan tahan saat ditarik. Walaupun demikian, bukan berarti kaos tidak mungkin rusak ketika ditarik. Kaos model apapun tentunya perlu dirawat dengan baik agar tetap awet. Banyak pengusaha sablon kaos yang mulai menerapkan sistem ini untuk membuat hasil sablon kaos yang baik.', '24092021112137pengertian-polyflex.jpg', '2021-09-24', '2021-09-24'),
(26, 'Kelebihan Dari Sablon Digital Polyflex', 'Di Indonesia, teknik sablon polyflex dapat dibilang masih tergolong baru dan belum cukup dikenal secara luas. Namun kualitas yang dihasilkan sablon poliflex tidak kalah bagusnya dengan hasil sablon digital lainnya. Bahan polyflex dikenal memiliki kerekatan yang cukup baik. Bahan polyflex juga tidak mudah lepas. Nah, apa saja keuntungan jika Anda memakai bahan sablon poliflex?<br>\r\n1. Cocok Untuk Sablon Kaos Satuan<br>\r\n2. Waktu Pengerjaan Tidak Lama<br>\r\n3. Hasil Sablon Memuaskan<br>\r\n4. Cocok Untuk Sablon di Baju Bola<br>\r\n5. Mudah dan Simple untuk Perawatannya.', '240920211126227b03720c487b495d015f4eed0eb2c3a5.jpg', '2021-09-24', '2021-09-24'),
(27, 'Tips Desain Kaos yang Menarik', '1. Pilih Warna Dasar Kaos yang Tepat dan Nuansa Warna Desain yang Sepadan<br>\r\n2. Temukan Sumber Inspirasi Desain yang Cemerlang<br>\r\n3. Sisipkan Konsep Desain yang Menjadi Ciri Khas Kamu<br>\r\n4. Tentukan Teknik Sablon yang Kamu Pilih<br>\r\n5. Selalu Perhatikan Tren dan Kreasikan Desain Kamu untuk Mendekati Tren', '24092021113220desain-kaos-3.jpg', '2021-09-24', '2021-09-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desain_produk_user`
--

CREATE TABLE `tbl_desain_produk_user` (
  `id_desain_produk_user` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `no_invoice` varchar(20) DEFAULT NULL,
  `nama_order` varchar(50) NOT NULL,
  `gambar_depan` varchar(100) NOT NULL,
  `gambar_belakang` varchar(100) NOT NULL,
  `ukuran_s` int(12) NOT NULL,
  `ukuran_m` int(12) NOT NULL,
  `ukuran_l` int(12) NOT NULL,
  `ukuran_xl` int(12) NOT NULL,
  `total_harga_desain_produk_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_desain_produk_user`
--

INSERT INTO `tbl_desain_produk_user` (`id_desain_produk_user`, `id_user`, `id_produk`, `no_invoice`, `nama_order`, `gambar_depan`, `gambar_belakang`, `ukuran_s`, `ukuran_m`, `ukuran_l`, `ukuran_xl`, `total_harga_desain_produk_user`) VALUES
(40, 7, 10, 'TRX0000001', 'Agus1', '08102021013445adasdasdScreenshot (21).png', '08102021013445adasdasdScreenshot (22).png', 2, 2, 2, 2, 680000),
(41, 7, 4, 'TRX0000002', 'Agus2', '08102021013754Agus2Screenshot (23).png', '08102021013754Agus2Screenshot (24).png', 5, 5, 5, 5, 1700000),
(42, 5, 4, 'TRX0000003', 'Desain 1', '08102021015954Desain 1Screenshot (21).png', '08102021015954Desain 1Screenshot (22).png', 2, 0, 0, 0, 170000),
(43, 5, 17, 'TRX0000004', 'Desain2', '08102021020053Desain2Screenshot (23).png', '08102021020053Desain2Screenshot (24).png', 10, 0, 0, 0, 1000000),
(44, 5, 4, 'TRX0000005', 'agus', '08102021045630agusTShirt.png', '08102021045630agusTShirt (1).png', 1, 0, 0, 0, 85000),
(46, 5, 5, 'TRX0000006', 'asdasd', '09102021102731asdasdWhatsApp Image 2021-10-08 at 1', '09102021102731asdasdWhatsApp Image 2021-10-08 at 1', 3, 22, 1, 0, 2210000),
(47, 5, 4, 'TRX0000006', 'asd', '07112021125904asdmain-image02.png', '07112021125904asdzubazub1.png', 1, 1, 1, 1, 340000),
(48, 5, 17, 'TRX0000006', 'asd', '07112021160845asdzubazub1.png', '07112021160845asdzubazub1.png', 2, 2, 2, 2, 800000),
(49, 6, 4, 'TRX0000008', 'purwanto ts 1', '11112021103219purwanto ts 1TShirt (2).png', '11112021103219purwanto ts 1TShirt.png', 2, 0, 0, 0, 170000),
(50, 6, 16, 'TRX0000008', 'putih panjang', '11112021103617putih panjangTShirt (1).png', '11112021103617putih panjangTShirt (3).png', 1, 0, 5, 0, 600000),
(51, 7, 16, 'TRX0000009', 'indra ts 1', '11112021110130indra ts 1TShirt (1).png', '11112021110130indra ts 1TShirt (3).png', 0, 0, 0, 2, 200000),
(52, 9, 8, 'TRX0000010', 'prabowo pink', '11112021110438prabowo pinkTShirt (4).png', '11112021110438prabowo pinkTShirt (5).png', 1, 0, 0, 0, 85000),
(53, 5, 1, 'TRX0000007', 'Lpeputih yulius', '18112021032007Lpeputih yuliusLpeputihdepan.png', '18112021032007Lpeputih yuliusLpeputihbelakang.png', 9, 5, 6, 0, 1700000),
(54, 5, 28, 'TRX0000007', 'lpungu yulius', '18112021032144lpungu yuliusLpungudepan.png', '18112021032144lpungu yuliusLpungubelakang.png', 2, 2, 0, 0, 400000),
(55, 7, 6, 'TRX0000009', 'lpe oren', '18112021032342lpe orenLpeorendepan.png', '18112021032342lpe orenLpeorenbelakang.png', 0, 0, 1, 1, 170000),
(56, 19, 19, 'TRX0000016', 'panjang oren', '18112021034515panjang orenLporendepan.png', '18112021034515panjang orenLporenbelakang.png', 0, 0, 2, 0, 200000),
(57, 19, 14, 'TRX0000016', 'panjang biru', '18112021034652panjang biruLpbirudepan.png', '18112021034652panjang biruLpbirubelakang.png', 0, 0, 2, 1, 255000),
(58, 19, 9, 'TRX0000016', 'pendek kuning', '18112021034744pendek kuningLpekuningdepan.png', '18112021034744pendek kuningLpekuningbelakang.png', 0, 1, 3, 0, 340000),
(59, 18, 17, 'TRX0000015', 'lpe abuabu', '18112021035030lpe abuabuLpabudepan.png', '18112021035030lpe abuabuLpabubelakang.png', 2, 0, 1, 0, 300000),
(60, 18, 26, 'TRX0000015', 'birumuda', '18112021035149birumudaLpbirumudadepan.png', '18112021035149birumudaLpbirumudabelakang.png', 0, 0, 2, 0, 200000),
(61, 14, 13, 'TRX0000014', 'birumuda pendek', '18112021035726birumuda pendekLpebirumudadepan.png', '18112021035726birumuda pendekLpebirumudabelakang.png', 0, 0, 0, 2, 170000),
(62, 14, 15, 'TRX0000014', 'ungu pendek', '18112021101957ungu pendekLpeungudepan.png', '18112021101957ungu pendekLpeungubelakang.png', 0, 0, 2, 0, 170000),
(63, 14, 19, 'TRX0000014', 'oren panjang', '18112021102030oren panjangLporendepan.png', '18112021102030oren panjangLporenbelakang.png', 0, 5, 0, 0, 500000),
(64, 13, 24, 'TRX0000013', 'merah panjang', '18112021102606merah panjangLpmerahtuadepan.png', '18112021102606merah panjangLpmerahtuabelakang.png', 0, 2, 1, 0, 300000),
(65, 12, 26, 'TRX0000012', 'panjang biru', '18112021102914panjang biruLpbirumudadepan.png', '18112021102914panjang biruLpbirumudabelakang.png', 5, 4, 0, 0, 900000),
(66, 12, 16, 'TRX0000012', 'putih panjang', '18112021103020putih panjangLpputihdepan.png', '18112021103020putih panjangLpputihbelakang.png', 1, 1, 1, 1, 400000),
(67, 9, 27, 'TRX0000010', 'panjang biru', '18112021104135panjang biruLpbirudepan.png', '18112021104135panjang biruLpbirubelakang.png', 3, 5, 2, 1, 1100000),
(68, 11, 12, 'TRX0000011', 'Merah Pendek', '18112021105450Merah PendekLpemerahtuadepan.png', '18112021105450Merah PendekLpemerahtuabelakang.png', 2, 2, 2, 2, 680000),
(69, 19, 19, 'NULL', 'oren panjang', '18112021143412oren panjangLporendepan.png', '18112021143412oren panjangLporenbelakang.png', 0, 2, 3, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id_faq` int(20) NOT NULL,
  `isi_faq` text NOT NULL,
  `tanggapan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `create` date NOT NULL,
  `lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`id_faq`, `isi_faq`, `tanggapan`, `status`, `create`, `lastupdate`) VALUES
(12, 'Apa Itu Dope Wild Sablon\'s', 'Kami adalah sebuah online shop terpercaya yang dapat melakukan sablon desain kaos secara satuan  yang dapat dicetak secara on-demand di atas berbagai jenis kaos menggunakan teknologi sablon digital.', 'Tampil', '2021-09-24', '2021-11-07'),
(13, 'Apakah Dope Wild Sablon\'s memiliki toko fisik?', 'Kami memiliki toko fisik yang beralamat di Kadisobo 1 Rt 01 Rw 02 Trimulyo, Sleman, Daerah Istimewa Yogyakarta', 'Tampil', '2021-09-24', '2021-09-24'),
(14, 'Apakah boleh memesan hanya 1 kaos desain saja ?', 'Tentu bisa. Di toko kami tidak ada minimum pemesanan di situs kami. Pesan satu baju pun akan kami layani dan kami kirim ke seluruh daerah di Indonesia. ', 'Tampil', '2021-09-24', '2021-09-24'),
(15, 'Apa bisa request desain sendiri?', 'Ya bisa! kami meyediakan fitur upload gambar dan simulator desain kaos agar menyesuiakan keinginan desain dari pelanggan dan \r\nkami juga menyediakan gambar refrensi desain sablon kaos . Untuk konsultasi desain bisa langsung chat melalui whatsapp kami', 'Tampil', '2021-09-24', '2021-09-24'),
(16, 'Bagaimana jika saya membutuhkan ukuran kaos yang tidak tersedia?', 'Silahkan menghubungi kami di  contact whatsapp sebelum melakukan pemesanan. Kami akan dengan senang hati membantu Anda menemukan ukuran atau produk alternatif yang bisa kami cetak untuk Anda.', 'Tampil', '2021-09-24', '2021-09-24'),
(17, 'Apakah semua barang ready stock ?', 'Kami adalah toko online sablon kaos satuan yang menggunakan sistem printing on-demand (barang dicetak setelah ada pesanan), jadi semua barang selalu ready stock.', 'Tampil', '2021-09-24', '2021-09-24'),
(18, 'Apakah harga yang tertera di website sudah termasuk ongkos kirim ?', 'Harga yang tertera di website belum termasuk ongkos kirim. Ongkos kirim akan ditentukan kemudian pada saat checkout, setelah memasukan informasi alamat pengiriman.', 'Tampil', '2021-09-24', '2021-09-24'),
(19, 'Apakah harga bisa kurang ?', 'Harga yang tertera di website kami adalah Harga Pas dan mohon maaf tidak bisa kurang lagi.', 'Tampil', '2021-09-24', '2021-09-24'),
(21, 'Berapa lama proses produksi sampai barang dikirim?', 'Untuk order reguler, rata-rata selesai dalam 3-4 hari kerja. Jika Anda menginginkan proses yang lebih cepat, bisa upgrade Order Express. Order Express diproses dalam 1-2 hari saja. Tidak disarankan order dengan batas waktu yang mepet (kurang dari 4 hari kerja). Kenapa? Kami tidak bisa memprediksi ketepatan waktu pengiriman oleh KURIR (yang mana itu diluar wewenang kami).', 'Tampil', '2021-09-24', '2021-09-24'),
(22, 'Bisakah saya melakukan perubahan setelah desain saya kirimkan?', 'Kami memproses pesanan Anda secepat mungkin yang artinya, kami tidak dapat menjamin bahwa perubahan dapat dilakukan setelah\r\nAnda mengirimkan pesanan Anda. Untuk menghindari masalah, kami sarankan agar Anda mengecek ulang pesanan Anda sebelum mengirimkannya. Namun, jika Anda kebetulan melakukan kesalahan terhadap pesanan Anda, jangan ragu untuk menghubungi kami dan kami akan mempertimbangkan apa yang dapat kami lakukan untuk membantu Anda.', 'Tampil', '0000-00-00', '2021-09-24'),
(23, 'Bagaimana kualitas kaosnya ?', 'Kami menyediakan kaos premium standar distro 30s yang adem dan nyaman dipakai. Kaos jenis ini banyak digunakan oleh distro-distro terkenal dan tidak perlu diragukan lagi kualitasnya. Setiap kaos telah melewati proses quality control yang ketat sehingga mutu dan kualitas kaos terjamin.', 'Tampil', '2021-09-24', '2021-09-24'),
(24, 'Jenis sablon apa yang digunakan?', 'Kami menggunakan jenis teknologi sablon digital dengan jaminan kualitas terbaik berupa sablon polyflex printing yang dapat dicetak dikaos secara maksimal dan ketahanan warna yang kuat', 'Tampil', '2021-09-24', '2021-09-24'),
(25, 'Rekening apa yang digunakan untuk melakukan pembayaran ?', 'Untuk saat ini kami hanya melayani pembayaran melalui transfer ke rekening Bank BCA 8465557377 Atas Nama Rendi Saputro.', 'Tampil', '2021-09-24', '2021-09-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar_referensi`
--

CREATE TABLE `tbl_gambar_referensi` (
  `id_gambar_referensi` int(20) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `create` date NOT NULL,
  `lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gambar_referensi`
--

INSERT INTO `tbl_gambar_referensi` (`id_gambar_referensi`, `nama_gambar`, `gambar`, `create`, `lastupdate`) VALUES
(6, '1', '15112021050111japanbnw.png', '2021-09-24', '2021-11-15'),
(7, '2', '15112021050124japanbnw-1.png', '2021-09-24', '2021-11-15'),
(8, '3', '240920211051303.png', '2021-09-24', '2021-09-24'),
(9, '4', '240920211051444.png', '2021-09-24', '2021-09-24'),
(10, '5', '240920211051545.png', '2021-09-24', '2021-09-24'),
(11, '6', '240920211052056.png', '2021-09-24', '2021-09-24'),
(12, '7', '15112021050145japanbnw-2.png', '2021-09-24', '2021-11-15'),
(13, '8', '240920211052298.png', '2021-09-24', '2021-09-24'),
(14, '9', '240920211052409.png', '2021-09-24', '2021-09-24'),
(15, '10', '2409202110525110.png', '2021-09-24', '2021-09-24'),
(16, '11', '2409202110530011.png', '2021-09-24', '2021-09-24'),
(17, '12', '15112021050207japanbnw-3.png', '2021-09-24', '2021-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kritiksaran`
--

CREATE TABLE `tbl_kritiksaran` (
  `id_kritiksaran` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `balasan` text NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kritiksaran`
--

INSERT INTO `tbl_kritiksaran` (`id_kritiksaran`, `nama`, `email`, `jenis`, `isi`, `balasan`, `created`) VALUES
(1, 'awan', 'awan@gmail.com', 'Kritik', 'ASD', '21-11-21', '0000-00-00'),
(2, 'asd', 'awansetiawan_@gmail.com', 'Kritik', 'asd', 'asd', '2021-11-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `no_invoice` varchar(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tanggal_order` date NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `resi_pengiriman` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kodepos` int(20) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `berat_order` int(12) NOT NULL,
  `biaya_ongkir` int(20) NOT NULL,
  `total_biaya` int(20) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `ulasan` text,
  `ratings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`no_invoice`, `id_user`, `tanggal_order`, `alamat_pengiriman`, `status`, `resi_pengiriman`, `provinsi`, `kota`, `kodepos`, `ekspedisi`, `paket`, `estimasi`, `berat_order`, `biaya_ongkir`, `total_biaya`, `bukti`, `ulasan`, `ratings`) VALUES
('TRX0000001', 7, '2021-10-08', 'Banguntapan', 'Pesanan Selesai', 'Pickup', 'Pickup', 'Pickup', 0, 'Pickup', 'Pickup', 'Pickup', 1600, 0, 680000, 'Offline', '', 0),
('TRX0000002', 7, '2021-10-08', 'Banguntapan', 'Pesanan Selesai', 'jtr22221312222222', 'DI Yogyakarta', 'Bantul', 55715, 'pos', 'Express Next Day Barang', '1 HARI', 4000, 40000, 1740000, 'Offline', 'Pelayanan yang sangat memuaskan', 5),
('TRX0000003', 5, '2021-10-08', 'Pandeyan, Yogyakarta', 'Pesanan Selesai', 'Pickup', 'Pickup', 'Pickup', 0, 'Pickup', 'Pickup', 'Pickup', 400, 0, 170000, '08102021020237Screenshot (3).png', 'barang sesuai apa ynag di desain', 4),
('TRX0000004', 5, '2021-10-08', 'Pandeyan, Yogyakarta', 'Pesanan Selesai', 'jne123333322', 'DI Yogyakarta', 'Yogyakarta', 55111, 'pos', 'Express Next Day Barang', '1 HARI', 2000, 20000, 1020000, '08102021020249Screenshot (7).png', 'Kualits sangat Memuaskan', 5),
('TRX0000005', 5, '2021-10-08', 'Pandeyan, Yogyakarta', 'Pesanan Selesai', 'jtr22221312222222', 'DI Yogyakarta', 'Yogyakarta', 55111, 'pos', 'Paket Kilat Khusus', '3 HARI', 200, 7000, 92000, '08102021050416main-image02.png', 'Sgt puas', 5),
('TRX0000006', 5, '2021-11-07', 'Pandeyan, Yogyakarta', 'Menunggu Pembayaran', 'NULL', 'Bali', 'Badung', 80351, 'pos', 'Paket Kilat Khusus', '6 HARI', 7600, 172800, 3522800, NULL, '', 0),
('TRX0000007', 5, '2021-11-18', 'Pandeyan, Yogyakarta', 'Pesanan Selesai', '18468119877', 'DI Yogyakarta', 'Yogyakarta', 55111, 'pos', 'Paket Kilat Khusus', '3 HARI', 4800, 35000, 2135000, '18112021113530bukti1.png', 'Sangat Memuaskan', 5),
('TRX0000008', 6, '2021-11-18', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', 'Menunggu Dikerjakan', 'NULL', 'DI Yogyakarta', 'Yogyakarta', 55111, 'tiki', 'REG', '2 HARI', 1600, 10000, 780000, '18112021113832bukti2.png', '', 0),
('TRX0000009', 7, '2021-11-18', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', 'Menunggu Dikerjakan', 'NULL', 'DI Yogyakarta', 'Yogyakarta', 55111, 'jne', 'CTC', '1 HARI', 800, 6000, 376000, '18112021113918bukti1.png', '', 0),
('TRX0000010', 9, '2021-11-18', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', 'Pesanan Selesai', '18468119789', 'DI Yogyakarta', 'Yogyakarta', 55111, 'pos', 'Pos Instan Barang', '1 HARI', 2400, 36000, 1221000, '18112021114028bukti1.png', 'kualitas produk sangat maksimal tapi pengiriman kurang sip', 3),
('TRX0000011', 11, '2021-11-18', 'Rt 21 rw 5 No 662 Pandeyan Umbulharjo, Yogyakarta', 'Pesanan Selesai', '18468119878', 'DI Yogyakarta', 'Yogyakarta', 55111, 'pos', 'Paket Kilat Khusus', '3 HARI', 1600, 14000, 694000, '18112021114055bukti2.png', 'sangat wow', 5),
('TRX0000012', 12, '2021-11-18', 'Berbah Sleman', 'Menunggu Konfirmasi', 'NULL', 'DI Yogyakarta', 'Sleman', 55513, 'pos', 'Paket Kilat Khusus', '4 HARI', 2600, 21000, 1321000, '18112021114125bukti1.png', '', 0),
('TRX0000013', 13, '2021-11-18', 'Berbah Sleman', 'Menunggu Dikerjakan', 'NULL', 'DI Yogyakarta', 'Sleman', 55513, 'pos', 'Paket Kilat Khusus', '4 HARI', 600, 7000, 307000, '18112021114159bukti1.png', '', 0),
('TRX0000014', 14, '2021-11-18', 'Jalan Tanah Abang IV No.49, Rt.8/Rw.4, Petojo Selatan, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160', 'Pesanan Selesai', '18468319865', 'DKI Jakarta', 'Jakarta Pusat', 10540, 'pos', 'Paket Kilat Khusus', '3 HARI', 1800, 30000, 870000, '18112021114321bukti3.png', 'Admin sangat membantu dalam pelayanan', 5),
('TRX0000015', 18, '2021-11-18', 'Galur Kulon Progo', 'Pesanan Selesai', 'NULL', 'DI Yogyakarta', 'Kulon Progo', 55611, 'pos', 'Paket Kilat Khusus', '3 HARI', 1000, 7000, 507000, '18112021114357bukti2.png', 'sangat wow', 5),
('TRX0000016', 19, '2021-11-18', 'Kalibawang, Yogyakarta', 'Pesanan Selesai', 'NULL', 'DI Yogyakarta', 'Kulon Progo', 55611, 'pos', 'Express Next Day Barang', '1 HARI', 1800, 20000, 815000, '18112021114426bukti3.png', 'pembelian pertama dan sesuai expetasi', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `warna_kaos` varchar(50) NOT NULL,
  `jenis_kaos` varchar(50) NOT NULL,
  `kode_warna` varchar(15) NOT NULL,
  `stok_s` int(5) NOT NULL,
  `stok_m` int(5) NOT NULL,
  `stok_l` int(5) NOT NULL,
  `stok_xl` int(5) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `warna_kaos`, `jenis_kaos`, `kode_warna`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `harga_produk`, `lastupdate`) VALUES
(1, 'Lengan Pendek Putih', 'Putih', 'Lengan Pendek', 'ffffff', 241, 245, 244, 250, 85000, '2021-10-01'),
(4, 'Lengan Pendek Abu-Abu', 'Abu-Abu', 'Lengan Pendek', '616161', 240, 245, 245, 245, 85000, '2021-09-22'),
(5, 'Lengan Pendek Hitam', 'Hitam', 'Lengan Pendek', '222222', 250, 250, 250, 250, 85000, '2021-09-22'),
(6, 'Lengan Pendek Oren', 'Oren', 'Lengan Pendek', 'ffa500', 250, 250, 249, 249, 85000, '2021-09-22'),
(7, 'Lengan Pendek Coklat', 'Coklat', 'Lengan Pendek', '964B00', 250, 250, 250, 250, 85000, '2021-09-22'),
(8, 'Lengan Pendek Pink', 'Pink', 'Lengan Pendek', 'FF007F', 249, 250, 250, 250, 85000, '2021-09-22'),
(9, 'Lengan Pendek Kuning', 'Kuning', 'Lengan Pendek', 'faef93', 250, 249, 247, 250, 85000, '2021-09-22'),
(10, 'Lengan Pendek Hijau Tua', 'Hijau Tua', 'Lengan Pendek', 'aeba5e', 248, 248, 248, 248, 85000, '2021-09-22'),
(11, 'Lengan Pendek Merah', 'Merah', 'Lengan Pendek', 'FF0000', 250, 250, 250, 250, 85000, '2021-09-22'),
(12, 'Lengan Pendek Merah Tua', 'Merah Tua', 'Lengan Pendek', '800000', 248, 248, 248, 248, 85000, '2021-09-22'),
(13, 'Lengan Pendek Biru Muda', 'Biru Muda', 'Lengan Pendek', '00FFFF', 250, 250, 250, 248, 85000, '2021-09-22'),
(14, 'Lengan Pendek Biru', 'Biru', 'Lengan Pendek', '0000FF', 250, 250, 248, 249, 85000, '2021-09-22'),
(15, 'Lengan Pendek Ungu', 'Ungu', 'Lengan Pendek', 'BF00FF', 250, 250, 248, 250, 85000, '2021-09-22'),
(16, 'Lengan Panjang Putih', 'Putih', 'Lengan Panjang', 'ffffff', 249, 250, 245, 248, 100000, '2021-09-22'),
(17, 'Lengan Panjang Abu-Abu', 'Abu-Abu', 'Lengan Panjang', '616161', 238, 250, 250, 250, 100000, '2021-09-22'),
(18, 'Lengan Panjang Hitam', 'Hitam', 'Lengan Panjang', '222222', 250, 250, 250, 250, 100000, '2021-09-22'),
(19, 'Lengan Panjang Oren', 'Oren', 'Lengan Panjang', 'ffa500', 250, 245, 248, 250, 100000, '2021-09-22'),
(20, 'Lengan Panjang Coklat', 'Coklat', 'Lengan Panjang', '964B00', 250, 250, 250, 250, 100000, '2021-09-22'),
(21, 'Lengan Panjang Pink', 'Pink', 'Lengan Panjang', 'FF007F', 250, 250, 250, 250, 100000, '2021-09-22'),
(22, 'Lengan Panjang Kuning', 'Kuning', 'Lengan Panjang', 'faef93', 250, 250, 250, 250, 100000, '2021-09-22'),
(23, 'Lengan Panjang Hijau Tua', 'Hijau Tua', 'Lengan Panjang', 'aeba5e', 250, 250, 250, 250, 100000, '2021-09-22'),
(24, 'Lengan Panjang Merah', 'Merah', 'Lengan Panjang', 'FF0000', 250, 248, 249, 250, 100000, '2021-09-22'),
(25, 'Lengan Panjang Merah Tua', 'Merah Tua', 'Lengan Panjang', '800000', 250, 250, 250, 250, 100000, '2021-09-22'),
(26, 'Lengan Panjang Biru Muda', 'Biru Muda', 'Lengan Panjang', '00FFFF', 250, 250, 250, 250, 100000, '2021-09-22'),
(27, 'Lengan Panjang Biru', 'Biru', 'Lengan Panjang', '0000FF', 247, 245, 248, 249, 100000, '2021-09-22'),
(28, 'Lengan Panjang Ungu', 'Ungu', 'Lengan Panjang', 'BF00FF', 248, 248, 250, 250, 100000, '2021-09-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `token` varchar(15) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `nama_lengkap`, `nomor`, `jenis_kelamin`, `alamat`, `token`, `created`) VALUES
(5, 'yuliusyanis1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Yulius Yanis', '123', 'Laki-Laki', 'Pandeyan, Yogyakarta', 'G3BS8ILZWYJD41R', '2021-09-01'),
(6, 'aguspurwanto@gmail.com', 'b9e4426468ad08badaf13797f31b6e37', 'Agus Purwanto', '0851231231223', 'Laki-Laki', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', '', '2021-09-01'),
(7, 'indraprabowo@gmail.com', '955d67196afb33d5f23847e8133213eb', 'Indra Prabowo', '0895389154126', 'Laki-Laki', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', '', '2021-09-01'),
(9, 'prabowoi387@gmail.com', '9d100117fba60a92a331ec6308837008', 'Indra Prabowo', '0897820172661', 'Laki-Laki', 'Rt 6 rw 2 No 2 Gunung Ketur Pakualaman Umbulharjo, Yogyakarta', '', '2021-09-01'),
(11, 'davidandrian1@gmail.com', 'd191f133ac03dff7cdb05977ebaec20b', 'David Andrian', '08126281901327', 'Laki-Laki', 'Rt 21 rw 5 No 662 Pandeyan Umbulharjo, Yogyakarta', 'MF2PQTDCHS3NGEL', '2021-09-01'),
(12, 'aidita.yama@gmail.com', '1cb533b4feb5bf98e2e3a2fe6323e6e3', 'Aidita Yama Melati', '08218192037816', 'Perempuan', 'Berbah Sleman', '', '2021-09-01'),
(13, 'ditamelati_@gmail.com', '5fafded41f97f411ce0e1ef980f68d22', 'Dita Melati', '0891233910936', 'Perempuan', 'Berbah Sleman', '', '2021-09-01'),
(14, 'lennys_yohana@gmail.com', 'e0317c219ccdd450063917c478f18fb3', 'Yohana Lenny S', '0819292265228', 'Perempuan', 'Rt 21 rw 5 No 662 Pandeyan Umbulharjo, Yogyakarta', '', '2021-09-01'),
(18, 'abdullah33@gmail.com', '877e19d43338d1f25eef4cc7bb87cb84', 'Abdullah', '+62918262910282', 'Laki-Laki', 'Galur Kulon Progo', '', '2021-09-01'),
(19, 'awansetiawan_@gmail.com', 'd4cdfd69f2a170f84eebebd37e1910f0', 'Ahmad Setiawan', '628917262738172', 'Laki-Laki', 'Kalibawang, Yogyakarta', '', '2021-11-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_desain_produk_user`
--
ALTER TABLE `tbl_desain_produk_user`
  ADD PRIMARY KEY (`id_desain_produk_user`);

--
-- Indeks untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `tbl_gambar_referensi`
--
ALTER TABLE `tbl_gambar_referensi`
  ADD PRIMARY KEY (`id_gambar_referensi`);

--
-- Indeks untuk tabel `tbl_kritiksaran`
--
ALTER TABLE `tbl_kritiksaran`
  ADD PRIMARY KEY (`id_kritiksaran`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_desain_produk_user`
--
ALTER TABLE `tbl_desain_produk_user`
  MODIFY `id_desain_produk_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar_referensi`
--
ALTER TABLE `tbl_gambar_referensi`
  MODIFY `id_gambar_referensi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_kritiksaran`
--
ALTER TABLE `tbl_kritiksaran`
  MODIFY `id_kritiksaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
