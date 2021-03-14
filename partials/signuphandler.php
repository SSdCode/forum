<?php
    include("dbconnect.php");
    
    $showAlert=false;
    $_SESSION['loggedin']=false;
    error_reporting(0);

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $bdate=$_POST['bdate'];
    $gender=$_POST['gender'];
    $add1=$_POST['add1'];
    $add2=$_POST['add2'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    
    // $usercreate=false;
    // $passmatch=false;
    // $allempty=false;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($fname!="" & $lname!="" & $bdate!="" & $gender!="" & $add1!="" & $add2!="" & $email!="" & $pass!="" & $cpass!=""){
            if($pass == $cpass){
                include "partials/_db.php";
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $existQry="SELECT * FROM `userdetails` WHERE `email` = '$email'";
                $checkexist=mysqli_query($conn,$existQry);
                $no=mysqli_num_rows($checkexist);

                if($no >= 1){
                    $showError="User Already Exist.";
                    $showAlert=true;
                    echo $showError;
                }else{
                    $query="INSERT INTO `userdetails` (`fname`, `lname`, `bdate`, `gender`, `address1`, `address2`, `email`, `password`) VALUES  ('$fname','$lname', '$bdate', '$gender', '$add1', '$add2', '$email', '$hash')";
                
                    $data=mysqli_query($conn,$query);

                    if($data){
                        // $_SESSION['username']=$email;
                        // $_SESSION['loggedin']=true;
                        header("location: ../index.php?signup=true");
                        exit();
                    }else{
                        $showAlert=true;
                        $showError="New user creation failed.";
                        header("location: ../index.php?signup=false&showerror='$showError'");
                        exit();
                        echo $showError;
                    }
                }            
            }else{            
                $showAlert=true;
                $showError="Password Not Match.";
                header("location: ../index.php?signup=false&showerror='$showError'");
                exit();
                echo $showError;
            }
        }else{
            $showAlert=true;
            $showError="All fields Required.";
            header("location: ../index.php?signup=false&showerror='$showError'");
            exit();
            echo $showError;
        }  
    }

?>