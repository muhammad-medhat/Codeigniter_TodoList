<?php

if(!function_exists('dump_obj')){

    function dump_obj($obj, $title=''){
        echo "<pre>";
            echo "<h4>$title</h4>";
            var_dump($obj);
        echo "</pre>";
    }}