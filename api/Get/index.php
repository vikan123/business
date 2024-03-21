<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Method:GET");

include("../../config.php");

$config=new Config();
$res=array();
$res['Data']=array();
if($_SERVER['REQUEST_METHOD']=="GET"){

    $data=$config->getData();
    // print_r($data);
    $length=0;

    while($record=mysqli_fetch_array($data)){

        for($i=0;$i<4;$i++){
            unset($record[$i]);
        }

        array_push($res['Data'],$record);
        $length++;
    }
    $res['total']=$length;
    http_response_code(200);

}else{
    $res['msg']="Only Get method is allowed";
}

print_r(json_encode($res));


?>