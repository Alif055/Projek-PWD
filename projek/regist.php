<?php
include "koneksi.php";

if (isset($_POST["register"])) {
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    //cek kesamaan pw
    if ($password != $password2) {
        echo "<script>
            alert('Password does not match, please try again.')
        </script>";
    } else {
        //engkripsi

        $password = password_hash($password, PASSWORD_DEFAULT);

        // masukkin ke db
        $query = "INSERT into akun (username, password) values ('$username','$password')";
        $q = mysqli_query($conn, $query);

        if ($q) {
            echo "<script>
            alert('user berhasil registrasi')
        </script>";
        } else {
            echo "<script>
            alert('ggagal masuk data ')
        </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
</head>
<body>
    <form action="" method="post">
        <h1>Registrasi Akun</h1>
        <label for="username">Username</label> <br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label> <br>
        <input type="password" name="password" id="password"><br>
        <label for="password2">Konfirmasi Password</label> <br>
        <input type="password" name="password2" id="password2"><br>
        <input type="submit" value="register" name="register">
    </form>
</body>
</html>