<?php 
// Memulai sesion
session_start();
//cek, apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
//koneksi
require 'functions.php';

if(isset($_POST["submit"])){
    //Cek Keberhasilan
    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index_admin.php';
            </script>
            ";
    }else{
        echo "Maaf, data anda gagal ditambahkan<br>";
        echo mysqli_error($connect_db);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style_admin.css" />

</head>
<body>
    <h1>Tambah Data</h1>

        <!-- =====Keamanan===== -->
        <!-- required artinya wajib diisi -->

    <form action="" method="post" enctype="multipart/form-data">

        <ul>
            <li>
                <label for="nama_menu">Nama Makanan</label>
                <input type="text" name="nama_menu"
                required>
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="text" name="harga"
                required>
            </li>
            <li>
                <label for="gambar">Nama Gambar</label>
                <input type="file" name="gambar"
                required>
            </li>
            <button type="submit" name="submit">Kirim Data</button>
        </ul>

    </form>


</body>
</html>