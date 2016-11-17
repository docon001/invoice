<?php
    include_once("navbar.php");
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('Location: /');
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Invoice System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="../scripts/js/errors.js"></script>
        <script src="../scripts/js/dropdown.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css">
    </head>
    <body>
        
        <?php if(isset($_SESSION['errors'])): ?>
            <div class="container">
                <div class="col-xs-5">
                    <!--Intentionally Empty-->
                </div>
                <div class="col-xs-3">
                    <div class="errorBox" style="display:none">
                        <?php foreach($_SESSION['errors'] as $error): echo $error ?>
                            <script>display_messages();</script>
                        <?php endforeach ?>
                        <?php $_SESSION['errors'] = NULL ?>
                    </div>
                </div>
                <div class="col-xs-4">
                    <!--Intentionally Empty-->
                </div>
            </div>
        <?php endif; ?>
    </body>
</html>