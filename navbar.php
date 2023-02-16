<!doctype html>
<html lang="en">

<head>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg dark-mode;">
    <div class="container shadow-lg p-2 mb-4 dark-mode" style="background-color: #B6E2A1; border-radius: 3px;  ">
<label for="burger" class="burger">
  <input id="burger" type="checkbox" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  <span></span>
  <span></span>
  <span></span>
</label>
&nbsp;
        <a class="navbar-brand" href="loginadmin.php" style="font-family: 'Montserrat', sans-serif; background-color: #064420; border-radius: 10px; width: 250px; text-align: center; font-weight:bold; color: white;">MASAFA Database</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Montserrat', sans-serif;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <!-- <li class="nav-item">
                    <a class="nav-link <?=($menu=="data") ? "active" : "" ;?>" href="home.php">Database</a>
                </li> -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Lainnya
                    </a>
                    <ul class="dropdown-menu shadow-lg p-1 mb-3" style="background: rgba(203, 203, 215, 0.3);
          -webkit-backdrop-filter: blur(13px);
          backdrop-filter: blur(3px)">
                        <li class="nav-item">
                        <a class="nav-link <?=($menu=="home") ? "active" : "" ;?>" aria-current="page" href="index.php">Daftar Baru</a></li>
                        <li><a class="nav-link <?=($menu=="home") ? "active" : "" ;?>" aria-current="page" href="#">Info</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="keluar.php" style="color: #F6416C;">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <form action="" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="pencarian" value="<?=(isset($_GET['pencarian']))? $_GET['pencarian']:""?>">
                <button class="btn btn-outline-success" type="submit" style=" margin-right:10px;">Search</button>
                <button type="button" class="btn btn-outline-dark" id="dark-mode-toggle">
  <i id="dark-mode-icon" class="fas fa-light"></i>
</button>
            </form>
        </div>
    </div>
</nav>

<script>
    var darkModeToggle = document.getElementById("dark-mode-toggle");
    var darkModeIcon = document.getElementById("dark-mode-icon");
    var body = document.getElementsByTagName("body")[0];
    var darkMode = false;

    darkModeToggle.addEventListener("click", function() {
        if (!darkMode) {
            body.classList.add("dark-mode");
            darkModeIcon.classList.remove("fa-light");
            darkModeIcon.classList.add("fa-dark");
            darkMode = true;
        } else {
            body.classList.remove("dark-mode");
            darkModeIcon.classList.remove("fa-dark");
            darkModeIcon.classList.add("fa-light");
            darkMode = false;
        }
    });
</script>
