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
}