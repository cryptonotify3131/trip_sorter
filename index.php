<?php

include './app/main.php';

$response = (new TripSorter())->getPath();

$return = "";

if($response['path']) {
    foreach($response['path'] as $row) {
        $return .= "Take " . $row['transport_type'] . ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ") ") : " ") . 
        "from " . $row['from'] . " to " . $row['to'] .
        ($row['seat'] ? (", seat in " . $row['seat']) : "") . ". <br>";
    }
} else {
    $return .= "No path found";
}

if($response['cards']) {
    $return .= "<br>Below boarding cards unable to sorting<br>";
    foreach($response['cards'] as $row) {
        $return .= "- From " . $row['from'] . " to " . $row['to'] . " with transport " . $row['transport_type'] . 
        ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ")") : "") . 
        ($row['seat'] ? (", seat " . $row['seat']) : "") . ". <br>";
    }
}

echo $return;
/** Output :
 * Take train (No. 78A) from Madrid to Barcelona, seat in 45B.
 * Take airport bus from Barcelona to Gerona.
 * Take flight (No. SK455) from Gerona to Stockholm, seat in 3A.
 * Take flight (No. SK22) from Stockholm to New York, seat in 7B.
 */
