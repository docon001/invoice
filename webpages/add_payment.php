<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('Location: /');
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="webpages/stylesheets/stylesheet.css">
    </head>
    <body>
        <script>
            $(function() {
                $( "#client" ).autocomplete({
                    source: '../scripts/frontend/autocomplete.php'
                });
            });
        </script>
        <nav class="navbar navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Invoice Portal</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="addclient.php">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="profileButton"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name'] ?></a></li>
                        <li><a id="logOutButton" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!--Add Payment Form-->
        <div class="container">
            <div class="container">
                <div class="col-xs-4">
                    
                </div>
                <div class="col-xs-4">
                    <h2>Add Payment</h2>
                </div>
                <div class="col-xs-4">
                    
                </div>
            </div>
            <form class="form-horizontal" action="../scripts/db/db_payment.php" method="post">
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2" for="email">Client:</label>
                    <div class="col-xs-4">
                        <div class="ui-widget">
                            <input type="text" class="form-control" id="client" name="client" placeholder="Client search" required>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2" for="pwd">Amount:</label>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" name="payment" placeholder="Enter amount" required>
                    </div>
                    <div class="col-xs-4">
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
            </form>
        </div>
    </body>
</html>