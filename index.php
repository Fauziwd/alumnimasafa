
<?php
session_start();
/* if (empty($_COOKIE['nama_login'])) {
header("Location: login.php");
} */
$menu = "home";
if ($_SESSION['nama_login'] == null) {
    header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="path/to/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


    <?php require_once('navbar.php'); ?>

    <div class="container mt-5">
        <form class="shadow-lg p-1 mb-5" action="postdata.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 shadow-lg p-1 mb-2">
                <label for="nama" class="form-label"><b>Nama</b></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis Namamu">
            </div>
            <div class="mb-3 shadow-lg p-1 mb-2">
                <label for="alamat" class="form-label"><b>Alamat</b></label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Tulis Alamatmu"></textarea>
            </div>
            <div class="mb-3 shadow-lg p-1 mb-2">
                <label for="NOHP" class="form-label"><b>No HP</b></label>
                <input type="number" class="form-control" id="NOHP" name="nohp" placeholder="Tulis No HP">
            </div>
            <div class="mb-3 shadow-lg p-1 mb-2">
                <p class=""><b>Jenis Kelamin</b></p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenkel" value="L" id="jenkel1">
                    <label class="form-check-label" for="jenkel1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenkel" value="P" id="jenkel2" checked>
                    <label class="form-check-label" for="jenkel2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3 shadow-lg p-1 mb-2">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Tulis Email" required>
            </div>

            <div class="mb-3 shadow-lg p-1 mb-2">
                <label for="pilih_kelas" class="form-label"><b>Angkatan</b></label>
                <input type="number" class="form-control" id="pilih_kelas" name="pilih_kelas" placeholder="Angkatan Berapa?">
            </div>

            <div class="mb-3 shadow-lg p-1 mb-2">
            <input type="hidden" name="MAX_FILE_SIZE" value="1500000">
                <label for="foto" class="form-label"><b>Foto</b></label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>
            <button type="submit" class="btn btn-sm btn-info shadow-lg p-1 mb-2" style="width: 150px; color: white;">Upload</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>