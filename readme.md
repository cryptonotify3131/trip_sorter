# TRIP SORTER
This project is to calculate the path from Starting Point to Destination

### How to test the code
1. Enable the XAMPP Control Panel.
3. Please use POST method for execute this URL, [http://localhost/trip_sorter/](http://localhost/trip_sorter/ "Trip Sorter")
2. Parameter request:<br />
   a. 'cards' = json format of the unordered cards<br />
               Info in each set of cards data<br />
               i.   'from' = Starting Point<br />
               ii.  'to' = Destination<br />
               iii. 'transport_type' = Type of Transportation, eg: 'train', 'bus', 'flight'<br />
               iv.  'transport_number' => Plate Number/ Flight Number for Transportation, may leave blank if no Plate Number/ Flight Number<br />
               v.   'seat' => Seat No, may leave blank if no Seat No. or no arrangement<br />
