<?php

class Artikel_model
{
    private $table = 'tb_artikel';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllArtikel()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getArtikelById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_artikel =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getAllArtikelByIdPengguna($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengguna =:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function tambahDataArtikel($data, $namaFile, $id_kategori)
    {
        $id_artikel = $this->getMaxArtikelId() + 1;
        $timestamp = time();

        $query = 'INSERT INTO ' . $this->table . ' 
        (id_artikel, id_pengguna, id_kategori, tanggal, judul, konten, gambar) 
        VALUES 
        (:id_artikel, :id_pengguna, :id_kategori, :tanggal, :judul, :konten, :gambar)';
        $this->db->query($query);
        $this->db->bind('id_artikel', $id_artikel);
        $this->db->bind('id_pengguna', $_SESSION['id_pengguna']);
        $this->db->bind('id_kategori', $id_kategori);
        $this->db->bind('tanggal', date("Y-m-d H:i:s", $timestamp));
        $this->db->bind('judul', $data['judulArtikel']);
        $this->db->bind('konten', $data['kontenArtikel']);
        $this->db->bind('gambar', $namaFile);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataArtikel($data, $namaFile)
    {
        $query = 'UPDATE ' . $this->table . ' 
        SET id_kategori = :id_kategori, 
            judul = :judul, 
            konten = :konten, 
            gambar = :gambar 
        WHERE id_artikel = :id_artikel';
        $this->db->query($query);
        $this->db->bind('id_kategori', $data['kategoriArtikel']);
        $this->db->bind('judul', $data['judulArtikel']);
        $this->db->bind('gambar', $namaFile);
        $this->db->bind('konten', $data['kontenArtikel']);
        $this->db->bind('id_artikel', $data['idArtikel']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataArtikel($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_artikel =:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getMaxArtikelId()
    {
        $this->db->query('SELECT MAX(id_artikel) AS max_id FROM ' . $this->table);
        $result = $this->db->single();
        return (int) $result['max_id'];
    }

    public function getJumlahKategoriByIdPengguna($id_pengguna)
    {
        $this->db->query('SELECT COUNT(DISTINCT id_kategori) AS jumlah_kategori FROM ' . $this->table . ' WHERE id_pengguna =:id_pengguna');
        $this->db->bind('id_pengguna', $id_pengguna);
        return $this->db->single();
    }
}
