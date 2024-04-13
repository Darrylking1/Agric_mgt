<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>

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

            <div class="chores-mg">
            <div class="details">
                <div class="chorelist">
                    <div class="cardHeader">
                        <h2>Tasks<h2>
                        <a href='../adds/add_a_task.php' class="btn">Add task</a>
                    </div>

                    <!-- Chore List Table -->
                    <table class="bordered-table">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                              include_once "../functions/get_all_task_fxn.php"  
                            
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