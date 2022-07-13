<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `tarjetasgraficas` ";
    $query = mysqli_query($con, $sql);
    
?>
<div class="title"> 
    <h1>Tarjetas gr&aacute;ficas</h1>
    <p>Encuentre tarjetas gr&aacute;fias al mejor precio.</p>
</div>
<div class="product-content">
    <div class="table main">
        <table aria-label="table graphic card content">
            <colgroup>
                <col width="32%">
                <col width="14%">
                <col width="10%">
                <col width="12%">
                <col width="12%">
                <col width="10%">
                <col width="10%">
            </colgroup>
            <thead>
                <tr> 
                    <th>Nombre</th>
                    <th>Chipset</th>
                    <th>Memoria</th>
                    <th>Velocidad base</th>
                    <th>Velocidad potenciada</th>
                    <th>Longitud</th>
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
                                <div class="hidden">
                                    <img alt="<?php echo "Tarjeta grafica ".$row[1];?>" src="<?php echo "products/img/graphiccards  /".$row[9]?>">
                                </div>
                                <img alt="<?php echo "Tarjeta grafica ".$row[1];?>" src="<?php echo "products/img/graphiccards  /".$row[9]?>">
                            </div>
                            <div class="text semi-bold-text"><?php echo $row[1];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text "><?php echo $row[2];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[3]." GB";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[4]." MHz";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[5]." MHz"; ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[6]." mm"; ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text semi-bold-text"><?php echo "S/. ".$row[7];?></div>
                        </div>
                    </td>
                </tr>
        <?php
            }?>  
            </tbody>
        </table>
    </div>    
    <div class="sidebar">
        <?php include 'cart.php'?>
    </div>
</div>
