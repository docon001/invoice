<?php
    include_once("db.php");
    
    session_start();
    
    $transaction_id = 0;
    $name = $_POST['client'];
    $amount = $_POST['payment'];
    $admin_id = $_SESSION['user_id'];
    $payer_id = $_POST['id'];
    $memo = $_POST['memo'];
    $datetime = getDateTime();
    
    $amount *= 100;                         //Multiplying by 100 to convert all amounts into pennies
    
    $sql = "INSERT INTO transactions VALUES ($transaction_id,'$admin_id','$payer_id',$amount,'$memo','$datetime')";
    
    try {
        $pdo = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    
    if($_SESSION['userType'] == 'admin')
    {
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->query($sql);
            $_SESSION['errors'] = array("Payment Completed!");
            header('Location: ../../webpages/add_payment.php');
        }
        catch (PDOException $e) {
            $_SESSION['errors'] = array("Payment error");
            if ($e->errorInfo[1] == $sqlUniqueException) {
                header( 'Location: ../../webpages/add_payment.php' );
            }
        }
    }
    else
    {
        $_SESSION['errors'] = array("Unauthorized account");
        header('Location: ../../webpages/home.php');
    }
    
    function getDateTime()
    {
        $date = getdate();
        $formatted_date = $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
        return $formatted_date;
    }
?>