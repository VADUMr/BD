<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Book.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/session_helper.php';

    class Books {

        private $bookModel;
        
        public function __construct(){
            $this->bookModel = new Book;
        }
        public function getRowCount(){
            return $this->bookModel->getRowCount();
        }
        public function getList(){
            return $this->bookModel->getList() ;
        }
        public function deleteBooks($id){
                $this->bookModel->deleteBooks($id);
                redirect("../book.php");
        }
        public function addBooks(){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data=[
                'title' => trim($_POST['title']),
                'authors' => trim($_POST['authors']),
            ];

            if(empty($data['title']) || empty($data['authors'])){
                flash("register", "Please fill out all inputs");
                redirect("../book.php");
            }

            $insertToBooks = $this->bookModel->add($data['title'], $data['authors'],$_FILES["fileToUpload"]);

            redirect("../book.php");
        }
    }
    //Передача даних для запису в БД
    if(isset($_POST['title']) || isset( $_POST['authors'])){
        $init = new Books;
        $init->addBooks();
    }
    if(isset($_GET['id'])){
    $ini = new Books;
    $ini->deleteBooks($_GET['id']);
}
