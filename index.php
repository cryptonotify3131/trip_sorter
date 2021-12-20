<?php
require_once realpath('vendor/autoload.php');

use App\Services\TripSorter;;

$response = (new TripSorter())->getPath();

$return = "";

if($response['path']) {
    foreach($response['path'] as $row) {
        $className = "App\Services\Transports\\" . str_replace(" ", "", ucwords($row['transport_type']));
        
        if (class_exists($className)) {
            $class = new $className();
        } else {
            $class = new App\Services\Transports\Transport();
        }

        $return .= $class->getSentence($row) . "<br>";
    }

    $return .= "You have arrived at your final destination.<br>";
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
 * Take train 78A from Madrid to Barcelona. Seat in 45B.
 * Take the bus from Barcelona to Gerona Airport. No seat assignment.
 * From Gerona Airport, take flight SK455 to Stockholm. Gate 45B. Seat in 3A. Bagagge drop at ticket counter 344.
 * From Stockholm, take flight SK22 to New York. Gate 22. Seat in 7B. Bagagge will we automatically transferred from your last leg.
 * You have arrived at your final destination.
 */
