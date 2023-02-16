
<?php
session_start();
/* if (empty($_COOKIE['nama_login'])) {
header("Location: login.php");
} */
$menu = "home";
if ($_SESSION['nama_login'] == null) {
    header("Location: login.php");
}
require_once('koneksi.php');
$ambil_alumni = mysqli_query($con,"select * from alumni");
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/darkmode.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once('navbar.php'); ?>

    <!-- <div id="myDiv" class="text-center">
    <h1>Isi Identitas Disini</h1>
    </div> -->


    <style>

</style>


    <div class="container mt-5" style="font-family: 'Montserrat', sans-serif;">
        <form class="shadow-lg p-1 mb-5" action="postdata.php" method="post" enctype="multipart/form-data">
            <div class=" div1 dark-mode mb-3 shadow p-1 mb-2">
                <label for="nama" class="form-label"><b>Nama</b></label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis Nama dan Angkatan">
            </div>
            <div class=" div1 mb-3 shadow p-1 mb-2">
                <label for="alamat" class="form-label"><b>Alamat</b></label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Tulis Alamatmu"></textarea>
            </div>
            <div class=" div1 mb-3 shadow p-1 mb-2">
                <label for="NOHP" class="form-label"><b>No HP</b></label>
                <input type="number" class="form-control" id="NOHP" name="nohp" placeholder="Tulis No HP">
            </div>
            <div class=" div1 mb-3 shadow p-1 mb-2">
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
            <div class=" div1 mb-3 shadow p-1 mb-2">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Tulis Email" required>
            </div>
            <div class=" div1 mb-3 shadow p-1 mb-2">
            <input type="hidden" name="MAX_FILE_SIZE" value="1500000">
                <label for="foto" class="form-label"><b>Foto</b></label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>

<button type="submit" class="continue-application">
    <div>
        <div class="pencil"></div>
        <div class="folder">
            <div class="top">
                <svg viewBox="0 0 24 27">
                    <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                </svg>
            </div>
            <div class="paper"></div>
        </div>
    </div>
    Continue Application
</button>
        </form>
    </div>

<!-- sidebar -->

    <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
    <label for="burger" class="burger">
  <input id="burger" type="checkbox" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-label="Close">
  <span></span>
  <span></span>
  <span></span>
  </div>
  <div class="offcanvas-body" style="font-family: 'Montserrat', sans-serif;">
    <ul class="list-group ">
      <!-- <li class="list-group-item d-flex align-items-center" style="text-decoration: none;">
        <i class="fas fa-user-graduate fa-2x mr-3">&nbsp;</i>
        <a href="home.php" style="text-decoration: none;">Data Alumni</a>
      </li> -->
      <li class="btn1 d-flex align-items-center">
        <i class="fas fa-calendar-alt fa-2x mr-3">&nbsp;</i>
        <a href="#" style="text-decoration: none;">Event</a>
      </li>
      <!-- <li class="btn1 d-flex align-items-center">
        <i class="fas fa-calendar-check fa-2x mr-3">&nbsp;</i>
        <a href="#" style="text-decoration: none;">Event</a>
      </li> -->
      <li class="btn1 d-flex align-items-center">
        <i class="fas fa-book fa-2x mr-3">&nbsp;</i>
        <a href="wejangan.html" style="text-decoration: none;">Nasehat</a>
      </li>
      <li class="btn1 d-flex align-items-center">
        <i class="fas fa-info-circle fa-2x mr-3">&nbsp;</i>
        <a href="chat.php" style="text-decoration: none;">Chat</a>
      </li>
      <li class="btn1 d-flex align-items-center">
        <i class="fas fa-info-circle fa-2x mr-3">&nbsp;</i>
        <a href="#" style="text-decoration: none;">About</a>
      </li>
      <li class="btn1 d-flex align-items-center">
        <i class="fas fa-sign-out-alt fa-2x mr-3">&nbsp;</i>
        <a href="keluar.php" style="text-decoration: none;">Log Out</a>
      </li>
    </ul>
  </div>
</div>


        <!-- mode gelap -->

    <script>
    var toggle = document.getElementById("dark-mode-toggle");
    var icon = document.getElementById("dark-mode-icon");

    // Cek apakah user pernah mengganti mode sebelumnya
    if(localStorage.getItem("dark-mode") === "on") {
        var body = document.getElementsByTagName("body")[0];
        body.classList.add("dark-mode");
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
    } else {
        localStorage.setItem("dark-mode", "off");
    }

    toggle.addEventListener("click", function() {
        var body = document.getElementsByTagName("body")[0];
        body.classList.toggle("dark-mode");
        if(body.classList.contains("dark-mode")) {
            icon.classList.remove("fa-moon");
            icon.classList.add("fa-sun");
            localStorage.setItem("dark-mode", "on");
        } else {
            icon.classList.remove("fa-sun");
            icon.classList.add("fa-moon");
            localStorage.setItem("dark-mode", "off");
        }
            
    });

    // merubah warna bg pada div
     // mendapatkan elemen div dengan id "myDiv"
//   var myDiv = document.getElementById("myDiv");

// // menambahkan event listener onmouseover pada elemen myDiv
// myDiv.addEventListener("mouseover", function() {
//   this.style.backgroundColor = "#658864"; // mengubah warna background menjadi hitam
// });

// // menambahkan event listener onmouseout pada elemen myDiv
// myDiv.addEventListener("mouseout", function() {
//   this.style.backgroundColor = "#4E6C50"; // mengubah warna background menjadi putih
// });

// document.getElementById("myDiv").addEventListener("mouseover", function(){
//   this.classList.add("shadow");
// });

// document.getElementById("myDiv").addEventListener("mouseout", function(){
//   this.classList.remove("shadow");
// });



</script>


</body>

</html>