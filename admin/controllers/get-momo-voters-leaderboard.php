<?php

    include_once "db-config.php";

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $response = array();
        $numberArray = array();
        $votesArray = array();
        $statArray = array();

        //query to get the categories
        $query = "SELECT DISTINCT `momo_number` as voter_num, SUM(number_of_votes) as vote_num FROM `transactions_completed` WHERE response_code = '0000' AND vote_channel = 'MOMO'  GROUP BY `momo_number` ORDER BY vote_num DESC LIMIT 5";//OR `channel` = 'mtn-gh' OR `channel` = 'vodafone-gh' OR `channel` = 'airtel-gh' OR `channel` = 'tigo-gh'

        $result = mysqli_query($database, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $voterPhoneNumber = $row['voter_num'];
                $numberOfVotes = $row['vote_num'];
                
                $voterPhoneNumber = $voterPhoneNumber.' ('.$numberOfVotes.' votes)';

                array_push($numberArray, $voterPhoneNumber);
                array_push($votesArray, $numberOfVotes);
            }

            $statArray['labels'] = $numberArray;
            $statArray['data'] = $votesArray;

            $response['success'] = true;
        	$response["message"] = 'Momo data loaded';
        	$response["data"] = $statArray;

            mysqli_close($database);

            header('Content-Type: application/json');
		    echo json_encode($response);
        } else {
            
        	$response['success'] = false;
            $response["message"] = 'No data loaded';
            $response["data"] = $statArray;


            mysqli_close($database);

            header('Content-Type: application/json');
		    echo json_encode($response);
        }
    }