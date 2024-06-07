<?php

class Auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('auth/header_auth', $data);
        $this->view('auth/login', $data);
        $this->view('auth/footer_auth', $data);
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $this->view('auth/header_auth', $data);
        $this->view('auth/register', $data);
        $this->view('auth/footer_auth', $data);
    }

    public function tambahData()
    {
        if ($this->model('Pengguna_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/auth/register');
            exit;
        }
    }

    public function login()
    {
        $user = $this->model('Pengguna_model')->login($_POST);
        if ($user) {
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['peran'] = $user['peran'];
            if ($user['peran'] == 'Admin') {
                header('Location: ' . BASEURL . '/admin');
                exit;
            }else if ($user['peran'] == 'Penulis') {
                header('Location: ' . BASEURL . '/artikel');
                exit;
            }
        } else {
            Flasher::setFlash('gagal', 'login', 'danger');
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/auth');
        exit;
    }
    
}
