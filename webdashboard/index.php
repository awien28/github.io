<!DOCTYPE html>
<html>
<head>
    <title>Realtime Monitoring Sensor</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" type="text/css" href="assets/css/boorstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery-latest.js"></script>

    <!-- call data grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $('#responsecontainer').load('data.php');
        }, 5000);
    </script>
</head>

<body>
    <!-- tempat untuk paparan grafik -->
    <div class="container" style="text-align:center;">
        <h3>IoT Dashboard for DHT Sensor</h3>
        <p>(Data shows the last 8 data)</p>
    </div>
   
    <!--div for grafik -->
    <div class="container">
        <div class="container" id="responsecontainer" style="width:80%; text-align:center"></div>
    </div>

    <!-- for display image -->
    <!-- <div class="container" style="text-align:center;"> -->
        <!-- <img src="assets/img/icon2.png"> -->
    <!-- </div> -->

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>