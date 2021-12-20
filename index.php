<html>
    <body>
       
        Description: <b><div id="txtDesc"></div></b>

    </body>

    <script>
        showPath();
        function showPath() {
            
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("txtDesc").innerHTML = this.responseText;
            }
            xhttp.open("POST", "TripSorter/main.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
            
        }
    </script>
</html>