<?php
include('header.php');

if (isset($_POST['submit'])) {
    $cat = $operation->getCategory((int)$_POST['newCatID']);
    echo '<p>no imprime</p>';
    if ($cat !== false) {
        $category = new Category($cat['id'],$cat['name']);
        $product = new Product();
        $product->setName($_POST['newName']);
        $product->setDescription($_POST['newDesc']);
        $product->setCategory($category);
        $operation->addProduct($product);
        echo '<p>Product added successfully!</p>';        
    }else{
        echo '<p>Error: Category not found.</p>';        
    }

    //ENGADIR BOTON PARA VER AS CATEGORIAS
}
?>
<form action="" method="post" class="newProduct">
    <label for="newProd">Add a new Product</label>

    <label for="newName">Name</label>
    <input type="text" name='newName' id="idProdName">

    <label for="newDesc">Description</label>
    <input type="text" name='newDesc' id="idProdDesc">

    <label for="newCatID">Category ID</label>
    <input type="text" name='newCatID' id="idProdCat">
    <button type="submit" name="submit">Click to Add</button>
</form>