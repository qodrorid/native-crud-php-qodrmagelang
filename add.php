<?php 
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah user</title>
</head>
<body>
    <form action="add.php" method="POST">
    <label for="nama">Nama</label>
    <input type="text" name="nama"  > <br/>

    <label for="alamat">Alamat</label>
    <input type="text" name="alamat"  > <br/>

    <label for="email">Email</label>
    <input type="text" name="email"  > <br/>

    <label for="password">Password</label>
    <input type="password" name="password"  > <br/>

    <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>

<?php
    include_once("config.php");
    include_once("helper.php");

    if(isset($_POST['submit'])) {
        $nama = filterData($_POST['nama']);
        $email = filterData($_POST['nama']);
        $password = filterData(md5($_POST['password']));
        $alamat = filterData($_POST['alamat']);

        mysqli_query($mysqli, "INSERT INTO users(email, password, nama, alamat)
                               VALUES('$email','$password','$nama','$alamat')");
        
        header("Location:index.php");
    }

?>