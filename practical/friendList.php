<?php
    session_start();
    include "header.html";
?>
<body>
    <div class="login-form">
        <?php
            include "process/p-FriendList.php";
            if($page_total>1)
        {
            if($Page_no>1)
            {
                echo "<a href='friendList.php?page=".($Page_no-1)."' id='prev'>previous</a>&nbsp";
            }
            if($Page_no<$page_total)
            {
                echo "<a href='friendList.php?page=".($Page_no+1)."' id='next'>Next</a>";
            }
            
        }
        ?>
        <!-- <a href="#" id="prev">previous</a>
        <a href="#" id="next">Next</a> -->
        <div class="Buttons">
        <a href="addFriend.php">Friend List</a>
        <a href="index.php">Log out</a>
        </div>
    </div>
    <?php
        include "footer.html";
    ?>
</body>
<!-- <script>
     let page =<?php //echo $Page_no;?>;
    document.getElementById("prev").onclick= function ADD1() {
        if(page>1){
            page--;
            window.location.href='friendList.php?page='+page;
        }
    }
    document.getElementById("next").onclick= function ADD1() {
        
            page++;
            window.location.href='friendList.php?page='+page;
        
    }
    
</script> -->