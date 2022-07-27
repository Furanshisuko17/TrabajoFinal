<?php 
    
    include 'php/connection.php';
    $con = connection();

    $sql = "SELECT * FROM `tarjetasmadre` ";
    $query = mysqli_query($con, $sql);
    
?>

<div class="title"> 
    <h1>Tarjetas madre</h1>
    <p>Encuentre tarjetas madre al mejor precio.</p>
</div>
<div class="product-content"> 
    <div class="table main">
        <table aria-label="table motherboard content">
            <colgroup>
                <col width="35%">
                <col width="11%">
                <col width="14%">
                <col width="12%">
                <col width="12%">
                <col width="16%">
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
                                <div class="hidden">
                                    <img alt="<?php echo "Tarjeta madre ".$row[1];?>" src="<?php echo "products/img/motherboards/".$row[8]?>">
                                </div>
                                <img alt="<?php echo "Tarjeta madre ".$row[1];?>" src="<?php echo "products/img/motherboards/".$row[8]?>">
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
                        <div class="table-content last-item">
                            <div class="text semi-bold-text"><?php echo "S/. ".$row[6];?></div>
                            <button type="button" title="Agregar al carrito" onclick="cartAction('add', '<?php echo $row[7];?>', 'products')" >
                                <svg class="svg-img" preserveAspectRatio="xMidYMin" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
                                    <path d="M23.4 17.05V10.9h-6.2v-3h6.2V1.75h3V7.9h6.15v3H26.4v6.15ZM14.5 44.3q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55Q13 37.1 14.5 37.1q1.5 0 2.55 1.075Q18.1 39.25 18.1 40.7q0 1.5-1.05 2.55Q16 44.3 14.5 44.3Zm20.2 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.075Q38.3 39.25 38.3 40.7q0 1.5-1.05 2.55-1.05 1.05-2.55 1.05ZM14.5 33.95q-2.3 0-3.35-1.85-1.05-1.85 0-3.75l3-5.4L6.8 7.3h-4V3.7h6.35l8.3 17.85h14.5L39.6 7.9l3.2 1.65-7.6 13.75q-.5.85-1.325 1.375t-2.025.525h-14.8l-2.9 5.15H38.6v3.6Z"/>
                                </svg>
                            </button>
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
