<?php
    include_once("config.php");

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        mysqli_query($mysqli, "UPDATE users
                               SET nama='$nama', alamat='$alamat', email='$email', password='$password'
                               WHERE id='$id' ");

        header("Location:index.php");
    }
?>