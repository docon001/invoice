<!DOCTYPE html>
<html>
    <head>
        <title>Add Client</title>
    </head>
    <body>
        <!--Add new client form-->
        <form action="db_add_client.php" method="post">
            Address:<input type="text" name="address"/> <br/>
            City:<input type="text" name="city"/> <br/>
            State:<input type="text" name="state"/> <br/>
            Zip Code:<input type="text" name="zip"/> <br/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>