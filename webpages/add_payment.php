<?php
    include_once("navbar.php");
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('Location: /');
    }
    
    if($_SESSION['userType'] != 'admin')
    {
        header('Location: home.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Client</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../scripts/js/errors.js"></script>
        <script src="../scripts/js/dropdown.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="stylesheets/stylesheet.css">
    </head>
    <body>
        <script>
            $(function() {
                $( "#client" ).autocomplete({
                    source: '../scripts/frontend/autocomplete.php',
                    select: function(event, ui){
                        $('#id').val(ui.item.value);
                        $('#client').val(ui.item.label);
                        return false;
                    }
                });
            });
        </script>
        
        <!--Add Payment Form-->
        <div class="container">
            <div class="container">
                <div class="col-xs-3 col-md-4">
                    
                </div>
                <div class="col-xs-6 col-md-4">
                    <h2>Add Payment</h2>
                </div>
                <div class="col-xs-3 col-md-4">
                    
                </div>
            </div>
            <form class="form-horizontal" action="../scripts/db/db_payment.php" method="post">
                <div class="form-group">
                    <div class="col-xs-1 col-md-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2 col-md-2" for="email">Client:</label>
                    <div class="col-xs-8 col-md-4">
                        <div class="ui-widget">
                            <input type="text" class="form-control" id="client" name="client" placeholder="Client search" required>
                        </div>
                    </div>
                    <div class="col-xs-1 col-md-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-md-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2 col-md-2" for="pwd">Amount:</label>
                    <div class="col-xs-8 col-md-4">
                        <input type="number" step=0.01 class="form-control" name="payment" placeholder="Enter amount" autocomplete="off" required>
                    </div>
                    <div class="col-xs-1 col-md-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-1 col-md-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2 col-md-2" for="pwd">Memo:</label>
                    <div class="col-xs-8 col-md-4">
                        <textarea class="form-control" rows=5 name="memo" placeholder="Enter memo"></textarea>
                    </div>
                    <div class="col-xs-1 col-md-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <div class="col-xs-offset-2 col-xs-4">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                    <div class="col-xs-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <!--This group holds the ID of the user that we want to post a payment to-->
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <div class="col-xs-offset-2 col-xs-4">
                        <input type="hidden" class="form-control" name="id" id="id" >
                    </div>
                    <div class="col-xs-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                
            </form>
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
        </div>
    </body>
</html>