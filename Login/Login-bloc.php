<?php
class LoginUser
{
    private $email;
    private $password;
    public $error;
    public $success;
    private $storage = "../data.json";
    private $stored_users;
    //!-----------------------------------------------------------------------
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->Login();
    }
    //!---------------------------------Check Users-------------------------------------
    private function Login()
    {
        $userFound = false;
        foreach ($this->stored_users as $user) {
            if ($user['email'] == $this->email) {
                if (password_verify($this->password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $this->email;
                    $userFound = true;
                }
            }
        }
        //!----------------------------------------------------------------------------
        if ($userFound) {
            header("location:../FileManager/filemanager.php");
            exit();
        } else {
            return $this->error = "wrong email or password";
        }
    }
}
