<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `rams` ";
    $query = mysqli_query($con, $sql);
    
?>
<div class="title"> 
    <h1>Memorias RAM</h1>
    <p>Encuentre memorias RAM al mejor precio.</p>
</div>
<div class="product-content"> 
    <div style="padding-top: 17px;" class="table main">
        <table aria-label="table motherboard content">
            <colgroup>
                <col width="35%">
                <col width="15%">
                <col width="11%">
                <col width="13%">
                <col width="14%">
                <col width="14%">
            </colgroup>
            <thead>
                <tr> 
                    <th>Nombre</th>
                    <th>Velocidad</th>
                    <th>M&oacute;dulos</th>
                    <th>Soles/GB</th>
                    <th>Tiempos</th>
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
                                    <img alt="<?php echo "RAM ".$row[1];?>" src="<?php echo "products/img/rams/".$row[10]?>">
                                </div>
                                <img alt="<?php echo "RAM ".$row[1];?>" src="<?php echo "products/img/rams/".$row[10]?>">
                            </div>
                            <div class="text semi-bold-text"><?php echo $row[1];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text "><?php echo $row[2]."-".$row[3];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[4]." x ".$row[5]."GB";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo "S/. ".$row[6];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[7];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text semi-bold-text"><?php echo "S/. ".$row[8];?></div>
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
