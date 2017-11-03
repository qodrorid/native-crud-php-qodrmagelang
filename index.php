<?php
include_once("config.php");

$results = mysqli_query($mysqli, "SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar CRUD</title>
</head>
<body>
    <a href="add.php">Tambah Data</a> </br>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($res = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td><?php echo $res['id'] ?></td>
                        <td><?php echo $res['nama'] ?></td>
                        <td><?php echo $res['email'] ?></td>
                        <td><?php echo $res['alamat'] ?></td>
                    </tr>
                <?php } ?>    
        </tbody>
    </table>
</body>
</html>