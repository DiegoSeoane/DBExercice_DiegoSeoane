<?php
include('header.php');
?>
<form action="" method="post" class="formUpdate">
    <?php
    
    $id = $_GET['id'];
    try {
        if (isset($id)) {
            if ($operation->getProduct($id)) {
                $product = $operation->getProduct($id);
                $cat = $operation->getCategory($product['idCategory']);
                $picture = $product['picture']?? 'No Image';
                if ($name['admin']==1) {  
                    echo '<h1>'.$product['name'].'</h1>';
                    echo '<label>ID</label>';
                echo '<label>' . $product['id'] . '</label>';
                echo '<label>Name</label>';
                echo '<input type="text" name="name" value="' . $product['name'] . '">';
                echo '<label>Description</label>';
                echo '<input type="text" name="description" value="' . $product['description'] . '">';
                echo '<label>Picture</label>';
                echo '<input type="text" name="picture" value="' . $picture . '">';
                echo '<label>Category</label>';
                echo '<select name="modCat" id="idmodCat">';
                foreach ($operation->getAllCategories() as $key => $value) {                    
                    $selected = ($value->getId() == $product['idCategory']) ? 'selected' : '';
                    echo '<option value="' . $value->getId() . '" ' . $selected . '>' . $value->getName() . '</option>';
               }                
                echo '</select>';
                echo '<button type="submit" name="submit">Modify</button>';

            }else{
                echo '<h1>'.$product['name'].'</h1>';
                echo '<label>ID</label>';
                echo '<label>' . $product['id'] . '</label>';
                echo '<label>Name</label>';
                echo '<label>' . $product['name'] . '</label>';
                echo '<label>Description</label>';
                echo '<label>' . $product['description'] . '</label>';
                echo '<label>Picture</label>';
                echo '<label>' . $picture . '</label>';
                echo '<label>Category</label>';
                echo '<label>' . $cat['name'] . '</label>';
                }
            } else {
                echo '<p style="color:red">Wrong ID</p>';
            }
        
        }
        if (isset($_POST['submit'])) {
            $categor = $operation->getCategory((int)$_POST['modCat']);
            $newProd = new Product();
            
            $category = new Category();        
            $category->setId($categor['id']);
            $category->setName($categor['name']);
            $newProd->setId($product['id']);
            
            $newProd->setName($_POST['name']);
            $newProd->setDescription($_POST['description']);
            
            $newProd->setCategory($category);
            
            try {
                $result = $operation->updateProduct($newProd);

                if ($result) {
                    echo '<p style="color:green">Product updated successfully</p>';
                } else {
                    echo '<p style="color:red">Failed to update product</p>';
                }
            } catch (Exception $ex) {
                echo '<p style="color:red">Error during update: ' . $ex->getMessage() . '</p>';
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    
    ?>    
</form>