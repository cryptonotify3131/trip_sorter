<?php

$path = (new Trip_sorter())->index("Madrid", "New York");

if($path) {
    foreach($path as $row) {
        echo "From " . $row['from'] . " to " . $row['to'] . " with transport " . $row['transport_type'] . ($row['transport_number'] ? (" (No. " . $row['transport_number'] . ")") : "") . ($row['seat'] ? (", seat " . $row['seat']) : "") . "<br>";
    }
} else {
    echo "No path found";
}

/**
 * Trip_sorter_class is a class that process to calculate the path from starting location to destination
 * 
 * @package Trip_sorter
 */
class Trip_sorter {

    private $boarding_card_set = [
        [
            'from' => 'Madrid',
            'to' => 'Barcelona',
            'transport_type' => 'train',
            'transport_number' => '78A',
            'seat' => '45B',
        ],
        [
            'from' => 'Stockholm',
            'to' => 'New York',
            'transport_type' => 'flight',
            'transport_number' => 'SK22',
            'seat' => '7B',
        ],
        [
            'from' => 'Gerona',
            'to' => 'Stockholm',
            'transport_type' => 'flight',
            'transport_number' => 'SK455',
            'seat' => '3A',
        ],
        [
            'from' => 'Barcelona',
            'to' => 'Gerona',
            'transport_type' => 'airport bus',
            'transport_number' => '',
            'seat' => '',
        ],
    ];

    /** 
     * @param string $from starting point
     * @param string $to destination
     * @return array the path from starting point to destination
     */
    public function index($from, $to) 
    {
        return $this->calculate_path($from, $to);
    }

    /** 
     * To calculate the path that form starting point to destination
     * 
     * @param string $from starting point
     * @param string $to destination
     * @param array $path to store current path
     * @return array the path from starting point to destination, return empty array [] if path not found
     * @access private docstore.mik.ua/orelly/webprog/pcook/ch21_09.htm
     */
    private function calculate_path($from, $to, $path = []) 
    {
        
        $last_path = end($path);
        $last_to = isset($last_path['to']) ? $last_path['to'] : $from;

        if($path) {
            $destination_list = array_merge(array_column($path, 'from'), array_column($path, 'to'));
        } else {
            $destination_list = [];
        }

        $next_path = [];
        
        foreach ($this->boarding_card_set as $row) {
            // To prevent back to previous destination
            if (!in_array($to, $destination_list)) {
                if ($row['from'] == $last_to) {
                    $next_path = $row;
                }
            }

            if ($row['from'] == $last_to && $row['to'] == $to) {
                $path[] = $row;
                return $path;
            }
        }

        if($next_path) {
            $path[] = $next_path;
            return $this->calculate_path($last_to, $to, $path);
        }


        return [];
    }
}
?>