<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cont&aacute;ctanos</title>

        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/content.css">

    </head>

    <body>
        
        <?php 
            $include_option = 'contactanos';
            include('../view/header.php');
        ?>
        <div class="content" >
            <div class="contact">
                <fieldset>
                    <?php
                        $value = $_POST['tipo_mensaje'];

                        if ($value == 'Consulta'){
                            $legend_content = 'Consulta enviada!';
                        }elseif ($value == 'Solicitud') {
                            $legend_content = 'Solicitud enviada!';
                        }elseif ($value == 'Reclamo'){
                            $legend_content = 'Reclamo enviado!';
                        }

                    ?>
                    <legend><?php echo $legend_content; ?></legend>

                    <div>
                        <label>Nombres:</label>
                        <?php echo htmlspecialchars($_POST['nombres']) ?>
                    </div>

                    <div>
                        <label>Apellidos:</label>
                        <?php echo htmlspecialchars($_POST['apellidos']) ?>
                    </div>

                    <div>
                        <label>DNI:</label>
                        <?php echo $_POST['dni'] ?>
                    </div>
                    <div>
                        <label>Correo:</label>
                        <?php echo $_POST['correo'] ?>   
                    </div>
                    <div>
                        <label>Celular:</label>
                        <?php echo $_POST['celular'] ?>
                    </div>
                    <div>
                        <label for="state">Estado civil:</label>
                        <?php echo $_POST['estado_civil'] ?>
                    </div>
                    <div>
                        <label>Asunto:</label>
                        <?php echo htmlspecialchars($_POST['asunto']) ?>
                    </div>                   
                    <div>
                        <label>Mensaje:</label>
                        <p style="width: 50%;flex-grow: 1;"> 
                            <?php echo htmlspecialchars($_POST['mensaje']) ?> 
                        </p>
                    </div>
                </fieldset>
            </div>  
            <?php
                include('../view/footer.php');
            ?>
        </div>
    </body>
</html>
