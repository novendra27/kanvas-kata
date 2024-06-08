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
                                        <li class="breadcrumb-item active">Artikel</li>
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
                            <div class="col-12">
                                <div class="card border-5 rounded-3">
                                    <div class="card-body p-4">
                                        <?php Flasher::flash(); ?>
                                        <div class="row pb-3 mb-3 border-bottom rounded">
                                            <div class="col-xl-6">
                                                <div class="mb-1">
                                                    <h3>
                                                        <i class="mdi mdi-file-document-edit-outline text-success h1 me-2"></i>
                                                        Daftar Artikel
                                                    </h3>
                                                    <h5 class="text-muted mt-3 mb-0 ps-1">Daftar artikel yang telah dibuat</h5>
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
                                                    $count++;
                                                ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $artikel['tanggal'] ?></td>
                                                        <td><?= $artikel['judul'] ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($data['nama_kategori'] as $kategori) {
                                                                if ($kategori['id_kategori'] == $artikel['id_kategori']) {
                                                                    echo $kategori['nama_kategori'];
                                                                    break;
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?= substr($artikel['konten'], 0, 100); ?>...</td>
                                                        <td><img src="<?= BASEURL ?>/assets/images/foto_artikel/<?= $artikel['gambar'] ?>" alt="" style="height: 100px;"></td>
                                                        <td>
                                                            <form action="<?= BASEURL ?>/admin/hapusDataArtikel" method="post">
                                                            <button type="button" class="btn btn-outline-success waves-effect waves-light btn-edit me-2" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $artikel['id_artikel'] ?>" data-judul="<?= $artikel['judul'] ?>" data-kategori="<?= $artikel['id_kategori'] ?>" data-konten="<?= $artikel['konten'] ?>" data-gambar="<?= $artikel['gambar'] ?>">
                                                                Edit</button>
                                                                <input type="hidden" name="idArtikel" value="<?= $artikel['id_artikel'] ?>">
                                                                <button type="submit" class="btn btn-outline-danger waves-effect waves-light">Hapus</button>
                                                            </form>
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

            <!-- Modal -->
            <form class="needs-validation" novalidate action="<?= BASEURL ?>/admin/ubahDataArtikel" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="idArtikel" id="idArtikel">
                                <div class="row">
                                    <div class="col-12">
                                        <?php Flasher::flash(); ?>
                                        <div class="row">
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="judulArtikel" class="form-label">Judul</label>
                                                <input type="text" class="form-control" name="judulArtikel" id="judulArtikel" placeholder="Masukkan Judul Artikel" required>
                                                <div class="valid-feedback">
                                                    Inputan sudah benar!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Inputan masih salah!
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="kategoriArtikel" class="form-label">Kategori</label>
                                                <select class="form-select" name="kategoriArtikel" id="kategoriArtikel" required>
                                                    <?php
                                                    foreach ($data['nama_kategori'] as $kategori) {
                                                    ?>
                                                        <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">
                                                    Inputan sudah benar!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Inputan masih salah!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="gambarArtikel" class="form-label">Gambar</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="gambarArtikel" name="gambarArtikel">
                                                </div>
                                                <div class="valid-feedback">
                                                    Inputan sudah benar!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Inputan masih salah!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="kontenArtikel" class="form-label">Konten</label>
                                                <textarea class="form-control" id="kontenArtikel" placeholder="Masukkan Konten Artikel" name="kontenArtikel" required rows="5"></textarea>
                                                <div class="valid-feedback">
                                                    Inputan sudah benar!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Inputan masih salah!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('modal');
                modal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var id = button.getAttribute('data-id');
                    var judul = button.getAttribute('data-judul');
                    var kategori = button.getAttribute('data-kategori');
                    var konten = button.getAttribute('data-konten');
                    var gambar = button.getAttribute('data-gambar');

                    // Update the modal's content
                    document.getElementById('idArtikel').value = id;
                    document.getElementById('judulArtikel').value = judul;
                    document.getElementById('kategoriArtikel').value = kategori;
                    document.getElementById('kontenArtikel').value = konten;
                    // Optionally, you can handle image preview if needed
                    // document.getElementById('gambarPreview').src = "path/to/images/" + gambar;
                });
            });
        </script>