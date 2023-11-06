<?php
session_start();
$uploadusers = "-uploads/";
$dir = $uploadusers . $_SESSION['user'] . "/";
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}
//!-----------------------------add folder on login-------------------------------------
$files = scandir($dir);
$files = array_diff($files, array(".", ".."));
if (isset($_POST['submit'])) {
    foreach ($_FILES as $key => $file) {
        $target_file = $dir . basename($file["name"]);
        if (file_exists($target_file)) {
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                header('Location: filemanager.php');
                exit;
            }
        }
    }
}
//!------------------------------------Logout----------------------------------
if (isset($_GET["logout"])) {
    unset($_SESSION["user"]);
    header("location:../Login/login.php");
    exit();
}
//!--------------------------------------Delete--------------------------------
if (isset($_GET['delete'])) {
    $file = $dir . $_GET['delete'];
    if (file_exists($file)) {
        unlink($file);
        rmdir($file);
        header('Location: filemanager.php');
        exit;
    }
}

//!---------------------------------------Show---------------------------------
if (isset($_GET["show"])) {
    $file = $dir . $_GET['show'];
    if (mime_content_type($file) == "directory") {
    } elseif (file_exists($file)) {
        echo "<img src=" . $file . " height=200 width=300 style='position: absolute;
    top: 45%;
    left: 74%;' /> ";
    }
}
//!---------------------------------------Create Folder--------------------------
if (isset($_POST["foldername"])) {
    $folder_name =
        $_POST["foldername"];
    $folder_path = $dir . $folder_name;
    mkdir($folder_path);
    header('Location: filemanager.php');
    exit;
}
