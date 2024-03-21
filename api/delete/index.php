
<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Method:DELETE");

include("../../config.php");

$res=array();
$config=new Config();

if($_SERVER['REQUEST_METHOD']=="DELETE"){

    $data=array();
    
   //get data from file like file handling use this function
    $str=file_get_contents("php://input");  // returns String data => String(Array)

    //convert array string to array
    parse_str($str,$data);

    $id=$data['pid'];
    $record = $config->getSingleProduct($id);

  
    if(mysqli_num_rows($record)){

        $result=$config->deleteProduct($id);       
        $res['msg']=$result==1?"Deleted":"Failed";

    }else{
        http_response_code(403);
        $res['msg']="record not found.";

        
    }

   

}
else{

$res['msg']="Only delete method is allowed.";

}
print_r(json_encode($res));




?>
