<?php 
    include_once("db.php");

    session_start();
    
    $user_id = $_SESSION['user_id'];
    
    $sql = "SELECT * FROM transactions WHERE payerID = $user_id";
    
    //Attempt to connect to the DB
    try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    
    //Attempt to query the DB
    try {
        //Set PDO attributes so exceptions are thrown in case of error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user_array = $pdo->query($sql);
        //Fetch data so that it can be collected as strings
        while($result = $user_array->fetch(PDO::FETCH_ASSOC))
        {
            $obj = new StdClass();
            $obj->transactionID = $result['transactionID'];
            $obj->adminID = $result['adminID'];
            $obj->amount = $result['amount']/100;
            $obj->memo = $result['memo'];
            $obj->dateTime = $result['datetime'];
            
            $data[] = $obj;
        }
        
        foreach($data as $adminName)
        {
            $adminID = $adminName->adminID;
            $sql = "SELECT firstName, lastName FROM users where ID = $adminID";
            $user_array = $pdo->query($sql);
            $result = $user_array->fetch(PDO::FETCH_ASSOC);
            $adminName->adminID = $result['firstName']." ".$result['lastName'];
        }
        
        
        $_SESSION['errors'] = NULL;
        
        echo json_encode($data);
        
    }
    catch (PDOException $e)
    {
        echo json_encode("error");
    }

?>