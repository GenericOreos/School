<?php
$userID = $_SESSION["SESS_MEMBER_ID"];
$sql = "SELECT user_id, first_name, last_name, screen_name, profile_pic, province, date_created FROM users WHERE user_id != '$userID' AND user_id NOT IN (SELECT to_id FROM follows WHERE from_id = '$userID') "
        . "ORDER BY RAND() LIMIT 3";

if ($query = mysqli_query($con, $sql)) {
    while($row = mysqli_fetch_array($query)) {
        echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].
                '&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'"> <img class="border" src ="'.$row["profile_pic"].'" width="60" height="60">' . " " . 
        substr(($row["first_name"] . " " . $row["last_name"] . " @" . $row["screen_name"]),0,22).'</a><BR><BR>' . 
                '<a href="follow_proc.php?user_id='.$row["user_id"].'"id=button class="followbutton"> FOLLOW</a>'.'<BR><BR>';
        }
    }