<?php 
// Memulai sesion
session_start();
//cek, apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$menunya=query("SELECT * FROM menu");

?>

<!DOCTYPE html>
<html lang="en">
  <head>

  <style>
   .dafMenu .row{
    display: flex;
    flex-wrap: wrap;
    margin-top: 5rem;
    justify-content: center;

  }

  .dafMenu .row .menu-card{
    text-align: center;
    padding-bottom: 4rem;
    padding-left: 3rem;
    padding-right: 3rem;
    
  }

  .dafMenu .row .menu-card img{
    border-radius: 50%;
    width: 50%;
    padding-top: 10px;
  }

  .tambah{
    background-color: green;
    color: white;
    padding: 1px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 2rem;
    border-radius: 8px;
    box-shadow: 0 3px #444;
  }

  .hapus{
    background-color: red;
    color: white;
    padding: 1px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 2rem;
    border-radius: 8px;
    box-shadow: 0 3px #444;
  }

  .ubah{
    background-color: blue;
    color: white;
    padding: 1px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 2rem;
    border-radius: 8px;
    box-shadow: 0 3px #444;
  }
  </style>
    <title>Admin Ubud</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- icon -->
    <!-- pastikan terhubung ke internet -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- style -->
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>

    <!-- navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Admin | Warung Garasi<span> Ubud</span>.</a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#dafMenu">Menu</a>
            <a href="#contact">Contact</a>
            <a href="../index.php">Halaman pengunjung</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="menu"><i data-feather="menu"></i></a>
        </div>

    </nav>
    <!-- navbar end -->


    <!-- hero section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Mari mampir ke kedai <span>kami</span></h1>
        <p>Disini kami akan memberikan pelayanan yang ramah dan nyaman.</p>
        <a href="#about" class="cta">Lanjutkan</a>

      </main>
    </section>
    <!-- hero section end -->

    <!-- about sections start -->
    <section id="about" class="about">
      <h2>Tentang</h2>
      <div class="row">
        <div class="about-img">
          <img src="../img/tempatnya.jpg" alt="Tentang">
        </div>
        <main class="content">
          <h3>Kenapa memilih kami?</h3>
          <p>Disini kami menyajikan berbagai makanan dengan suasana dan dekorasi yang mirip seperti garasi vespa, namun tetap nyaman.
            Bahkan kamu dapat mengasah sosialisasi kamu dengan para turis mancanegara.
          </p>
          <a href="#dafMenu" class="cta">Lihat Menu</a>

        </main>
      </div>
    </section>
    <!-- about sections end-->

    <!-- menu section start-->
    <section id="dafMenu" class="dafMenu">
      <h2>Menu</h2>
      <p>Berikut beberapa menu andalan kami</p>

      <a class="tambah" href='tambah.php' class="button">Tambah Menu</a>
      <div class="row">
        <div class="menu-card">

        <?php $i=1; ?>
    <?php foreach($menunya as $baris): 
         $nama_konfirmasi = $baris["nama_menu"]; //untuk nanti konfirmasi
         ?>
    <div class="element">
        <img src="../img/<?= $baris["gambar"]; ?>">
        <h3 class="nama_menu"><?= $baris["nama_menu"] ," | ", $baris["harga"], "K IDR"?></h3>

      <a class="hapus" href="hapus.php?id=<?= $baris["id"]; ?>" onclick="
                return confirm('Apa anda yakin ingin menghapus <?= $nama_konfirmasi ?>');">Hapus
                <!-- tanda tanya untuk mengirim data -->
          </a>

      <a class="ubah" href="ubah.php?id=<?= $baris["id"]; ?>">Ubah
                <!-- tanda tanya untuk mengirim data -->
          </a>

            <body>
    </div>
    <?php $i++; ?>
    <?php endforeach; ?>

        </div>
        <p>Dan masih banyak lagi, lengkapnya ada di warung kami<a href="#contact"><b> =></b></a></p>
      </div>
    </section>
    <!-- menu section end-->

<!-- contact start -->
    <section id="contact" class="contact">
      <h2>Kontak</h2>
      <p>Silahkan kunjungii atau hubungi kami bila ada pertanyaan ataupun permintaan ;)</p>
      <br>
      <iframe class="map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.8455526941425!2d115.25801121398484!3d-8.514372593878878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23d6d351220b9%3A0xb947dd11b10f904!2sWarung%20Garasi!5e0!3m2!1sid!2sid!4v1679460284059!5m2!1sid!2sid" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"></iframe>
        <br>

    </section>
    <!-- contact end -->
    
    <!-- footer start -->
    <footer>
      <div class="socials">
        <a href="https://www.instagram.com/explore/locations/253669140/warung-garasi-ubud/?hl=id">
          <i data-feather="instagram"></i>
        </a>
        <a href="https://www.facebook.com/profile.php?id=100054648870396">
          <i data-feather="facebook"></i>
        </a>
        <a href="https://wa.me/085107012261">
          <i data-feather="phone"></i>
        </a>
      </div>

      <div class="credit">
        <p>Created by <a href=""><b>Ezra JFP</b></a>| &copy; 2023.</p>
      </div>
    </footer>
    <!-- footer end -->

    <!-- feather icons -->
    <script>
        feather.replace()
      </script>

          <!-- my js -->
    <script src="script.js"></script>
  </body>
</html>
