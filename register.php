<?php 
    include 'koneksi.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if ($password == $cpassword) {
            $sql = "SELECT * FROM `login` WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO `login` (username, email, `password`)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
            }
            } else {
            echo "<script>alert('Password Tidak Sesuai')</script>";
            }
            }
            ?>

 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="register.css">

<title>Form Pendaftaran Online</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group form-shadow neumorphism">
            <input type="text" class="form-shadow neumorphism" placeholder="Username" name="username" value="<?php echo (isset($username)) ? $username : ''; ?>" required>
            </div>
            <div class="input-group form-shadow neumorphism">
            <input type="text" class="form-shadow neumorphism" placeholder="Email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" required>
                </div>
            <div class="input-group form-shadow neumorphism">
            <input type="password" class="form-shadow neumorphism" placeholder="Password" name="password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>" required>
            </div>
            <div class="input-group form-shadow neumorphism">
            <input type="password" class="form-shadow neumorphism" placeholder="Konfirmasi Password" name="cpassword" value="<?php echo (isset($_POST['cpassword'])) ? $_POST['cpassword'] : ''; ?>" required>
            </div>
            <div class="form-group">
            <input type="submit" class="form-shadow neumorphism btn" name="submit" value="Register">
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>
<?php
    mysqli_close($con);
?>