<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/libraries/Database.php';

class Book {

    private $db;
    private $rowCount;

    public function __construct(){
        $this->db = new Database;
    }
private function upload($file)
{
    $target_dir = "uploads/";
    $target_file = "../" . $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size
    if ($file["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return $file["name"];
}
    //Add book
    public function add($title,$authors,$file){
        $imageName = $this->upload($file);
        $this->db->query('INSERT INTO books (title, authors, image_name) 
        VALUES (:title, :authors, :image_name)');

        $this->db->bind(':title', $title);
        $this->db->bind(':authors', $authors);
        $this->db->bind(':image_name', $imageName);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteBooks($id){
        $this->db->query("SELECT `image_name` FROM books WHERE id = $id");
        $name = $this->db->single();
        $file_path="../uploads/" . $name->image_name;
        echo $file_path;
        if (file_exists($file_path)) { // перевірка чи існує файл
            unlink($file_path);
        }

        $this->db->query("DELETE FROM books WHERE id = $id");
        return $this->db->execute();//без цього ніц робити не буде осткільки це виклик бази даних як оказується :)
    }
    public function getList(){
        if (!isset($_GET['page'])){
            $page = 1;
        }
        else{
            $page = $_GET['page'];
        }
        $results_per_page = 10;
        $page_first_result = ($page-1)*$results_per_page;

        $this->db->query('SELECT * FROM books');
        $result = $this->db->resultSet();
        $number_of_result = $this->db->rowCount();
        $number_of_page = ceil($number_of_result/$results_per_page);
        $this->rowCount = $number_of_page;
        $this->db->query('SELECT * FROM books LIMIT '. $page_first_result.','.$results_per_page);

        $row = $this->db->resultSet();
        if ($this->db->rowCount()>0){
            return $row;
        }
        else{
            return false;
        }
        //return $row;
    }
    public function getRowCount(){
        return $this->rowCount;
    }

}