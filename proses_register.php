<?php
    session_start();
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert data ke tabel member
    $sql = "INSERT INTO member (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if($stmt->execute()){
        echo "Pendaftaran berhasil. Silahkan <a href='index.php'>Login</a>";
    }else {
        echo "Error:".$sql."<br>".$conn->error;
    }

    $stmt->close();
    }
    $conn->close();
?>