<?php
class product{
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
    public function InsertData($name, $category, $img, $price, $size, $quantity,$information) {
        $sql = "INSERT INTO products(name, category, img, price, size, quantity, information) 
                VALUES ('$name', '$category', '$img', '$price', '$size', '$quantity','$information')";
        return $this->execute($sql);
    }
    

    public function UpdateData($id, $name, $category, $img, $price, $size, $quantity, $information){
        $sql = "UPDATE products SET name='$name', category='$category', img='$img', price='$price', quantity='$quantity', information= '$information' WHERE id='$id'";
        return $this->execute($sql);
    }

    public function Delete($id, $table){
        $sql = "DELETE FROM $table WHERE id='$id'";
        return $this->execute($sql);
    }
}
?>