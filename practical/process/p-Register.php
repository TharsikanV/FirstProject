<?php

    
    include "classes/Helper.php";
    $msg='';
    $email='';
    $Pname='';
    $h=new Helper();
    if(isset($_POST['register']))
    {   
        $email=$_POST['email'];
        $Pname=$_POST['Profile-name'];
       
        if($h->isEmpty( array($email,$Pname,$_POST['password'],$_POST['confirm-password'])))
        {
            $msg="All field are requerd";
        }
        else if(!$h->isPasswordMatch($_POST['password'],$_POST['confirm-password']))
        {
            $msg="password must match";
        }
        else if(!$h->isValidEmail($email))
        {
            $msg="Enter the valid email";
        }
        else
        {   
            if($h->isDuplicateEmail($email))
            {
                $msg="Email is already exist";
            }
            else
            {   
                $h->insertIntoFriendsDB($email,$Pname,$_POST['password']);
                header("Location: index.php");
            }
            
        }
    }
?>