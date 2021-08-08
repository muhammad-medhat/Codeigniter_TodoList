<?php

if(!function_exists('dump_obj')){

    function dump_obj($obj){
        echo "<pre style='color:red'>";
        var_dump($obj);
        echo "</pre>";
    }}