<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Headers: X-Requested-With');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
        header('Access-Control-Max-Age: 86400');
    	header("HTTP/1.1 200 OK");
    exit();
}


//$currentusername="";
//Access-Control-Allow-Origin: *
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

                       $q= new \stdClass();
$json = file_get_contents('php://input');
$json_data = json_decode($json, true);
                            $token= $json_data["token"];
							$route=$json_data['route'];
                            $logindata=base64_decode(trim($token));
                           
                            if(isset($logindata))
                            {
                                
                                $logins= explode(":", $logindata);
								$userid=$logins[0];
								if($route=='adminlogin')
									$userid=$logins[0];
                               	$resultrow=PDO_FetchRow('Select password,ifnull(isadmin,0) isadmin from users where username=?',[$userid]);
							
								$isadmin=$resultrow['isadmin'];
								
								if($resultrow['password']==$logins[1])
								{
									$token=GUID();

									PDO_Execute('insert into tokens(token,username,currentusername,genon,expireson,userid)
		values(?,?,?,now(),date_add(now(), Interval 1 Hour),?)',[$token,$userid,$userid,$userid]);
								    $q->result = "1";
									$q->token = $token;
									$q->isadmin = $isadmin;
								}
								else{
									$q->result="0";								
                                }
    }
    else
    {
		$q->result="0";
    }
  
     echo  json_encode($q);
                            
                            
                        
                        
                        
                        
                       