
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
    <?php } else { ?>
        <a class="nav-transition" href="../productos" title="Productos que ofrecemos">Productos</a> 
    <?php } ?>
    
    <?php if($include_option == 'contactanos') { ?>
        <a class="selected-page" href="#" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } else { ?>
        <a class="nav-transition" href="../contactanos" title="Cont&aacute;ctanos">Cont&aacute;ctanos</a>
    <?php } ?>
        
    <?php if($include_option == 'cart') { ?>
        <a class="selected-page cart-link" href="" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14 44.45q-1.55 0-2.675-1.125Q10.2 42.2 10.2 40.6q0-1.55 1.125-2.675Q12.45 36.8 14 36.8q1.55 0 2.7 1.125 1.15 1.125 1.15 2.725 0 1.55-1.125 2.675Q15.6 44.45 14 44.45Zm20.45 0q-1.6 0-2.7-1.125t-1.1-2.725q0-1.55 1.1-2.675 1.1-1.125 2.7-1.125 1.55 0 2.675 1.125 1.125 1.125 1.125 2.725 0 1.55-1.1 2.675-1.1 1.125-2.7 1.125Zm-20.9-10.5q-2.35 0-3.35-1.575t.05-3.525l3.1-5.75-7.55-16H3.6q-.8 0-1.325-.575Q1.75 5.95 1.75 5.2t.55-1.3q.55-.55 1.35-.55H7q.6 0 1.05.3.45.3.7.8l1.3 2.85H40.1q1.85 0 2.275 1.125.425 1.125-.325 2.475l-6.9 12.4q-.55.95-1.525 1.625-.975.675-2.125.675H16.2l-2.5 4.65h22.95q.7 0 1.25.55t.55 1.3q0 .75-.55 1.3t-1.3.55Z"/>
            </svg>  
        </a>
    <?php } else { ?>
        <a class="nav-transition cart-link" href="" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14 44.45q-1.55 0-2.675-1.125Q10.2 42.2 10.2 40.6q0-1.55 1.125-2.675Q12.45 36.8 14 36.8q1.55 0 2.7 1.125 1.15 1.125 1.15 2.725 0 1.55-1.125 2.675Q15.6 44.45 14 44.45Zm20.45 0q-1.6 0-2.7-1.125t-1.1-2.725q0-1.55 1.1-2.675 1.1-1.125 2.7-1.125 1.55 0 2.675 1.125 1.125 1.125 1.125 2.725 0 1.55-1.1 2.675-1.1 1.125-2.7 1.125Zm-20.9-10.5q-2.35 0-3.35-1.575t.05-3.525l3.1-5.75-7.55-16H3.6q-.8 0-1.325-.575Q1.75 5.95 1.75 5.2t.55-1.3q.55-.55 1.35-.55H7q.6 0 1.05.3.45.3.7.8l1.3 2.85H40.1q1.85 0 2.275 1.125.425 1.125-.325 2.475l-6.9 12.4q-.55.95-1.525 1.625-.975.675-2.125.675H16.2l-2.5 4.65h22.95q.7 0 1.25.55t.55 1.3q0 .75-.55 1.3t-1.3.55Z"/>
            </svg>  
        </a>
    <?php } ?>
    
    

</div>