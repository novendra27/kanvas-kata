
    <div class="home-center pt-4">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a></div>

                <?php Flasher::flash(); ?>
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


                                    <form class="form-horizontal mt-2 pt-2" action="<?= BASEURL ?>/auth/login" method="post">

                                        <div class="mb-3">
                                            <label for="nama">Username</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan username">
                                        </div>

                                        <div class="mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
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

