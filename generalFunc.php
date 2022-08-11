<?php
date_default_timezone_set('Asia/Tokyo');
function checkEventDate(){
    $funcMode=1;
    //1=normal working 0=develop working(always return TRUE)
    $eDate=[
        "year"=> 2020, "month"=> 9, "day"=>27
    ];
    if(($eDate["year"]==date("Y") && $eDate["month"]==date("n") && $eDate["day"]==date("j"))||$funcMode==0){
        return true;
    } else {
        return false;
    }
}
?>