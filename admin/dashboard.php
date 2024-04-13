<?php

session_start();

include_once '../functions/display_nums.php';

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <! -- ============== Navigation ============ -->
    <div class = "container">

        <div class ="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class="title">Agric_mgt</span>
                    </a>
                </li>

                <li>
                    <a href="../admin/dashboard.php">
                        <span class="icon"><ion-icon name="checkmark-done-circle-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="../views/crop_mgt.php">
                        <span class="icon"><ion-icon name="logo-stackoverflow"></ion-icon></span>
                        <span class="title">Crop Management</span>
                    </a>
                </li>

                <li>
                    <a href="../views/weather.php">
                        <span class="icon"><ion-icon name="rainy-outline"></ion-icon></span>
                        <span class="title">Weather </span>
                    </a>
                </li>

                <li>
                    <a href="../views/task_mgt.php">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="../login_view/logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">logout</span>
                    </a>
                </li>


                
            </ul>
        </div>
        <! -- ============== Main ============ -->
        <div class = "main">
            <div class = "topbar">
                <div class="toggle">
                    <ion-icon name="list-outline"></ion-icon>
                </div>



                <div class="user">
                    <img src="../images/customer01.jpg" alt="">
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo getCropsCount($user_id); ?></div>
                        <div class="cardName">Crops</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="flower-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo getIncompleteCount($user_id);  ?></div>
                        <div class="cardName">Incomplete</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="time-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo getCompletedCount($user_id) ;  ?></div>
                        <div class="cardName">Compeleted</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="trophy-outline"></ion-icon>
                    </div>
                </div>


            </div>

            
                <div class="details2">
                    <div class="recents">
                        <div class="chorelist">
                            <div class="cardHeader">
                                <h2>Crops</h2>
                                <a href="../views/crop_mgt.php" class="btn">View all crops</a>
                            </div>

                            <!-- Crop list table -->
                            <table class="bordered-table">
                                <thead>
                                    <tr>
                                        <th>Crop Name</th>
                                        <th>Planting Date</th>
                                        <th>Expected harvestDate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once "../functions/display_crops_fxn.php";
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="recents">
                        <div class="chorelist">
                            <div class="cardHeader">
                                <h2>Tasks</h2>
                                <a href="../views/task_mgt.php" class="btn">View all tasks</a>
                            </div>

                            <!-- Task list table -->
                            <table class="bordered-table">
                                <thead>
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   include_once "../functions/display_tasks_fxn.php";
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            

            
            
        </div>

        
            <script src="../js/main.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>