<?php

$urls = 
["https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/d17e70df-1851-41dd-a27f-99bae778e577?culture=en-US&dayOfWeek=2&startTime.hours=9&startTime.minutes=0&endTime.hours=17&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/2ba2fa84-b735-4f8c-91c5-a2c7ded1b57d?culture=en-US&dayOfWeek=2&startTime.hours=10&startTime.minutes=0&endTime.hours=19&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/dd19da01-45a7-470a-b0df-a2feef783f77?culture=en-US&dayOfWeek=2&startTime.hours=9&startTime.minutes=0&endTime.hours=22&endTime.minutes=0&ETicketOnly=true",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/95662943-4465-44d0-a0df-dab591d338e5?culture=en-US&dayOfWeek=2&startTime.hours=11&startTime.minutes=0&endTime.hours=17&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/86268170-b538-412c-b007-ea56794dda8b?culture=en-US&dayOfWeek=2&startTime.hours=11&startTime.minutes=0&endTime.hours=17&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/cbf77bab-b6c9-4443-b62b-4ec7c01a7f52?culture=en-US&dayOfWeek=2&startTime.hours=9&startTime.minutes=0&endTime.hours=18&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/e3f3d6d7-eaf9-4d39-af37-b97ba8a21243?culture=en-US&dayOfWeek=2&startTime.hours=10&startTime.minutes=0&endTime.hours=18&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/71aa0732-99a1-4c27-abaa-62d81a43a8b1?culture=en-US&dayOfWeek=2&startTime.hours=9&startTime.minutes=0&endTime.hours=17&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/0505f9b2-6ead-46c8-bb9b-178ffe219c79?culture=en-US&dayOfWeek=2&startTime.hours=10&startTime.minutes=0&endTime.hours=17&endTime.minutes=0",
 "https://wachtrij.iamsterdam.com/umbraco/LocationApi/Data/GetLocationData/0c674b9b-0b3b-47bf-a861-b9f7a6470c55?culture=en-US&dayOfWeek=2&startTime.hours=11&startTime.minutes=0&endTime.hours=19&endTime.minutes=30"];


 $file = "../data/lines/lines". date("Ymd") .".json";
 $results = json_decode(file_get_contents($file));
 if(!$results){
    $results = new stdClass();
    //print("<BR>No previous results found...");
 }

 foreach($urls as $url){
    $url = str_replace("&dayOfWeek=2","&dayOfWeek=". date("N"),$url);
    $uid = substr($url,73,36);
    $json = json_decode(file_get_contents($url));
    //print($url);
    if($json){
        $measured = date("Y-m-d H:i:s", time() - $json->minutesSinceLastInput * 60);
        $result = [
            "name" => $json->locationName,
            "current" => $json->currentQueueLength,
            "average" => $json->averageQueueLength,
            "timestamp" => $measured,
            "onhold" => boolval($json->queueOnHold),
            "closed" => boolval($json->closed)
        ];
        if($results->$uid && count($results->$uid) > 0){
            $lastitem = array_pop($results->$uid);
            $lasttime = $lastitem->timestamp;
            print("<BR/>". date("Y-m-d H:i:s",time() - $json->minutesSinceLastInput * 60) ." - ". $lasttime);
            array_push($results->$uid, $lastitem);
            if(time() - $json->minutesSinceLastInput * 60 > strtotime($lasttime) + (3 * 60)){
                array_push($results->$uid, $result);
                print(" - updated.");
            } else {
                print(" - no update.");
            }
        } else if(date("Y-m-d") == date("Y-m-d", strtotime($measured))) {
            $results->$uid = [$result];
        } else {
            //Meting is nog van gisteren
        }
    } else {
        print(json_last_error_msg());
    }
 }
 
 $f = fopen($file,"w");
 fwrite($f, json_encode($results));
 fclose($f);
?>
