<?php

function db_connect($cert_path) {
    $conn = mysqli_init();
    mysqli_ssl_set($conn,NULL,NULL, $cert_path, NULL, NULL);
    mysqli_real_connect($conn, 'ercc-db.mysql.database.azure.com', 'ayush@ercc-db', 'Cnusd314361', 'ercc_db', 3306, MYSQLI_CLIENT_SSL);
    if ($conn) {
        return $conn;
    } else {
        die('Failed to connect to MySQL: '. mysqli_connect_error());
    }
}

function db_disconnect($conn) {
    if (isset($conn)) {
        mysqli_close($conn);
    }
}

function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}