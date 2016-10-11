<?php include_once("db.php") ?>

<?php
    
    $id = 0;
    $address = $_POST['address'];
    $address_num = preg_replace("/[^0-9]/","",$address);
    $street = preg_replace('!\d+!', "", $address);
    
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    
    $sql = "INSERT INTO addresses VALUES (".$id.",'".$address_num."','".$street."','".$city."','".$state."',".$zip.")";
    $query = mysqli_query($connection, $sql);
    
    if(!$query)
    {
        echo "Failed".mysqli_error();
    }
    else
    {
        echo "Successful";
    }
    

?>