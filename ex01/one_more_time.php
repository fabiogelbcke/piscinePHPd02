#!/usr/bin/php
<?php
        date_default_timezone_set('Europe/Paris');
        if ($argc > 1)
        {
                $datestr = $argv[1];
                $datearr = preg_split('/[\s]+/', trim($datestr));
                if (count($datearr) != 5)
                   exit("Wrong Format\n");
                $weekdays = array("Dimanche","Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                $months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre");
                if (!(in_array($datearr[0], $weekdays)) || !(in_array($datearr[2], $months)))
                   exit("Wrong Format\n");
                $month = array_search($datearr[2], $months) + 1;
                try{
                        $d1 = new DateTime("$datearr[3]-$month-$datearr[1] $datearr[4]");
                } catch (Exception $e){
                        exit("Wrong Format'\n");
                }
                if (($d1->format("H:i:s") != $datearr[4]) || ($d1->format("d") != $datearr[1]))
                   exit("Wrong format\n");
                $ts = date_timestamp_get($d1);
                $dw = date ("w", $ts);
                if ($dw == array_search($datearr[0], $weekdays))
                   echo("$ts\n");
                else
                   exit("Wrong Format\n");
        }
?>