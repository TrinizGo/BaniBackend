<?php
include "db_connection.php";

$sql = "SELECT pwd FROM bp3login WHERE email = ?";
$response = array();

if($stmt = $con->prepare($sql))
{
    $email = strtolower(filter_var($_REQUEST['email'],FILTER_SANITIZE_STRING));
    $pass = md5(filter_var($_REQUEST['pwd'],FILTER_SANITIZE_STRING));
    $stmt->execute(array($email));
    if($stmt->rowCount()>0)
    {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data['pwd'] == $pass)
        {
            $response =
                [
                    ['success'] => 1,
                    ['message'] => "Je bent ingelogd!"
                ];
        }else
            {
                $response =
                    [
                        ['success'] => 0,
                        ['message'] => "Verkeerd wachtwoord!"
                    ];
            }
    }else
        {
            $response =
                [
                    ['success'] => 0,
                    ['message'] => "No user found"
                ];
        }
}else
{
    $response =
        [
            ['success'] => 0,
            ['message'] => $con->errorInfo()
        ];
}

