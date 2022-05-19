<?php

function view_count($number)
{
    if($number >= 1000){
        $number = round($number/1000, 1) . 'K';
    }
    return $number;
}
