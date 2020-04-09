<?php

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getArticles(){
        $this->db->query('SELECT id, title, image, created_at FROM news ORDER BY created_at DESC');

        return $results = $this->db->resultSet();
    }
}