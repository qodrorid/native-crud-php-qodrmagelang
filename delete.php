<?php
    session_start();    

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
    include_once("config.php");

    //dapetin id
    $id = $_GET['id'];
    
    //delete data berdasarkan id
    mysqli_query($mysqli, "DELETE FROM users
                           WHERE id=$id");

    // kalo udah delete lempar ke index
    header("Location:index.php");                       

