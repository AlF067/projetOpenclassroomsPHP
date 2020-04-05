<?php 
    
    if (isset($_GET["limitMin"])) {
        $limitMin = $_GET["limitMin"];
    }else {
        $limitMin = 0;
    }
    
    require "vue/vueChapitres.php";
?>