<?php
    include_once "db-config.php";
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'GET') 
    {
        $getContestants =  "SELECT is_enable_vote FROM contestants LIMIT 1";
        $getContestantsResult = mysqli_query($database, $getContestants);
        $rowsData  = mysqli_fetch_assoc($getContestantsResult);
        $isShowVotes  = $rowsData['is_enable_vote'];

        if($isShowVotes == 'True') 
        {
            $new_status = 'False';
            $update_query = "UPDATE `contestants` SET `is_enable_vote` = '$new_status' WHERE `contestant_id` > 0";
            $update_query2 = "UPDATE `contestants_weekly` SET `is_enable_vote` = '$new_status' WHERE `contestant_id` > 0";

            mysqli_query($database, $update_query);
            mysqli_query($database, $update_query2);

            mysqli_close($database);
            
            header('Location: ../contestants.php');
        }
        else{
            $new_status = 'True';
            $update_query = "UPDATE `contestants` SET `is_enable_vote` = '$new_status' WHERE `contestant_id` > 0";
            $update_query2 = "UPDATE `contestants_weekly` SET `is_enable_vote` = '$new_status' WHERE `contestant_id` > 0";

            mysqli_query($database, $update_query);
            mysqli_query($database, $update_query2);
            mysqli_close($database);

            header('Location: ../contestants.php');
        }
    }