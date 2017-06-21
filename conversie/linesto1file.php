<?php

    $array = [];

    $dir    = '../data/lines/';
    $files = scandir($dir);
    foreach($files as $file){
        if(stripos($file,"lines2017") === 0){
            $json = json_decode(file_get_contents($dir . $file));
            foreach($json as $id => $data){
                foreach($data as $item){
                    $array[$id][] = $item;
                }
            }
        }
    }
    
    $f = fopen($dir ."lines.json","w");
    fwrite($f, json_encode($array));
    fclose($f);


    $f = fopen($dir . "lines.csv","w");
    fputcsv($f,["Name","Timestamp","Current waiting time","Average waiting time", "On Hold","Closed"]);
    foreach($array as $museum){
        foreach($museum as $item){
            fputcsv($f, [$item->name, $item->timestamp, $item->current, $item->average, $item->onhold, $item->closed]);
        }
    }
    fclose($f);
    
    print("<PRE>");
    print_r($array);
    
?>
