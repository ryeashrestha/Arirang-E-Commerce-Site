<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $checkEmail="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows > 0){
        echo "Email Address Already Exists!";
    }
    else{
        $insertQuery="INSERT INTO users (userName, email, password) VALUES ('$userName','$email','$password')";
        if($conn->query($insertQuery) === TRUE){
            header("Location: index.php");
        }
        else{
            echo "Error: ".$conn->error;
        }
    }
}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password);
   
   $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows > 0){
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }
}
?>
