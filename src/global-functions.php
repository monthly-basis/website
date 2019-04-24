<?php

    function var_dump_pre(...$arguments)
    {
        foreach ($arguments as $argument)
        {
            echo '<pre>';
            var_dump($argument);
            echo '</pre>';
        }
    }
