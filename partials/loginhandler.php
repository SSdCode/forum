<?php
    
    // error_reporting(0);


    $loginfailed=false;
    $empty=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
    require("dbconnect.php");

    $email= $_POST['useremail'];
    $pass=$_POST['password'];

    echo $email,$pass;
    if($email!="" & $pass!=""){
        // $query="SELECT * FROM `userdetails` where email='$email' AND password='$pass'";
        $query="SELECT * FROM `userdetails` where email='$email'";
        $data=mysqli_query($conn,$query);
        $no=mysqli_num_rows($data);

        if($no == 1){

            while($raw=mysqli_fetch_assoc($data)){
                if(password_verify($pass,$raw['password'])){
                    session_start();
                    $_SESSION['username']=$email;
                    $_SESSION['sno']=$raw['user_id'];
                    $_SESSION['fname']=$raw['fname'];
                    $_SESSION['lname']=$raw['lname'];
                    $_SESSION['loggedin']=true;
                    header("location: ../index.php?login=true");
                    exit();
                }else{
                    $loginfailed=true;
                    $loginerror="Invalide password";
                    header("location: ../index.php?login=false&showerror='$loginerror'");
                    exit();
                    echo $loginerror;
                }
            }

        }else{
            $loginfailed=true;
            $loginerror="Invalide Username or password.";
            header("location: ../index.php?login=false&showerror='$loginerror'");
            echo $loginerror;
        }
    }else{
        $empty=true;
        $loginerror="username or password empty.";
        header("location: ../index.php?login=false&showerror='$loginerror'");
        echo $loginerror;
    }

    }
?>