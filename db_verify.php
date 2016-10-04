<?php include_once("db.php") ?>

<?php
    session_start();
    
    if(isset($_SESSION['user_id'])){
       header('Location: /home.php');
    }
?>

<?php 
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    #$email = stripslashes($_POST["email"]); 
    #$email = mysqli_real_escape_string($connection, $email);

    #$password = stripslashes($_POST["password"]); 
    #$password = mysqli_real_escape_string($connection, $password);
    
    #$query = mysqli_query($connection, "SELECT email, password FROM users WHERE email = '".$email."' AND  password = '".$password."'");

    $sql = "SELECT id, firstName, lastName FROM users WHERE email = '$email' AND password = '$password'";
    
    try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user_array = $pdo->query($sql);
        $result = $user_array->fetch(PDO::FETCH_ASSOC);
        if($result['id'] == '')
        {
            $_SESSION['errors'] = array("Invalid Login");
            header('Location: /login.php');
            exit();
        }
        $_SESSION['errors'] = NULL;
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['name'] = $result['firstName'] . ' ' . $result['lastName'];
        header('Location: /home.php');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        if ($e->errorInfo[1] == $sqlUniqueException) {
            header( 'Location: /login.php' );
            exit();
        }
        header('Location: /login.php');
    }
/*
    while($row=mysqli_fetch_assoc($query))
    {
        $check_username=$row['email'];
        $check_password=$row['password'];
    }
    
    if($email == $check_username && $password == $check_password)
    {
        echo "email is " .$email. "and" .$check_username;
        echo "Matches.";
    }
    else{
        header( 'Location: https://invoice-thedon411.c9users.io/login.php' ) ;
    }
*/
?>