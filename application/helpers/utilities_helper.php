<?php

if (!function_exists('dd')) {

    /**
     * to debug variable
     * 
     * @param $variable
     * @param $die
     */
    function dd($variable, $die = true)
    {
        echo "<pre>";
        print_r($variable);
        echo "</pre>";

        if ($die) {
            die();
        }

    }

}
