<?php
session_start();
require_once("connection.php");
include ('util.php'); 

function printEmptyCart(){
    echo '<div class="empty-text" id="empty-message">El carrito est&aacute; vac&iacute;o</div>';
}

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case "add":
        case "addone":
            $product_code = $_POST['code'];
            if(empty($_SESSION['cart'])){
                $_SESSION['cart'] = array($_POST['code'] => 1);
            }else {
                foreach($_SESSION['cart'] as $product_id => $quantity){
                    if($product_id == $_POST['code']){
                        $quantity = $quantity + 1;
                        $_SESSION['cart'][$product_id] = $quantity;
                    }else {
                        $_SESSION['cart'] = $_SESSION['cart'] + array($_POST['code']=>1);
                    }
                }
            }
            break;
        case "remove":
            $product_code = $_POST['code'];
            foreach($_SESSION['cart'] as $product_id => $quantity){
                if($product_id == $_POST['code']){
                    unset($_SESSION['cart'][$product_id]);
                }
            }
            break;
        case "empty":
            if(!empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
            break;
        case "removeone":
            $product_code = $_POST['code'];
            foreach($_SESSION['cart'] as $product_id => $quantity){
                if($product_id == $_POST['code']){
                    if($_SESSION['cart'][$product_id] == 1){
                        unset($_SESSION['cart'][$product_id]);
                        break;
                    }else {
                        $quantity = $quantity - 1;
                        $_SESSION['cart'][$product_id] = $quantity;
                    }
                }
            }
            break;
        case "loadpage":
            break;
    }   
}

if(isset($_SESSION['cart'])){
    if(sizeof($_SESSION['cart']) == "0"){
        printEmptyCart();
    }else {
        $total_price = 0;
        foreach($_SESSION['cart'] as $product_id => $quantity){
            $product_data = getProduct($product_id);
            //echo '<pre>'; print_r($product_data); echo '</pre>';
    ?>    
    <div class="item">
        <div class="name">
            <div class="image">
                <img alt="<?php echo $product_data[0]?>" src="<?php echo "/products/img/".$product_data[2];?>">
                </div>
            <div class="text-content">
                <div>
                    <p style="font-weight:600"><?php echo $product_data[0]?></p> 
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
                        <button class="add-remove" onclick="cartAction('removeone', '<?php echo $product_id;?>')" title="Quitar elemento">-</button>
                        <p class="num"><?php echo $quantity;?></p>
                        <button class="add-remove" onclick="cartAction('addone', '<?php echo $product_id;?>')" title="Agregar elemento">+</button>
                    </div>
                    <button type="button" title="Eliminar" onclick="cartAction('remove', '<?php echo $product_id;?>')">
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
    printEmptyCart();
} else {
    printEmptyCart();
}
?>


