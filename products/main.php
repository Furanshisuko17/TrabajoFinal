<?php   
    if ($page == 0) {
        # TODO
?>        
<div class="product-content">






</div>
<?php
    } else if($page == 1) {
        include 'processor.php';
    } else if ($page == 2) {
        include 'motherboard.php';
    } else if ($page == 3) {
        include 'graphiccard.php';
    } else if ($page == 4) {
        include 'ram.php';
    } else if ($page == 5) {
        include 'psu.php';
    } else {
        header('Location: error/404.php');
        $_GET['e'] = 404; 
        exit(); 
    }
?>
