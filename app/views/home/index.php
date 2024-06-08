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
                                                    <img class="card-img-top px-3 pt-3 rounded-3" src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $artikel['gambar'] ?>" alt="..." style="height: 180px;" />
                                                    <div class="card-body">
                                                        <h2 class="card-title h4"><?= $artikel['judul']; ?></h2>
                                                        <div class="small text-muted fst-italic">Diupload pada: <?= $artikel['tanggal']; ?></div>
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
                                        if ($count != 0 && $count == 7) {
                                            break;
                                        }
                                    }
                                    if ($count >= 1 && $count % 2 != 1) {
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