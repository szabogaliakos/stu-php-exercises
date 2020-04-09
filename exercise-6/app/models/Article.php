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

    public function getArticleById($id){
        $this->db->query('SELECT * FROM news WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
    }

    public function addArticle($data){
        $this->db->query('INSERT INTO news (title, description, image) VALUES(:title, :description, :image)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateArticle($data){
        $this->db->query('UPDATE news SET title = :title, description = :description, image = :image WHERE id = :id');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteArticle($id){
        $this->db->query('DELETE FROM news WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}