<?php

if (!function_exists('var_dump_pre')) {
    function var_dump_pre(...$arguments)
    {
        foreach ($arguments as $argument)
        {
            echo '<pre>';
            var_dump($argument);
            echo '</pre>';
        }
    }
}
