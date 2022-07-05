
<div class="navbar" >
    
    <a class="name" href="../" title="Computadoras">
        <img src="/img/computadora.png" alt="Logo de la p&aacute;gina">
        <p>Computadoras</p>
    </a>
    
    <?php if($include_option == 'index') { ?>
        <a class="selected-page" href="#" title="Inicio">Inicio</a>
    <?php } else { ?>
        <a href="../" title="Inicio">Inicio</a>
    <?php } ?>    

    <?php if($include_option == 'nosotros') { ?>
        <a class="selected-page" href="#" title="Acerca de nosotros">Nosotros</a>
    <?php } else { ?>
        <a href="../nosotros" title="Acerca de nosotros">Nosotros</a>
    <?php } ?>
        
    <?php if($include_option == 'servicios') { ?>
        <a class="selected-page" href="#" title="Nuestros servicios">Servicios</a>
    <?php } else { ?>
        <a href="../servicios" title="Nuestros servicios">Servicios</a>
    <?php } ?>
    
    
    <?php if($include_option == 'productos') { ?>
        <a class="selected-page" href="#" title="Productos que ofrecemos">Productos</a> 
    <?php } else { ?>
        <a href="../productos" title="Productos que ofrecemos">Productos</a> 
    <?php } ?>
    
    <?php if($include_option == 'contactanos') { ?>
        <a class="selected-page" href="#" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } else { ?>
        <a href="../contactanos" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } ?>

</div>