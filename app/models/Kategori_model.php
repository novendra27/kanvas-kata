<?php

class Kategori_model
{
    private $table = 'tb_kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kategori =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getKategoriByNama($nama)
    {
        $this->db->query('SELECT id_kategori FROM ' . $this->table . ' WHERE nama_kategori =:nama');
        $this->db->bind('nama', $nama);
        return $this->db->single();
    }

    public function getJumlahKategori()
    {
        $this->db->query('SELECT COUNT(id_kategori) AS jumlah_kategori FROM ' . $this->table);
        return $this->db->single();
    }

    public function tambahDataKategori($data)
    {
        $id_kategori = $this->getMaxKategoriId() + 1;
        $query = 'INSERT INTO ' . $this->table . ' (id_kategori, nama_kategori) VALUES (:id_kategori, :nama_kategori)';
        $this->db->query($query);
        $this->db->bind('id_kategori', $id_kategori);
        $this->db->bind('nama_kategori', $data['namaKategori']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataKategori($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET nama_kategori = :nama_kategori WHERE id_kategori = :id_kategori';
        $this->db->query($query);
        $this->db->bind('id_kategori', $data['idKategori']);
        $this->db->bind('nama_kategori', $data['namaKategori']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKategori($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_kategori = :id_kategori';
        $this->db->query($query);
        $this->db->bind('id_kategori', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMaxKategoriId()
    {
        $this->db->query('SELECT MAX(id_kategori) AS max_id FROM ' . $this->table);
        $result = $this->db->single();
        return (int) $result['max_id'];
    }
}