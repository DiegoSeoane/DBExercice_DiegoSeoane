<?php
include('Entities.php');
class Operations
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();        
    }
    function closeConnection(){
        $this->conn = null;
    }

    function getProduct(int $id){
        $sql = 'select * from product where id = ?';
        $statement= $this->conn->prepare($sql);
        $statement->execute([$id]);
        $data=$statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function getCategory(int $id){
        $sql = 'select * from category where id = ?';
        $statement= $this->conn->prepare($sql);
        $statement->execute([$id]);
        $data=$statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function getAllCategories(){
        $sql = 'select * from category';
        $statement= $this->conn->prepare($sql);
        $statement->execute();
        $categoryList = array();
        while ($category = $statement->fetchObject('Category')) {
            $categoryList[] = $category;
        }
        return $categoryList;
    }
    function addProduct(Product $product){
        $sql = 'insert into product(name,
         description, picture, idCategory)';
         $statement= $this->conn->prepare($sql);
        $statement->execute([$product->getName(),
        $product->getDescription(), $product->getPicture(),
        $product->getCategory()]);
        return $statement->rowCount();
    }
    function updateProduct(Product $product){
        $sql = 'update product set name= ? ,
        description = ? , picture = ? , idCategory = ? where id = ?)';
        $statement= $this->conn->prepare($sql);
       $statement->execute([$product->getName(),
       $product->getDescription(), $product->getPicture(),
       $product->getCategory(), $product->getId()]);
       return $statement->rowCount();
    }
    function getUserName($login, $password){
        $sql = 'select name,admin from user where login = ? and password = ?';
        $statement= $this->conn->prepare($sql);
        $statement->execute([$login,$password]);
        $data=$statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
class Database
{
    public function __construct(
        private string $host,
        private string $name,
        private string $user,
        private string $password
    ) {
    }
    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8";
        return new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }
}
