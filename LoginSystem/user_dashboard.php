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

                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Event Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Teachers</span>
                    </a>
                </li>

                <li>

                <li>


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

                <h1>
                    <?php echo "" . $_SESSION['user_name']; ?>
                </h1>


                <div class="user">
                    <ion-icon name="person-circle-outline"></ion-icon>

                </div>

            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card scroll-scale">
                    <div>
                        <div class="numbers">
                            <?php echo "" . $count; ?>
                        </div>
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
                        <div id="time" class="numbers"></div>
                        <div class="cardName">Clock</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="alarm-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ EVENTSt ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>EVENTS</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>
                                    <div class="card scroll-scale" style="width: 15rem;">
                                        <img src="assets/imgs/1_n.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝑳𝒐𝒐𝒌: 𝑰𝑺𝑼 – 𝑹𝒐𝒙𝒂𝒔 𝑲𝒊𝒄𝒌𝒔 𝑶𝒇𝒇
                                                𝑭𝒊𝒓𝒔𝒕 𝑫𝒂𝒚 𝒐𝒇 𝑭𝒂𝒄𝒆-𝒕𝒐-𝑭𝒂𝒄𝒆 𝑪𝒍𝒂𝒔𝒔𝒆𝒔</p>
                                            <button class="openModalBtn cool-button-2" data-modal-target="modal1">VIEW</button>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 16rem;">
                                        <img src="assets/imgs/2.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝗡𝗘𝗪𝗦 𝗨𝗣𝗗𝗔𝗧𝗘| 𝗬𝗲𝗹𝗹
                                                𝗣𝗿𝗲𝘀𝗲𝗻𝘁𝗮𝘁𝗶𝗼𝗻 <br> <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal2">VIEW</button>
                                        </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 18rem;">
                                        <img src="assets/imgs/3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝐅𝐢𝐬𝐡𝐞𝐫𝐢𝐞𝐬 𝐢𝐧 𝐚𝐜𝐭𝐢𝐨𝐧.... 𝐒𝐚𝐢𝐥 𝐨𝐧
                                                𝐭𝐨 𝐄𝐱𝐜𝐞𝐥𝐥𝐞𝐧𝐜𝐞 <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal3">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="card scroll-scale" style="width: 16rem;">
                                        <img src="assets/imgs/4.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝑻𝙝𝒆 𝒈𝙪𝒊𝙙𝒂𝙣𝒄𝙚 𝙖𝒏𝙙 𝘾𝒐𝙪𝒏𝙨𝒆𝙡𝒊𝙣𝒈
                                                𝑼𝙣𝒊𝙩 𝙝𝒆𝙡𝒅 𝑺𝙚𝒎𝙞𝒏𝙖𝒓 𝒇𝙤𝒓 𝑮𝙧𝒂𝙙𝒖𝙖𝒕𝙞𝒏𝙜
                                                𝙎𝒕𝙪𝒅𝙚𝒏𝙩𝒔</p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal1">VIEW</button>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 17rem;">
                                        <img src="assets/imgs/5.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝗖𝗹𝘂𝘀𝘁𝗲𝗿 𝗦𝗲𝗮𝗿𝗰𝗵 𝗳𝗼𝗿 𝗕𝗲𝘀𝘁
                                                𝗚𝗿𝗮𝗱𝘂𝗮𝘁𝗲 & 𝗨𝗻𝗱𝗲𝗿𝗴𝗿𝗮𝗱𝘂𝗮𝘁𝗲 𝗥𝗲𝘀𝗲𝗮𝗿𝗰𝗵
                                                <br> <br> </p>
                                            <button class="openModalBtn cool-button-2" data-modal-target="modal2">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 18rem;">
                                        <img src="assets/imgs/6.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">IICT conducted a one day Training on Network Cabling,
                                                Installation and Configuration @BJMP Roxas,Isabela</p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal3">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="card scroll-scale" style="width: 16rem;">
                                        <img src="assets/imgs/4.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝑻𝙝𝒆 𝒈𝙪𝒊𝙙𝒂𝙣𝒄𝙚 𝙖𝒏𝙙 𝘾𝒐𝙪𝒏𝙨𝒆𝙡𝒊𝙣𝒈
                                                𝑼𝙣𝒊𝙩 𝙝𝒆𝙡𝒅 𝑺𝙚𝒎𝙞𝒏𝙖𝒓 𝒇𝙤𝒓 𝑮𝙧𝒂𝙙𝒖𝙖𝒕𝙞𝒏𝙜
                                                𝙎𝒕𝙪𝒅𝙚𝒏𝙩𝒔</p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal1">VIEW</button>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 17rem;">
                                        <img src="assets/imgs/5.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝗖𝗹𝘂𝘀𝘁𝗲𝗿 𝗦𝗲𝗮𝗿𝗰𝗵 𝗳𝗼𝗿 𝗕𝗲𝘀𝘁
                                                𝗚𝗿𝗮𝗱𝘂𝗮𝘁𝗲 & 𝗨𝗻𝗱𝗲𝗿𝗴𝗿𝗮𝗱𝘂𝗮𝘁𝗲 𝗥𝗲𝘀𝗲𝗮𝗿𝗰𝗵
                                                <br> <br> </p>
                                            <button class="openModalBtn cool-button-2" data-modal-target="modal2">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 18rem;">
                                        <img src="assets/imgs/6.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">IICT conducted a one day Training on Network Cabling,
                                                Installation and Configuration @BJMP Roxas,Isabela</p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal3">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <div class="card scroll-scale" style="width: 15rem;">
                                        <img src="assets/imgs/1_n.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝑳𝒐𝒐𝒌: 𝑰𝑺𝑼 – 𝑹𝒐𝒙𝒂𝒔 𝑲𝒊𝒄𝒌𝒔 𝑶𝒇𝒇
                                                𝑭𝒊𝒓𝒔𝒕 𝑫𝒂𝒚 𝒐𝒇 𝑭𝒂𝒄𝒆-𝒕𝒐-𝑭𝒂𝒄𝒆 𝑪𝒍𝒂𝒔𝒔𝒆𝒔</p>
                                            <button class="openModalBtn cool-button-2" data-modal-target="modal1">VIEW</button>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 16rem;">
                                        <img src="assets/imgs/2.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝗡𝗘𝗪𝗦 𝗨𝗣𝗗𝗔𝗧𝗘| 𝗬𝗲𝗹𝗹
                                                𝗣𝗿𝗲𝘀𝗲𝗻𝘁𝗮𝘁𝗶𝗼𝗻 <br> <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal2">VIEW</button>
                                        </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 18rem;">
                                        <img src="assets/imgs/3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝐅𝐢𝐬𝐡𝐞𝐫𝐢𝐞𝐬 𝐢𝐧 𝐚𝐜𝐭𝐢𝐨𝐧.... 𝐒𝐚𝐢𝐥 𝐨𝐧
                                                𝐭𝐨 𝐄𝐱𝐜𝐞𝐥𝐥𝐞𝐧𝐜𝐞 <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal3">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="card scroll-scale" style="width: 15rem;">
                                        <img src="assets/imgs/1_n.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝑳𝒐𝒐𝒌: 𝑰𝑺𝑼 – 𝑹𝒐𝒙𝒂𝒔 𝑲𝒊𝒄𝒌𝒔 𝑶𝒇𝒇
                                                𝑭𝒊𝒓𝒔𝒕 𝑫𝒂𝒚 𝒐𝒇 𝑭𝒂𝒄𝒆-𝒕𝒐-𝑭𝒂𝒄𝒆 𝑪𝒍𝒂𝒔𝒔𝒆𝒔</p>
                                            <button class="openModalBtn cool-button-2" data-modal-target="modal1">VIEW</button>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 16rem;">
                                        <img src="assets/imgs/2.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝗡𝗘𝗪𝗦 𝗨𝗣𝗗𝗔𝗧𝗘| 𝗬𝗲𝗹𝗹
                                                𝗣𝗿𝗲𝘀𝗲𝗻𝘁𝗮𝘁𝗶𝗼𝗻 <br> <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal2">VIEW</button>
                                        </div>
                                </td>
                                <td>
                                    <div class="card scroll-scale" style="width: 18rem;">
                                        <img src="assets/imgs/3.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text">𝐅𝐢𝐬𝐡𝐞𝐫𝐢𝐞𝐬 𝐢𝐧 𝐚𝐜𝐭𝐢𝐨𝐧.... 𝐒𝐚𝐢𝐥 𝐨𝐧
                                                𝐭𝐨 𝐄𝐱𝐜𝐞𝐥𝐥𝐞𝐧𝐜𝐞 <br> <br></p>
                                                <button class="openModalBtn cool-button-2" data-modal-target="modal3">VIEW</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </thead>

                    </table>
                </div>
                </table>
            </div>
        </div>
    </div>
    </div>


    <!-- The Modal -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" data-modal-close="modal1">&times;</span>
            <h2>Modal 1 Content</h2>
            <p>This is the content of Modal 1.</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close" data-modal-close="modal2">&times;</span>
            <h2>Modal 2 Content</h2>
            <p>This is the content of Modal 2.</p>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <span class="close" data-modal-close="modal3">&times;</span>
            <h2>Modal 3 Content</h2>
            <p>This is the content of Modal 3.</p>
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