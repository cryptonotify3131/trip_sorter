<?php

namespace App\Services\Transports;

use App\Services\Transports\Transport;

class Flight extends Transport
{
    public function __construct()
    {

    }
    
    public function getSentence($params)
    {
        $sentence = "From " . $params['from'] . ", ";
        $sentence .= "take " . $params['transport_type'] . " ";
        
        if(isset($params['transport_number']) && $params['transport_number']) {
            $sentence .= $params['transport_number'] . " ";
        }

        $sentence .= "to " . $params['to'] . ". ";

        if(isset($params['gate']) && $params['gate']) {
            $sentence .= "Gate " . $params['gate'] . ". ";
        }

        if(isset($params['seat']) && $params['seat']) {
            $sentence .= "Seat in " . $params['seat'] . ". ";
        }

        if(isset($params['bagagge_drop_counter']) && $params['bagagge_drop_counter']) {
            $sentence .= "Bagagge drop at ticket counter " . $params['bagagge_drop_counter'] . ". ";
        } else {
            $sentence .= "Bagagge will we automatically transferred from your last leg. ";
        }
        
        return $sentence;
    }
}
?>