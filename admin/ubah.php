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

//ambil data id yang diklik
$id =$_GET["id"];
//query data berdasarkan id
$menu=query("SELECT * FROM menu WHERE id=$id")[0]; //maksud index 0 adalah karena indeks lokasi id pemanggilan berada pada dimensi kedua


if(isset($_POST["submit"])){
    //Cek Keberhasilan
    if(ubah($_POST) > 0){
        echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'index_admin.php';
            </script>";
    }else{
        echo "Maaf, data anda gagal diubah<br>";
        echo mysqli_error($connect_db);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style_admin.css" />

</head>
<body>
    <h1>Ubah Data</h1>
    
<!-- enctype untuk mengelola file -->
    <form action="" method="post" enctype="multipart/form-data">

        <!-- =====Keamanan===== -->
        <!-- required artinya wajib diisi -->
        <input type="hidden" name="id" value="<?= $menu["id"] ?>">
        <input type="hidden" name="gambar_lama" value="<?= $menu["gambar"] ?>">

        <ul>
           
            <li>
                <label for="nama_menu">Nama Origami</label>
                <input type="text" name="nama_menu"
                required
                value="<?= $menu["nama_menu"] ?>">
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="text" name="harga"
                required
                value="<?= $menu["harga"] ?>">
            </li>
            <li>
                <label for="gambar">Nama Gambar</label>
                <br>
                <img src="../img/<?= $menu['gambar']; ?>" width='120' >
                <input type="file" name="gambar"
                >
            </li>
            <button type="submit" name="submit">Perbarui Data</button>
        </ul>

    </form>


</body>
</html>