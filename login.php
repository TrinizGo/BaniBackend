<?php
include "db_connection.php";

$sql = "SELECT pwd FROM bp3login WHERE email = ?";
$response = array();

if($con->prepare($sql))
{

}else
{
    
}

