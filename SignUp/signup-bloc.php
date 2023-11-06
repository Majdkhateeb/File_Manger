<?php

class RegisterUser
{
    private $firstname;
    private $lastname;
    private $email;
    private $one_password;
    private $tow_password;
    public $error;
    public $success;
    private $storage = "../data.json";
    private $stored_users;
    private $new_user;
    //!----------------------------Save Data in JSON-------------------------------------
    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname = trim($this->firstname);
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS);

        $this->lastname = trim($this->lastname);
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_SPECIAL_CHARS);

        $this->email = trim($this->email);
        $this->email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);

        $this->one_password = filter_var(trim($password), FILTER_SANITIZE_SPECIAL_CHARS);
        $this->tow_password = password_hash($this->one_password, PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->new_user = [
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "email" => $this->email,
            "password" => $this->tow_password,
        ];
        if ($this->checkFieldValues()) {
            $this->ifirstnameUser();
        }
    }
    //!-----------------------------Check Field Values-----------------------------------

    private function checkFieldValues()
    {
        if (empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->one_password)) {
            return false;
        } else {
            return true;
        }
    }
    //!-------------------------------Name Exists-------------------------------------
    private function firstnameExists()
    {
        foreach ($this->stored_users as $user) {
            if (
                $this->firstname == $user["firstname"] ||
                $this->lastname == $user["lastname"] ||
                $this->email == $user["email"]
            ) {
                return true;
            }
        }
        return false;
    }
    //!-------------------------------User Exists----------------------------------------
    private function ifirstnameUser()
    {
        if ($this->firstnameExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
            } else {
                return $this->error = "wrong";
            }
        }
    }
}
//!--------------------------------------------------------------------------------------
if (isset($_POST["submit"])) {
    $user = new  RegisterUser($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"],);
}

if (isset($_POST['submit'])) {
    $_POST["firstname"];
    $_POST["lastname"];
    $_POST["email"];
    $_POST["password"];
    header("Location:../Login/login.php");
    exit;
}
