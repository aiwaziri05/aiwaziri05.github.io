<?php

    function user_id($length) {
        $text = "";

        $len = rand(8, $length);
        for($i = 1; $i < $len; $i++) {

            $text .= rand(0,9);
        }
        return $text;
    }
    echo user_id(8);