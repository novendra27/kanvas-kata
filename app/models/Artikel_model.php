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
}