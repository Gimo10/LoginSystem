<?php

include("db_conn.php");

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
} else {
    header("Location: index.php");
    exit();
}

if (isset($_POST['searchname'])) {
    $searchName = $_POST['searchname'];

    $sql = "SELECT * FROM users WHERE user_name LIKE '%$searchName%'";
    $result = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/FINAL_SEAL.png" alt="">
                        </span>
                        <span class="title">ISU-R INFO</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="allstudents.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">All Students</span>
                    </a>
                </li>

                <li>
                    <a href="retrieve.php">
                        <span class="icon">
                            <ion-icon name="file-tray-full-outline"></ion-icon>
                        </span>
                        <span class="title">Retrieve Accounts</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>   
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <form class="topnav" method="POST" action="search.php">
                    <div class="search">
                        <label>
                        <input type="text" placeholder="Search..."  name="searchname">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                </form>

                

                <div class="user">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
            </div>
           

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>STUDENTS</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $user_name = $row['user_name'];
                                    $password = $row['password'];
                                    $email = $row['email'];
                                    $contact = $row['contact'];
                                    echo '
                                    <tr>
                                    
                                        <td>' . $user_name . '</td>
                                        <td>' . $password . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $contact . '</td>
                                        <td> 
                                        <a href="update.php?updateid=' . $row['id'] . '" class="text-decoration-none
                                        text-light"><button class="danger-ok">Update</button></a>

                                        <a href="delete1.php?deleteid=' . $row['id'] . '" class="text-decoration-none
                                        text-light"><button class="danger-button">Delete</button></a>
                                        </td>
                                    </tr>
                                    ';

                                }
                            } else {
                                echo '<tr><td colspan="6">No records found.</td></tr>';
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

            
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>