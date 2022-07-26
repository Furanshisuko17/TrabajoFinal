<?php 
session_start();
include ('php/util.php');

function printEmptyCart(){
?>
<div class="empty-cart">
    <h2>El carrito se encuentra vac&iacute;o.</h2>
    <p>Actualmente no tienes ningun producto en tu carrito.</p>
</div>
<?php
}
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
        <div class="cart-page">
            <?php
            if(isset($_SESSION['cart'])){
                if(sizeof($_SESSION['cart']) == "0"){
                    printEmptyCart();
                }else {
                    printCart();
                    //echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
                }
            }else {
                printEmptyCart();
            }
            ?>

        </div>
        <?php
            include('view/footer.php');
        ?>
    </div> 
    
</body>
</html>

<?php 
function printCart() {?>


<?php
}
?>