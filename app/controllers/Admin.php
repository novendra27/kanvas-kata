<?php

class Admin extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Beranda';
        $data['artikel'] = $this->model('Artikel_model')->getJumlahArtikel();
        $data['kategori'] = $this->model('Kategori_model')->getJumlahKategori();
        $data['pengguna'] = $this->model('Pengguna_model')->getJumlahUser();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/index', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function halamanArtikel()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Artikel';
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
        $data = $this->formatTanggal($data);
        $data['nama_kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/artikel', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function halamanKategori()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Kategori';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/kategori', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function halamanTambahKategori()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Kategori';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/tambah_kategori', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function halamanPengguna()
    {
        $this->checkLogin();
        $data['judul'] = 'Admin - Pengguna';
        $data['pengguna'] = $this->model('Pengguna_model')->getAllUser();
        $this->view('admin/templates/header_admin', $data);
        $this->view('admin/templates/navbar_admin', $data);
        $this->view('admin/pengguna', $data);
        $this->view('admin/templates/footer_admin');
    }

    public function checkLogin()
    {
        if (isset($_SESSION['peran'])) {
            if ($_SESSION['peran'] !== 'Admin') {
                Flasher::setFlash('bukan', 'admin', 'danger');
                header('Location: ' . BASEURL . '/auth');
                exit;
            } else {
                return true;
                // exit;
            }
        }else{
            Flasher::setFlash('bukan', 'admin', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function ubahDataArtikel()
    {
	    // Mulai output buffering
        ob_start();
        
        $namaFile = $this->uploadFoto();
        if ($namaFile != false) {
            if ($this->model('Artikel_model')->ubahDataArtikel($_POST, $namaFile) > 0) {
                Flasher::setFlash('berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('gagal', 'diubah', 'danger');
            }
        } else {
            Flasher::setFlash('gagal', 'diubah karena anda belom memilih gambar', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanArtikel');
        exit;
    }

    public function hapusDataArtikel()
    {
	    // Mulai output buffering
        ob_start();
        
        $idArtikel = $_POST['idArtikel'];
        $artikel = $this->model('Artikel_model')->getArtikelById($idArtikel);
        $gambarArtikel = $artikel['gambar'];

        // Hapus foto artikel dari folder assets
        $this->hapusFotoArtikel($gambarArtikel);

        if ($this->model('Artikel_model')->hapusDataArtikel($idArtikel) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanArtikel');
        exit;
    }

    public function tambahDataKategori()
    {
    	// Mulai output buffering
        ob_start();
        
        if ($this->model('Kategori_model')->tambahDataKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanTambahKategori');
        exit;
    }

    public function ubahDataKategori()
    {
    	// Mulai output buffering
        ob_start();
        
        if ($this->model('Kategori_model')->ubahDataKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanKategori');
        exit;
    }

    public function hapusDataKategori()
    {
	    // Mulai output buffering
        ob_start();
        
        $idKategori = $_POST['idKategori'];
        if ($this->model('Kategori_model')->hapusDataKategori($idKategori) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanKategori');
        exit;
    }

    public function ubahDataPengguna()
    {
	    // Mulai output buffering
        ob_start();
        
        if ($this->model('Pengguna_model')->ubahDataPengguna($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanPengguna');
        exit;
    }

    public function hapusDataPengguna()
    {
	    // Mulai output buffering
        ob_start();
        
        $idPengguna = $_POST['idPengguna'];
        if ($this->model('Pengguna_model')->hapusDataPengguna($idPengguna) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/admin/halamanPengguna');
        exit;
    }

    public function formatTanggal($data)
    {
        // Misalkan kolom datetime di tabel Anda bernama 'tanggal'
        foreach ($data['artikel'] as &$artikel) {
            $datetime = $artikel['tanggal'];

            // Array untuk terjemahan hari dan bulan
            $hari_indonesia = [
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            ];

            $bulan_indonesia = [
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember'
            ];

            // Format datetime ke format yang diinginkan
            $formatted_datetime = date('H:i:s, l, d F Y', strtotime($datetime));

            // Pisahkan bagian-bagian dari datetime
            $datetime_parts = explode(', ', $formatted_datetime);

            // Terjemahkan hari dan bulan
            $time = $datetime_parts[0];
            $day = $hari_indonesia[$datetime_parts[1]];
            list($date, $month, $year) = explode(' ', $datetime_parts[2]);
            $month = $bulan_indonesia[$month];

            // Format akhir dalam bahasa Indonesia
            $formatted_date = "$time WIB, $day $date $month $year";
            $artikel['tanggal'] = $formatted_date;
        }
        return $data;
    }

    public function uploadFoto()
    {
        $target_dir = __DIR__ . "/../../public/assets/images/foto_artikel/";
        $imageFileType = strtolower(pathinfo($_FILES["gambarArtikel"]["name"], PATHINFO_EXTENSION));

        // Generate a unique name for the file
        $uniqid = uniqid();
        $target_file = $target_dir . $uniqid . '.' . $imageFileType;
        $namaFile = $uniqid . '.' . $imageFileType;

        // Check if the file is an image or not
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["gambarArtikel"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
            } else {
                echo "File is not an image.";
            }
        }

        // Try to upload the file
        if (move_uploaded_file($_FILES["gambarArtikel"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($target_file)) . " has been uploaded.";
            return $namaFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }

    public function hapusFotoArtikel($gambarArtikel)
    {
        $target_dir = __DIR__ . "/../../kanvas-kata/public/assets/images/foto_artikel/";
        $target_file = $target_dir . $gambarArtikel;

        // Hapus file foto artikel
        if (file_exists($target_file)) {
            unlink($target_file);
            return true;
        }
    }
}
