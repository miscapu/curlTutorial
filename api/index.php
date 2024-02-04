<?php
include_once './connection.php';

// create header for return JSON
header( "Content-type: application/json;charset=urf-8" );

// Buscando os registros da base de dados
//$query_users    =   "SELECT id, name FROM users WHERE id = 100";
$query_users    =   "SELECT id, name FROM users";

// Prepare query
$result_users   =   $conn->prepare( $query_users );

// execute query using PDO
$result_users->execute();

// conditional for know if find all registers
if ( ( $result_users ) and ( $result_users->rowCount() != 0 ) )
{
    // read registers
    $users  =   $result_users->fetchAll();
    //var_dump( $users );
    echo json_encode( [ 'status'    =>  200, 'dados'    =>  $users ] );

}else{
    echo json_encode( [ 'status'    =>  404, 'msg'  =>  "Erro: Dont registers" ] );
}