<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Edokumen Login</title>

    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');
    </style>

    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/my-login.css">
</head>

<!-- <body oncontextmenu='return false' class='snippet-body'> -->

<body class='snippet-body'>
    <div class="wrapper bg-white">
        <div class="h2 text-center">eDokumen</div>
        <div class="h4 text-muted text-center pt-2">Sistem Informasi Dokumen Elektronik</div>
        <form class="pt-3" action="logincek" method="post">
            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" name="username" placeholder="Masukkan Username" required class=""> </div>
            </div>
            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" name="password" placeholder="Masukkan Password" required class=""> <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button> </div>
            </div>
            <button class="btn btn-block w-100 text-center my-3">Log in</button>
            <div class="text-center pt-3 text-muted">Memerlukan akun ? <a href="#">Hubungi Administrator</a></div>
        </form>
    </div>

    <script type='text/javascript' src='/assets/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='assets/js/popper.min.js'></script>

</body>

</html>