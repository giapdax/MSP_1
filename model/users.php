<?php
class User {
    public $username;
    private $password;
    public $email;
    public $date_created;
    public $role_id;
    public $isActivated;
    public $pdo ;

    public function __construct($username= null, $password= null, $email= null, $date_created= null, $role_id= null, $isActivated = null, $pdo) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->date_created = $date_created;
        $this->role_id = $role_id;
        $this->isActivated = $isActivated;
        $this->pdo = $pdo;
    }

    // Phương thức thực thi truy vấn
    public function execute($sql) {
        try {
            $this->result = $this->pdo->query($sql);
            return $this->result;
        } catch (PDOException $e) {
            echo "Error executing SQL: " . $e->getMessage();
            return false; // Trả về false để biểu thị rằng có lỗi xảy ra
        }
    }
    
    // Phương thức lấy dữ liệu từ kết quả của truy vấn
    public function getDataUser(){
        if($this->result){
            $datauser = $this->result->fetch(PDO::FETCH_ASSOC);
        }
        else{
            $datauser = 0;
        }
        return $datauser;
    }
    
    // Phương thức lấy tất cả dữ liệu từ một bảng người dùng
    public function getAllDataUser($tableuser) {
        $sql = "SELECT * FROM $tableuser ";
        $this->execute($sql);
        if ($this->num_rows() == 0) {
            $datauser = 0;
        } else {
            while ($datausers = $this->getDataUser()) { 
                $datauser[] = $datausers; 
            }
        }
        return $datauser;
    }

    // Phương thức lấy dữ liệu người dùng dựa trên ID
    public function getDataIDUser($tableuser, $id) {
        $sql = "SELECT * FROM $tableuser WHERE id= :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        if ($stmt->rowCount() != 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $data = 0;
        }
        return $data;
    }
    
    // Phương thức đếm số bản ghi
    // Phương thức đếm số bản ghi
public function num_rows(){
    if($this->result){
        $num= $this->result->rowCount();
    } else {
        $num = 0;
    }
    return $num;
}

    // Phương thức cập nhật dữ liệu người dùng trong bảng dựa trên ID
    public function UpdateDataUser($id, $username, $email){
        $sql = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
        return $this->execute($sql);
    }
    // Phương thức xóa dữ liệu người dùng từ bảng dựa trên ID
    public function DeleteUser($tableuser, $id) {
        $sql = "DELETE FROM $tableuser WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true; // Trả về true nếu xóa thành công
        } else {
            return false; // Trả về false nếu có lỗi xảy ra khi thực thi câu lệnh xóa
        }
    }
    
}
?>
