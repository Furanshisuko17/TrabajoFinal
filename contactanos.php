<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cont&aacute;ctanos</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/content.css">
        <script type='text/javascript' src="js/jquery-3.6.0.min.js"></script>
        <script type='text/javascript' src="js/product_script.js"></script>
    </head>
    <body onload="loadCartSize()">
        <?php 
            $include_option = 'contactanos';
            include('view/header.php');
        ?>
        <div class="content" >
            <form class="contact" action="php/form.php" method="POST">
                <fieldset>
                    <legend>Cont&aacute;ctanos</legend>

                    <div>
                        <label for="name">Nombres:</label>
                        <input type="text" name="nombres" id="name" required>
                    </div>

                    <div>
                        <label for="lastname">Apellidos:</label>
                        <input type="text" name="apellidos" id="lastname" required>
                    </div>

                    <div>
                        <label for="dni">DNI:</label>
                        <input type="number" name="dni" id="dni" required>
                    </div>
                    <div>
                        <label for="email">Correo:</label>
                        <input type="email" name="correo" id="email" required>
                    </div>
                    <div>
                        <label for="cell">Celular:</label>
                        <input type="number" name="celular" id="cell">
                    </div>
                    <div>
                        <label for="state">Estado civil:</label>
                        <select name="estado_civil" id="state" required>
                            <option hidden disabled selected value=""></option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Viudo">Viudo</option>
                            <option value="Divorciado">Divorciado</option>            
                        </select>
                    </div>
                    <div>
                        <label for="tm">Tipo de mensaje:</label>
                        <div class="combo-radio">
                            <span>
                                <input type="radio" id="consulta" name="tipo_mensaje" value="Consulta" required >
                                <label class="no-bold" for="consulta">Consulta</label>
                            </span>
                            <span>
                                <input type="radio" id="solicitud" name="tipo_mensaje" value="Solicitud">
                                <label class="no-bold" for="solicitud">Solicitud</label>
                            </span>
                            <span>
                                <input type="radio" id="reclamo" name="tipo_mensaje" value="Reclamo">
                                <label class="no-bold" for="reclamo">Reclamo</label>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label for="subject">Asunto:</label>
                        <input type="text" name="asunto" id="subject" required >
                    </div>
                    
                    <div>
                        <label for="message">Mensaje:</label>
                        <textarea style="resize:vertical" id="message" name="mensaje" cols="30" rows="10" required ></textarea>
                    </div>

                    <div class="button-container">
                        <input type="reset" name="limpiar" value="LIMPIAR">
                        <input type="submit" name="enviar" value="ENVIAR">
                    </div>
                </fieldset>
            </form>
            <?php
            include('view/footer.php');
            ?>
        </div>
    </body>
</html>
