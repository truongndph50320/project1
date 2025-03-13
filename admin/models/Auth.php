<?php
class Auth
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function login($ten_nguoi_dung, $mat_khau)
    {
        $conn = $this->conn;
        
        $sql = "SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung AND mat_khau = :mat_khau AND vai_tro = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['ten_nguoi_dung' => $ten_nguoi_dung, 'mat_khau' => $mat_khau]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['admin'] = true;
            $_SESSION['user'] = $user['ho_va_ten'];
            header('Location: ?act=/');
        } else {
            $_SESSION['error']= 'Sai tai khoan';
            header('Location: ?act=login');
            
            exit;
        }
    }

    public function logout()
    {
        // unset($_SESSION['user']);
        session_destroy();
        header('Location: ?act=login');
    }
    public function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin/auth/login');
        }
    }
}