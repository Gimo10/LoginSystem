<?php

include("db_conn.php");

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
} else {
    header("Location: index.php");
    exit();
}

$query = "SELECT COUNT(*) as count FROM users";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $count = $row['count'];
}

$query1 = "SELECT COUNT(*) as count FROM deleted_records";
$result1 = $conn->query($query1);

// Check if the query was successful
if ($result1) {
    $row1 = $result1->fetch_assoc();
    $count1 = $row1['count'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSystem</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script>
    function displayTime() {
      var now = new Date();
      var time = now.toLocaleTimeString();
      document.getElementById('time').innerHTML = time;
      setTimeout(displayTime, 1000); // Update every second (1000 milliseconds)
    }
  </script>
</head>

<body onload="displayTime()">
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
                    <a href="#">
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

                <div class="user">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card scroll-scale">
                    <div>
                        <div class="numbers"><?php echo "" . $count; ?></div>
                        <div class="cardName">People</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card scroll-scale">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Active</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                    </div>
                </div>

                <div class="card scroll-scale">
                    <div>
                        <div class="numbers"><?php echo "" . $count1; ?></div>
                        <div class="cardName">Retrieves</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="file-tray-full-outline"></ion-icon>
                    </div>
                </div>

                <div class="card scroll-scale">
                    <div>
                        <div id="time" class="numbers"></div>
                        <div class="cardName">Clock</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="alarm-outline"></ion-icon>
                    </div>
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
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $sql = "SELECT * FROM `users`";
                            $result = mysqli_query($conn, $sql);
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $user_name = $row['user_name'];
                                    $password = $row['password'];
                                    $email = $row['email'];
                                    $contact = $row['contact'];
                                    echo '
                                    <tr>
                                        <td class="scroll-scale">' . $user_name . '</td>
                                        <td class="scroll-scale">' . $password . '</td>
                                        <td class="scroll-scale">' . $email . '</td>
                                        <td class="scroll-scale">' . $contact . '</td>
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
    <script src="mixitup.min.js"></script>
    <script src="script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>