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
                                                        <i class="mdi mdi-account-circle-outline text-success h1 me-2"></i>
                                                        Daftar Pengguna
                                                    </h3>
                                                    <h5 class="text-muted mt-3 mb-0 ps-1">Daftar pengguna yang telah mendaftar</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="col-1">No</th>
                                                    <th class="col-2">Nama</th>
                                                    <th class="col-3">Email</th>
                                                    <th class="col-2">Password</th>
                                                    <th class="col-2">Peran</th>
                                                    <th class="col-2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                foreach ($data['pengguna'] as $pengguna) {
                                                    $count++;
                                                ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $pengguna['nama'] ?></td>
                                                        <td><?= $pengguna['email'] ?></td>
                                                        <td><?= $pengguna['password'] ?></td>
                                                        <td><?= $pengguna['peran'] ?></td>
                                                        <td>
                                                            <form action="<?= BASEURL ?>/admin/hapusDataPengguna" method="post">
                                                                <button type="button" class="btn btn-outline-success waves-effect waves-light btn-edit me-2" data-bs-toggle="modal" data-bs-target="#modal" data-id="<?= $pengguna['id_pengguna'] ?>" data-nama="<?= $pengguna['nama'] ?>" data-email="<?= $pengguna['email'] ?>" data-password="<?= $pengguna['password'] ?>" data-peran="<?= $pengguna['peran'] ?>">
                                                                    Edit</button>
                                                                <input type="hidden" name="idPengguna" value="<?= $pengguna['id_pengguna'] ?>">
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
            <form class="needs-validation" novalidate action="<?= BASEURL ?>/admin/ubahDataPengguna" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="idPengguna" id="idPengguna">
                                <div class="row">
                                    <div class="col-12">
                                        <?php Flasher::flash(); ?>
                                        <div class="row">
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                                                <input type="text" class="form-control" name="namaPengguna" id="namaPengguna" placeholder="Masukkan Pengguna" required>
                                                <div class="valid-feedback">
                                                    Inputan sudah benar!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Inputan masih salah!
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 pt-1">
                                                <label for="emailPengguna" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="emailPengguna" id="emailPengguna" placeholder="Masukkan Email Pengguna" required>
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
                                                <label for="passwordPengguna" class="form-label">Password</label>
                                                <input type="text" class="form-control" id="passwordPengguna" placeholder="Masukkan Password Artikel" name="passwordPengguna" required>
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
                                                <label for="peranPengguna" class="form-label">Peran</label>
                                                <select class="form-select" name="peranPengguna" id="peranPengguna" required>
                                                    <option value="Penulis">Penulis</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
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
                    var email = button.getAttribute('data-email');
                    var password = button.getAttribute('data-password');
                    var peran = button.getAttribute('data-peran');

                    // Update the modal's content
                    document.getElementById('idPengguna').value = id;
                    document.getElementById('namaPengguna').value = nama;
                    document.getElementById('emailPengguna').value = email;
                    document.getElementById('passwordPengguna').value = password;
                    document.getElementById('peranPengguna').value = peran;
                    // Optionally, you can handle image preview if needed
                    // document.getElementById('peranPreview').src = "path/to/images/" + peran;
                });
            });
        </script>