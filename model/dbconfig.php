<?php
class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = 'mysql';
    private $dbname ='msp';

    private $conn = NULL;
    private $result = NULL;
    
    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if($this->conn->connect_error){
            echo "Kết nối thất bại: " . $this->conn->connect_error;
            exit();
        }
        else{
            $this->conn->set_charset('utf8');
        }
        return $this->conn;
    }

    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }

    public function getAllData($table){
        $sql = "SELECT * FROM $table ";
        $this->execute($sql);
        if($this->num_rows()==0){
            $data = 0;
        }
        else{
            while($datas = $this->getData()){ // Changed $data to $row
                $data[] = $datas; // Appended $row to $data
            }
        }
        return $data;
    }
    // phương thức lấy dữ liệu cần sửa

    public function getDataID($table, $id){
        $sql ="SELECT * FROM $table WHERE id= '$id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data = mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }

    // Phương thức đếm số bản ghi
    public function num_rows(){
        if($this->result){
            $num= mysqli_num_rows($this->result);
        }else{
            $num =0;
        }
        return $num;

    }
    public function InsertData($name, $category_id, $img, $price, $size,$information) {
        $sql = "INSERT INTO products(name, category_id, img, price, size, information) 
                VALUES ('$name', '$category_id', '$img', '$price', '$size','$information')";
        return $this->execute($sql);
    }
    

    public function UpdateData($id, $name, $category_id, $img, $price, $size, $information){
        $sql = "UPDATE products SET name='$name', category_id='$category_id', img='$img', price='$price', size='$size', information= '$information' WHERE id='$id'";
        return $this->execute($sql);
    }
    public function Delete($id, $table){
        $sql = "DELETE FROM $table WHERE id='$id'";
        return $this->execute($sql);
    }
    // phương thức tìm kiếm dữ liệu 
    public function getDatafrom($table, $column, $id){
        $sql ="SELECT * FROM $table WHERE $column = '$id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $result = mysqli_fetch_array($this->result);
        }
        else{
            $result = 0;
        }
        return $result;
    }
    public function getDataCart($id){
        $sql ="SELECT * FROM cart WHERE user_id= $id";
        $this->execute($sql);
        $data = array(); // Khởi tạo mảng để lưu dữ liệu
        if($this->num_rows() > 0){ // Kiểm tra xem có hàng nào được trả về không
            while($row = mysqli_fetch_array($this->result)){
                $data[] = $row; // Thêm hàng vào mảng dữ liệu
            }
        }
        return $data;
    }
    public function AddFavor($id_pro,$id_user) {
        $sql = "INSERT INTO cart(product_id, user_id) 
                VALUES ('$id_pro', '$id_user')";
        return $this->execute($sql);
    }

    public function CheckExistCart($table, $id, $user_id){
        $sql ="SELECT * FROM $table WHERE product_id = '$id' and user_id = '$user_id'";
        $this->execute($sql);
        if($this->num_rows()!=0){
            $data = mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }
    public function DeleteFavor($id){
        $sql = "DELETE FROM cart WHERE cart_id = $id";
        return $this->execute($sql);
    }
    public function SearchData($table, $key){
        $sql = "SELECT * FROM $table WHERE name LIKE '%$key%' ORDER BY id DESC"; // Sử dụng LIKE thay vì REGEXP
        $this->execute($sql);
        
        $data = array(); // Khởi tạo mảng $data trước khi sử dụng
    
        if($this->num_rows() == 0){
            $data = 0;
        } else {
            while($datas = $this->getData()){
                $data[] = $datas;
            }
        }
        return $data;
    }
    

}
?>