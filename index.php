<?php

include "TripSorter.php";

$from = isset($_GET['from']) ? $_GET['from'] : "";
$to = isset($_GET['to']) ? $_GET['to'] : "";

if(!$from || !$to) {
    echo "'from' and 'to' varaiable is required";
    exit();
}

$path = (new TripSorter)->getPath($from, $to);

if($path) {
    foreach($path as $row) {
        echo "From " . $row['from'] . " to " . $row['to'] . " with transport " . $row['transport_type'] . 
        ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ")") : "") . 
        ($row['seat'] ? (", seat " . $row['seat']) : "") . "<br>";
    }
} else {
    echo "No path found";
}


?>