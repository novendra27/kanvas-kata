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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                                        <li class="breadcrumb-item active">Detail Artikel</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="container-fluid">

                    <div class="page-content-wrapper">

                        <!-- Page content-->
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-lg-8">
                                    <!-- Post content-->
                                    <div class="card rounded-3">
                                        <div class="card-body">
                                            <article>
                                                <!-- Post header-->
                                                <header class="mb-4">
                                                    <!-- Post title-->
                                                    <h1 class="fw-bolder mb-1"><?= $data['artikel']['judul'] ?></h1>
                                                    <!-- Post meta content-->
                                                    <div class="text-muted fst-italic mb-2">Diupload pada: <?= $data['artikel']['tanggal'] ?></div>
                                                    <!-- Post categories-->
                                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?= $data['kategori']['nama_kategori'] ?></a>
                                                </header>
                                                <!-- Preview image figure-->
                                                <figure class="mb-4"><img class="img-fluid rounded" src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $data['artikel']['gambar'] ?>" alt="..." /></figure>
                                                <!-- Post content-->
                                                <section class="mb-5">
                                                    <p class="fs-5 mb-4"><?= $data['artikel']['konten'] ?></p>
                                                </section>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <!-- Side widgets-->
                                <div class="col-lg-4">
                                    <!-- Search widget-->
                                    <div class="card mb-4">
                                        <div class="card-header">Search</div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Categories widget-->
                                    <div class="card mb-4">
                                        <div class="card-header">Categories</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><a href="#!">Web Design</a></li>
                                                        <li><a href="#!">HTML</a></li>
                                                        <li><a href="#!">Freebies</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="list-unstyled mb-0">
                                                        <li><a href="#!">JavaScript</a></li>
                                                        <li><a href="#!">CSS</a></li>
                                                        <li><a href="#!">Tutorials</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Side widget-->
                                    <div class="card mb-4">
                                        <div class="card-header">Side Widget</div>
                                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
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