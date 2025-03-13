<?php
class AuthController
{
    private $authModel;

    public function __construct()
    {
        $this->authModel = new Auth();
    }
    //login
    public function login()
    {
        if (isset($_POST['login'])) {
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $mat_khau = md5($_POST['mat_khau']);

            $this->authModel->login($ten_nguoi_dung, $mat_khau);
        } else {
            require_once 'views/login.php';
        }
    }
    //logout
    public function logout()
    {
        $this->authModel->logout();
    }
}

?>