<?php
include "koneksi.php";
session_start();
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];
    $result = mysqli_query($conn, "SELECT * from akun where id = '$id'");
    $row = mysqli_fetch_assoc($result);
    if ($username === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}
if (isset($_POST["login"])) {
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * from akun where username = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            if (isset($_POST["remember"])) {
                setcookie('id', $row['id'], time()+60);
                setcookie('username', hash('sha256', $row['username']), time()+60);
            }
            header("Location: index.php");
            exit;
        };
    }
    echo "<script>
            alert('salah username atau password')
        </script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            /*background: linear-gradient(360deg, #667eea 0%, #764ba2 100%);*/
            background: url('fotobg2.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .border-tumpul {
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
         .login-atas {
            background: #fff;
            padding: 30px;
            text-align: center;
        }
        .login-utama {
            background: rgba(255, 255, 255, 0.5);
            padding: 30px;
        }
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
        }
        .tombol-login {
            background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(0, 0, 0));
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
        }
        .remember-me {
            display: flex;
            align-items: center;
        }
        .remember-me input {
            margin-right: 8px;
        }
</style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="border-tumpul">
                    <div class="login-atas">
                        <h2 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Login Akun</h2>
                    </div>
                    <div class="login-utama">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                                </div>
                            </div>
                             <div class="mb-3 remember-me">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary tombol-login mb-3" name="login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                            <div class="text-center">
                    <p>Belum punya akun? <a href="regist.php" class="text-decoration-none">Sign up disini</a></p>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
