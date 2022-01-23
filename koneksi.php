<?php

$koneksi = mysqli_connect("localhost", "root", "", "tugas_web_1");

// Check connection
if ($koneksi === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}