<?php


class Cards 
{
    public function __construct()
    {

    }

    public function getCardsData()
    {
        $fileName = __DIR__ . "/../cards.json";
        
        $file = fopen($fileName, "r") or die("Unable to open file!");
        $data = fread($file,filesize($fileName));
        fclose($file);

        return json_decode($data, true);
    }
}
?>