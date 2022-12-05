<?php
    $conn = mysqli_connect("localhost:3307", "root", "", "db_esp32");

    $suhu = $_GET['suhu'];
    $lembap = $_GET['lembap'];

    mysqli_query($conn, "ALTER TABLE tbl_dht AUTO_INCREMENT=1");

    $simpan = mysqli_query($conn, "INSERT INTO tbl_dht (temperature, humidity) VALUES ('$suhu','$lembap')");

    if($simpan)
        echo "Success";
    else
        echo "Failed";

?>