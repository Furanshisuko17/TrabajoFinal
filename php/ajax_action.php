<?php
session_start();
require_once("connection.php");

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
            $img = "graphiccars/".$row['img'];
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

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case "add":
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
    }   
}

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $product_id => $quantity){
        $product_data = getProduct($product_id);
        //echo '<pre>'; print_r($product_data); echo '</pre>';
?>    
<div class="item">
    <div class="name">
        <img alt="<?php echo $product_data[0]?>" src="<?php echo "/products/img/".$product_data[2];?>">
        <div class="text-content">
            <p><?php echo $product_data[0]?></p> 
            <p> 
            <?php 
                if($product_data[4] == "processor") {
                    echo "Velocidad: ";
                } else if ($product_data[4] == "motherboard") {
                    echo "Socket: ";
                } else if ($product_data[4] == "graphiccard") {
                    echo "Chipset: ";
                } else if ($product_data[4] == "psu") {
                    echo "Eficiencia: ";
                } else if ($product_data[4] == "ram") {
                    echo "Velocidad: ";
                }
                echo $product_data[1];
            ?> 
            </p>
            <div style="display:flex;justify-content:space-around">
                <div style="display:flex; justify-content:space-around;align-items:center;gap:8px;">
                    <button title="Quitar elemento">-</button>
                    <num><?php echo $quantity ?></num>
                    <button title="Agregar elemento">+</button>
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
    }

}else {
    echo '<div class="empty-text" id="empty-message">El carrito est&aacute; vac&iacute;o</div>';
}

?>

