<?php
    // connection
    $conn = mysqli_connect("localhost:3307", "root", "", "db_esp32");

    // read data from tb_sensor table

    // baca ID tertinggi
    $sql_ID = mysqli_query($conn, "SELECT MAX(ID) FROM tbl_dht");
    // fetch the data
    $data_ID = mysqli_fetch_array($sql_ID) ;
    // ambil ID terakhir
    $ID_last = $data_ID['MAX(ID)'];
    $ID_awal = $ID_last - 7 ;
   


    // read 8 last data
    $date = mysqli_query($conn, "SELECT date FROM tbl_dht WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC");
    // read information temperature for 5 last data
    $temp = mysqli_query($conn, "SELECT temperature FROM tbl_dht WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC");
    // read information humidity 5 last data
    $humi = mysqli_query($conn, "SELECT humidity FROM tbl_dht WHERE ID>='$ID_awal' 
        and ID<='$ID_last' ORDER BY ID ASC")
?>

<!-- grafik display -->
<div class="panel panel-primary">
    <div class="panel-heading">
    RealTime Sensor Data
    </div>

    <div class="panel-body">
        <!-- canvas for grafik -->
        <canvas id="myChart"></canvas>

        <!-- gambar grafik -->
        <script type="text/javascript">
        // baca ID canvas tempat grafik akan diletakkan
        var canvas = document.getElementById('myChart');
        // letakkan data date dan suhu untuk grafik
        var data = {
            labels : [
                <?php
                    while($data_date = mysqli_fetch_array($date))
                    {
                        echo '"'.$data_date['date'].'",' ;
                    }
                ?>
            ],
            datasets : [
            {
                label : "temperature",
                fill : true,
                backgroundColor : "rgba(0, 0, 255, 0.5)",
                borderColor : "rgba(52, 231, 43, 1)",
                lineTension : 0.5,
                pointRadius : 5, 

                data : [
                    <?php
                        while($data_temp = mysqli_fetch_array($temp))
                        {
                            echo $data_temp['temperature'].',' ;
                        }
                    ?>
                ]
            },
            {
                label : "humidity",
                fill : true,
                backgroundColor : "rgba(255, 0, 0, 0.5)",
                borderColor : "rgba(0, 0, 0, 1)",
                lineTension : 0.5,
                pointRadius : 5, 

                data : [
                    <?php
                        while($data_humi = mysqli_fetch_array($humi))
                        {
                            echo $data_humi['humidity'].',' ;
                        }
                    ?>
                ]
            }
            ]

        } ;

        // option grafik
        var option = {
            showLines : true,
            animation : {duration : 0}
        } ;

        // cetak grafik kedalam canvas
        var myLineChart = Chart.Line(canvas, {
            data : data,
            options : option
        }) ;

       </script>

    </div>
</div>