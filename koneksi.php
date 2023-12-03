<?php
session_start();

class koneksi {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "crudbuku";
    protected $connection;

    function __construct(){
    $this->connection = new mysqli($this->server,$this->username,$this->password,$this->db);
    
    if(!$this->connection){
        echo "koneksi gagal";
    }
    return $this->connection;
    }
}

class crud extends koneksi{
    public function __construct(){
        parent::__construct();
    }

    public function login($username,$password){
        $query = mysqli_query($this->connection, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $rec = mysqli_fetch_array($query);
        $row = mysqli_num_rows($query);
  
        if($row == 1){
          $_SESSION['user'] = true;
  
          return true;
        }else{
          return false;
        }
    }

    public function read($table,$table2,$genre,$idgenre,$nama){
        $query = "SELECT * FROM $table LEFT JOIN $table2 ON $table.$genre = $table2.$idgenre ORDER BY $nama";
        $result = $this->connection->query($query);

        if(!$result){
            return "terjadi kesalahan";
        }
        $rec = array();
        while($row = $result->fetch_array()){
            $rec[] = $row;
        }
        return $rec;
    }
    public function sort($table,$nama){

        $query = "SELECT * FROM $table ORDER BY $nama";
        $result = $this->connection->query($query);
        if(!$result){
            return "terjadi kesalahanan";
        }
        $rec = array();
        while($row = $result->fetch_array()){
            $rec[] = $row;
        }
        return $rec;
    }
    public function readId($table,$id,$idvalue){
        $data = null;
 
        $query = "SELECT * FROM $table WHERE $id = '".$idvalue."'";
        if ($result = $this->connection->query($query)) {
            while($row = $result->fetch_array()){
                $data = $row;
            }
        }
        return $data;
    }        
    public function create($table,$data){
        $field = implode(",",array_keys($data));
        $escaped_values = array_map(array($this->connection, 'real_escape_string'), array_values($data));
        foreach($escaped_values as $id=>$data) $escaped_values[$id] = "'".$data."'";
        $values = implode(",",$escaped_values);
        $query = "INSERT INTO $table ($field) VALUES ($values)";
        $result = $this->connection->query($query);
    
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function update($table,$data){
        $query = "UPDATE $table SET judul = '$data[judul]', pengarang = '$data[pengarang]', penerbit = '$data[penerbit]', genre = '$data[genre]', th_terbit = '$data[th_terbit]' WHERE kdbuku = '$data[id]'";
        $result = $this->connection->query($query);

        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function updateGenre($table,$data){
        $query = "UPDATE $table SET genre = '$data[genre]' WHERE kdgenre = '$data[id]'";
        $result = $this->connection->query($query);

        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function delete($table,$id,$idvalue){
        $query = "DELETE FROM $table WHERE $id='".$idvalue."'";
        $result = $this->connection->query($query);

        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>