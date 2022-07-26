<?php 
session_start();
include ('php/util.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/content.css">
    <script type='text/javascript' src="js/jquery-3.6.0.min.js"></script>
    <script deferred type='text/javascript' src="js/product_script.js"></script>
</head>
<body>
    <?php 
        $include_option = 'cart';
        include('view/header.php');
    ?>
    <div class="content" >
        <div class="payment">
            <?php
            if(isset($_SESSION['cart_items_data'])){
                echo "True:";
                foreach($_SESSION['cart_items_data'] as $product_data){
                    foreach($product_data as $data) {
                        echo '<pre>'; print_r($product_data); echo '</pre>';
                    }
                }
            } else {
                echo "No existe datos";
                
            }
            ?>

        </div>
        <?php
            include('view/footer.php');
        ?>
    </div> 
</body>
</html>