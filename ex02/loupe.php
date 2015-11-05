#!/usr/bin/php
<?php
        if ($argc == 1)
           exit("\n");
        $myfile = fopen($argv[1], "r") or die("Unable to open file!");
        $filetxt = fread($myfile, filesize($argv[1]));
        $filetxt = preg_replace_callback("/(<a[^>]*>)([^<]*)/", function($matches){return ($matches[1].strtoupper($matches[2]));}, $filetxt);
        $filetxt = preg_replace_callback('/(<a.*)(title=")([^"]*")(.*<\/a>)?/', function($matches){return ($matches[1].$matches[2].strtoupper($matches[3]).$matches[4]);}, $filetxt);        
        echo $filetxt;
?>