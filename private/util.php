<?php

function style($tag) {
    if ($tag == 'h1') {
        echo "style='text-shadow: 2px 2px 2px white;'" ;
    }
}

function db_connect($cert_path) {
    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, $cert_path, NULL, NULL);
    mysqli_real_connect($conn, 'ercc-db.mysql.database.azure.com', 'ayush@ercc-db', 'Cnusd314361', 'ercc_db', 3306, MYSQLI_CLIENT_SSL);
    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    } else {
        echo "yess";
        return $conn;
    }
}