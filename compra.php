<?php 
include 'php/borrar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra completada</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/content.css">
    <script type='text/javascript' src="js/jquery-3.6.0.min.js"></script>
    <script type='text/javascript' src="js/product_script.js"></script>
</head>
<body>
    <?php 
        $include_option = 'payment';
        include('view/header.php');
    ?>
    <div class="content" >
        <div class="payment">
            <div class="page">
                <h1>Compra realizada con &eacute;xito</h1>
                <p>Nos comunicaremos contigo para poder continuar la entrega.</p>
            </div>
        </div>
        <?php
            include('view/footer.php');
        ?>
    </div> 
</body>
</html>