<?php

class Pengguna_model
{
    private $table = 'tb_pengguna';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengguna =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $id_pengguna = $this->getMaxUserId() + 1;

        $query = "INSERT INTO $this->table (id_pengguna, nama, email, password, peran)
                    VALUES
                  (:id_pengguna, :nama, :email, :password, :peran)";

        $this->db->query($query);
        $this->db->bind('id_pengguna', $id_pengguna);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('peran', 'Penulis');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMaxUserId()
    {
        $this->db->query('SELECT MAX(id_pengguna) AS max_id FROM ' . $this->table);
        $result = $this->db->single();
        return (int) $result['max_id'];
    }

    public function login($data)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE nama =:nama AND password = :password';
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('password', $data['password']);
        $user = $this->db->single();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function getJumlahUser()
    {
        $this->db->query('SELECT COUNT(id_pengguna) AS jumlah_user FROM ' . $this->table);
        return $this->db->single();
    }

    public function ubahDataPengguna()
    {
        $query = 'UPDATE ' . $this->table . ' SET
                    nama = :nama,
                    email = :email,
                    password = :password,
                    peran = :peran
                  WHERE id_pengguna = :id_pengguna';

        $this->db->query($query);
        $this->db->bind('id_pengguna', $_POST['idPengguna']);
        $this->db->bind('nama', $_POST['namaPengguna']);
        $this->db->bind('email', $_POST['emailPengguna']);
        $this->db->bind('password', $_POST['passwordPengguna']);
        $this->db->bind('peran', $_POST['peranPengguna']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengguna($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_pengguna = :id_pengguna';
        $this->db->query($query);
        $this->db->bind('id_pengguna', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
