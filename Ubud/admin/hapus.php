<?php
// Memulai sesion
session_start();
//cek, apakah sudah login
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET["id"];

if(hapus($id)>0){
    echo"
        <script>
            alert('Data berhasil dihapus');
            document.location.href='index_admin.php';
        </script>
    ";
}else{
    echo"
    <script>
        alert('Data gagal dihapus');
        document.location.href='index_admin.php';
    </script>
";
}

?>