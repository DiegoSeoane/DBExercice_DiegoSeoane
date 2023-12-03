<?php
include('header.php');

if (isset($_POST['submit'])) {
    $cat = $operation->getCategory((int)$_POST['selCat']);
    if ($cat !== false) {
        $category = new Category();        
        $category->setId($cat['id']);
        $category->setName($cat['name']);
        $product = new Product();
        $product->setName($_POST['newName']);
        $product->setDescription($_POST['newDesc']);
        $product->setCategory($category);
        $operation->addProduct($product);
        echo '<p>Product added successfully!</p>';        
    }else{
        echo '<p>Error: Category not found.</p>';        
    }

}
?>
<form action="" method="post" class="newProduct">
    <label for="newProd">Add a new Product</label>

    <label for="newName">Name</label>
    <input type="text" name='newName' id="idProdName">

    <label for="newDesc">Description</label>
    <input type="text" name='newDesc' id="idProdDesc">
    <select name="selCat" id="idselCat">
        <?php
        foreach ($operation->getAllCategories() as $key => $value) {
            echo '<option value="'.$value->getId().'">'.$value->getName().'</option>';
        }
        ?>
    </select>
    <button type="submit" name="submit">Click to Add</button>
</form>