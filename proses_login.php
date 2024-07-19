<?php 

session_start(); 

include("config.php"); 

$username = $_POST['username']; 
$password = $_POST['password']; 

$sql = "SELECT password FROM member WHERE username = (?)"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

if($stmt->num_rows()){
    $stmt->bind_result($hashed);
    $stmt->fetch();

    if(password_verify($password, $hashed)){
        header("Location: a.php");
    } else{
        echo "Invalid password";
    }}
    $stmt->free_result();
    $stmt->close();
?>