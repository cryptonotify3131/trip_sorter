<?php

include "TripSorter.php";

$cards = isset($_POST['cards']) ? $_POST['cards'] : "";

if(!$cards) {
    echo "'cards' variable is required";
    exit();
}

$response = (new TripSorter)->getPath(json_decode($cards, true));


if($response['path']) {
    foreach($response['path'] as $row) {
        echo "Take " . $row['transport_type'] . ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ") ") : " ") . 
        "from " . $row['from'] . " to " . $row['to'] .
        ($row['seat'] ? (", seat in " . $row['seat']) : "") . ". \n";
    }
} else {
    echo "No path found";
}

if($response['cards']) {
    echo "\nBelow boarding cards unable to sorting\n";
    foreach($response['cards'] as $row) {
        echo "- From " . $row['from'] . " to " . $row['to'] . " with transport " . $row['transport_type'] . 
        ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ")") : "") . 
        ($row['seat'] ? (", seat " . $row['seat']) : "") . ". \n";
    }
}


?>