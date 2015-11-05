#!/usr/bin/php
<?php
        function textos($matches)
        {
                $up = preg_replace_callback("/>.*</sU", function($matches){return (strtoupper($matches[0]));}, $matches[0]);
                $up = preg_replace_callback('/title="(.*)"/sU', function($matches){return ('title="'.strtoupper($matches[1]).'"');}, $up);
                return $up;
        }
        if ($argc == 1)
           exit("\n");
        $myfile = fopen($argv[1], "r") or die("Unable to open file!");
        $filetxt = fread($myfile, filesize($argv[1]));
        $filetxt = preg_replace_callback("/(<a[^>]*)(.*)(\/a>)/sU", "textos", $filetxt);
        echo $filetxt;
?>