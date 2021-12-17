<html>
    <body>
        <form>
            <?php $cards = isset($_POST['cards']) ? $_POST['cards'] : '[{"from":"Madrid","to":"Barcelona","transport_type":"train","transport_number":"78A","seat":"45B"},{"from":"Stockholm","to":"New York","transport_type":"flight","transport_number":"SK22","seat":"7B"},{"from":"Gerona","to":"Stockholm","transport_type":"flight","transport_number":"SK455","seat":"3A"},{"from":"Barcelona","to":"Gerona","transport_type":"airport bus","transport_number":"","seat":""}]'; ?>
            Cards (JSON format) : <br>
            <textarea id="txtCards" name="txtCards" rows="10" cols="50"><?= $cards ?></textarea><br>
            <button type="button" onclick="showPath()">Submit</button>
        </form>
        <br>
        Description: <b><div id="txtDesc"></div></b>

    </body>

    <script>
        showPath();
        function showPath() {
            var cards = document.getElementById("txtCards").value;
            
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("txtDesc").innerHTML = this.responseText;
            }
            xhttp.open("POST", "main.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("cards=" + cards);
            
        }
    </script>
</html>