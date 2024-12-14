<?php

    include_once "db-config.php";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        $response = array();
        $contestantsArray = array();
        $allContestantsResponse = array();

        $contestantNameArray = array();
        $contestantVoteArray = array();
        $contestantGraphRes = array();

        //query to get the category title
        $getContestantLeaderBoardQuery = "SELECT * FROM  contestants ORDER BY vote_count DESC";

        $getContestantLeaderBoardResult = mysqli_query($database, $getContestantLeaderBoardQuery);

        if (mysqli_num_rows($getContestantLeaderBoardResult) > 0) {
            
            while ($row = mysqli_fetch_assoc($getContestantLeaderBoardResult)) {
               $contestantsArray['contestant_id'] = $row['contestant_id'];
               $contestantsArray['name'] = $row['full_names'];//contestant_name
               $contestantsArray['num_of_votes'] = $row['vote_count'];
               $contestantsArray['thumbnail'] = $row['thumbnail'];
               $contestantsArray['contestant_region'] = $row['contestant_region'];
               $contestantsArray['contestant_num'] = $row['contestant_num'];
               $contestantsArray['category'] = $row['contestant_region'];//"n\a";//$row['category'];
               $contestantsArray['status'] = $row['status'];
               // $contestantsArray['height'] = $row['height'];
               $contestantsArray['contestant_bio'] = $row['contestant_bio'];
               $contestantsArray['age'] = $row['age']; 	 


               array_push($allContestantsResponse, $contestantsArray);
            }


            $getContestants =  "SELECT is_votes_display, is_enable_vote FROM contestants LIMIT 1";
            $getContestantsResult = mysqli_query($database, $getContestants);
            $rowsData  = mysqli_fetch_assoc($getContestantsResult);
            $isShowVotes  = $rowsData['is_votes_display'];
            $isEnableVote  = $rowsData['is_enable_vote'];



            $response['success'] = true;
            $response["message"] = 'leaderboard got';
            $response["isShowVotes"] = $isShowVotes;
            $response["isEnableVote"] = $isEnableVote;
            $response["data"] = $allContestantsResponse;

            mysqli_close($database);

            header('Content-Type: application/json');
		        echo json_encode($response);
        } else {

            $response['success'] = true;
        	  $response["message"] = 'leaderboard not got';
            $response["data"] = array();

            mysqli_close($database);
            
            header('Content-Type: application/json');
		        echo json_encode($response);
        }
    }