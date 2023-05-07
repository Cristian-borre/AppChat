<?php
    define('TIMEZONE', 'America/Bogota');
    date_default_timezone_set(TIMEZONE);

    function last_seen($date){
        
        $timestamp = strtotime($date);	
        
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");

        $currentTime = time();
        if($currentTime >= $timestamp) {
                $diff     = time()- $timestamp;
                for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
                }

                $diff = round($diff);
                if($diff < 59 && $strTime[$i] == "second"){
                    return "active";
                }else{
                    return $diff . " " . $strTime[$i] . "(s)";
                }
        }
        
    }
?>