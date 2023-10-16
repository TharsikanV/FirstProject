<?php
     include "classes/Helper.php";
    $h=new Helper();
    

    $results=$h->getUserFromDB($_SESSION['email']);
    $friend_id=$results['friend_id'];
    $myFriends=$h->getMyFriendsFromDB($friend_id);
    $numOfFriends=0;
    foreach($myFriends as $myfriend)
    {
        $numOfFriends++;
    }

    //pagging
    $rec_per_page=5;
    if(isset($_GET['page'])){
        $Page_no =$_GET['page'];
      }else{
        $Page_no =1;
      }

    $start=(($Page_no-1)*$rec_per_page);

    $rec_total=$numOfFriends;
    echo $rec_total."<br>";
    $page_total=ceil( $rec_total/$rec_per_page);
    echo $page_total;
    $myFriends1=$h->getFriendRowsForAPage($friend_id,$start,$rec_per_page);
    
    echo strtoupper($results['profile_name'])."'s ADD Friend Page<br>";
    echo "Total number of friends is ".$numOfFriends."<br>";
    if(isset($_POST['Unfriend']))
    {
        $friendIdToDelete=$_POST['friend_id'];
        $h->Unfriend($friend_id,$friendIdToDelete);
    }
    echo "<table border='1'>";
    // $count=0;
    foreach($myFriends1 as $myfriend)
    {   
        echo "<form action='' method='post'>";
        echo "<tr>";
        $friend=$h->getUserByID($myfriend['friend_id2']);
        echo "<td>";
        echo $friend['profile_name'];
        echo "</td>";

        echo "<td>";
        echo "<input type='hidden' value='".$myfriend['friend_id2']."' name='friend_id'>";
        echo "<input type='submit' value='Unfriend' name='Unfriend'>";
        echo "</td>";
        // echo "<td>"."<button type='submit' name ='Unfriend'>Unfriend</button>"."</td>";
        echo "</tr>";
        echo "</form>";
        // if(isset($_POST['Unfriend']))
        // {
        //     $friendIdToDelete=$_POST['friend_id'];
        //     $h->Unfriend($friend_id,$friendIdToDelete);
        // }
    }
    echo "</table>";

    // header("Location:addFriend.php");
    // foreach($myFriends as $myfriend)
    // {
    //     if(isset($_POST['Unfriend']))
    //     {
    //         $friendIdToDelete=$_POST['friend_id'];
    //         $h->Unfriend($friend_id,$friendIdToDelete);
    //     }
    // }



?>