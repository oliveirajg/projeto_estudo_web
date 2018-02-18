
<div class="well text-center">
    Bem vindo Oficial(a)
    <?php
    if(isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        
    endif;
    echo "<b>".$_SESSION['name']."</b>";
    ?>
</div>
