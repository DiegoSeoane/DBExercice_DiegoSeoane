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
        while ($category = $statement->fetchObject('category')) {
            $categoryList[] = $category;
        }
        return $categoryList;
    }

    function getAllProducts()
    {
        
        $sql = 'select * from product';
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $productList = array();        
        while ($productData = $statement->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product();
            $product->setId($productData['id'])
                ->setName($productData['name'])
                ->setDescription($productData['description'])
                ->setPicture($productData['picture']);
            $categoryId = $productData['idCategory'];
            $categoryData = $this->getCategory($categoryId);

            $category = new Category();
            $category->setId($categoryData['id'])
                ->setName($categoryData['name']);
            
            $product->setCategory($category);

            $productList[] = $product;
        }

        return $productList;
    }
    function addProduct(Product $product){
        $sql = 'insert into product(name,
         description, picture, idCategory) values (?,?,?,?)';
         $statement= $this->conn->prepare($sql);         
    $categoryId = $product->getCategory()->getId();
        $statement->execute([$product->getName(),
        $product->getDescription(), $product->getPicture(),
        $categoryId]);
        return $statement->rowCount();
    }
    function updateProduct(Product $product){
        $sql = 'update product set name= ? ,
        description = ? , picture = ? , idCategory = ? where id = ?';
        $statement= $this->conn->prepare($sql);
       $statement->execute([$product->getName(),
       $product->getDescription(), $product->getPicture(),
       $product->getCategory()->getId(), $product->getId()]);
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
