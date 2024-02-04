<?php
/**
 * @author MiSCapu
 * @since 03.02.2024
 * @example Curl step by step
 * @link https://www.youtube.com/watch?v=xa7mgOT_US4
 *
 *
 * 1. Criar a estrutura de pastas
 * 2. Criar a conexaão com a base de dados ( criar antecipadamente uma e adicionar registros )
 * 3. include connection in api/index.php
 * 4.
 */

// indicate url of API
$url    =   "http://localhost:8888/Curl/api/index.php";

// Initialize curl
$ch =   curl_init();

// Use CURL_OPT for wait response of url
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

// send request
curl_setopt( $ch, CURLOPT_URL, $url );

// execute the request curl
$dados  =   curl_exec( $ch );


// close session
curl_close( $ch );


// print data
//var_dump( $dados );

// convert string in array
$users  =   json_decode( $dados, false );
//var_dump( $users );

if ( $users->status ==  200 )
{
    foreach ( $users->dados as $user )
    {
        //var_dump( $user );
        echo "User ID: ". $user->id ."<br>";
        echo "User Name: ". $user->name ."<br>";
        echo "<hr>";
    }
}else{
    echo "<p style='color: red'>". $users->msg ."</p>";
}