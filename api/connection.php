<?php
// credentials for access database
$host   =   'localhost';
$user   =   'root';
$pass   =   'root';
$dbname =   'curl';
$port   =   3306;

try {
    // Connection with port
    $conn   =   new PDO( "mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass );
    //echo "ok";

}catch( PDOException $err )
{
    die( "Erro: Connnection refused" . $err->getMessage() );
}
