<?php
require("../SignUp/signup-bloc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signup.css">
    <title>Document</title>
</head>

<body>
    <div id="main">
        <div class="left">
            <h2 class="lefttext">Sign Up</h2>
        </div>
        <!--*-->
        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
            <div class="right">
                <h5>FIRST NAME</h5>
                <input class="inputstyle" type="text" name="firstname">
                <!--*-->
                <h5>LAST NAME</h5>
                <input class="inputstyle" type="text" name="lastname">
                <!--*-->
                <h5>EMAIL</h5>
                <input class="inputstyle" type="email" name="email">
                <!--*-->
                <h5>PASSWORD</h5>
                <input class="inputstyle" type="password" name="password">
                <!--*-->
                <div class="checkbox">
                    <input type="checkbox" required>
                    <label for="ch">I Agree With The Terms And Conditions</label>
                </div>
                <!--*-->
                <div class="signup">
                    <button type="submit" name="submit" class="submit"> Submit</button>
                    <span>or</span>
                    <a href="../Login/login.php" class="stylesignup">
                        login
                    </a>
                </div>
                <!--*-->
            </div>
        </form>
    </div>

</body>

</html>