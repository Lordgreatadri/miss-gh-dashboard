<?php

include_once "db-config.php";

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = array();
    $numberArray = array();
    $votesArray = array();
    $statArray = array();

    $dateOfSundayOfTheWeek = date('Y-m-d', strtotime('monday last week'))." 22:00:00";

    $dateOfSundayOfNextWeek = date('Y-m-d', strtotime('sunday this week'))." 21:59:59";

    //query to get the categories
    $query = "SELECT DISTINCT `momo_number` as voter_num, SUM(number_of_votes) as vote_num FROM `transactions_completed` WHERE response_code = '0000' AND `transaction_date` BETWEEN '$dateOfSundayOfTheWeek' AND '$dateOfSundayOfNextWeek'  GROUP BY `momo_number` ORDER BY vote_num DESC LIMIT 5";

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
    	$response["message"] = 'Voter data loaded';
    	$response["data"] = $statArray;

        header('Content-Type: application/json');
	    echo json_encode($response);
    } else {
        $statArray['labels'] = array();
        $statArray['data'] = array();
        
    	$response['success'] = true;
        $response["message"] = 'No vote logs loaded';
        $response["data"] = $statArray;

        mysqli_close($database);

        header('Content-Type: application/json');
	    echo json_encode($response);
    }
}