<?php 

$servidor = '127.0.0.1';
$userbd = 'ema';
$passdb = '123456';
$dbname = 'mydb';

$conn = new mysqli($servidor, $userbd, $passdb, $dbname);

if($conn->connect_error) {
    echo $error -> connect_error;
}

$conn->set_charset("utf8");

?>