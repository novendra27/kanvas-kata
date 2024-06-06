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


                        <div class="container">
                            <div class="row">
                                <!-- Blog entries-->
                                <div class="col-lg-8">
                                    <!-- Featured blog post-->
                                    <?php
                                    $count = 0;
                                    foreach ($data['artikel'] as $artikel) {
                                        if ($count == 0) {
                                    ?>
                                            <div class="card mb-4 rounded-3">
                                                <img class="card-img-top px-3 pt-3 rounded-3" src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $artikel['gambar'] ?>" alt="..." />
                                                <div class="card-body">
                                                    <h2 class="card-title"><?= $artikel['judul']; ?></h2>
                                                    <div class="small text-muted fst-italic mb-1">Diupload pada: <?= $artikel['tanggal']; ?></div>
                                                    <p class="card-text"><?= substr($artikel['konten'], 0, 300); ?>...</p>
                                                    <form action="<?= BASEURL ?>/home/detailArtikel/<?= $artikel['id_artikel']; ?>">
                                                        <button class="btn btn-primary" type="submit">Baca selengkapnya →</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php
                                        } else if ($count != 0 && $count % 2 == 1) {
                                            echo '<div class="row">';
                                        }
                                        if ($count != 0) {
                                        ?>
                                            <div class="col-lg-6">
                                                <!-- Blog post-->
                                                <div class="card mb-4 rounded-3">
                                                    <img class="card-img-top px-3 pt-3 rounded-3" src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $artikel['gambar'] ?>" alt="..." />
                                                    <div class="card-body">
                                                        <h2 class="card-title h4"><?= $artikel['judul']; ?></h2>
                                                        <div class="small text-muted fst-italic mb-1">Diupload pada: <?= $artikel['tanggal']; ?></div>
                                                        <p class="card-text"><?= substr($artikel['konten'], 0, 300); ?>...</p>
                                                        <form action="<?= BASEURL ?>/home/detailArtikel/<?= $artikel['id_artikel']; ?>">
                                                            <button class="btn btn-primary" type="submit">Baca selengkapnya →</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        if ($count != 0 && $count % 2 != 1) {
                                            echo '</div>';
                                        }
                                        $count++;
                                        if ($count != 0 && $count == 6) {
                                            break;
                                        }
                                    }
                                    if ($count != 0 && $count % 2 != 1) {
                                        echo '</div>';
                                    }
                                    ?>
                                    <!-- Pagination-->
                                    <!-- <nav aria-label="Pagination">
                                        <hr class="my-0" />
                                        <ul class="pagination justify-content-center my-4">
                                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                                        </ul>
                                    </nav> -->
                                </div>
                                <!-- Side widgets-->
                                <div class="col-lg-4">
                                    <!-- Search widget-->
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-header rounded-top">Search</div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Categories widget-->
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-header rounded-top">Categories</div>
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
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-header rounded-top">Side Widget</div>
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