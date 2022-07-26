<!DOCTYPE html>
<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cont&aacute;ctanos</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/content.css">
        <script type='text/javascript' src="/js/jquery-3.6.0.min.js"></script>
        <script type='text/javascript' src="/js/product_script.js"></script>
    </head>

    <body onload="loadCartSize()">
        
        <?php 
            $include_option = 'contactanos';
            include('../view/header.php');
        ?>
        <div class="content" >
            <div class="contact">
                <fieldset>
                    <?php
                        function getFormType() {
                            $value = $_POST['tipo_mensaje'];

                            if ($value == 'Consulta'){
                                return 'Consulta enviada!';
                            }elseif ($value == 'Solicitud') {
                                return 'Solicitud enviada!';
                            }elseif ($value == 'Reclamo'){
                                return 'Reclamo enviado!';
                            }
                        }
                    ?>
                    <legend><?php echo getFormType(); ?></legend>

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
