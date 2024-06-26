<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= BASEURL ?>/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= BASEURL ?>/assets/images/logo-dark.png" alt="" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= BASEURL ?>/assets/images/icon.png" alt="" height="38">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= BASEURL ?>/assets/images/logo.png" alt="" height="68">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= BASEURL ?>/assets/images/users/avatar-7.jpg" alt="Header Avatar">
                        <?php if(isset($_SESSION['nama'])): ?>
                            <span class="d-none d-xl-inline-block ms-1"><?= $_SESSION['nama']; ?></span>
                        <?php else: ?>
                            <span class="d-none d-xl-inline-block ms-1">Pengguna tamu</span>
                        <?php endif; ?>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="<?= BASEURL ?>/auth/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="<?= BASEURL ?>/assets/images/users/avatar-7.jpg" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                        <?php if(isset($_SESSION['nama']) && isset($_SESSION['peran'])): ?>
                            <h5 class="mt-3 font-size-16 text-white"><?= $_SESSION['nama']; ?></h5>
                            <span class="font-size-13 text-white-50"><?= $_SESSION['peran']; ?></span>
                        <?php else: ?>
                            <h5 class="mt-3 font-size-16 text-white">Pengguna</h5>
                            <span class="font-size-13 text-white-50">Tamu</span>
                        <?php endif; ?>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="<?= BASEURL ?>/admin" class="waves-effect">
                        <i class="mdi mdi-home-outline mdi-24px"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Beranda</span>
                    </a>
                </li>

                <li>
                    <a href="<?= BASEURL ?>/admin/halamanArtikel" class="waves-effect">
                        <i class="mdi mdi-file-document-edit-outline mdi-24px"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Artikel</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-text mdi-24px"></i>
                        <span>Kategori</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= BASEURL ?>/admin/halamanKategori">Kategori</a></li>
                        <li><a href="<?= BASEURL ?>/admin/halamanTambahKategori">Tambah Kategori</a></li>
                    </ul>
                </li>

                
                <li>
                    <a href="<?= BASEURL ?>/admin/halamanPengguna" class="waves-effect">
                        <i class="mdi mdi-account-circle-outline mdi-24px"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Pengguna</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->