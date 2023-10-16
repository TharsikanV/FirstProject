<?php
    include "classes/Helper.php";
    $h=new Helper();
    // $Page_no=1;
    $rec_per_page=5;
    if(isset($_GET['page'])){
        $Page_no =$_GET['page'];
      }else{
        $Page_no =1;
      }

    $start=(($Page_no-1)*$rec_per_page);

    $rec_total=$h->getNumrowsfromfriendDB($_SESSION['email']);
    echo $rec_total."<br>";
    $page_total=ceil( $rec_total/$rec_per_page);
    echo $page_total;
    $friendsTable=$h->getRowsForAPage($_SESSION['email'],$start,$rec_per_page);

    if(isset($_POST['Addfriend']))
    {   
        $User=$h->getUserFromDB($_SESSION['email']);
        $h->AddFriend($User['friend_id'],$_POST['friend_id']);
    }
    echo "<table border='1'>";
    foreach($friendsTable as $friendRow)
    {   
        echo "<form action='' method='post'>";
        echo "<tr>";
        echo "<td>";
        echo $friendRow['profile_name'];
        echo "</td>";

        echo "<td>";
        echo "<input type='hidden' value='".$friendRow['friend_id']."' name='friend_id'>";
        echo "<input type='submit' value='Addfriend' name='Addfriend'>";
        echo "</td>";
        // echo "<td>"."<button type='submit' name ='Unfriend'>Unfriend</button>"."</td>";
        echo "</tr>";
        echo "</form>";
        
    }
    echo "</table>";
    //paging
    // for($i=1;$i<=$page_total;$i++){
    //     if($Page_no==$i)
    //         echo $i." &nbsp;";
    //     else
    //         echo "<a href='process/p-FriendList.php?pg=".$i."'>".$i." </a>&nbsp;";
        
    // }
?>