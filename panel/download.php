<?php
error_reporting(0);

require '../keyauth.php';
require '../credentials.php';

session_start();

if (!isset($_SESSION['user_data'])) // if user not logged in
{
    header("Location: ../");
    exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

function findSubscription($name, $list)
{
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i]->subscription == $name) {
            return true;
        }
    }
    return false;
}

$username = $_SESSION["user_data"]["username"];
$subscriptions = $_SESSION["user_data"]["subscriptions"];
$subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
$expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;
$ip = $_SESSION["user_data"]["ip"];
$creationDate = $_SESSION["user_data"]["createdate"];
$lastLogin = $_SESSION["user_data"]["lastlogin"];

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../");
    exit();
}
?>
<html lang="en" class="bg-[#09090d] text-white overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="main/main.css">
    <title>Panel Download | SENSIPRIMEX</title>
    <link rel="icon" type="image/jpg" href="main/logo.png"/>
</head>

<body>


    <div class="sidebar">
    <a href="index.php" class="logo">
        <i class='bx bxs-dashboard'> </i>
            <div class="logo-name"><span></span>PRIMEX</div>
        </a>
        <ul class="side-menu">
            <li><a href="index.php"><i class='bx bx-home'></i>Inicio</a></li>
            <li><a href="data.php"><i class='bx bx-data'></i>Datos</a></li>
            <li  class="active"><a href="download.php"><i class='bx bxs-download'></i>Download</a></li>
        </ul>
    </div>

    <div class="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form method="post">
        <button
            class="opb"
            name="logout">
            Logout
        </button>
                </form>
            <a href="#" class="profile">
                <img src="main/logo.png">
            </a>
        </nav>

        <main>
            <div class="header">
                <div class="left">
                    <h1>DESCARGAR PANEL PRIMEX</h1>
                    <ul class="breadcrumb">
                        <li><a href="">
                                Inicio
                            </a></li>
                        /
                        <li><a href="#" class="active">Download</a></li>
                    </ul>
                </div>
                <a href="main/panelexe/PRIMEX24.exe" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download Panel 4/4/24</span>
                </a>
            </div>

            <div class="bottom-data">

            <div class="reminders">
                    <div class="header">
                    <i class='bx bx-upload' ></i>
                        <h3>Advertencias</h3>
                    </div>
                    <ul class="task-list">

                    <li class="not-completed">
                            <div class="task-title">
                            <i class='bx bx-x'></i>
                                <p>No usar FF MODIFICADOS</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="bottom-data">

        </main>

    </div>
    <script src="main/main.js"></script>
    <script src="https://cdn.keyauth.cc/dashboard/unixtolocal.js"></script>
</body>

</html>
