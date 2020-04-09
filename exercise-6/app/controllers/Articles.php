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

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'description_err' => ''
            ];

            if (empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])){
                $data['description_err'] = 'Please enter text';
            }

            if (empty($data['title_err']) && empty($data['description_err'])){
                if($this->articlesModel->addArticle($data)){
                    flash('article_message', 'Article Published');
                    redirect('articles');
                }
                else{
                    die('Something went wrong');
                }
            } else {
                $this->view('articles/add', $data);
            }
        } else{
            $data = [
                'title' => '',
                'description' => ''
            ];

            $this->view('articles/add', $data);
        }
    }

    public function edit($id){
        if (!isLoggedIn()){
            redirect('articles');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'user_id' => $_SESSION['user_id'],
                'image' => $_SESSION['image'],
                'title_err' => '',
                'description_err' => ''
            ];

            if (empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])){
                $data['description_err'] = 'Please enter text';
            }

            if (empty($data['title_err']) && empty($data['description_err'])){
                if($this->articlesModel->updateArticle($data)){
                    flash('article_message', 'Article Updated');
                    redirect('articles');
                }
                else{
                    die('Something went wrong');
                }
            } else {
                $this->view('articles/add', $data);
            }
        } else{
            $article = $this->articlesModel->getArticleById($id);

            $data = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'image' => $article->image
            ];

            $this->view('articles/edit', $data);
        }
    }

    public function show($id){
        $article = $this->articlesModel->getArticleById($id);

        $data = [
            'article' => $article
        ];

        $this->view('articles/show', $data);
    }

    public function delete($id){
        if (!isLoggedIn()){
            redirect('articles');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->articlesModel->deleteArticle($id)){
                flash('article_message', 'Article Removed');
                redirect('articles');
            }
            else{
                die('Something went wrong');
            }
        } else{
            redirect('articles');
        }
    }
}
