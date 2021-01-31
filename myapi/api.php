<?php
    try {
        $dbconn = pg_connect("host=localhost port=54386 dbname=db_ulamamaps user=postgres password=wifda");
    } Catch (Exception $e) {
        echo $e->getMessage();
    }
?>