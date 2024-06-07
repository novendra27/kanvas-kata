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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Halaman Admin</a></li>
                                        <li class="breadcrumb-item active">Tambah Kategori</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="container-fluid">

                    <div class="page-content-wrapper">
                        <form class="needs-validation" novalidate action="<?= BASEURL ?>/admin/tambahDataKategori" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-5 rounded-3">
                                        <?php Flasher::flash(); ?>
                                        <div class="card-body">
                                            <div class="row pb-3 mb-3 border-bottom rounded">
                                                <div class="col-xl-6">
                                                    <div class="mb-1">
                                                        <h3>
                                                            <i class="mdi mdi-format-list-text text-info h1 me-2"></i>
                                                            Tambah Kategori
                                                        </h3>
                                                        <h5 class="text-muted mt-3 mb-0 ps-1">Tambahkan daftar kategori artikel!</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mb-2 pt-1">
                                                    <label for="namaKategori" class="form-label">Nama Kategori</label>
                                                    <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Masukkan Nama Kategori" value="" required>
                                                    <div class="valid-feedback">
                                                        Inputan sudah benar!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Inputan masih salah!
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="border-bottom rounded pb-3 mb-3"></h5>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary bg-opacity-30" type="submit">Tambah Kategori</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>


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