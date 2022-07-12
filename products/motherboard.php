<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `tarjetasmadre` ";
    $query = mysqli_query($con, $sql);
    
?>

<div class="product-content"> 
    <div class="sidebar">
        <?php include 'cart.php'?>
    </div>
    <div class="table main">
        <table aria-label="table motherboard content">
            <colgroup>
                <col width="35%">
                <col width="11%">
                <col width="14%">
                <col width="12%">
                <col width="14%">
                <col width="14%">
            </colgroup>
            <thead>
                <tr> 
                    <th>Nombre</th>
                    <th>Socket</th>
                    <th>Factor de forma</th>
                    <th>Memoria m&aacute;xima</th>
                    <th>Ranuras de memoria</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
        <?php 
            while($row = mysqli_fetch_array($query)){?>    
                <tr>
                    <td>
                        <div class="table-content">
                            <div class="image-wrapper">
                                <img alt="<?php echo "Tarjeta madre ".$row[1];?>" src="<?php echo "products/img/motherboards/".$row[8]?>">
                            </div>
                            <div class="text name"><?php echo $row[1];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text "><?php echo $row[2];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[3]."";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[4]."";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text">
                            <?php echo $row[5];?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo "S/. ".$row[6];?></div>
                        </div>
                    </td>
                </tr>
        <?php
            }?>  
            </tbody>
        </table>
    </div>    
</div>
