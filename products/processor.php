<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `procesadores` ";
    $query = mysqli_query($con, $sql);
    
?>

<div class="product-content">
    
    <div class="sidebar">
        <?php include 'cart.php'?>
    </div>
    <div class="table main">
        <table aria-label="table processor content">
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
                    <th>N&uacute;cleos</th>
                    <th>Velocidad</th>
                    <th>TDP</th>
                    <th>Gr&aacute;ficos integrados</th>
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
                                <img alt="<?php echo "Procesador ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4];?>" src="<?php echo "products/img/processors/".$row[12]?>">
                            </div>
                            <div class="text name"><?php echo $row[1]." ".$row[2]." ".$row[3]." ".$row[4];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text "><?php echo $row[5];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[6]." Ghz";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[7]." W";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text">
                            <?php
                                if(!$row[8]){
                                    echo "No tiene";
                                }else {
                                    echo $row[9];
                                }
                            ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo "S/. ".$row[10];?></div>
                        </div>
                    </td>
                </tr>
        <?php
            }?>  
            </tbody>
        </table>
    </div>    
</div>
