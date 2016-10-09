<?php include_once("db.php") ?>

<?php 

    session_start();

    $id = 0;
    $first_name = $_POST['first_name'];     //Pull all data from form
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];              
    $standard_user = 0;                     //DB default for users
    
    $sql = "INSERT INTO users VALUES ($id,'$first_name','$last_name','$email','$password',$standard_user)";

    
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
        header('Location: /');
    }
    catch (PDOException $e) {
        if ($e->errorInfo[1] == $sqlUniqueException) {
            header( 'Location: ../../webpages/register.php' );
        }
    }
    
    /*  
    Outdated method, however code is valid
    
    $query = mysqli_query($connection, $sql);
    if(!query)
    {
        echo "Failed".mysqli_error();
    }
    else 
    {
        echo "Success";
    }*/
?>