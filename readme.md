# TRIP SORTER
This project is to calculate the path from Starting Point to Destination

### How to test the code
1. Enable the XAMPP Control Panel.
2. Keyin [http://localhost/trip_sorter/](http://localhost/trip_sorter/ "Trip Sorter") to start the test
3. To change the Starting Point and Destination, you may change it at index.php (line 3)

### How to add new Type of Transportation
You may add new set of data to $boarding_card_set varaible in index.php (line 20)
The data required for new data set is:
1. 'from' = Starting Point
2. 'to' = Destination
3. 'transport_type' = Type of Transportation, eg: 'train', 'bus', 'flight'
4. 'transport_number' => Plate Number/ Flight Number for Transportation, may left blank if no Plate Number/ Flight Number
5. 'seat' => Seat No, may left blank if no Seat No. or no arrangement
