<?php
    session_start();
    
    if(isset($_SESSION['user_id'])){
        header('Location: /home.php');
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
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://invoice-thedon411.c9users.io/">Invoice Portal</a>
                </div>
            </div>
        </nav>
        
        <!--Login Form-->
        <div class="container">
            <div class="container">
                <div class="col-xs-4">
                    
                </div>
                <div class="col-xs-4">
                    <h2>Login</h2>
                </div>
                <div class="col-xs-4">
                    
                </div>
            </div>
            <form class="form-horizontal" action="db_verify.php" method="post">
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2" for="email">Email:</label>
                    <div class="col-xs-4">
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="col-xs-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2" for="pwd">Password:</label>
                    <div class="col-xs-4">
                        <input type="password" class="form-control" name="pwd" placeholder="Enter password">
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
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
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
                    <div class="col-xs-offset-2 col-xs-4">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                    <div class="col-xs-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
            </form>
        </div>
        
        <?php if(isset($_SESSION['errors'])): ?>
            <div class="container">
                <div class="form-errors">
                    <?php foreach($_SESSION['errors'] as $error): ?>
                        <p><?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif; ?>
    </body>
</html>