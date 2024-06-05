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


                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-12">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body">
                                        <div class="">
                                            <h5>
                                                <i class="mdi mdi-file-document-edit-outline text-success h3 me-1"></i>
                                                Total Artikel
                                            </h5>
                                            <?php
                                            $count = 0;
                                            foreach ($data['artikel'] as $artikel) {
                                                $count++;
                                            }
                                            ?>
                                            <h5 class="text-muted mt-1 mb-0 ms-1"><?= $count ?> Artikel</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
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
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body p-4">
                                        <div class="row pb-3 mb-3 border-bottom rounded">
                                            <div class="col-xl-6">
                                                <div class="mb-1">
                                                    <h3>
                                                        <i class="mdi mdi-file-document-edit-outline text-success h1 me-2"></i>
                                                        Daftar Artikel
                                                    </h3>
                                                    <h5 class="text-muted mt-3 mb-0 ps-1">Daftar artikel yang telah anda buat</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="col-1">No</th>
                                                    <th class="col-2">Tanggal</th>
                                                    <th class="col-2">Judul</th>
                                                    <th class="col-1">Kategori</th>
                                                    <th class="col-2">Konten</th>
                                                    <th class="col-2">Gambar</th>
                                                    <th class="col-2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                foreach ($data['artikel'] as $artikel) {
                                                    if ($count >= 10) {
                                                        break;
                                                    }
                                                    $count++;
                                                ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $artikel['tanggal'] ?></td>
                                                        <td><?= $artikel['judul'] ?></td>
                                                        <td><?= $artikel['id_kategori'] ?></td>
                                                        <td><?= $artikel['konten'] ?></td>
                                                        <td><img src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $artikel['gambar'] ?>" alt="" style="height: 100px;"></td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success waves-effect waves-light">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger waves-effect waves-light">Hapus</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


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