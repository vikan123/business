
<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Method:DELETE");

include("../../config.php");

$res=array();
$config=new Config();

if($_SERVER['REQUEST_METHOD']=="POST"){


    $pid=$_POST['pid'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $des=$_POST['des'];
    
    $record = $config->getSingleProduct($pid);

  
    if(mysqli_num_rows($record)){

        $result=$config->updateProduct($id,$name,$price,$des);       
        $res['msg']=$result==1?"Updated":"Failed";

    }else{
        http_response_code(403);
        $res['msg']="record not found.";
    }

}
else{

$res['msg']="Only post method is allowed.";

}
print_r(json_encode($res));




?>
