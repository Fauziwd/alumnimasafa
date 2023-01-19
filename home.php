<?php

$menu = "data";

require_once('koneksi.php');

// menjumlahkan keseluruhan alumni
$query = "SELECT SUM(jumlah) as total FROM (SELECT id_kelas,COUNT(id_kelas)AS jumlah FROM daftar_kelas GROUP BY id_kelas) as subquery";
$ambil_data_angkatan = mysqli_query($con, $query);
$data_angkatan = mysqli_fetch_assoc($ambil_data_angkatan);

// mengelompokkan jumlah alumni
$total = $data_angkatan['total'];
$query = "SELECT id_kelas,COUNT(id_kelas)AS jumlah FROM daftar_kelas GROUP BY id_kelas ORDER BY id_kelas ASC, jumlah ASC";
$ambil_data_angkatan = mysqli_query($con, $query);

// mengelompokkan pengguna provider

$query = "SELECT 
CASE 
    WHEN substring(nohp, 1, 4) IN ('0812') THEN 'Telkomsel' 
    WHEN substring(nohp, 1, 4) IN ('0852','0853') THEN 'Telkomsel (AS)'
    WHEN substring(nohp, 1, 4) IN ('0811','0812') THEN 'Telkomsel (Simpati/Halo)'
    WHEN substring(nohp, 1, 4) IN ('0813','0821') THEN 'Telkomsel (Simpati)'
    WHEN substring(nohp, 1, 4) IN ('0822') THEN 'Telkomsel (Loop)'
    WHEN substring(nohp, 1, 4) IN ('0851') THEN 'Telkomsel (by.U)'
    WHEN substring(nohp, 1, 4) IN ('0857','0856') THEN 'Indosat'
    WHEN substring(nohp, 1, 4) IN ('0895','0896','0897','0898','0899') THEN 'Tri'
    WHEN substring(nohp, 1, 4) IN ('0817','0818','0819','0859','0877','0878') THEN 'XL'
    WHEN substring(nohp, 1, 4) IN ('0832','0833','0838') THEN 'Axis'
    WHEN substring(nohp, 1, 4) IN ('0881','0882','0883','0884','0885','0886','0887','0888','0889') THEN 'Smartfren'
    ELSE 'Lainnya'
END as provider_name,
COUNT(nohp) as total_value,
count(*)
FROM data_siswa
GROUP BY provider_name";
$ambil_data_nohp = mysqli_query($con, $query);


if (isset($_GET['pencarian'])) {
    $cari = $_GET['pencarian'];
    // panggil table data siswa
    $ambil_data = mysqli_query($con, "SELECT a.*,k.angkatan FROM `data_siswa` a left JOIN  daftar_kelas b on b.no_siswa=a.no left join kelas k on k.id=b.id_kelas where a.nama like '%$cari%' ");
} else {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $offset = 0;
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
}
    // panggil seluruh table data siswa
   $ambil_data = mysqli_query($con, "SELECT a.*,k.angkatan FROM `data_siswa` a left JOIN daftar_kelas b on b.no_siswa=a.no left join kelas k on k.id=b.id_kelas ORDER BY k.angkatan, a.nama ASC LIMIT $offset, 10");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    

  </head>
    </head>

<body>

    <?php require_once('navbar.php'); ?>

    <button type="button" class="btn btn-primary" id="liveToastBtn" 
    style="margin-left:60px; position:relative;bottom:-40px; box-shadow: 5px 5px 20px #ccc;">Pesan Dari Admin</button>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: rgba(1,10,1,0.4); color: white;  backdrop-filter: blur(5px);">
    <div class="toast-header" style="background-color: #B6E2A1;">
      <img src="assets/logo.ico" class="rounded me-2" alt="...">
      <strong class="me-auto">Admin Masafa</strong>
      <small>Baru Saja</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
    Jangan suka usil ya tangannya.. data jangan sembarang dimain-mainin!
    </div>
  </div>
</div>
<script>
    // mengambil tombol dari DOM
    const liveToastBtn = document.getElementById("liveToastBtn");
    // menambahkan event listener pada tombol
    liveToastBtn.addEventListener("click", function() {
        // mengambil toast dari DOM
        const liveToast = document.getElementById("liveToast");
        // menampilkan toast
        liveToast.classList.add("show");
        // menyembunyikan toast setelah 3 detik
        setTimeout(function() {
            liveToast.classList.remove("show");
        }, 3000);
    });
      // mengambil tombol close dari DOM
      const closeBtn = document.querySelector(".btn-close");
    // menambahkan event listener pada tombol close
    closeBtn.addEventListener("click", function() {
        // mengambil toast dari DOM
        const liveToast = document.getElementById("liveToast");
        // menyembunyikan toast
        liveToast.classList.remove("show");
    });
    </script>    


</body>


    <div class="container mt-5 shadow-lg p-3 mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Gambar</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($data = mysqli_fetch_assoc($ambil_data)) {

                    // jika foto kosong maka tampilkan gambar default
                    if ($data['foto'] == "") {
                        $gambar = "sandal.jpeg";
                    } else {
                        $gambar = $data['foto'];
                    }

                    ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td>
                            <?php echo $data['nama'] ?>
                        </td>
                        <td><?= $data['alamat'] ?></td>
                        <td>
                            <?= $data['nohp'] ?>
                        </td>
                        <td>
                            <?= $data['email'] ?>
                        </td>
                        <td>
                            <?= $data['jenkel'] ?>
                        </td>
                        <td><?= $data['angkatan'] ?></td>
                        <td><img class="img-thumbnail" width="100" src="assets/<?= $gambar ?>" /></td>
                        <td>
    <button class="btn btn-info" data-bs-toggle="modal" style="color: white;" data-bs-target="#exampleModal"
        data-bs-id="<?= $data['no'] ?>" data-bs-aksi="ubah"> Ubah
    </button>
</td>
<td>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-id="<?= $data['no'] ?>" data-bs-aksi="hapus"> Hapus
    </button>
</td>

                    </tr>

                <?php } ?>

                <?php
if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = 0;
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
}

?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

<div class="pagination">
    <?php if ($offset > 0): ?>
        <button type="button" class="btn btn-outline-info prev-btn" style="margin-right: 10px;">
            <a  style="text-decoration: none;" href="home.php?offset=<?php echo $offset - 10; ?>">
                <i class="fas fa-arrow-left"></i>
            </a>
        </button>
    <?php endif; ?>
    <button type="button" class="btn btn-outline-info next-btn">
    <a  style="text-decoration: none;" href="home.php?offset=<?php echo $offset + 10 ?>">
    <i class="fas fa-arrow-right"></i>
            </a>
    </button>
</div>
<style>
    .prev-btn i {
        animation: move-left 2s linear infinite;
    }

    @keyframes move-left {
        from {transform: translateX(0);}
        to {transform: translateX(-10px);}
    }
    .next-btn i {
        animation: move-right 2s linear infinite;
    }

    @keyframes move-right {
        from {transform: translateX(0);}
        to {transform: translateX(10px);}
    }
</style>






            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="background-color: #B6E2A1; color: white;">Masafa Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: crimson;"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 shadow-lg p-3 mb-5 rounded flex-container" style="background: rgb(64,134,58);
background: linear-gradient(211deg, rgba(64,134,58,1) 0%, rgba(93,164,88,1) 36%, rgba(179,255,174,1) 100%); color: #E3F6FF; margin: 40px;">
    <h2 style="text-align:center;">Statistik Alumni</h2>
    </div>
    <div class="container mt-5 shadow-lg p-3 mb-5">
        <h2>Jumlah Alumni</h2>
        <table class="table shadow-lg p-3 mb-5" style="width: 300px; border-radius:10px;">
            <thead>
                <tr>
                    <th scope="col" style="width: 20px;">No</th>
                    <th scope="col" style="width: 200px;">Angkatan</th>
                    <th scope="col" style="width: 20px;">Total</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $total = 0;
                while ($data_angkatan = mysqli_fetch_assoc($ambil_data_angkatan)) {
                    echo "<tr>";
                    echo "<td  style='background-color: #473C33; color: white; text-align:center;'><b>" . $nomor . "</b></td>";
                    echo "<td align='fixed'>" . $data_angkatan['id_kelas'] . "</td>";
                    echo "<td style='padding-left:20px;'>" . $data_angkatan['jumlah'] . "</td>";                    
                    echo "</tr>";
                    $nomor++;
                    $total += $data_angkatan['jumlah'];
                }
                ?>
                <tr style="background-color: #D5CEA3;"> 
                <td colspan="2" style="color: red;"><b>Total</b></td>
                    <td style="background-color: #ECECEC; color: #473C33; padding-left:20px;"><b><?php echo $total;?></b></td>
                </tr>

            </tbody>
        </table>

        <!-- tabel penghitung pengguna provider -->
    <div class="container mt-5 shadow-lg p-3 mb-5">
        <h2>Jumlah Pengguna Provider</h2>
        <table class="table shadow-lg p-3 mb-5" style="width: 600px; border-radius:10px;">
            <thead>
                <tr>
                    <th scope="col" style="width: 20px;">No</th>
                    <th scope="col" style="width: 600px;">provider</th>
                    <th scope="col" style="width: 20px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                $total = 0;
                while ($data_nohp = mysqli_fetch_assoc($ambil_data_nohp)) {
                    echo "<tr>";
                    echo "<td  style='background-color: #473C33; color: white; text-align:center;'><b>" . $nomor . "</b></td>";
                    echo "<td align='fixed'>" . $data_nohp['provider_name'] . "</td>";
                    echo "<td style='padding-left:20px;'>" . $data_nohp['total_value'] . "</td>";                    
                    echo "</tr>";
                    $nomor++;
                    $total += $data_nohp['total_value'];
                }
                ?>
                
            </tbody>
        </table>



    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- JQUERY 3.X -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            // alert('Hallo');
            const modal = document.getElementById('exampleModal')
            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id');
                const aksi = button.getAttribute('data-bs-aksi');
                // console.log(id);
                $.post('form.php', { id, aksi }, function (a) {
                    // console.log(a);
                }).done(function (x) {
                    $('.modal-body').html(x);
                }).fail(function () {
                    alert("error");
                }).always(function () {
                    // alert("finished");
                });
            });


            // proses update
            $("#form").submit(function (event) {
                event.preventDefault();
                // const data_form = this.serialize();
                // console.log(data_form);
            })

        });

    </script>
</body>

</html>