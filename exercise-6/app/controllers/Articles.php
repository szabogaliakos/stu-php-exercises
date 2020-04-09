<?php

class Articles extends Controller{

    public function __construct()
    {
        $this->articlesModel = $this->model('article');
    }

    public function index(){
        $articles = $this->articlesModel->getArticles();
        $data = [
            'articles' => $articles
        ];
        $this->view('articles/index', $data);
    }

    public function add(){

        if (!isLoggedIn()){
            redirect('articles');
        }

        $data = [
            'title' => '',
            'description' => '',
            'image' => ''
        ];

        $this->view('articles/add', $data);
    }
}
