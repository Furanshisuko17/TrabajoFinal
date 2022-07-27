<?php
session_start();
require_once("connection.php");
include ('util.php'); // return array($name, $extra_data, $img, $precio, $product);

function printEmptyCartProduct(){
    echo '<div class="empty-text" id="empty-message">El carrito est&aacute; vac&iacute;o</div>';
}

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case "add":
        case "addone":
            $product_code = $_POST['code'];
            if(empty($_SESSION['cart'])){
                $_SESSION['cart'] = array($_POST['code'] => 1);
                $_SESSION['total_items'] = 1; 
            }else {
                foreach($_SESSION['cart'] as $product_id => $quantity){
                    if($product_id == $_POST['code']){
                        $quantity = $quantity + 1;
                        $_SESSION['cart'][$product_id] = $quantity;
                    }else {
                        $_SESSION['cart'] = $_SESSION['cart'] + array($_POST['code']=>1);
                    }
                }
                $_SESSION['total_items'] = $_SESSION['total_items'] + 1; 
            }
            break;
        case "remove":
            $product_code = $_POST['code'];
            foreach($_SESSION['cart'] as $product_id => $quantity){
                if($product_id == $_POST['code']){
                    $_SESSION['total_items'] = $_SESSION['total_items'] - $quantity; 
                    unset($_SESSION['cart'][$product_id]);
                }
            }
            break;
        case "empty":
            if(!empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            if(!empty($_SESSION['total_items'])) {
                unset($_SESSION['total_items']);   
            }
            if(isset($_SESSION['total_items'])) {
                $_SESSION['total_price'] = 0;
            }
            break;
        case "removeone":
            $product_code = $_POST['code'];
            foreach($_SESSION['cart'] as $product_id => $quantity){
                if($product_id == $_POST['code']){
                    if($_SESSION['cart'][$product_id] == 1){
                        unset($_SESSION['cart'][$product_id]);
                        if(isset($_SESSION['total_items'])) {
                            $_SESSION['total_price'] = 0;
                        }
                        break;
                    }else {
                        $quantity = $quantity - 1;
                        $_SESSION['cart'][$product_id] = $quantity;
                    }
                }
            }
            $_SESSION['total_items'] = $_SESSION['total_items'] - 1; 
            break;
        case "loadpage":
            break;
        default:
            break;
    }   
}
?>

<?php 
    switch($_POST['page']) {
        case "products":
            loadProductPage();
            break;
        case "cart":
            loadCartPage();
            break;
            
    }
?>

<?php function loadCartPage() { ?>
<div data-replace="items">
    <?php printCartItems() ?>
</div>

<div data-replace="sum-up"> 
    <div class="resume-title">Resumen del pedido</div>
    <div class="details">
        <div class="products">
            <p>Productos</p>
            <p><?php echo "S/. ".$_SESSION['total_price']?></p>
        </div>
        <div class="products">
            <p>Env&iacute;o</p>
            <p>S/. 15.00</p>
        </div>
    </div>
    <div class="subtotal">
        <p>Subtotal</p>
        <p><?php echo "S/. ".($_SESSION['total_price'] + 15)?></p>
    </div>
    <div class="buttons" >
        <a href="/productos?page=1"><button class="keep">Seguir comprando</button></a>
        
    </div>
</div>
<?php } ?>

<?php function loadProductPage() { ?>
<div data-replace="items">
<?php
if(isset($_SESSION['cart'])){
    if(sizeof($_SESSION['cart']) == "0"){
        printEmptyCartProduct();
    }else {
        $total_price = 0;

        foreach($_SESSION['cart'] as $product_id => $quantity){
            $product_data = getProduct($product_id);
            //echo '<pre>'; print_r($product_data); echo '</pre>';
            // echo $_SESSION['total_items']
    ?>    
    <div class="item">
        <div class="name">
            <div class="image">
                <img alt="<?php echo $product_data[0]?>" src="<?php echo "/products/img/".$product_data[2];?>">
                </div>
            <div class="text-content">
                <div>
                    <p style="font-weight:600;padding-bottom: 5px;"><?php echo $product_data[0]?></p> 
                    <p> 
                    <?php 
                        if($product_data[4] == "processor") {
                            echo "Velocidad: ".$product_data[1]." Ghz";
                        } else if ($product_data[4] == "motherboard") {
                            echo "Socket: ".$product_data[1];
                        } else if ($product_data[4] == "graphiccard") {
                            echo "Chipset: ".$product_data[1];
                        } else if ($product_data[4] == "psu") {
                            echo "Eficiencia: ".$product_data[1];
                        } else if ($product_data[4] == "ram") {
                            echo "Velocidad: ".$product_data[1]." Mhz";
                        }
                    ?> 
                    </p>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <div style="font-size:90%"><?php echo "S/. ".$product_data[3] ?></div>
                    <div style="display:flex; justify-content:space-around;align-items:center;border-radius:15px;border:1px solid black">
                        <button class="add-remove" onclick="cartAction('removeone', '<?php echo $product_id;?>', 'products')" title="Quitar elemento">-</button>
                        <p class="num"><?php echo $quantity;?></p>
                        <button class="add-remove" onclick="cartAction('addone', '<?php echo $product_id;?>', 'products')" title="Agregar elemento">+</button>
                    </div>
                    <button type="button" title="Eliminar" onclick="cartAction('remove', '<?php echo $product_id;?>', 'products')">
                        <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                            <path d="M12.8 42.95q-1.65 0-2.925-1.25T8.6 38.8V10.7H6.05V6.5H16.9V4.45h14.2V6.5h10.85v4.2H39.4v28.1q0 1.65-1.25 2.9t-2.95 1.25ZM35.2 10.7H12.8v28.1h22.4Zm-17.35 24h3.7v-20h-3.7Zm8.7 0h3.7v-20h-3.7Zm-13.75-24v28.1Z"/>
                        </svg>
                    </button>
                </div> 
            </div> 
        </div>
    </div>  
    <?php
        $total_price = $total_price + (float) $quantity * (float) $product_data[3];
        $_SESSION['total_price'] = $total_price;
        }
    ?>
    <div class="total-price" id="total-price">
        <p><?php echo "Subtotal: S/. ".$total_price ?></p>
    </div>
    <?php
    }
}else if(empty($_SESSION['cart'])) {
    printEmptyCartProduct();
} else {
    printEmptyCartProduct();
} ?>
</div>

<?php
}
?>


<div data-replace="cart-a">
<?php
    if(isset($_SESSION['total_items'])){
        if($_SESSION['total_items'] > 99){ ?>
    	    <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.15 44.5C13.05 44.5 12.1167 44.1083 11.35 43.325C10.5833 42.5417 10.2 41.6167 10.2 40.55C10.2 39.45 10.5917 38.5167 11.375 37.75C12.1583 36.9833 13.0833 36.6 14.15 36.6C15.25 36.6 16.1833 36.9917 16.95 37.775C17.7167 38.5583 18.1 39.4833 18.1 40.55C18.1 41.65 17.7083 42.5833 16.925 43.35C16.1417 44.1167 15.2167 44.5 14.15 44.5ZM34.9 44.5C33.8 44.5 32.8667 44.1083 32.1 43.325C31.3333 42.5417 30.95 41.6167 30.95 40.55C30.95 39.45 31.3417 38.5167 32.125 37.75C32.9083 36.9833 33.8333 36.6 34.9 36.6C36 36.6 36.9333 36.9917 37.7 37.775C38.4667 38.5583 38.85 39.4833 38.85 40.55C38.85 41.65 38.4583 42.5833 37.675 43.35C36.8917 44.1167 35.9667 44.5 34.9 44.5ZM14.15 34.05C12.65 34.05 11.5333 33.425 10.8 32.175C10.0667 30.925 10.0667 29.6667 10.8 28.4L13.8 22.9L6.25 6.9H2.2V3.25H8.55L17.3 21.85H32L35.25 16.0203L36.825 16.8953L38.4 17.7703L35.25 23.55C34.9167 24.15 34.4667 24.625 33.9 24.975C33.3333 25.325 32.6667 25.5 31.9 25.5H16.55L13.75 30.4H38.85V34.05H14.15Z"/>
            </svg> 
            <div class="cart-items-number">99+</div>
<?php   } else if($_SESSION['total_items'] > 9  && $_SESSION['total_items'] < 100) { ?>
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.15 44.5C13.05 44.5 12.1167 44.1083 11.35 43.325C10.5833 42.5417 10.2 41.6167 10.2 40.55C10.2 39.45 10.5917 38.5167 11.375 37.75C12.1583 36.9833 13.0833 36.6 14.15 36.6C15.25 36.6 16.1833 36.9917 16.95 37.775C17.7167 38.5583 18.1 39.4833 18.1 40.55C18.1 41.65 17.7083 42.5833 16.925 43.35C16.1417 44.1167 15.2167 44.5 14.15 44.5ZM34.9 44.5C33.8 44.5 32.8667 44.1083 32.1 43.325C31.3333 42.5417 30.95 41.6167 30.95 40.55C30.95 39.45 31.3417 38.5167 32.125 37.75C32.9083 36.9833 33.8333 36.6 34.9 36.6C36 36.6 36.9333 36.9917 37.7 37.775C38.4667 38.5583 38.85 39.4833 38.85 40.55C38.85 41.65 38.4583 42.5833 37.675 43.35C36.8917 44.1167 35.9667 44.5 34.9 44.5ZM14.15 34.05C12.65 34.05 11.5333 33.425 10.8 32.175C10.0667 30.925 10.0667 29.6667 10.8 28.4L13.8 22.9L6.25 6.9H2.2V3.25H8.55L17.3 21.85H32L35.25 16.0203L36.825 16.8953L38.4 17.7703L35.25 23.55C34.9167 24.15 34.4667 24.625 33.9 24.975C33.3333 25.325 32.6667 25.5 31.9 25.5H16.55L13.75 30.4H38.85V34.05H14.15Z"/>
            </svg> 
            <div class="cart-items-number"><?php echo $_SESSION['total_items']; ?></div>
<?php   } else if($_SESSION['total_items'] == 0) { ?>
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="M14.35 44.1C13.35 44.1 12.5 43.7417 11.8 43.025C11.1 42.3083 10.75 41.45 10.75 40.45C10.75 39.4833 11.1 38.65 11.8 37.95C12.5 37.25 13.35 36.9 14.35 36.9C15.3167 36.9 16.1583 37.25 16.875 37.95C17.5917 38.65 17.95 39.5 17.95 40.5C17.95 41.5 17.6 42.35 16.9 43.05C16.2 43.75 15.35 44.1 14.35 44.1V44.1ZM34.35 44.1C33.35 44.1 32.5 43.7417 31.8 43.025C31.1 42.3083 30.75 41.45 30.75 40.45C30.75 39.4833 31.1 38.65 31.8 37.95C32.5 37.25 33.35 36.9 34.35 36.9C35.3167 36.9 36.1583 37.25 36.875 37.95C37.5917 38.65 37.95 39.5 37.95 40.5C37.95 41.5 37.6 42.35 36.9 43.05C36.2 43.75 35.35 44.1 34.35 44.1V44.1ZM12 11.1L17.25 22.05H31.65L37.65 11.1H12ZM10.35 7.80001H39.45C40.6833 7.80001 41.45 8.16667 41.75 8.90001C42.05 9.63334 41.95 10.4667 41.45 11.4L34.9 23.2C34.5333 23.7667 34.0417 24.2667 33.425 24.7C32.8083 25.1333 32.1333 25.35 31.4 25.35H16.35L13.65 30.4H38.1V33.7H13.85C12.3833 33.7 11.3333 33.2083 10.7 32.225C10.0667 31.2417 10.0833 30.15 10.75 28.95L13.9 23.1L6.34999 7.15001H2.39999V3.85001H8.49999L10.35 7.80001ZM17.25 22.05H31.65H17.25Z"/>
            </svg>  
<?php   } else { ?>
            <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                <path d="m22.85,11.15zm-8.7,33.35q-1.65,0 -2.8,-1.175t-1.15,-2.775q0,-1.65 1.175,-2.8t2.775,-1.15q1.65,0 2.8,1.175t1.15,2.775q0,1.65 -1.175,2.8t-2.775,1.15zm20.75,0q-1.65,0 -2.8,-1.175t-1.15,-2.775q0,-1.65 1.175,-2.8t2.775,-1.15q1.65,0 2.8,1.175t1.15,2.775q0,1.65 -1.175,2.8t-2.775,1.15zm-20.75,-10.45q-2.25,0 -3.35,-1.875t0,-3.775l3,-5.5l-7.55,-16l-4.05,0l0,-3.65l6.35,0l8.75,18.6l14.7,0l8,-14.35l3.15,1.75l-7.9,14.3q-0.5,0.9 -1.35,1.425q-0.85,0.525 -2,0.525l-15.35,0l-2.8,4.9l25.1,0l0,3.65l-24.7,0z"/>
            </svg> 
            <div class="cart-items-number"><?php echo $_SESSION['total_items']; ?></div>
<?php   } 
    }else { ?>
        <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
            <path d="M14.35 44.1C13.35 44.1 12.5 43.7417 11.8 43.025C11.1 42.3083 10.75 41.45 10.75 40.45C10.75 39.4833 11.1 38.65 11.8 37.95C12.5 37.25 13.35 36.9 14.35 36.9C15.3167 36.9 16.1583 37.25 16.875 37.95C17.5917 38.65 17.95 39.5 17.95 40.5C17.95 41.5 17.6 42.35 16.9 43.05C16.2 43.75 15.35 44.1 14.35 44.1V44.1ZM34.35 44.1C33.35 44.1 32.5 43.7417 31.8 43.025C31.1 42.3083 30.75 41.45 30.75 40.45C30.75 39.4833 31.1 38.65 31.8 37.95C32.5 37.25 33.35 36.9 34.35 36.9C35.3167 36.9 36.1583 37.25 36.875 37.95C37.5917 38.65 37.95 39.5 37.95 40.5C37.95 41.5 37.6 42.35 36.9 43.05C36.2 43.75 35.35 44.1 34.35 44.1V44.1ZM12 11.1L17.25 22.05H31.65L37.65 11.1H12ZM10.35 7.80001H39.45C40.6833 7.80001 41.45 8.16667 41.75 8.90001C42.05 9.63334 41.95 10.4667 41.45 11.4L34.9 23.2C34.5333 23.7667 34.0417 24.2667 33.425 24.7C32.8083 25.1333 32.1333 25.35 31.4 25.35H16.35L13.65 30.4H38.1V33.7H13.85C12.3833 33.7 11.3333 33.2083 10.7 32.225C10.0667 31.2417 10.0833 30.15 10.75 28.95L13.9 23.1L6.34999 7.15001H2.39999V3.85001H8.49999L10.35 7.80001ZM17.25 22.05H31.65H17.25Z"/>
        </svg> 
<?php
    }
?>
</div>