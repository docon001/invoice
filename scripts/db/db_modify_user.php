<?php 
    include_once("db.php");

    session_start();
    
    $id = $_POST['id'];
    $usertype = $_POST['usertype'];
    
    $sql = "UPDATE users SET userType = $usertype WHERE ID = $id";

    
    try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->query($sql);
        //header('Location: ../../webpages/add_super_user.php');
        $response_array['status'] = 'success';
        header('Content-type: application/json');
        echo json_encode($response_array);
    }
    catch (PDOException $e) {
        if ($e->errorInfo[1] == $sqlUniqueException) {
            //header( 'Location: ../../webpages/add_super_user.php' );
        }
    }

?>