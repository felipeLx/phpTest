<?php
    $conn = new mysqli("localhost", "root", "root", "contacts");

    if($conn->connect_error) {
        die("Connect failed".$conn->connect_error);
    }
?>