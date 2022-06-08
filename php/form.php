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
        
        <div class="navbar" >

            <a class="none" style="float:left;padding:0px" href="index.html" title="Computadoras">
                <img src="/img/computadora.png" alt="Logo de la empresa">
            </a>
            
            <a class="name" href="index.html" title="Computadoras">
                <b>Computadoras</b>
            </a>

            <a style="background-color:rgb(48, 48, 48);" href="../contactanos.html" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
            <a href="../productos.html" title="Productos que ofrecemos">Productos</a> 
            <a href="../servicios.html" title="Nuestros servicios">Servicios</a>
            <a href="../nosotros.html" title="Acerca de nosotros">Nosotros</a>
            <a href="../index.html" title="Inicio">Inicio</a>

        </div>
        <div class="content" >
            <div class="contact">
                <fieldset>
                    <?php
                        $value = $_POST['tipo_mensaje'];
                    ?>
                    <legend><?php echo $value; ?> enviada!</legend>

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
        </div>
    </body>
</html>
