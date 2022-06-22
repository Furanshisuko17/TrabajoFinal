<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Computadoras</title>

        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/content.css">

    </head>
   
    <body>
        
        <?php 
            $include_option = 'index';
            include('view/header.php');
        ?>

        <div class="content">
            <table>       
                <colgroup>
                    <col width="65%" >
                    <col width="35%">
                </colgroup>

                <tr style="height:auto">
                    <td align="center" >
                        <img src="img/featured.jpg" alt="Imagen promocional de una tarjeta grafica.">
                    </td>
                    <td align="center" >
                        <table> 
                            <tr style="height:210px" >
                                <td>
                                    <img src="img/featured-ram.jpg" alt="Imagen promocional de una memoria RAM.">
                                </td>
                            </tr>
                            <tr style="height:210px">
                                <td>
                                    <img src="img/featured-laptop.jpg" alt="Imagen promocional de una laptop.">
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
