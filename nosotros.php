<!DOCTYPE html>
<html lang="en">
   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nosotros</title>

        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/content.css">

    </head>

    <body>
        
        <?php 
            $include_option = 'nosotros';
            include('view/header.php');
        ?>

        <div class="content" style="padding-top:15px">
            <table>       
                    <colgroup>
                        <col width="45%" >
                        <col width="55%">
                    </colgroup>

                <tr style="height:auto">
                    <td align="center" >
                        <img style="max-width:60%;max-height:auto" src="img/computadoragrande.png" alt="Logo principal">
                        <h1>Computadoras</h1>
                    </td>

                    <td  align="center" >
                        <table  style="align-self:center;width:100%;"> 
                       
                            <tr style="height:250px" >
                                <td>
                                    <img style="padding:10px;float:left;max-width:20%;max-height:auto" src="img/mision.png" alt="Logo de la mision">
                                    <p style="padding-top:10px;padding-bottom:10px;;margin:0;margin-left:23%;font-size:2.2em"><b>Misi&oacute;n</b></p>
                                    <p style="padding:1px;padding-right:2em;margin:0px;margin-left:23% ">Adoptar un modelo de sistema de trabajo r&aacute;pido, seguro y eficiente de acuerdo a las necesidades que demanda el mercado. Que cada vez es m&aacute;s exigente y as&iacute; consolidarnos como primera opcion de compra del consumidor.</p>
                                </td>
                            </tr>

                            <tr style="height:250px">
                                <td>
                                    <img style="padding:10px;float:left;max-width:20%;max-height:auto" src="img/vision.png" alt="Logo de la vision">
                                    <p style="padding-top:10px;padding-bottom:10px;;margin:0;margin-left:23%;font-size:2.2em"><b>Visi&oacute;n</b></p>
                                    <p style="padding:1px;padding-right:2em;margin:0px;margin-left:23%">Aspirar a convertirnos en una empresa admirada con proyecci&oacute;n internacional reconocida por brindar productos y servicios de excelencia.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <?php
            include('view/footer.php');
        ?>
        
    </body>
</html>