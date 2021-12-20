<?php

namespace App\Services\Transports;

class Transport 
{
    public function __construct()
    {
    }
    
    public function getSentence($params)
    {
        $sentence = "Take " . $params['transport_type'] . " ";
        
        if(isset($params['transport_number']) && $params['transport_number']) {
            $sentence .= "(No. " . $params['transport_number'] . ") ";
        }

        $sentence .= "from " . $params['from'] . " to " . $params['to'] . ". ";

        if(isset($params['seat']) && $params['seat']) {
            $sentence .= "Seat in " . $params['seat'] . ". ";
        }
        
        return $sentence;
    }
}
?>