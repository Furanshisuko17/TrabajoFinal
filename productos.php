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

                <a class="inicio" id="main" href="">Inicio</a>
        
                <a id="processors" href="">Procesadores</a>
                <a id="motherboard" href="">Tarjetas madre</a>
                <a id="graphiccard" href="">Tarjetas gr&aacute;ficas</a>
                <a id="psu" href="">Fuentes de poder</a>
                <a id="case" href="">Cajas</a>
        
            </div>
            <iframe seamless name="main-content" height="100%" width="100%" src="../products/main.html" ></iframe>
            <?php
                include('view/footer.php');
            ?>
        </div> 
    </body>
</html>


<!-- <div class="content" >

    <div class="productbar">

        <a onclick="changeUrl('../productos/main.html')" id="main" style="padding-top:11px;float:left;font-size:120%" href="">Inicio</a>

        <a onclick="changeUrl('../productos/links/case.html')" id="case" href="">Cajas</a>
        <a onclick="changeUrl('../productos/links/psu.html')" id="psu" href="">Fuentes de poder</a>
        <a onclick="changeUrl('../productos/links/graphiccard.html')" id="graphiccard" href="">Tarjetas gr&aacute;ficas</a>
        <a onclick="changeUrl('../productos/links/motherboard.html')" id="motherboard" href="">Tarjetas madre</a>
        <a onclick="changeUrl('../productos/links/processor.html')" id="processors" href="">Procesadores</a>

    </div>
    <iframe seamless name="main-content" height="100%" width="100%" src="../productos/main.html" ></iframe>
    <?php
        //include('view/footer.php');
    ?>
</div>  -->