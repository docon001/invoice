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
        <title>Invoice System</title>
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
                $( "#user" ).autocomplete({
                    source: '../scripts/frontend/autocomplete.php',
                    select: function(event, ui){
                        //Assigns the name and id to their respective fields
                        $('#id').val(ui.item.value);
                        $('#user').val(ui.item.label);
                        //Selects the default radio button based on whether the user is a superuser or normal user
                        $(function(){
                            $('input[name=usertype][value=' + ui.item.usertype + ']').prop('checked',true)
                        });
                        return false;
                    }
                });
            });
        </script>
        
        <div class="container">
            <div class="container">
                <div class="col-xs-3 col-md-4">
                    
                </div>
                <div class="col-xs-6 col-md-4">
                    <h2>Modify User</h2>
                </div>
                <div class="col-xs-3 col-md-4">
                    
                </div>
            </div>
            <form class="form-horizontal" action="../scripts/db/db_modify_superuser.php" method="post">
                <div class="form-group">
                    <div class="col-xs-1 col-md-2">
                        <!--Intentionally Empty-->
                    </div>
                    <label class="control-label col-xs-2 col-md-2" for="email">User:</label>
                    <div class="col-xs-8 col-md-4">
                        <div class="ui-widget">
                            <input type="text" class="form-control" id="user" name="user" placeholder="User search" required>
                        </div>
                    </div>
                    <div class="col-xs-1 col-md-4">
                        <!--Intentionally Empty-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-2 col-md-4">
                        <!--Intentionally Empty-->
                    </div>
                    <div class="col-xs-8 col-md-4">
                        <input type="radio" name="usertype" value="1"/> Super User
                        <input type="radio" name="usertype" value="0"/> Normal User
                    </div>
                    <div class="col-xs-2 col-md-4">
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
                <!--This group holds the ID of the user that we want to modify access for-->
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
        </div>
    </body>
</html>