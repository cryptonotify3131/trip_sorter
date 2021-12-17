<?php

/**
 * TripSorter is a class that process to calculate the path from starting location to destination
 * 
 * Class TripSorter
 */
class TripSorter 
{
    private $boardingCardSet = [
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
    public function getPath($from, $to) 
    {
        return $this->calculatePath($from, $to);
    }

    /** 
     * To calculate the path that form starting point to destination
     * 
     * @param string $from starting point
     * @param string $to destination
     * @param array $path to store current path
     * @return array the path from starting point to destination, return empty array [] if path not found
     * @access private
     */
    private function calculatePath($from, $to, $path = []) 
    {
        $lastPath = end($path);
        $lastTo = isset($lastPath['to']) ? $lastPath['to'] : $from;

        if($path) {
            $destinationList = array_merge(array_column($path, 'from'), array_column($path, 'to'));
        } else {
            $destinationList = [];
        }

        $nextPath = [];
        
        foreach ($this->boardingCardSet as $row) {
            // To prevent back to previous destination
            if (!in_array($to, $destinationList)) {
                if ($row['from'] == $lastTo) {
                    $nextPath = $row;
                }
            }

            if ($row['from'] == $lastTo && $row['to'] == $to) {
                $path[] = $row;
                return $path;
            }
        }

        if ($nextPath) {
            $path[] = $nextPath;
            return $this->calculatePath($lastTo, $to, $path);
        }

        return [];
    }
}
?>