<style>
    .error-404 {
        display:flex;
        flex-direction: column;
        align-items:center;
        gap: 30px;

        padding: 135px 0px;

    }
    .error-404 .emote {
        font-size: 900%;
        font-weight: 500;
    }
    .error-404 .text {
        font-size: 150%;

    }   
</style>
<?php
    $emote_list = array("\(^Д^)/", "\(o_o)/", "(o^^)o", "(;-;)", 
                   "(>_<)", "(='X'=)", "(^_^)b", "(·_·)", 
                   "(·.·)", "(^-^*)", "(≥o≤)");
?>
<div class="error-404">
    <div class="emote"><?php echo $emote_list[array_rand($emote_list)]; ?></div>
    <div class="text">Desafortunadamente, la p&aacute;gina solicitada no existe!</div>
</div>