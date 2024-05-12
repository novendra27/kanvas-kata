<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8" />
    <title>Halaman <?= $data['judul']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASEURL ?>/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= BASEURL ?>/assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= BASEURL ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= BASEURL ?>/assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center pt-4">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="<?= BASEURL ?>/assets/images/logo.png" height="70" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-2">Selamat Datang !</h5>
                                        <p class="text-muted">Login untuk memulai perjalanan menulismu</p>
                                    </div>


                                    <form class="form-horizontal mt-2 pt-2" action="index.html">

                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                                        </div>

                                        <div class="mb-4">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Masukkan password">
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Login</button>
                                        </div>

                                    </form>

                                    <div class="mt-5 text-center text-white">
                                        <p>Belom punya akun?<a href="<?= BASEURL ?>/auth/register" class="fw-bold text-white"> Daftar Akun</a> </p>
                                        <p>© 2024 Kanvas Kata.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= BASEURL ?>/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL ?>/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= BASEURL ?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= BASEURL ?>/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?= BASEURL ?>/assets/js/app.js"></script>

</body>

</html>