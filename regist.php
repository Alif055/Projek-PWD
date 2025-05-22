<?php
include "koneksi.php";

if (isset($_POST["register"])) {
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {
        echo "<script>
            alert('Password does not match, please try again.')
        </script>";
    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT into akun (username, password) values ('$username','$password')";
        $q = mysqli_query($conn, $query);

        if ($q) {
            echo "<script>
            alert('user berhasil registrasi')
        </script>";
        } else {
            echo "<script>
            alert('gagal untuk beroperasi')
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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: url('fotobg2.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .register-card {
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
        }
         .regist-atas {
            background: #fff;
            padding: 30px;
            text-align: center;
         }
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .btn-register {
            background: linear-gradient(to right,rgb(0, 0, 0),rgb(0, 0, 0));
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            color: white;
        }
        .form-label {
            margin-bottom: 5px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card">
            <h2 class="text-center mb-4">
                    <i class="fas fa-user-plus me-2"></i>Registrasi Akun</h2>         
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                </div>
                
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi password" required>
                </div>
                
                <button type="submit" class="btn btn-register mb-3" name="register">
                    <i class="fas fa-user-plus me-2"></i>Daftar
                </button>
                
                <div class="text-center">
                    <p>Sudah punya akun? <a href="login.php" class="text-decoration-none">Login disini</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
