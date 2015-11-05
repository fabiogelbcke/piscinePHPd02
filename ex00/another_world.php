#!/usr/bin/php
<?php
        if ($argc > 1)
        {
                $arr = preg_split('/[\s]+/', trim($argv[1]));
                foreach ($arr as $word)
                        echo "$word ";
                echo "\n";
        }
?>