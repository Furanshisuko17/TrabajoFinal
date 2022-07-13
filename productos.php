<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/content.css">
    <script type='text/javascript' src="js/jquery-3.6.0.min.js"></script>
    <script deferred type='text/javascript' src="js/product_script.js"></script>
</head>
<body>
    <?php 
        $include_option = 'productos';
        include('view/header.php');
    ?>
    <div class="content" >
        <div class="product-bar">
            <a class="inicio" id="main" href="/productos">Inicio</a>
            <a id="processors" href="/productos?page=1">Procesadores</a>
            <a id="motherboard" href="/productos?page=2">Tarjetas madre</a>
            <a id="graphiccard" href="/productos?page=3">Tarjetas gr&aacute;ficas</a>
            <a id="ram" href="/productos?page=4">Memorias RAM</a>
            <a id="psu" href="/productos?page=5">Fuentes de poder</a>
        </div>
        
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            } else {
                $page = 0;
            }
            include('products/main.php');  
            include('view/footer.php');
        ?>
    </div> 
</body>
</html>
