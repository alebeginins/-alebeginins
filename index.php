<?php
/*
* KEYAUTH.CC PHP EXAMPLE
*
* Edit credentials.php file and enter name & ownerid from https://keyauth.cc/app
*
* READ HERE TO LEARN ABOUT KEYAUTH FUNCTIONS https://github.com/KeyAuth/KeyAuth-PHP-Example#keyauthapp-instance-definition
*
*/
include 'keyauth.php';
include 'credentials.php';

if (isset($_SESSION['user_data'])) {
        header("Location: dashboard/");
        exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) {
        $KeyAuthApp->init();
}
?>

<html lang="en" class="bg-[#09090d] text-white overflow-x-hidden">

<head>
    <title>Login - Only Fix</title>
    <meta name="description" content="login Only Fix">
        <meta property="og:image" content="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdng5MW9xZjQ3azM3NDJvZ2Q1cGU2NmVoOWhlNmcxbW4zejFjcmxqdiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/eSwGh3YK54JKU/giphy.gif">
        <meta property="og:description" content="login Only Fix">
        <meta name="twitter:image" content="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExdng5MW9xZjQ3azM3NDJvZ2Q1cGU2NmVoOWhlNmcxbW4zejFjcmxqdiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/eSwGh3YK54JKU/giphy.gif">
        <meta name="twitter:description" content="login Only Fix">
    <link rel="shortcut icon" href="assets/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link rel="stylesheet" href="assets/main.css">
</head>

<body>

<div class="login-form">
        <div class="logo">
                <a href="https://sensiprimex.store/">
                <img src="assets/logo.png" alt="LOGO">
                </a>
        </div>
    <div class="text">
       REGISTER
    </div>
    <form method="post" data-postform="1">
       <div class="field" data-username="1">
          <div data-username="1"></div>
          <input type="text" id="username" name="username"
           class="content-t"
          placeholder="Username" autocomplete="on">
       </div>

       <div class="field" data-password="1">
          <div data-password="1"></div>
          <input type="password" id="password" name="password"
           class="content-t"
           placeholder="Password" autocomplete="on">
       </div>
       <button name="login" data-loginbutton="1">LOGIN</button>
       <div class="link">
          No eres miembro?
          <a href="register.php">Registrate Ahora!</a>
       </div>
    </form>
 </div>

       <div id="particles-js"></div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="main/nidex.js"></script>

    <?php
        if (isset($_POST['login'])) {
                // login with username and password
                if ($KeyAuthApp->login($_POST['username'], $_POST['password'])) {
                        echo "<meta http-equiv='Refresh' Content='2; url=panel/'>";
                        $KeyAuthApp->success("You have successfully logged in!");
                }
        }

        if (isset($_POST['register'])) {
                // register with username,password,key
                if ($KeyAuthApp->register($_POST['username'], $_POST['password'], $_POST['key'])) {
                        echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
                        $KeyAuthApp->success("You have successfully registered!");
                }
        }

        if (isset($_POST['license'])) {
                // login with just key
                if ($KeyAuthApp->license($_POST['key'])) {
                        echo "<meta http-equiv='Refresh' Content='2; url=dashboard/'>";
                        $KeyAuthApp->success("You have successfully logged in!");
                }
        }

        if (isset($_POST['upgrade'])) {
                if ($KeyAuthApp->upgrade($_POST['username'], $_POST['key'])) {
                        // don't login, upgrade function is not for authentication, it's simply for redeeming keys
                        $KeyAuthApp->success("Upgraded Successfully! Now login please.");
                }
        }
        ?>

</body>

</html>
