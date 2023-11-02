<?php
//Generating human readable time
function timeInterval($start_date, $end_date) {
    $interval = $start_date->diff($end_date); //Difference between dates 
    if($interval->y >= 1) {
        if($interval == 1)
            $time_message = $interval->y . " year ago"; //1 year ago
        else 
            $time_message = $interval->y . " years ago"; //1+ year ago
    }
    else if ($interval-> m >= 1) {
        if($interval->d == 0) {
            $days = " ago";
        }
        else if($interval->d == 1) {
            $days = $interval->d . " day ago";
        }
        else {
            $days = $interval->d . " days ago";
        }


        if($interval->m == 1) {
            $time_message = $interval->m . " month". $days;
        }
        else {
            $time_message = $interval->m . " months". $days;
        }

    }
    else if($interval->d >= 1) {
        if($interval->d == 1) {
            $time_message = "Yesterday";
        }
        else {
            $time_message = $interval->d . " days ago";
        }
    }
    else if($interval->h >= 1) {
        if($interval->h == 1) {
            $time_message = $interval->h . " hour ago";
        }
        else {
            $time_message = $interval->h . " hours ago";
        }
    }
    else if($interval->i >= 1) {
        if($interval->i == 1) {
            $time_message = $interval->i . " min ago";
        }
        else {
            $time_message = $interval->i . " mins ago";
        }
    }
    else {
        if($interval->s < 30) {
            $time_message = "Just now";
        }
        else {
            $time_message = $interval->s . " seconds ago";
        }
    }

    return $time_message;
}

function documentRoot(){
    $path = $_SERVER['SERVER_NAME'].'/Verification-system/';

    return $path;
}

?>