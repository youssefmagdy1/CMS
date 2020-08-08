<?php 

$dp['db_host']= 'localhost';
$dp['db_user'] = 'root';
$dp['db_pass'] = '';
$dp['db_name'] = 'cms';

foreach($dp as $key =>$value ){
    define(strtoupper($key),$value) ;
}

$conn =  mysqli_connect(DB_HOST , DB_USER ,DB_PASS ,DB_NAME );

if (!$conn)
    //echo "done" ;
    die("error happed".mysqli_error($conn) );



?>
