<?php
    session_start();
    include "header.html";
?>
<body>
<div class="login-form">
    <!-- <form action="" method="post"> -->
    <?php
        include "process/p-AddFriend.php";
        if($page_total>1)
        {
            if($Page_no>1)
            {
                echo "<a href='addFriend.php?page=".($Page_no-1)."' id='prev'>previous</a>";
            }
            if($Page_no<$page_total)
            {
                echo "<a href='addFriend.php?page=".($Page_no+1)."' id='next'>Next</a>";
            }
            
        }
       
    ?>

    <!-- <a href="#" id="prev">previous</a>
    <a href="#" id="next">Next</a> -->
    <div class="Buttons">
       <a href="friendList.php">Add Friends</a>
        <a href="index.php">Log out</a>
    </div>
    <!-- </form> -->
    
</div> 
<?php
    include "footer.html";
?>
</body>

<!-- <script>
    let page=<?php //echo $Page_no;?>;
    // let page_total=<?php //echo $page_total;?>
    
        document.getElementById("prev").onclick=function prev(){
        if(page>1)
        {
        page--;
        window.location.href='addFriend.php?page='+page;
        }
    }
   
        document.getElementById("next").onclick=function next(){
        page++;
        window.location.href='addFriend.php?page='+page;
        }
    

</script> -->