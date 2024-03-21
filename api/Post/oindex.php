<?php

//for specify json data
header("Content-Type:application/json");


//only for post method
header("Access-Control-Allow-Method:POST");

include("../../config.php");

$res=array();
$config=new Config();

if($_SERVER['REQUEST_METHOD']=="POST"){

    $cid=$_POST['cid'];
    $pid=$_POST['pid'];
    $tamt=$_POST['tamt'];

   $result= $config->insertOrderData($cid,$pid,$tamt);

   $res['msg']=$result==1?"Inserted":"Failed";
   http_response_code($result==1?201:403);
}
else{
    $res['msg']='Only Post method is allowed';
}

echo json_encode($res);

?>