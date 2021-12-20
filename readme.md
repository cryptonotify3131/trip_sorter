# TRIP SORTER
This project is to sorting the path from Starting Point to Destination<br />
Here is sample page: [http://localhost/trip_sorter/](http://localhost/trip_sorter/ "Trip Sorter Page")

### How to add new cards
1. Please add new card in app/cards.json file
2. Info in each set of cards data
   - 'from' = Starting Point
   - 'to' = Destination
   - 'transport_type' = Type of Transportation, eg: 'train', 'bus', 'flight'
   - 'transport_number' => Plate Number/ Flight Number for Transportation, may leave blank if no Plate Number/ Flight Number
   - 'gate' => Gate No, may leave blank if no Seat No. or no arrangement
   - 'seat' => Seat No, may leave blank if no Seat No. or no arrangement
   - 'bagagge_drop_counter' => Counter of bagagge drop off
   - Other detail that you needed to deisplay more detail

### How to add new type of transportation
1. You may duplicate a file at app/Services/Transports, **(expect Transport.php)** and rename the file name & class name as new type of transportation.
2. You may adjust the **getSentence** function to display more info
3. Please make sure the 'transport_type' field in app/cards.json is same with the class name.

