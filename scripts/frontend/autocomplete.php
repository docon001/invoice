<?php
    include_once("../db/db.php");
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $sql = "SELECT id, firstName, lastName, userType FROM users WHERE firstName LIKE '$searchTerm%' OR lastName LIKE '$searchTerm%' ORDER BY firstName, lastName";

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
            $obj->label = $result['firstName']. " " .$result['lastName'];
            $obj->value = $result['id'];
            $obj->usertype = $result['userType'];
            $data[] = $obj;
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    //return json data
    echo json_encode($data);
?>