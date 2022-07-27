<?php 
session_start();
require_once('php/connection.php');
include ('php/util.php'); // return array($name, $extra_data, $img, $precio, $product);
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
    <script type='text/javascript' src="js/product_script.js"></script>
</head>
<body>
    <?php 
        $include_option = 'cart';
        include('view/header.php');
    ?>
    <div class="content" >
        <div class="cart-page">
            <div class="cart-title">
                Tu carrito de compras
            </div>
            <div id="entire-page"class="cart-page-content"><?php
                    if(isset($_SESSION['cart'])){
                        if(sizeof($_SESSION['cart']) == "0"){
                            printEmptyCart();
                        }else { ?>
                        <div id="items" class="cart-content">
                            <?php printCartItems()?>
                        </div>
                        <div id="payment" class="payment-info">
                            <div id="sum-up" class="sum-up">    
                                <div class="resume-title">Resumen del pedido</div>
                                <div class="details">
                                    <div class="products">
                                        <p>Productos</p>
                                        <p><?php echo "S/. ".$_SESSION['total_price']?></p>
                                    </div>
                                    <div class="products">
                                        <p>Env&iacute;o</p>
                                        <p>S/. 15.00</p>
                                    </div>
                                    
                                </div>
                                <div class="subtotal">
                                    <p>Subtotal</p>
                                    <p><?php echo "S/. ".($_SESSION['total_price'] + 15)?></p>
                                </div>
                                <div class="buttons" >
                                    <a href="/productos?page=1">
                                        <button class="keep">Seguir comprando</button>
                                    </a>
                                </div>
                            </div>
                            <div class="billing-address" >
                                <p>Detalles de entrega</p>
                                <form hidden id="details" action="compra">
                                </form>
                                <input type="text" form="details" id="name" placeholder="Nombres" required>
                                <input type="text" form="details" id="lastname" placeholder="Apellido" required>
                                <input type="text" form="details" id="address" placeholder="Direcci&oacute;n" required>
                                <input type="email" form="details" id="email" placeholder="Correo electr&oacute;nico" required>
                                <input type="text" form="details" id="deparment" placeholder="Departamento" required>
                                <input type="number" form="details" id="postalcode" placeholder="Codigo postal" required>
                                <input type="number" form="details" id="cell" placeholder="Celular" required>
                                <div class="button">
                                    <a href="compra"><button form="details" type="submit" class="pay-button">Completar compra</button></a>
                                </div>
                            </div>
                            <div class="information">
                                <div class="pago">
                                    <h3>M&eacute;todo de pago</h3>
                                    <p>Nuestro m&eacute;todo de pago es en el momento de la entrega, con efectivo o con tarjeta.</p>
                                </div>
                                <div class="garantia">
                                    <h3>Garant&iacute;a</h3>
                                    <p>Todas tus compras tienen garant&iacute;a desde el momento en el que completas la compra.</p>
                                </div>
                            </div>
                        </div>  
            <?php       }
                    }else {
                        printEmptyCart();
                    } ?>
                
            </div>
        </div>
        <?php
            include('view/footer.php');
        ?>
    </div> 
    
</body>
</html>