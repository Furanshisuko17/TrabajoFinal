<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `psus` ";
    $query = mysqli_query($con, $sql);
    
?>

<div class="title"> 
    <h1>Fuentes de poder</h1>
    <p>Encuentre fuentes de poder al mejor precio.</p>
</div>
<div class="product-content"> 
    <div style="padding-top: 17px;" class="table main">
        <table aria-label="table power supply content">
            <colgroup>
                <col width="35%">
                <col width="15%">
                <col width="13%">
                <col width="11%">
                <col width="14%">
                <col width="16%">
            </colgroup>
            <thead>
                <tr> 
                    <th>Nombre</th>
                    <th>Factor de forma</th>
                    <th>Eficiencia</th>
                    <th>Potencia</th>
                    <th>Modularidad</th>
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
                                    <img alt="<?php echo "RAM ".$row[1];?>" src="<?php echo "products/img/psus/".$row[8]?>">
                                </div>
                                <img alt="<?php echo "RAM ".$row[1];?>" src="<?php echo "products/img/psus/".$row[8]?>">
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
                            <div class="text"><?php echo $row[3];?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text"><?php echo $row[4]." W";?></div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text">
                                <?php 
                                    if($row[5] == "2"){
                                        echo "Full";
                                    }else if($row[5] == "1"){
                                        echo "Semi";
                                    }else {
                                        echo "No";
                                    };
                                
                                ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="table-content">
                            <div class="text semi-bold-text"><?php echo "S/. ".$row[6];?></div>
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
