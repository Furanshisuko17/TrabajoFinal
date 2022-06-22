<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productos</title>

        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/content.css">

        <script type='text/javascript' src="js/product_script.js"></script>

    </head>


    <body>

        <?php 
            $include_option = 'productos';
            include('view/header.php');
        ?>
        
        <div class="content" >

            <div class="productbar">

                <a onclick="changeUrl('../productos/main.html')" id="main" style="padding-top:11px;float:left;font-size:120%" href="javascript:void(0);">Inicio</a>
        
                <a onclick="changeUrl('../productos/links/case.html')" id="case" href="javascript:void(0);">Cajas</a>
                <a onclick="changeUrl('../productos/links/psu.html')" id="psu" href="javascript:void(0);">Fuentes de poder</a>
                <a onclick="changeUrl('../productos/links/graphiccard.html')" id="graphiccard" href="javascript:void(0);">Tarjetas gr&aacute;ficas</a>
                <a onclick="changeUrl('../productos/links/motherboard.html')" id="motherboard" href="javascript:void(0);">Tarjetas madre</a>
                <a onclick="changeUrl('../productos/links/processor.html')" id="processors" href="javascript:void(0);">Procesadores</a>
        
            </div>
            <iframe seamless name="main-content" height="100%" width="100%" src="../productos/main.html" ></iframe>
        </div> 

        <?php
            include('view/footer.php');
        ?>

    </body>
</html>
