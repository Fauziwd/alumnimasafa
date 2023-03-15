<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Styling for the eye button */
        .eye-btn {
            background-image: url('witness.ico'); /*path to your image*/
            background-repeat: no-repeat;
            background-position: center;
            width: 25px;
            height: 25px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            margin: 5px;
        }
        /* Styling for the light-up effect */
        .eye-btn.light-up {
            filter: brightness(150%);
            animation: pulse 1s infinite;
        }
        /* 3D effect when hover over the button */
        .eye-btn:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            transform: scale(1.1);
        }
        @keyframes pulse {
0% {
box-shadow: 0 0 0 0px rgba(255, 0, 0, 0.7); /* warna merah */
}
50% {
box-shadow: 0 0 0 0px rgba(0, 0, 255, 0.7);
}
25% {
box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
}
}
    .form-control {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

.form-control:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
transform: rotate(45deg);
}
.card {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.form-with-texture {
    background-size: cover;
    background-repeat: repeat;
    background-position: center;
    font-family: 'Lato', sans-serif;
    background:
    radial-gradient(black 3px, transparent 4px),
    radial-gradient(black 3px, transparent 4px),
    linear-gradient(#fff 4px, transparent 0),
    linear-gradient(45deg, transparent 74px, transparent 75px, #a4a4a4 75px, #a4a4a4 76px, transparent 77px, transparent 109px),
    linear-gradient(-45deg, transparent 75px, transparent 76px, #a4a4a4 76px, #a4a4a4 77px, transparent 78px, transparent 109px),
    #fff;
    background-size: 109px 109px, 109px 109px,100% 6px, 109px 109px, 109px 109px;
    background-position: 54px 55px, 0px 0px, 0px 0px, 0px 0px, 0px 0px;
}

</style>
</head>
<body class="form-with-texture">
    <div class="container mt-5">
<div class="d-flex justify-content-center">
<div class="card">
<div class="card-body" style="width: 18rem;">
<form class="" action="aksiloginadmin.php" method="post">
<div class="mb-3">
<label for="username" class="form-label">Login Admin</label>
<input type="text" class="form-control" id="username" aria-describedby="" name="username">
</div>
<div class="input-group">
<input type="password" class="form-control" id="password" name="password">
<div class="input-group-append">
<button class="eye-btn" type="button" onclick="showPassword()"></button>
</div>
</div>
<div class="col-auto">
<span id="passwordHelpInline" class="form-text">Diisi sekitar 8-20 karakter ya..</span>
</div>
<div class="mt-3 mb-2 form-check">
<input type="checkbox" class="form-check-input" id="ingat"
                         name="ingatkan">
<label class="form-check-label" for="ingat">Ingat Saya</label>

</div>
<button type="submit" class="mb-3 btn btn-primary">Submit</button>
<!-- <p class="login-register-text"> belum punya akun? <a href="register.php" style="text-decoration:none; color: red;"><strong>Register Disini</strong></a></p> -->
</form>
</div>
</div>
</div>
</div>
<script>
function showPassword() {
var x = document.getElementById("password");
if (x.type === "password") {
x.type = "text";
document.querySelector('.eye-btn').classList.add('light-up');
} else {
x.type = "password";
document.querySelector('.eye-btn').classList.remove('light-up');
}
}
</script>
</body>
</html>



