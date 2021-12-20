<?php

namespace App\Services;

use App\Models\Cards;

/**
 * TripSorter is a class that process to sorting the borading cards path from starting location to destination
 * 
 * Class TripSorter
 */
class TripSorter 
{
    function __construct()
    {

    }
    
    /** 
     * @param array $cards collection of unsorted boarding cards
     * @return array the path from starting point to destination
     */
    public function getPath() 
    {
        $cards = new Cards();
        $cardList = $cards->getCardsData();
        return $this->arragePath($cardList);
    }

    /** 
     * To sorting the borading cards path form starting point to destination
     * 
     * @param array $cards collection of unsorted boarding cards
     * @param array $path collection of sorted boarding cards
     * @return array the path from starting point to destination
     * @access private
     */
    private function arragePath($cards, $path = []) 
    {
        if($path) {
            $start = end($path)['to'];
        } else {
            $start = array_diff(array_column($cards, 'from'), array_column($cards, 'to'));
            $start = $start ? $start[0] : $cards[0]['from'];
        }
        
        if($cards) {
            foreach ($cards as $key => $row) {
                if ($row['from'] == $start) {
                    $path[] = $row;
                    unset($cards[$key]);
                    return $this->arragePath($cards, $path);
                }
            }
        }

        return [
            'cards' => $cards,
            'path' => $path
        ];
    }
}
?>