<?php

class Users
{
    private $conn;

    public function __construct()
    {

        $this->conn = connectDB();
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function show($id)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // update
    public function update($id, $data)
    {
        $sql = "UPDATE nguoi_dungs SET 
                ten_nguoi_dung = :ten_nguoi_dung, 
                ho_va_ten = :ho_va_ten, 
                email = :email, 
                sdt = :sdt, 
                dia_chi = :dia_chi, 
                
                ngay_sinh = :ngay_sinh, 
                gioi_tinh = :gioi_tinh, 
                avatar = :avatar
                WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // public function updatepass($id, $mat_khau)
    // {
    //     $sql = "UPDATE nguoi_dungs SET 
    //             mat_khau = :mat_khau
    //             WHERE id = :id";
    //     $stmt = $this->conn->prepare($sql);

    //     //Gán giá trị vào các tham số
    //     $stmt->bindParam(':id', $id);
    //     $stmt->bindParam(':mat_khau', $mat_khau);
    //     $stmt->execute();
    // }


    public function updatepass($id, $mat_khau)
{
    try {
        $sql = "UPDATE nguoi_dungs 
                SET mat_khau = :mat_khau
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        // Gán giá trị vào các tham số
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':mat_khau', $mat_khau, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true; // Truy vấn thành công
        } else {
            return false; // Truy vấn thất bại
        }
    } catch (PDOException $e) {
        // Ghi log lỗi hoặc thông báo lỗi tùy ý
        error_log("Error updating password: " . $e->getMessage());
        return false;
    }
}


    public function registera($data)
    {
        $sql = "INSERT INTO nguoi_dungs(ten_nguoi_dung, ho_va_ten, email, sdt, mat_khau, gioi_tinh, avatar, vai_tro, trang_thai) 
                VALUES (:ten_nguoi_dung, :ho_va_ten, :email, :sdt, :mat_khau , :gioi_tinh, 'admin/uploads/avatars/images.jpg' , 1 , 1)";
                echo "set sql";
        $stmt = $this->conn->prepare($sql);
        echo "cb sql";
        try {
            $stmt->execute([
                ':ten_nguoi_dung' => $data['ten_nguoi_dung'],
                ':ho_va_ten' => $data['ho_va_ten'],
                ':email' => $data['email'],
                ':sdt' => $data['sdt'],
                ':mat_khau' => $data['mat_khau'],
                ':gioi_tinh' => $data['gioi_tinh']
                ]);
                
            header('Location: ?act=login');
            exit;
        } catch (PDOException $e) {
            error_log("Lỗi khi đăng ký: " . $e->getMessage());
            $_SESSION['error'] = 'Lỗi khi đăng ký: ' . $e->getMessage();
        }
    }
    public function register($data)
    {
        $sql = "INSERT INTO nguoi_dungs(ten_nguoi_dung, ho_va_ten, email, sdt, mat_khau, gioi_tinh, avatar, vai_tro, trang_thai) 
                VALUES (:ten_nguoi_dung, :ho_va_ten, :email, :sdt, :mat_khau , :gioi_tinh, '/uploads/avatars/images.jpg' , 1 , 1)";
                echo "set sql";
        $stmt = $this->conn->prepare($sql);
        echo "cb sql";
            $stmt->execute([
                ':ten_nguoi_dung' => $data['ten_nguoi_dung'],
                ':ho_va_ten' => $data['ho_va_ten'],
                ':email' => $data['email'],
                ':sdt' => $data['sdt'],
                ':mat_khau' => $data['mat_khau'],
                ':gioi_tinh' => $data['gioi_tinh']
                ]);
                
            header('Location: ?act=login');

    }
    public function isUserExist($ten_nguoi_dung)
    {
        $sql = "SELECT COUNT(*) FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ten_nguoi_dung' => $ten_nguoi_dung]);
        return $stmt->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
    }

    public function isEmailExist($email)
    {
        $sql = "SELECT COUNT(*) FROM nguoi_dungs WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
    }

    public function isPhoneExist($sdt)
    {
        $sql = "SELECT COUNT(*) FROM nguoi_dungs WHERE sdt = :sdt";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['sdt' => $sdt]);
        return $stmt->fetchColumn() > 0; // Trả về true nếu sdt đã tồn tại
    }

    // Đăng nhập người dùng
    public function login($ten_nguoi_dung, $mat_khau)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE ten_nguoi_dung = :ten_nguoi_dung AND mat_khau = :mat_khau LIMIT 1";
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với tham số trực tiếp trong execute
        $stmt->execute([
            ':ten_nguoi_dung' => $ten_nguoi_dung,
            ':mat_khau' => $mat_khau
        ]);

        $nguoi_dungs = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($nguoi_dungs) {
            // $_SESSION['nguoi_dungs'] = $nguoi_dungs;  // Lưu toàn bộ thông tin người dùng vào session
            $_SESSION['id'] = $nguoi_dungs['id'];
            return $nguoi_dungs;  // Đăng nhập thành công
            // return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;  // Đăng nhập thất bại
        }
    }

    public function checkpass( $mat_khau)
    {
        $sql = "SELECT * FROM nguoi_dungs WHERE mat_khau = :mat_khau LIMIT 1";
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với tham số trực tiếp trong execute
        $stmt->execute([
            ':mat_khau' => $mat_khau
        ]);

        $nguoi_dungs = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($nguoi_dungs) {
            // $_SESSION['nguoi_dungs'] = $nguoi_dungs;  // Lưu toàn bộ thông tin người dùng vào session
            $_SESSION['id'] = $nguoi_dungs['id'];
            return $nguoi_dungs;  // Đăng nhập thành công
            // return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;  // Đăng nhập thất bại
        }
    }
}
