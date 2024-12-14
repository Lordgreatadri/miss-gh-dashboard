<?php

  session_start();
  // include 'configure.php';
  include_once "db-config.php";
        #*********************** CREATING CONNECT TO DATABASE AND PASSING TO VARIABLE ************
      // $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);//"localhost", "root", "", "unity_report"

      #**********************   CREATE DIRECTORY TO SAVE EXPORTED FILE   *************************
               //note: the user must creat a folder at the location where the script is...........
      $filename = "../data_exports/".date('Y').'-'.strtotime("").'missgh_weekly_'.date('d-M').'.csv';

    $today_date = date('Y-m-d');




    $session_id = $_SESSION['session_id'];
    $username   = $_SESSION['username'];
    $insertUserQuery = "UPDATE log_hist SET weekly_data = 'Weekly vote data exported' WHERE session_id = '$session_id' AND username = '$username'";
    mysqli_query($database, $insertUserQuery);



      
      
          #*************         SQL SELECT STATEMENT        *********************************
    $sql = "SELECT contestant_name AS 'NAME', status AS STATUS,  vote_count AS VOTES, updated_at AS 'LAST VOTED' FROM contestants_weekly WHERE status = 'Active' ORDER BY vote_count DESC";
    $values = mysqli_query($database, $sql);

    $num_rows = mysqli_num_rows($values);

   
    //check if indeed record exist based on search cretia and fetch records out............
    if($num_rows >= 1)
    {
      $row = mysqli_fetch_assoc($values);
      $fp = fopen($filename, "w");
      $seperator = "";
      $comma = "";

      //loop through result and splint it....................
      foreach ($row as $name => $value)
        {
          $seperator .= $comma . '' .str_replace('', '""', $name);
          $comma = ",";
        }

      $seperator .= "\n";
      fputs($fp, $seperator);
  
      mysqli_data_seek($values, 0);
      while($row = mysqli_fetch_assoc($values))
        {
          $seperator = "";
          $comma = "";

          foreach ($row as $name => $value) 
            {
              $seperator .= $comma . '' .str_replace('', '""', $value);
              $comma = ",";
            }

          $seperator .= "\n";
          fputs($fp, $seperator);
        }
  
      fclose($fp);
      //promptin the user for a succesful export of file and grant access with link to 
      //download file if the user is ready to access the file...............
      echo "<p style='text-align:center; margin-top: 200px;'>Your file is ready. You can download it from <a href='$filename'>here!</a>". ' or open file location to view in folder. <a href = "../dashboard.php"> [ Back <<< ]</a> </p>';
    }
    else
    {
      echo "<p style='text-align:center; margin-top: 200px;'>There is no matching record found for your criteria sort <a href = '../dashboard.php'>[ Back<<< ]</a></p>";
    }
    mysqli_close($database);
?>