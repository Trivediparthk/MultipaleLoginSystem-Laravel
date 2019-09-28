<?php
    
    function getCurrentTimeStamp()
    {
        $times = gettimeofday();
        $seconds = strval($times["sec"]);
        $milliseconds = strval(floor($times["usec"] / 1000));
        $missingleadingzeros = 3 - strlen($milliseconds);
        if($missingleadingzeros > 0) {
            for ($i = 0; $i < $missingleadingzeros; $i++) {
                $milliseconds = '0' . $milliseconds;
            }
        }
        
        return intval($seconds . $milliseconds);
    }
