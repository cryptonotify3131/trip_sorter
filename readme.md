# TRIP SORTER
This project is to calculate the path from Starting Point to Destination

### How to test the code
1. Enable the XAMPP Control Panel.
2. Keyin [http://localhost/trip_sorter?from=XXX&to=XXX](http://localhost/trip_sorter?from=XXX&to=XXX "Trip Sorter") to start the test<br />
   a. 'from' = Starting Point<br />
   b. 'to' = Destination
3. To change the 'from' and 'to' variable in URL to test other path

### How to add new Type of Transportation
You may add new set of data to $boardingCardSet varaible in TripSorter.php (line 10)<br />
The data required for new data set is:
1. 'from' = Starting Point
2. 'to' = Destination
3. 'transport_type' = Type of Transportation, eg: 'train', 'bus', 'flight'
4. 'transport_number' => Plate Number/ Flight Number for Transportation, may left blank if no Plate Number/ Flight Number
5. 'seat' => Seat No, may left blank if no Seat No. or no arrangement
