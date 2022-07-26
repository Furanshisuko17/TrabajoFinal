
<div class="navbar" >
    
    <a class="name" href="../" title="Computadoras">
        <img src="/img/computadora.png" alt="Logo de la p&aacute;gina">
        <p>Computadoras</p>
    </a>
    
    <?php if($include_option == 'index') { ?>
        <a class="selected-page" href="#" title="Inicio">Inicio</a>
    <?php } else { ?>
        <a class="nav-transition" href="../" title="Inicio">Inicio</a>
    <?php } ?>    

    <?php if($include_option == 'nosotros') { ?>
        <a class="selected-page" href="#" title="Acerca de nosotros">Nosotros</a>
    <?php } else { ?>
        <a class="nav-transition" href="../nosotros" title="Acerca de nosotros">Nosotros</a>
    <?php } ?>
        
    <?php if($include_option == 'servicios') { ?>
        <a class="selected-page" href="#" title="Nuestros servicios">Servicios</a>
    <?php } else { ?>
        <a class="nav-transition" href="../servicios" title="Nuestros servicios">Servicios</a>
    <?php } ?>
    
    <?php if($include_option == 'productos') { ?>
        <a class="selected-page" href="#" title="Productos que ofrecemos">Productos</a> 
    <?php } else {?>
        <a class="nav-transition" href="../productos?page=1" title="Productos que ofrecemos">Productos</a> 
    <?php }?>

    <?php if($include_option == 'contactanos') { ?>
        <a class="selected-page" href="#" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } else { ?>
        <a class="nav-transition" href="../contactanos" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } ?>
        
    <?php if($include_option == 'cart') { ?>
        <a class="selected-page cart-link" href="../cartpage" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.2 44.4q-1.55 0-2.625-1.075T10.5 40.7q0-1.5 1.075-2.6T14.2 37q1.5 0 2.6 1.1t1.1 2.65q0 1.5-1.075 2.575Q15.75 44.4 14.2 44.4Zm20.2 0q-1.55 0-2.625-1.075T30.7 40.7q0-1.5 1.075-2.6T34.35 37q1.55 0 2.65 1.1 1.1 1.1 1.1 2.65 0 1.5-1.075 2.575Q35.95 44.4 34.4 44.4ZM12.25 11.25l5 10.35H31.6l5.65-10.35Zm-1.9-3.85H39.4q2.2 0 2.675 1.25.475 1.25-.375 2.9L35.25 23.1q-.55 1-1.525 1.675-.975.675-2.175.675H16.5l-2.5 4.7h24.4V34H13.7q-2.35 0-3.375-1.625t.025-3.575l3.1-5.7L6 7.3H1.95V3.45H8.5Zm6.9 14.2H31.6Z"/>
            </svg>
        </a>
    <?php } else if ($include_option == 'payment') { ?>
        <a class="selected-page cart-link" href="../payment" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.2 44.4q-1.55 0-2.625-1.075T10.5 40.7q0-1.5 1.075-2.6T14.2 37q1.5 0 2.6 1.1t1.1 2.65q0 1.5-1.075 2.575Q15.75 44.4 14.2 44.4Zm20.2 0q-1.55 0-2.625-1.075T30.7 40.7q0-1.5 1.075-2.6T34.35 37q1.55 0 2.65 1.1 1.1 1.1 1.1 2.65 0 1.5-1.075 2.575Q35.95 44.4 34.4 44.4ZM12.25 11.25l5 10.35H31.6l5.65-10.35Zm-1.9-3.85H39.4q2.2 0 2.675 1.25.475 1.25-.375 2.9L35.25 23.1q-.55 1-1.525 1.675-.975.675-2.175.675H16.5l-2.5 4.7h24.4V34H13.7q-2.35 0-3.375-1.625t.025-3.575l3.1-5.7L6 7.3H1.95V3.45H8.5Zm6.9 14.2H31.6Z"/>
            </svg>
        </a>
    <?php } else { ?>
        <a class="nav-transition cart-link" href="../cartpage" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.2 44.4q-1.55 0-2.625-1.075T10.5 40.7q0-1.5 1.075-2.6T14.2 37q1.5 0 2.6 1.1t1.1 2.65q0 1.5-1.075 2.575Q15.75 44.4 14.2 44.4Zm20.2 0q-1.55 0-2.625-1.075T30.7 40.7q0-1.5 1.075-2.6T34.35 37q1.55 0 2.65 1.1 1.1 1.1 1.1 2.65 0 1.5-1.075 2.575Q35.95 44.4 34.4 44.4ZM12.25 11.25l5 10.35H31.6l5.65-10.35Zm-1.9-3.85H39.4q2.2 0 2.675 1.25.475 1.25-.375 2.9L35.25 23.1q-.55 1-1.525 1.675-.975.675-2.175.675H16.5l-2.5 4.7h24.4V34H13.7q-2.35 0-3.375-1.625t.025-3.575l3.1-5.7L6 7.3H1.95V3.45H8.5Zm6.9 14.2H31.6Z"/>
            </svg> 
        </a>
    <?php } ?>
    
    
    

</div>