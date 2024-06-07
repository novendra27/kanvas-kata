        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <h4>KANVAS KATA</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kanvas Kata</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Halaman Penulis</a></li>
                                        <li class="breadcrumb-item active">Beranda</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="container-fluid">
                    <div class="page-content-wrapper">

                        <div class="row mb-3">
                            <div class="col-md-6 col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body">
                                        <div class="">
                                            <h5>
                                                <i class="mdi mdi-account-circle-outline text-primary h3 me-1"></i>
                                                Username
                                            </h5>
                                            <h5 class="text-muted mt-1 mb-0 ms-1"><?= $_SESSION['nama'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body">
                                        <div class="">
                                            <h5>
                                                <i class="mdi mdi-file-document-edit-outline text-success h3 me-1"></i>
                                                Total Artikel
                                            </h5>
                                            <h5 class="text-muted mt-1 mb-0 ms-1"><?= $data['artikel']['jumlah_artikel'] ?> Artikel</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body">
                                        <div class="">
                                            <h5>
                                                <i class="mdi mdi-format-list-text text-info h3 me-1"></i>
                                                Total Kategori
                                            </h5>
                                            <h5 class="text-muted mt-1 mb-0 ms-1"><?= $data['kategori']['jumlah_kategori'] ?> Kategori</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body">
                                        <div class="">
                                            <h5>
                                                <i class="mdi mdi-account-circle-outline text-primary h3 me-1"></i>
                                                Jumlah Pengguna
                                            </h5>
                                            <h5 class="text-muted mt-1 mb-0 ms-1"><?= $data['pengguna']['jumlah_user'] ?> Pengguna</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div> <!-- container-fluid -->

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                2024 © Kanvas Kata.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->