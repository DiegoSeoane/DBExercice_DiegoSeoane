<?php
include('header.php');
?>
<table class="listTable">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Picture</th>
        <th>Category</th>
    </thead>
    <tbody>        
        <?php
            foreach ($operation->getAllProducts() as $ite => $product) {
                $cat = $product->getCategory();                
                echo '<tr><td><a href="modifyProduct.php?id= '. $product->getId().'">'.$product->getName() . '</a></td>';
                echo '<td><a href="modifyProduct.php?id= '. $product->getId().'">'.$product->getDescription() . '</a></td>';
                echo '<td><a href="modifyProduct.php?id= '. $product->getId().'">'.$product->getPicture() . '</a></td>';
                echo '<td><a href="modifyProduct.php?id= '. $product->getId().'">'.$cat->jsonSerialize()['name'] . '</a></td></tr>';
            }
        ?>
    </tbody>
</table>