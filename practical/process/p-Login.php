<?php
    include "classes/Helper.php";
    $msg='';
    $eamil='';
    if(isset($_POST['login']))
    {
        $h=new Helper();
        $email=$_POST['email'];
        if($h->isEmpty(array($email,$_POST['password'])))
        {
            $msg="All field are request";
        }
        else if(!$h->isDuplicateEmail($email))
        {
            $msg="Enetr the currect Email";
        }
        else if(!$h->isCorrectPassword($email,$_POST['password']))
        {
            $msg="Enter the correct Password";
        }
        else
        {
            $_SESSION['email']=$email;
            header("Location:addFriend.php");
        }


    }
?>