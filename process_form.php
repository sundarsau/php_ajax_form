<?php
include "cfg/dbconnect.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);

if (!empty($name) && !empty($email) && !empty($address)){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        try{
            $sql = "insert into users(name, email, address) values (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",$name, $email, $address);
            $stmt->execute();
            echo "success";
            // echo "Data Inserted successfully";
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    else{
        echo "Invalid email format";
    }
}
else{
    echo "All fields are manadatory";
}
