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
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        
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
                        <li><a id="registerButton"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a id="loginButton"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!--Login Modal-->
        <div class="container">
            
            <!-- Modal -->
            <div class="modal fade" id="loginModal" role="dialog">
                <div class="modal-dialog">
    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <form action="db_verify.php" role="form" method="post">
                                <div class="form-group">
                                    <label for="email"><span class="glyphicon glyphicon-user"></span> Username</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                    <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="" checked>Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <p>Not a member? <a href="register.php">Sign Up</a></p>
                            <p>Forgot <a href="#">Password?</a></p>
                        </div>
                    </div>
      
                </div>
            </div>
        </div>
        
        <!--Register Modal-->
        <div class="container">
            <form name="registerForm" action="db_add_user.php" role="form" method="post" onsubmit="return validate_register()">
            <!-- Modal -->
            <div class="modal fade" id="registerModal" role="dialog">
                <div class="modal-dialog">
    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-folder-open"></span> Register</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <div class="form-group">
                                <label for="name"><span class="glyphicon glyphicon-briefcase"></span> Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd_confirm" placeholder="Confirm password" required>
                            </div>
                                
                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            
                            <!--Hidden error message if passwords don't match-->
                            <div class="passwordError" style="display:none">Passwords don't match!</div>
                        </div>
                    </div>
                
                </div>
            </div>
            </form>
        </div>
        
        <!--Scripts-->
        <script>
            $(document).ready(function(){
                $("#loginButton").click(function(){
                    $("#loginModal").modal();
                });
                
                $("#registerButton").click(function(){
                    $("#registerModal").modal();
                });
            });
        </script>
        
        <script>
            function validate_register()
            {
                var password = document.forms["registerForm"]["pwd"].value;
                var password_confirm = document.forms["registerForm"]["pwd_confirm"].value;
                
                if(password != password_confirm)
                {
                    $('.passwordError').fadeIn(400).delay(2000).fadeOut(400);
                    return false;
                }
            }
        </script>
    </body>
</html>