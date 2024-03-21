<?php

class Config{

    private $HOST="127.0.0.1";
    private $USERNAME="root";
    private $PASSWORD="";
    private $DBNAME="business";
    public $conn;

    //connection of database
    public function __construct(){
        $this->conn=mysqli_connect($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DBNAME);

        if($this->conn==true){
            // echo "Connect";
        }
        else{
            // echo "No connection";
        }

    }


    //get single record from database
    public function getSingleProduct($id){
        $query="SELECT * FROM product WHERE pid=$id";

        $res=mysqli_query($this->conn,$query);
        return $res;
    }


        //insert student query into database
        public function insertData($name,$price,$des){
         $query="INSERT INTO product(name,price,des) VALUES('$name','$price','$des')";
        $res = mysqli_query($this->conn,$query);

        if($res){
            // echo "Success";
        }
        else{
            // echo "Error";
        }
        return $res;
    }

    public function insertCustomerData($name,$phone,$purchase){
        $query="INSERT INTO customer(name,phone,purchase) VALUES('$name','$phone','$purchase')";
       $res = mysqli_query($this->conn,$query);

       if($res){
           // echo "Success";
       }
       else{
           // echo "Error";
       }
       return $res;
   }

   public function insertOrderData($cid,$pid,$tamt){
    $query="INSERT INTO order(ci,pid,tamt) VALUES('$cid','$pid','$tamt')";
   $res = mysqli_query($this->conn,$query);

   if($res){
       // echo "Success";
   }
   else{
       // echo "Error";
   }
   return $res;
}






   //display student query from database
   public function getData(){
        $query = "SELECT * FROM product";
        $res = mysqli_query($this->conn,$query);

//         while($row = mysqli_fetch_array($res)){
//             $row = mysqli_fetch_array($res);
//         print_r($row);
//         echo "<br>";          
//    }

        return $res;

   }

   //delete student query from database
   public function deleteProduct($id){
        $query="DELETE FROM product WHERE pid=$id";
        $res=mysqli_query($this->conn,$query);
        print_r($res);
        return $res;
   }

   //update student query from database
   public function updateProduct($pid,$name,$price,$des){
    $query="UPDATE product SET name='$name',price='$price','$des' WHERE pid=$id";
    $res=mysqli_query($this->conn,$query);
    return $res;
   }


   public function registerUser($name,$password){
    $query="INSERT INTO user(user_name,password) VALUES('$name','$password')";
        $res = mysqli_query($this->conn,$query);

        if($res){
            // echo "Success";
        }
        else{
            // echo "Error";
        }
        return $res;
   }

}


?>