<?php
require 'functions.php';
session_start();

    //cek cookie
    if(isset($_COOKIE['idnya']) && isset($_COOKIE['key'])){
        $idnya=$_COOKIE['idnya'];
        $key=$_COOKIE['key'];

        //ambil username berdasarkan id
        $result_login_user=mysqli_query($connect_db, "SELECT username FROM users
            WHERE id=$idnya");
        $baris=mysqli_fetch_assoc($result_login_user);

        //cek cookie dan username
        if($key === hash('sha384', $baris['username'])){
            $_SESSION['login']=true;
        }

    }

    // cek apakah masukan benar
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result_login_user=mysqli_query($connect_db, "SELECT * FROM users WHERE
            username ='$username' 
         ");

         if (mysqli_num_rows($result_login_user)===1) {
            //cek password
            $baris = mysqli_fetch_assoc($result_login_user);
            if(password_verify($password, $baris["password"])//kebalikan dari password_hash()
                ){
                    $_SESSION["login"] = true; //kirim sesion

                    // cek remember me
                    if(isset($_POST['remember'])){
                        //setcookie(name, value, masa) //hati-hati
                        setcookie('idnya', $baris['id'], time()+60);
                        setcookie('key', hash('sha384', $baris['username'], time()+60));
                    }

                    header("Location: index_admin.php");
                    exit;
            }
            
        }
        $error=true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>

    <link rel="stylesheet" href="style_admin.css" />

</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($error)): ?>
        <p style="color:red;">username/password salah</p>
    <?php endif; ?>

    <div>
        <!-- form untuk menampung data -->
        <form action="" method="post">
                <label for="username"><b>Username</b></label> <br>
                <input class="login" type="text" name="username" id="username">
                <br>
                <label for="password"><b>Password</b></label> <br>
                <input type="password" name="password" id="password">
                <br>
                <input type=checkbox name=remember id=remember>
                <label for=remember>Remember me</label>
                <br>
                <button type="submit" name="login">Login</button>
        </form>
    </div>
    
</body>
</html>