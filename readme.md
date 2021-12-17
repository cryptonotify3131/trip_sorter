# TRIP SORTER
This project is to calculate the path from Starting Point to Destination

### How to test the code
1. Enable the XAMPP Control Panel.
3. Please use POST method for execute this URL, [http://localhost/trip_sorter/](http://localhost/trip_sorter/ "Trip Sorter")
2. Parameter request:<br />
   a. 'card' = json format of the unordered cards<br />
               Info in each set of cards data
               i.   'from' = Starting Point
               ii.  'to' = Destination
               iii. 'transport_type' = Type of Transportation, eg: 'train', 'bus', 'flight'
               iv.  'transport_number' => Plate Number/ Flight Number for Transportation, may leave blank if no Plate Number/ Flight Number
               v.   'seat' => Seat No, may leave blank if no Seat No. or no arrangement