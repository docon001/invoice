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
        <script src="../scripts/js/dropdown.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css">
    </head>
    <body>
        
        <div class="container">
            <div class="col-xs-4">
                <!--Intentionally Empty-->
            </div>
            <div class="col-xs-4">
                <h2>Your balance</h2>
            </div>
            <div class="col-xs-4">
                <!--Intentionally Empty-->
            </div>
        </div>
        <div class="container">
            <table class="table table-bordered" id="balance_table">
                <thead>
                    <tr>
                        <th>Transaction Number</th>
                        <th>Admin Authorization</th>
                        <th>Amount</th>
                        <th>Memo</th>
                        <th>Date</th>
                    </tr>
                </thead>
                
            </table>
        </div>
        
        <script>
            var request = new XMLHttpRequest();
            request.onload = function()
            {
                var json = JSON.parse(this.response);
                var table = document.getElementById("balance_table");
                var i;
                for(Object in json)
                {
                    var row = table.insertRow();
                    var transaction = row.insertCell();
                    transaction.innerHTML = json[Object].transactionID;
                    var admin = row.insertCell();
                    admin.innerHTML = json[Object].adminID;
                    var amount = row.insertCell();
                    amount.innerHTML = json[Object].amount;
                    var memo = row.insertCell();
                    memo.innerHTML = json[Object].memo;
                    var date = row.insertCell();
                    date.innerHTML = json[Object].dateTime;
                }
            };
            
            request.open("post", "../scripts/db/db_check_balance.php", true);
            
            request.send();
        </script>
    </body>
</html>