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
        <a id="cart-a" class="selected-page cart-link" href="../cartpage" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.35 44.1C13.35 44.1 12.5 43.7417 11.8 43.025C11.1 42.3083 10.75 41.45 10.75 40.45C10.75 39.4833 11.1 38.65 11.8 37.95C12.5 37.25 13.35 36.9 14.35 36.9C15.3167 36.9 16.1583 37.25 16.875 37.95C17.5917 38.65 17.95 39.5 17.95 40.5C17.95 41.5 17.6 42.35 16.9 43.05C16.2 43.75 15.35 44.1 14.35 44.1V44.1ZM34.35 44.1C33.35 44.1 32.5 43.7417 31.8 43.025C31.1 42.3083 30.75 41.45 30.75 40.45C30.75 39.4833 31.1 38.65 31.8 37.95C32.5 37.25 33.35 36.9 34.35 36.9C35.3167 36.9 36.1583 37.25 36.875 37.95C37.5917 38.65 37.95 39.5 37.95 40.5C37.95 41.5 37.6 42.35 36.9 43.05C36.2 43.75 35.35 44.1 34.35 44.1V44.1ZM12 11.1L17.25 22.05H31.65L37.65 11.1H12ZM10.35 7.80001H39.45C40.6833 7.80001 41.45 8.16667 41.75 8.90001C42.05 9.63334 41.95 10.4667 41.45 11.4L34.9 23.2C34.5333 23.7667 34.0417 24.2667 33.425 24.7C32.8083 25.1333 32.1333 25.35 31.4 25.35H16.35L13.65 30.4H38.1V33.7H13.85C12.3833 33.7 11.3333 33.2083 10.7 32.225C10.0667 31.2417 10.0833 30.15 10.75 28.95L13.9 23.1L6.34999 7.15001H2.39999V3.85001H8.49999L10.35 7.80001ZM17.25 22.05H31.65H17.25Z"/>
            </svg> 
        </a>
    <?php } else if ($include_option == 'payment') { ?>
        <a id="cart-a" class="selected-page cart-link" href="../payment" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.35 44.1C13.35 44.1 12.5 43.7417 11.8 43.025C11.1 42.3083 10.75 41.45 10.75 40.45C10.75 39.4833 11.1 38.65 11.8 37.95C12.5 37.25 13.35 36.9 14.35 36.9C15.3167 36.9 16.1583 37.25 16.875 37.95C17.5917 38.65 17.95 39.5 17.95 40.5C17.95 41.5 17.6 42.35 16.9 43.05C16.2 43.75 15.35 44.1 14.35 44.1V44.1ZM34.35 44.1C33.35 44.1 32.5 43.7417 31.8 43.025C31.1 42.3083 30.75 41.45 30.75 40.45C30.75 39.4833 31.1 38.65 31.8 37.95C32.5 37.25 33.35 36.9 34.35 36.9C35.3167 36.9 36.1583 37.25 36.875 37.95C37.5917 38.65 37.95 39.5 37.95 40.5C37.95 41.5 37.6 42.35 36.9 43.05C36.2 43.75 35.35 44.1 34.35 44.1V44.1ZM12 11.1L17.25 22.05H31.65L37.65 11.1H12ZM10.35 7.80001H39.45C40.6833 7.80001 41.45 8.16667 41.75 8.90001C42.05 9.63334 41.95 10.4667 41.45 11.4L34.9 23.2C34.5333 23.7667 34.0417 24.2667 33.425 24.7C32.8083 25.1333 32.1333 25.35 31.4 25.35H16.35L13.65 30.4H38.1V33.7H13.85C12.3833 33.7 11.3333 33.2083 10.7 32.225C10.0667 31.2417 10.0833 30.15 10.75 28.95L13.9 23.1L6.34999 7.15001H2.39999V3.85001H8.49999L10.35 7.80001ZM17.25 22.05H31.65H17.25Z"/>
            </svg> 
        </a>
    <?php } else { ?>
        <a id="cart-a" class="nav-transition cart-link" href="../cartpage" title="Carrito de compras">
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.35 44.1C13.35 44.1 12.5 43.7417 11.8 43.025C11.1 42.3083 10.75 41.45 10.75 40.45C10.75 39.4833 11.1 38.65 11.8 37.95C12.5 37.25 13.35 36.9 14.35 36.9C15.3167 36.9 16.1583 37.25 16.875 37.95C17.5917 38.65 17.95 39.5 17.95 40.5C17.95 41.5 17.6 42.35 16.9 43.05C16.2 43.75 15.35 44.1 14.35 44.1V44.1ZM34.35 44.1C33.35 44.1 32.5 43.7417 31.8 43.025C31.1 42.3083 30.75 41.45 30.75 40.45C30.75 39.4833 31.1 38.65 31.8 37.95C32.5 37.25 33.35 36.9 34.35 36.9C35.3167 36.9 36.1583 37.25 36.875 37.95C37.5917 38.65 37.95 39.5 37.95 40.5C37.95 41.5 37.6 42.35 36.9 43.05C36.2 43.75 35.35 44.1 34.35 44.1V44.1ZM12 11.1L17.25 22.05H31.65L37.65 11.1H12ZM10.35 7.80001H39.45C40.6833 7.80001 41.45 8.16667 41.75 8.90001C42.05 9.63334 41.95 10.4667 41.45 11.4L34.9 23.2C34.5333 23.7667 34.0417 24.2667 33.425 24.7C32.8083 25.1333 32.1333 25.35 31.4 25.35H16.35L13.65 30.4H38.1V33.7H13.85C12.3833 33.7 11.3333 33.2083 10.7 32.225C10.0667 31.2417 10.0833 30.15 10.75 28.95L13.9 23.1L6.34999 7.15001H2.39999V3.85001H8.49999L10.35 7.80001ZM17.25 22.05H31.65H17.25Z"   />
            </svg> 
        </a>
    <?php } ?>
    
    
    

</div>