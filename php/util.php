<?php
// return array($name, $extra_data, $img, $precio, $product);
function getProduct($id) {
    $con = connection();
    $product = "";
    $name = "";
    $extra_data = "";
    $img = "";
    $precio = 0;
    $sql_product = "SELECT tipoProducto FROM `productos` WHERE codigoProducto = $id;";
    $query = mysqli_query($con, $sql_product);
    $row = mysqli_fetch_assoc($query);
    $product = $row['tipoProducto'];
    if($product == 'processor'){
        $sql = "SELECT marca, modelo, numeroModelo, serie, velocidad, img, precio FROM `procesadores` WHERE codigoProducto = $id;";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($query);
        $name = $row['marca']." ".$row['modelo']." ".$row['numeroModelo']." ".$row['serie'];
        $extra_data = $row['velocidad'];
        $img = "processors/".$row['img'];
        $precio = $row['precio'];
        
    } else if($product == 'graphiccard'){
        $sql = "SELECT nombre, chipset, img, precio FROM `tarjetasgraficas` WHERE codigoProducto = ".$id.";";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $name = $row['nombre'];
            $extra_data = $row['chipset'];
            $img = "graphiccards/".$row['img'];
            $precio = $row['precio'];
        }
    } else if($product == 'motherboard'){
        $sql = "SELECT nombre, socket, img, precio FROM `tarjetasmadre` WHERE codigoProducto = ".$id.";";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $name = $row['nombre'];
            $extra_data = $row['socket'];
            $img = "motherboards/".$row['img'];
            $precio = $row['precio'];
        }
    } else if($product == 'ram'){
        $sql = "SELECT nombre, tipo, velocidad, img, precio FROM `rams` WHERE codigoProducto = ".$id.";";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $name = $row['nombre'];
            $extra_data = $row['tipo']."-".$row['velocidad'];
            $img = "rams/".$row['img'];
            $precio = $row['precio'];
        }
    } else if($product == 'psu'){
        $sql = "SELECT nombre, eficiencia, img, precio FROM `psus` WHERE codigoProducto = ".$id.";";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $name = $row['nombre'];
            $extra_data = $row['eficiencia'];
            $img = "psus/".$row['img'];
            $precio = $row['precio'];
        }
    }
    mysqli_close($con);
    return array($name, $extra_data, $img, $precio, $product);
}
?>
<?php
function printEmptyCart(){?> 

    <div class="empty-cart">
        <h2>El carrito se encuentra vac&iacute;o.</h2>
        <p>Actualmente no tienes ningun producto en tu carrito.</p>
    </div>

    <?php } ?>
<?php
function printCartItems() {
    if(isset($_SESSION['cart'])){
        if(sizeof($_SESSION['cart']) == "0"){ ?>
            <div data-replace="entire-page">
            <?php printEmptyCart(); ?>
            </div> <?php
        }else {
            printCart();
            // echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
        }
    }else { ?>  
        <div data-replace="entire-page">
        <?php printEmptyCart(); ?>
        </div>
    <?php } 
}
    ?>
    <?php

function printCart() {
    $total_price = 0; ?>

<?php   foreach($_SESSION['cart'] as $product_id => $quantity){
        $product_data = getProduct($product_id); ?>
<div class="items">
    <div class="img-container">
        <img alt="<?php echo $product_data[0]?>" src="<?php echo "/products/img/".$product_data[2];?>">
    </div>
    <div class="item-contents">
        <p class="product-title"><?php echo $product_data[0]; ?></p>
        <p class="extra-data"> 
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
        <p class="price">
            Precio unitario: <?php echo "S/. ".$product_data[3]; ?>
        </p>
        <div class="buttons">
            <div class="add-remove">
                <button class="remove" onclick="cartAction('removeone', '<?php echo $product_id;?>', 'cart')" title="Quitar elemento">-</button>
                <p class="num"><?php echo $quantity;?></p>
                <button class="add" onclick="cartAction('addone', '<?php echo $product_id;?>', 'cart')" title="Agregar elemento">+</button>
            </div>
            <button class="remove-all" type="button" title="Eliminar" onclick="cartAction('remove', '<?php echo $product_id;?>', 'cart')">
                <svg class="svg-image" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                    <path d="M12.8 42.95q-1.65 0-2.925-1.25T8.6 38.8V10.7H6.05V6.5H16.9V4.45h14.2V6.5h10.85v4.2H39.4v28.1q0 1.65-1.25 2.9t-2.95 1.25ZM35.2 10.7H12.8v28.1h22.4Zm-17.35 24h3.7v-20h-3.7Zm8.7 0h3.7v-20h-3.7Zm-13.75-24v28.1Z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="total-price">
        <?php echo "S/. ".number_format(((float) $product_data[3] * (float) $quantity), 2, '.', '');?>
    </div>
</div>  
<?php
        $total_price = $total_price + (float) $quantity * (float) $product_data[3];
        $_SESSION['total_price'] = $total_price;
        

    ?>

<?php } ?>
<?php } ?>