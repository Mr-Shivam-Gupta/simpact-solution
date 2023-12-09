<?php
include "config.php";



if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Headers: Content-Type');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
	header("HTTP/1.1 200 OK");
	exit();
}


//$currentusername="";
//Access-Control-Allow-Origin: *
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: *");

$q = new \stdClass();
$json = file_get_contents('php://input');
$json_data = json_decode($json, true);


extract($json_data);


$q = new \stdClass();
$q->result = 0;
if ($route == "register") {

	$tempuserid = PDO_FetchOne("select userid from newids where used is null order by rowid desc for update");
	PDO_Execute("update newids set used=1 where userid=?", [$tempuserid]);
	$newuserid = $tempuserid;

	PDO_Execute("Insert into `binary`(userid,sid) values(?,?)", [$newuserid, $sid]);
	PDO_Execute("Insert into personalinfo(userid,name,mobile,email,doj,sponsorid) values(?,?,?,?,now(),?)", [$newuserid, $name, $mobile, $email, $sid]);
	PDO_Execute("Insert into users(username,password,isadmin,userid,email) values(?,?,0,?,?)", [$newuserid, $password, $newuserid, $email]);
	PDO_Execute("Insert into upliners(userid,upliners,level) values(?,?,1)", [$newuserid, $sid]);
	PDO_Execute("Insert into upliners(userid,upliners,level) select ?,upliners,level+1 from upliners where userid=?", [$newuserid, $sid]);
	$q->result = 1;
	$q->newuserid = $newuserid;


	$sidtoken_address = PDO_FetchOne("select address from sec_tokens where userid=?", [$sid]);
	transfertoken($sidtoken_address, 1000);
	PDO_Execute("insert into sec_token_account(userid,amount,transdate,narration,ref_userid) values (?,?,now(),?,?)", [$sid, 1000, $newuserid, $newuserid]);
	sleep(2);
	generatebscaddress($newuserid);
	$token_address = PDO_FetchOne("select address from sec_tokens where userid=?", [$newuserid]);
	transfertoken2($token_address, 500);
	PDO_Execute("insert into sec_token_account(userid,amount,transdate,narration,ref_userid) values (?,?,now(),?,?)", [$newuserid, 500, $newuserid, $newuserid]);
}
// if($route=="register")
//                 {


// 					if (PDO_Execute("Insert into users(username,password,isadmin,email) values(?,?,0,?)",[$username,$password,$email])) {
// 						$q->result=1;
// 					}else{
// 						$q->result=0;
// 					}


// $tempuserid=PDO_FetchOne("select userid from newids where used is null order by rowid desc for update");
// PDO_Execute("update newids set used=1 where userid=?",[$tempuserid]);
// $newuserid=$tempuserid;

// PDO_Execute("Insert into `binary`(userid,sid) values(?,?)",[$newuserid,$sid]);
// PDO_Execute("Insert into personalinfo(userid,name,mobile,email,doj,sponsorid) values(?,?,?,?,now(),?)",[$newuserid,$name,$mobile,$email,$sid]);
// PDO_Execute("Insert into upliners(userid,upliners,level) values(?,?,1)",[$newuserid,$sid]);
// PDO_Execute("Insert into upliners(userid,upliners,level) select ?,upliners,level+1 from upliners where userid=?",[$newuserid,$sid]);
// $q->result=1;
// $q->newuserid=$newuserid;

// $sidtoken_address=PDO_FetchOne("select address from sec_tokens where userid=?",[$sid]);
// transfertoken($sidtoken_address,1000);
// PDO_Execute("insert into sec_token_account(userid,amount,transdate,narration,ref_userid) values (?,?,now(),?,?)",[$sid,1000,$newuserid,$newuserid]);
// sleep(2);
// generatebscaddress($newuserid);
// $token_address=PDO_FetchOne("select address from sec_tokens where userid=?",[$newuserid]);
// transfertoken2($token_address,500);
// PDO_Execute("insert into sec_token_account(userid,amount,transdate,narration,ref_userid) values (?,?,now(),?,?)",[$newuserid,500,$newuserid,$newuserid]);
// }

if ($route == "checksid") {

	if (PDO_FetchOne("select count(*) from personalinfo where userid=?", [$sid]) > 0) {
		$q->result = 1;
		$q->name = PDO_FetchOne("select name from personalinfo where userid=?", [$sid]);
	} else {

		$q->result = 0;
	}
}

if ($route == "checkmobile") {
	/*if(PDO_FetchOne("select count(*) from personalinfo where contact=?",[$mobile]) >= 3)
	{
		$q->result=0;		
		
		
	}
	else
	{
		
		
	}*/
	$q->result = 1;
}

if ($route == "checkemail") {
	if (PDO_FetchOne("select count(*) from personalinfo where email=?", [$email]) >= 1) {

		$q->result = 0;
	} else {
		$q->result = 1;
	}
}
// if($route== "login"){
// 	if(PDO_FetchOne("SELECT * FROM users WHERE username = ? AND password = ?",[$username],[$password])){

// 		$q->result=1;		
// 	}
// 	else{

// 		$q->result=0;
// 	}
// }
if ($route == "login") {

	if (PDO_FetchOne("SELECT * FROM users WHERE username = ? AND password = ?", [$username, $password]) >= 1) {
		$q->result = 1;
	} else {
		$q->result = 0;
	}
}
if ($route == "checkuid") {
	if (PDO_FetchOne("select count(*) from upliners where userid=? and upliners=?", [$uid, $sid]) > 0 || $sid == $uid) {
		$q->result = 1;
		$q->name = PDO_FetchOne("select name from personalinfo where userid=?", [$uid]);
		$uidcount = PDO_FetchOne("select count(*) from `binary` where uid=?", [$uid]);
		if ($uidcount == 1)
			$q->side = PDO_FetchOne("select leftright from `binary` where uid=?", [$uid]);
		if ($uidcount == 0)
			$q->side = 2;
		if ($uidcount == 2)
			$q->side = 3;
	} else {
		$q->result = 0;
		$q->side = 3;
	}
}

if ($route == "activeplanlist") {
	$q->data = PDO_FetchAll("select planid,planname from plans where enablejoining=1 order by planid");
}
echo json_encode($q);


function transfertoken($toaddress, $amount)
{
	$curl2 = curl_init();
	curl_setopt_array($curl2, [
		CURLOPT_URL => "https://api.tatum.io/v3/blockchain/token/transaction",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{\"chain\":\"BSC\",\"contractAddress\":\"0x7Ce631315234A224A6b59aff6ee60cF96631C695\",\"fromPrivateKey\":\"0x7abb12b392120a47f1d6354f2746ba79b7744bf54f463f966c6c082b662a530d\",\"to\":\"$toaddress\",\"amount\":\"$amount\",\"digits\":18}",
		CURLOPT_HTTPHEADER => [
			"Content-Type: application/json",
			"x-api-key: t-6532bb7f1d7015001caf527d-8611c8d3ac494d04b6e87d2a"
		],
	]);
	$response2 = curl_exec($curl2);
	$err = curl_error($curl2);
	curl_close($curl2);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		//echo $response2;
	}
}

function transfertoken2($toaddress, $amount)
{
	$curl21 = curl_init();
	curl_setopt_array($curl21, [
		CURLOPT_URL => "https://api.tatum.io/v3/blockchain/token/transaction",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{\"chain\":\"BSC\",\"contractAddress\":\"0x7Ce631315234A224A6b59aff6ee60cF96631C695\",\"fromPrivateKey\":\"0x7abb12b392120a47f1d6354f2746ba79b7744bf54f463f966c6c082b662a530d\",\"to\":\"$toaddress\",\"amount\":\"$amount\",\"digits\":18}",
		CURLOPT_HTTPHEADER => [
			"Content-Type: application/json",
			"x-api-key: t-6532bb7f1d7015001caf527d-8611c8d3ac494d04b6e87d2a"
		],
	]);
	$response21 = curl_exec($curl21);
	$err = curl_error($curl21);
	curl_close($curl21);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		//echo $response21;
	}
}


function generatebscaddress($cuserid)
{

	PDO_Execute("Insert into sec_tokens(userid) values(?)", [$cuserid]);
	$rowid = PDO_LastInsertId();


	$mnemonic = PDO_FetchOne("SELECT GROUP_CONCAT( word SEPARATOR ' ') as word FROM (SELECT word FROM `mnemonic` ORDER BY RAND() LIMIT 12) as w1; ");

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.tatum.io/v3/bsc/wallet?mnemonic=" . urlencode($mnemonic),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-api-key:  t-6532bb7f1d7015001caf527d-8611c8d3ac494d04b6e87d2a"
		),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	$xpub = json_decode($response)->xpub;

	$curl2 = curl_init();
	curl_setopt_array($curl2, array(
		CURLOPT_URL => "https://api.tatum.io/v3/bsc/address/" . $xpub . "/0",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-api-key:  t-6532bb7f1d7015001caf527d-8611c8d3ac494d04b6e87d2a"
		),
	));
	$response2 = curl_exec($curl2);
	$err = curl_error($curl2);

	curl_close($curl2);
	$address = json_decode($response2)->address;



	$paymenturl = $address;
	$curl3 = curl_init();
	curl_setopt_array($curl3, array(
		CURLOPT_URL => "https://api.tatum.io/v3/bsc/wallet/priv",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{\n  \"index\": 0,\n  \"mnemonic\": \"" . $mnemonic . "\"\n}",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/json",
			"x-api-key:  t-6532bb7f1d7015001caf527d-8611c8d3ac494d04b6e87d2a"
		),
	));
	$response3 = curl_exec($curl3);
	$err = curl_error($curl3);

	curl_close($curl3);
	$privatekey = json_decode($response3)->key;



	PDO_Execute("update sec_tokens set address=?,xpub=?,mnemonic=?,privatekey=? where rowid=?", [$paymenturl, $xpub, $mnemonic, $privatekey, $rowid]);
}
