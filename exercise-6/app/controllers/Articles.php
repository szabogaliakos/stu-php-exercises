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
                'images' => $this->reArrayFiles($_FILES['images']),
                'title_err' => '',
                'description_err' => '',
                'images_err' => ''
            ];

            if (empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])){
                $data['description_err'] = 'Please enter text';
            }

            $data['images_err'] = $this->validateImageUpload($data['images']);

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['images_err'])){
                $imageNames = array();
                foreach ($data['images'] as $image){
                    array_push($imageNames, $image['name']);
                }
                $data['images'] = $imageNames;

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
                'images' => $this->reArrayFiles($_FILES['images']),
                'title_err' => '',
                'description_err' => '',
                'images_err' => ''
            ];

            if (empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['description'])){
                $data['description_err'] = 'Please enter text';
            }

            $data['images_err'] = $this->validateImageUpload($data['images']);

            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['images_err'])){
                $imageNames = array();
                foreach ($data['images'] as $image){
                    array_push($imageNames, $image['name']);
                }
                $data['images'] = $imageNames;

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
                'images' => $article->image
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

    private function validateImageUpload($images){
        foreach ($images as $image) {

            if (empty($image)){
                return 'Please upload an image';
            }

            $target_dir = 'img/';
            $target_file = $target_dir . basename($image['name']);
            $check = getimagesize($image['tmp_name']);
            if(!$check) {
                return 'File is not an image.';
            }
            if (!file_exists($target_file)) {
                if (!move_uploaded_file($image["tmp_name"], $target_file)) {
                    return 'Sorry, there was an error uploading your file.';
                }
            }
        }
    }

    private function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}
