<?php
require("../Login/Login-bloc.php")
?>
<?php

if (isset($_POST['submit'])) {
    $user = new LoginUser($_POST["email"], $_POST["password"],);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" autocomplete="off">
        <div id="main">
            <div class="left">
                <h2 class="lefttext">Login</h2>
            </div>
            <!--*-->
            <div class="right">
                <h5 class="hh">EMAIL</h5>
                <input name="email" class="inputstyle" type="text">
                <!--*-->
                <h5 class="hhq">PASSWORD</h5>
                <input name="password" class="inputstyle" type="password">
                <!--*-->
                <div class="signup">
                    <a href="../SignUp/signup.php" style="text-decoration: none;" class="stylesignup">
                        SignUp
                    </a>
                    <span>or</span>
                    <button type="submit" name="submit" class="stylelogin"> Login</button>
                </div>
                <!--*-->
            </div>
        </div>
    </form>

</body>

</html>