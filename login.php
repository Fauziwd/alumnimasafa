

<?php
session_start();

// if (isset($_COOKIE['nama_login'])) {
//     header("Location: index.php");
// }
if (isset($_SESSION['ingatkan'])) {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head style="background-color:black;">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-image: url('assets/bglogin.jpg');">

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="background-color: rgba(10,1,1,0.4);  backdrop-filter: blur(5px); color: blanchedalmond;">
                <div class="card-body" style="width: 18rem; ">
                <!-- <div class=" shadow-lg p-1 mb-1  rounded" style="background: rgb(119,153,102); color: #064420; margin: 5px;">
                <h4 style="text-align:center;">Login Admin
                </h4></div> -->
                    <?php
                    if (isset($_GET['pesan'])) { ?>
                    <div class="alert alert-primary" role="alert">
                        <?= $_GET['pesan'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php }
                    ?>
                    <form class="" action="aksilogin.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" aria-describedby="" name="username">

                        </div>
                        <div class="">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text">
                            Diisi sekitar 8-20 karakter ya..
                            </span>
                        </div>
                        <div class="mt-3 mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="ingat" name="ingatkan">
                            <label class="form-check-label" for="ingat">Ingat Saya</label>
                        </div>
                        <button type="submit" class=" mb-3 btn btn-primary">Submit</button>
                       <p class="login-register-text"> belum punya akun? <a href="register.php" style="text-decoration:none; color: red;"><strong>Register Disini</strong></a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>