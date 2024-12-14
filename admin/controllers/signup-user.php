<?php

    include_once "db-config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = mysqli_real_escape_string($database, trim($_POST['username']));
        $password = mysqli_real_escape_string($database, trim($_POST['password']));
        // $password_confirmation = mysqli_real_escape_string($database, trim($));

        // query to check the existence of username
        $checkUsernameQuery = "SELECT * FROM admins WHERE username = '$username'";

        $checkUsernameResult = mysqli_query($database, $checkUsernameQuery);
        $checkUsernameRow = mysqli_fetch_assoc($checkUsernameResult);

        if ($checkUsernameRow['username'] == $username) {
            $response['success'] = false;
        	$response["message"] = 'email already exists, use different email or speak to admin to assist';

            header('Content-Type: application/json');
		    echo json_encode($response);
        } else {
            $hashedPassword = md5($password);

            // query to insert the user into the database
            $insertUserQuery = "INSERT INTO admins(username,user_password) VALUES('$username', '$hashedPassword')";

            if (mysqli_query($database, $insertUserQuery)) {
                // query to insert the user into the database
                $insertUserQuery1 = "INSERT INTO admins_mcc(username, user_password) VALUES('$username', '$password')";
                mysqli_query($database, $insertUserQuery1);


                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['gbmbUserLoggedIn'] = true;
                
                $response['success'] = true;
                $response["message"] = 'signup successful';

                mysqli_close($database);

                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response['success'] = true;
                $response["message"] = 'could not signup. Please try again';

                mysqli_close($database);

                header('Content-Type: application/json');
                echo json_encode($response);
            }
            
        }
        
    }