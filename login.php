<?php
    session_start();
    
    if(isset($_SESSION['email'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
             <label for="email">Email</label>
             <input type="email" name="email"  > <br/>
                
             <label for="password">Password</label>
             <input type="password" name="password"  > <br/>

            <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
<?php
    include_once("config.php");
    include_once("helper.php");

    if(isset($_POST['submit'])) {

        $email = filterData($_POST['email']);
        $password = md5(filterData($_POST['password']));
        // bikin koneksi
        // bikin form
        // bikin query untuk membandingkan data inputan
        // dengan data yang ada di table users
        // jika ada kita masukin kedalam session datanya dan redirect ke index.php
        // jika tidak ada kita kasih pesan error
        $login = mysqli_query($mysqli, "
                        SELECT * FROM users
                        WHERE email = '$email'
                        AND password = '$password'");
        $data = mysqli_fetch_array($login);
       /*  echo "<pre>".print_r($data['email'], 1)."</pre>";
        die; */
        
        $row = mysqli_num_rows($login);
        
        if($row > 0) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            
            header("Location: index.php");
        } else {
            echo "Gagal login";
        }
    }

?>