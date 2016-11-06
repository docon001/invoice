<?php include_once("db.php") ?>

<?php
    //Required header for all pages to ensure login security and fluidity
    session_start();
?>

<?php 
    //Pulls email and password from the login form
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    #$email = stripslashes($_POST["email"]); 
    #$email = mysqli_real_escape_string($connection, $email);

    #$password = stripslashes($_POST["password"]); 
    #$password = mysqli_real_escape_string($connection, $password);
    
    #$query = mysqli_query($connection, "SELECT email, password FROM users WHERE email = '".$email."' AND  password = '".$password."'");

    //Create the MYSQL statement to search for the login credentials
    $sql = "SELECT id, firstName, lastName, userType FROM users WHERE email = '$email' AND password = '$password'";
    
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
        $result = $user_array->fetch(PDO::FETCH_ASSOC);
        //Check for an empty set returned -> set login failure -> exit script
        if($result['id'] == '')
        {
            $_SESSION['errors'] = array("Invalid Login");
            header('Location: ../../webpages/login.php');
            exit();
        }
        //Otherwise clear errors, set the session ID and other variables and
        //redirect to the main homepage
        $_SESSION['errors'] = NULL;
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['name'] = $result['firstName'] . ' ' . $result['lastName'];
        if($result['userType'] == 1)
        {
            $_SESSION['userType'] = 'admin';
        }
        else {
            $_SESSION['userType'] = 'user';
        }
        header('Location: ../../webpages/home.php');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        header('Location: ../../webpages/login.php');
    }
?>