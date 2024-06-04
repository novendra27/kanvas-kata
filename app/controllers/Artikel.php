<?php

class Artikel extends Controller
{
    public function index()
    {
        $this->checkLogin();
        $data['judul'] = 'Penulis - Beranda';
        $data['artikel'] = $this->model('Artikel_model')->getAllArtikel();
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
        if ($_SESSION['peran'] !== 'Penulis') {
            Flasher::setFlash('bukan', 'penulis', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        } else {
            return true;
            exit;
        }
    }

    public function tambahDataArtikel()
    {
        $namaFile = $this->uploadFoto();
        $id_kategori = $this->model('Kategori_model')->getKategoriByNama($_POST['kategoriArtikel']);
        if ($namaFile != false) {
            if ($this->model('Artikel_model')->tambahDataArtikel($_POST, $namaFile, $id_kategori['id_kategori']) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/artikel/tambahArtikel');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/artikel/tambahArtikel');
                exit;
            }
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/artikel/tambahArtikel');
            exit;
        }
        
    }

    public function uploadFoto()
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/kanvas-kata/public/assets/images/foto_artikel/";
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
}
