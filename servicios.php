<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Servicios</title>

        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/content.css">
        
        </style>
    </head>

    <body>

        <?php 
            $include_option = 'servicios';
            include('view/header.php');
        ?>

        <div class="content">

            <div id="services">
                <div id="item">
                    <h2>Atenci&oacute;n al cliente</h2>
                    <img src="img/atencionalcliente.png" alt="Atencion al cliente">
                    <p>Nuestra atenci&oacute;n al cliente puede solventar tus dudas en cuanto a compras, cotizaci&oacute;nes, asesoramientos, entre otros.</p>
                </div>
                <div id="item">
                    <h2>Entrega de productos</h2>
                    <img src="img/entregaproductos.png" alt="Entrega de productos">
                    <p>Comprar en Computadoras te ofrece el servicio de entrega a domicilio, as&iacute; como tambi&eacute;n poder recogerlo en nuestro local m&aacute;s cercana.</p>
                </div>
            </div>


            <?php
                include('view/footer.php');
            ?>
        </div>
    </body>

</html>
