<?php
require_once 'controllers/db-config.php';
    session_start();
    if (!isset($_SESSION['DUserLoggedIn'])) {
        echo "<script>window.location.href = 'index.php';</script>";
    }

    $session_id = $_SESSION['session_id'];
    $username   = $_SESSION['username'];
    $insertUserQuery = "UPDATE log_hist SET votes_tab = 'Votes Tab Viewed' WHERE session_id = '$session_id' AND username = '$username'";
    mysqli_query($database, $insertUserQuery);

    include 'includes/header.php';
?>

        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light navbar-custom">
            <a class="navbar-brand" href="#">
                <!-- <img src="assets/img/logo.jpg" alt="logo" class="navbar-logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <?php// if($_SESSION['username'] == 'commercial@admin.com'): ?>
                    <?php// else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contestants.php">Contestants</a>
                    </li>
                    <?php// endif ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Votes</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="https://bit.ly/missgha" target="_blank">Cast Vote</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Image Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="live_stream.php">Live Stream</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid main-div">
            <div class="row">
                <!-- side div -->
                <div class="col-md-2 side-div">
                    <li><a href="dashboard.php"><span class="lnr lnr-pie-chart"></span> Dashboard</a></li>
                    <?php// if($_SESSION['username'] == 'commercial@admin.com'): ?>
                    <?php// else: ?>
                    <li><a href="contestants.php"><span class="lnr lnr-users"></span> Contestants</a></li>
                    <?php// endif ?>
                    <li class="selected"><a href="#"><span class="lnr lnr-thumbs-up"></span> Votes</a></li>
                    
                    <li><a href="https://bit.ly/missgha" target="_blank"><span class="lnr lnr-thumbs-up"></span> Cast Vote</a></li>

                    <!-- <li><a href="gallery.php"><span class="lnr lnr-picture"></span> Image Upload</a></li>
                    <li><a class="nav-link" href="live_stream.php"><span class="lnr lnr-camera-video"></span> Live Stream</a></li> -->
                    <hr>
                    <li><a href="logout.php"><span class="lnr lnr-power-switch"></span> Logout</a></li>
                </div>

                <!-- main content div -->
                <div class="col-md-10 content-div">
                    <h5 class="text-center">
                        Recent Votes.
                        <?php 
                            if($_SESSION['user_role'] == "Admin") {
                                echo "[<a href='filter-votes.php'><small>Filter and download logs here....</small></a>]";
                            }
                        ?> 
                    </h5>
                    <div class="row">
                       <div class="col-md-2"></div>
                       <div class="col-md-8 recent-voters-res">
                            <div class="data-res-placeholder-div">
                                <img src="assets/img/spinner.gif" class="img-fluid data-res-placeholder-div-img">
                                <p class="text-warning"><b>Loading. Please wait...</b></p>
                            </div>
                       </div>
                       <div class="col-md-2"></div>
                    </div>

                    <hr>
                    <br>

                    <!-- <div class="row">
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Highest Voters</b></h6>
                            <canvas id="votersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Highest Voters This Week</b></h6>
                            <canvas id="weeklyVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div>
                    <br><hr><br>

                    <div class="row">
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Mobile App Voters Only</b></h6>
                            <canvas id="SMSVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Mobile Money Voters</b></h6>
                            <canvas id="MOMOVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div> -->



                    <div class="row">
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Highest Voters</b></h6>
                            <canvas id="votersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Highest Voters This Week</b></h6>
                            <canvas id="weeklyVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div>
                    <br><hr><br>

                    <div class="row">
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Online Voters Only</b></h6>
                            <canvas id="ONLINEVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                        
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Ussd Voters Only</b></h6>
                            <canvas id="USSDVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div>
                    
                    <br><hr><br>

                    <div class="row">
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Android Voters Only</b></h6>
                            <canvas id="androidVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                        
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>iOS Voters Only</b></h6>
                            <canvas id="iosVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div>


                     <br><hr><br>

                    <div class="row">
                        
                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Mobile Money Voters</b></h6>
                            <canvas id="MOMOVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>


                        <div class="col-md-6 voters-leaderboard-graph">
                            <h6 class="text-center"><b>Overall Visa Voters Only</b></h6>
                            <canvas id="VisaVotersLeaderBoardChart" height="250" width="400"></canvas>
                        </div>
                    </div>




                </div>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>
<script src="assets/js/controller.js"></script>
<script>
    getRecentVotes();
    showVotersLeaderBoardGraph();
    showWeeklyVotersRankings();
    showVisaVotersLeaderBoardGraph();
    showMOMOVotersLeaderBoardGraph();
    showUSSDVotersLeaderBoardGraph();
    showONLINEVotersLeaderBoardGraph();
    showIosVotersLeaderBoardGraph();
    showAndroidVotersLeaderBoardGraph()
    
</script>