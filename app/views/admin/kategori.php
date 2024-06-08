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
                                        <li class="breadcrumb-item active">Kategori</li>
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
                                                        <i class="mdi mdi-format-list-text text-info h1 me-2"></i>
                                                        Daftar Kategori
                                                    </h3>
                                                    <h5 class="text-muted mt-3 mb-0 ps-1">Daftar kategori yang telah dibuat</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="col-1">No</th>
                                                    <th class="col-9">Nama Kategori</th>
                                                    <th class="col-2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                foreach ($data['kategori'] as $kategori) {
                                                    $count++;
                                                ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $kategori['nama_kategori'] ?></td>
                                                        <td>
                                                            <form action="<?= BASEURL ?>/admin/hapusDataKategori" method="post">
                                                            <button type="button" class="btn btn-outline-success waves-effect waves-light btn-edit me-2" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $kategori['id_kategori'] ?>" data-nama="<?= $kategori['nama_kategori'] ?>">
                                                                Edit</button>
                                                                <input type="hidden" name="idKategori" value="<?= $kategori['id_kategori'] ?>">
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
            <form class="needs-validation" novalidate action="<?= BASEURL ?>/admin/ubahDataKategori" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="idKategori" id="idKategori">
                                <div class="row">
                                    <div class="col-12">
                                        <?php Flasher::flash(); ?>
                                        <div class="row">
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="namaKategori" class="form-label">Nama Kategori</label>
                                                <input type="text" class="form-control" name="namaKategori" id="namaKategori" placeholder="Masukkan Judul Artikel" required>
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
                    var nama = button.getAttribute('data-nama');

                    // Update the modal's content
                    document.getElementById('idKategori').value = id;
                    document.getElementById('namaKategori').value = nama;
                    // Optionally, you can handle image preview if needed
                    // document.getElementById('gambarPreview').src = "path/to/images/" + gambar;
                });
            });
        </script>