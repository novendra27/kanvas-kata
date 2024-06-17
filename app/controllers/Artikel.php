<?php

class Artikel extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $data['judul'] = 'Penulis - Beranda';
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikelByIdPengguna($_SESSION['id_pengguna']);
        $data = $this->formatTanggal($data);
        $data['kategori'] = $this->model('Artikel_model')->getJumlahKategoriByIdPengguna($_SESSION['id_pengguna']);
        $data['nama_kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('artikel/index', $data);
        $this->view('templates/footer');
    }

    public function tambahArtikel()
    {
        $this->checkLogin();
        $data['judul'] = 'Penulis - Tambah Artikel';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('artikel/tambah_artikel', $data);
        $this->view('templates/footer');
    }

    public function checkLogin()
    {
        if (isset($_SESSION['peran'])) {
            if ($_SESSION['peran'] !== 'Penulis') {
                Flasher::setFlash('bukan', 'penulis', 'danger');
                header('Location: ' . BASEURL . '/auth');
                exit;
            } else {
                return true;
                // exit;
            }
        }else{
            Flasher::setFlash('bukan', 'penulis', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
        // exit;
    }
    
    public function tambahDataArtikel()
    {
        // Mulai output buffering
        ob_start();
    
        $namaFile = $this->uploadFoto();
        $id_kategori = $this->model('Kategori_model')->getKategoriByNama($_POST['kategoriArtikel']);
        if ($namaFile != false) {
            if ($this->model('Artikel_model')->tambahDataArtikel($_POST, $namaFile, $id_kategori['id_kategori']) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            }
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }
    
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/artikel/tambahArtikel');
        exit;
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
        }else{
            Flasher::setFlash('gagal', 'diubah karena anda belom memilih gambar', 'danger');
        }
    
        // Akhir output buffering
        ob_end_clean();
    
        // Redirect setelah output buffering dihentikan
        header('Location: ' . BASEURL . '/artikel');
        exit;
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
            // return false;
        }
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
        header('Location: ' . BASEURL . '/artikel');
        exit;
    }

    public function hapusFotoArtikel($gambarArtikel)
    {
        $target_dir = __DIR__ . "/../..kanvas-kata/public/assets/images/foto_artikel/";
        $target_file = $target_dir . $gambarArtikel;

        // Hapus file foto artikel
        if (file_exists($target_file)) {
            unlink($target_file);
            return true;
        }
    }
}
