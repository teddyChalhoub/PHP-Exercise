<?php 


$arrays = Array ( "musicals" => Array ( 0 => "Oklahoma", 1 => "The Music Man", 2 => "South Pacific" ) ,"dramas" => Array ( 0 => "Lawrence of Arabia", 1 => "To Kill a Mockingbird" ,2 => "Casablanca" ) ,"mysteries" => Array ( 0 => "The Maltese Falcon",1 => "Rear Window", 2 => "North by Northwest" ));


foreach ($arrays as $key => $array){
    echo strtoupper($key);
    echo "<br>";
    foreach($array as $key2 => $value){
        echo "----> $key2 = $value";
        echo "<br>";
    }
}

krsort($arrays);

?>