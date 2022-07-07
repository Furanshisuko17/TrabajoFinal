<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada</title>

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/content.css">

</head>
<body>
    <?php 
        $include_option = '404';
        include('../view/header.php');
        $emote_list = array("\(^Д^)/", "\(o_o)/", "(o^^)o", "(;-;)", 
                            "(>_<)", "(='X'=)", "(^_^)b", "(·_·)", 
                            "(·.·)", "(^-^*)", "(≥o≤)", "(ㅠ﹏ㅠ)",
                            "(>﹏<)", "(•-•)>", "(˘･_･˘)", "(≧﹏ ≦)");
    ?>
    <div class="error-404">
        <div class="emote"><?php echo $emote_list[array_rand($emote_list)]; ?></div>
        <div class="text">Desafortunadamente, la p&aacute;gina solicitada no existe!</div>
    </div>
</body>
</html>
