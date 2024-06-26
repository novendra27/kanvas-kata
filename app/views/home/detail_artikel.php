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
                                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?= $data['kategori_artikel']['nama_kategori'] ?></a>
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
                                    <div class="card rounded-3 mb-4">
                                        <div class="h6 card-header rounded-top">Kutipan Positif</div>
                                        <div class="card-body">
                                            ”Jika kamu tidak sanggup menahan lelahnya belajar maka kamu harus sanggup menahan perihnya kebodohan”
                                            <br>
                                            <div class="mt-2 text-muted">- Imam Syafi’i</div>
                                        </div>

                                    </div>
                                    <!-- Categories widget-->
                                    <div class="card rounded-3 mb-4">
                                        <div class="h6 card-header rounded-top">Daftar Kategori</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                                                $count = 0;
                                                foreach ($data['kategori'] as $kategori) {
                                                    if ($count == 6) {
                                                        break;
                                                    }
                                                    if ($count == 0 or $count == 3) {
                                                        echo '<div class="col-sm-6">';
                                                        echo '<ul class="list-unstyled mb-0">';
                                                    }
                                                ?>
                                                    <li class="mb-2"><a href="<?= BASEURL ?>/home/artikelByKategori/<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori'] ?></a></li>
                                                <?php
                                                    if ($count == 2 || $count == 5) {
                                                        echo '</ul>';
                                                        echo '</div>';
                                                    }
                                                    $count++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Side widget-->
                                    <div class="card rounded-3 mb-4">
                                        <div class="h6 card-header rounded-top">Tentang Kami</div>
                                        <div class="card-body">
                                            Kanvas Kata adalah platform blogging yang memungkinkan pengguna untuk mengekspresikan kreativitas mereka melalui tulisan. Dengan antarmuka yang ramah pengguna, pengguna dapat dengan mudah membuat, mengedit, dan membagikan artikel mereka sendiri dengan audiens yang luas. Dengan Kanvas Kata, setiap orang memiliki kesempatan untuk membangun komunitas dan memperluas jangkauan ide-ide mereka.
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