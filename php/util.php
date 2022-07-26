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