<?php
include "classes/Database.php";
class Helper{

    // public function __construct(){
    //     $db=new Database();
    // }
    // function isEmpty($email,$Pname,$password,$Cpassword)
    // {
    //     if($email==''||$Pname==''||$password==''||$Cpassword=='')
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
    function isEmpty($values)
    {
        foreach($values as $value)
        {
            if($value=='')
            {
                return true;
            }
        }
        return false;
    }
    function isPasswordMatch($psw1,$psw2)
    {
        if($psw1==$psw2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function isValidEmail($email)
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (preg_match($pattern, $email)) {
            return true;
        }
    
        return false;
    }
     function isDuplicateEmail($email)
    {
        $db=new Database();
        $sql="SELECT count(friend_email) as num from friends where friend_email=:email";
        $values=array(array(':email',$email));
        $result=$db->queryDB($sql,Database::SELECTSINGLE,$values);
        if($result['num']==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public function keepValues($val, $type){
    
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo $val;
                break;
            default:
                echo '';
        }

    }
    // function insertIntoFriendDB($email,$Pname,$password)
    // {
    //     $db=new Database();
    //     $sql="INSERT INTO friends(friend_email,password,profile_name,date_starded)VALUES (:email,:password,:Pname,:currentDate";
    //     $values=array(array(':email',$email),array(':password',$password),array(':Pname',$Pname),array(':currentDate',$currentDate = date('Y-m-d')));
    //     $result=$db->queryDB($sql,Database::EXECUTE,$values);
    // }
    function insertIntoFriendsDB($email,$pName,$password){
        $sql="INSERT INTO friends (friend_email,password,profile_name,date_starded)VALUES(:email,:password,:pName,:dStart)";

        $values=array(
            array(':email',$email),
            array(':password',$password),
            array(':pName',$pName),
            array(':dStart',$currentDate = date('Y-m-d'))
        );

        $d=new Database();

        $result=$d->queryDB($sql,Database::EXECUTE, $values);
    }
    function isCorrectPassword($email,$password)
    {
        $db=new Database();
        $sql="SELECT password from friends WHERE friend_email=:email";
        $values=array(array(':email',$email));
        $results=$db->queryDB($sql,Database::SELECTALL, $values);

        foreach($results as $result)
        {
            if($result['password']==$password)
            {
                return true;
            }
            
        }
        return false;

    }
    function getUserFromDB($email)
    {
        $db=new Database();
        $sql="SELECT * from friends WHERE friend_email=:email";
        $values=array(array(':email',$email));
        $results=$db->queryDB($sql,Database::SELECTSINGLE, $values);
        return $results;
    }
    function getMyFriendsFromDB($friend_id1)
    {
        $db=new Database();
        $sql="SELECT *from myfrinds WHERE friend_id1=:friendID";
        $values=array(array(':friendID',$friend_id1));
        $results=$db->queryDB($sql,Database::SELECTALL, $values);
        return $results;
    }
    function getUserByID($friend_id2)
    {
        $db=new Database();
        $sql="SELECT * from friends WHERE friend_id=:friend_id2";
        $values=array(array(':friend_id2',$friend_id2));
        $results=$db->queryDB($sql,Database::SELECTSINGLE, $values);
        return $results;
    }
    function Unfriend($friend_id1,$friend_id2)
    {
        $db=new Database();
        $sql="DELETE FROM myfrinds WHERE friend_id1=:friend_id1 AND friend_id2=:friend_id2";
        $values=array(array(':friend_id1',$friend_id1),array(':friend_id2',$friend_id2));
        $result=$db->queryDB($sql,Database::EXECUTE, $values);
    }
    function FriendListTable($email)
    {
        $db=new Database();
        $sql="SELECT * FROM friends WHERE friend_email!=:email";
        $values=array(array(':email',$email));
        $results=$db->queryDB($sql,Database::SELECTALL, $values);
        return $results;
    }
    function AddFriend($user,$friend)
    {
        $db=new Database();
        $sql="INSERT INTO myfrinds (friend_id1,friend_id2) VALUES(:friend_id1,:friend_id2)";
        $values=array(array(':friend_id1',$user),array(':friend_id2',$friend));
        $result=$db->queryDB($sql,Database::EXECUTE, $values);
    }
    function getNumrowsfromfriendDB($email)
    {
        $db=new Database();
        $sql="SELECT count(friend_id) as num FROM friends WHERE friend_email!=:email";
        $values=array(array(':email',$email));
        $result=$db->queryDB($sql,Database::SELECTSINGLE,$values);
        return $result['num'];

    }
    function getRowsForAPage($email,$start,$rec_per_page)
    {
        $db=new Database();
        $sql="SELECT * FROM friends WHERE friend_email!=:email order by friend_id LIMIT $start,$rec_per_page";
        $values=array(array(':email',$email));
        $results=$db->queryDB($sql,Database::SELECTALL, $values);
        return $results;
    }
    function getFriendRowsForAPage($friend_id1,$start,$rec_per_page)
    {
        $db=new Database();
        $sql="SELECT *from myfrinds WHERE friend_id1=:friendID ORDER BY friend_id1 LIMIT $start,$rec_per_page";
        $values=array(array(':friendID',$friend_id1));
        $results=$db->queryDB($sql,Database::SELECTALL, $values);
        return $results;
    }
}
?>