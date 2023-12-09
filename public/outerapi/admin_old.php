<?php
include "_pdo.php";
include "config.php";
$watoken="60b124c17d90093bbe5e839d";//"60cf1ca446bfb88148ec771f";
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200");
    header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type");
    exit;
}


//$currentusername="";
//Access-Control-Allow-Origin: *
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: *");

//$host = "localhost"; //replace with your hostname
//$username = "dummy"; //replace with your username
//$password = "dummy"; //replace with your password 
//$db_name = "dummy"; //replace with your database

//PDO_Connect("mysql:host=$host;dbname=$db_name", $username, $password);

$json = file_get_contents('php://input');
$json_data = json_decode($json, true);

$username = '';
$token = '';
$id = 0;
$user_typeid = 0;
$q = '';
$routename = "";
$rowid = 0;
$mediaid = 0;

if (isset($json_data['token'])) {
    $token    = $json_data['token'];
    $routename = $json_data['route'];
    if ($json_data["data"] != null) {
        $dataArray = $json_data["data"];
        $user_typeid = $json_data["user_typeid"];
    } else {
        $data = $json_data["single_data"];
        $user_typeid = $json_data["user_typeid"];
    }
} elseif (isset($json_data[0]['token'])) {
    $token    = $json_data[0]['token'];
    $routename = $json_data[1]['route'];
    $data = $json_data[2][0];
	//echo 'data' .$data;
} else if (isset($_POST['token']))
{
    $token = $_POST['token'];
    $routename = $_POST['route'];
}
    
else {
    //echo 'not found 2';
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
$q = new \stdClass();

if (isset($token)) {

    $qparam = '';
    $qparamval = '';
    $arrcount = 0;
    $paramarr = array();

    $qparam = " Where token=? ";
    $paramarr[$arrcount] = $token;

    $signout_date = date("Y-m-d H:i:s");

    //$qparam = $qparam . " and expireson >=? ";
    //$paramarr[$arrcount + 1] = $signout_date;


    $SELECT_query = "SELECT * From tokens " . $qparam;

    $resultrow = PDO_FetchRow($SELECT_query, $paramarr);

    if ($resultrow != null) {
        $username = $resultrow['username'];
    } else {
        $q->token = "";
        $q->result = 0;
        $q->msg = 'login again';
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode($q);
        exit;
    }
} else if (isset($_POST['token']) && $_POST['token'] != "") {

    $qparam = '';
    $qparamval = '';
    $arrcount = 0;
    $paramarr = array();

    $qparam = " Where token=? ";
    $paramarr[$arrcount] = $_POST['token'];

    $qparam = $qparam . " and signoutdate >=? ";
    $paramarr[$arrcount + 1] = $signout_date;


    $SELECT_query = "SELECT * From token " . $qparam;

    $resultrow = PDO_FetchRow($SELECT_query, $paramarr);

    if ($resultrow != null) {
        $username = $result['username'];
        // $id = $resultrow['cusid'];
        // $rowid = $resultrow['id'];
    } else {
        $q->token = "";
        $q->result = 0;
        $q->msg = 'login again';
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode($q);
        exit;
    }
} else {
    $q->status = 0;
    $q->msg = 'HTTP/1.1 401 Unauthorized';
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode($q);
    exit;
}

$q = new \stdClass();

if($routename=="deletepayout")
{
	extract($data);
	PDO_Execute("DELETE FROM payout WHERE payoutid=?",[$payoutid]);
	PDO_Execute("DELETE FROM binarypayout WHERE durationid=?",[$payoutid]);
	PDO_Execute("DELETE FROM userpayoutsummary WHERE payoutid=?",[$payoutid]);
	PDO_Execute("delete from leadershipamt where payoutid=?",[$payoutid]);
	PDO_Execute("delete from useraccount where orderid=?",[$payoutid]);
	PDO_Execute("DELETE from userrepurchasepayout WHERE payoutid=?",[$payoutid]);
	PDO_Execute("DELETE FROM royaltypayout WHERE payoutid=?",[$payoutid]);
	$q->result=1;
}


if($routename=="deleteuser")
{
	extract($data);
   PDO_Execute("delete from `binary` where userid=?",[$userid]);
        PDO_Execute("delete from personalinfo where userid=?",[$userid]);
PDO_Execute("delete from users where username=?",[$userid]);
	PDO_Execute("delete from upliners where userid=?",[$userid]);
}


if($routename=="autopoollist")
{
	   if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
	   }
 $q->data=PDO_FetchAll("select pf.userid,autopool.rowid,pf.name,pf.city,autopool.entrydate,autopool.achievedon,autopool.achieved from personalinfo pf join autopool on autopool.userid=pf.userid order by autopool.rowid desc".$limit);
					   
					   $q->totalrows=PDO_FetchOne("select count(*) from autopool");
}
					   
if($routename=="addtoautopool")
{
	extract($data);
   PDO_Execute("insert into autopool(userid,entryby,entrydate) values(?,?,now())",[$userid,$username]);
	$rowid=PDO_LastInsertId();
	if(fmod(($rowid-1),64)==0)
	{
		$lastid=$rowid-1;
		$lastid=$lastid/64;
		PDO_Execute("update autopool set achieved=1,achievedon=now() where rowid=?",[$lastid]);
	}
       $q->result=1;
}



if($routename=="activeplans")
{
    $q->planlist=PDO_FetchAll("select planid,planname from plans where isactive=1");

}

if($routename=="planlist")
{
    $q->planlist=PDO_FetchAll("select planid,planname,planvalue,basicplanvalue,pvalue,enablejoining joinable,isactive from plans order by enablejoining desc,isactive desc,planid desc");
}

if($routename=="updateplan")
{
    $enablejoinig=$data['enablejoining'];
    $isactive=$data['isactive'];
    $planvalue=$data['planvalue'];
    $basicplanvalue=$data['basicplanvalue'];
    $directincome=$data['directincome'];
    $pvalue=$data['pvalue'];
    $pvalue2=$data['pvalue2'];
    $planname=$data['planname'];
    $planid=$data['planid'];
    PDO_Execute("update plans set planname=?,isactive=?,planvalue=?,basicplanvalue=?,pvalue=?,pvalue2=?,enablejoining=? where planid=?",[$planname,$isactive,$planvalue,$basicplanvalue,$pvalue,$pvalue2,$enablejoinig,$planid]);
    $q->result=1;

}

if($routename=="newplan")
{
    $enablejoinig=$data['enablejoining'];
    $isactive=$data['isactive'];
    $planvalue=$data['planvalue'];
    $basicplanvalue=$data['basicplanvalue'];
    $directincome=$data['directincome'];
    $pvalue=$data['pvalue'];
    $pvalue2=$data['pvalue2'];
    $planname=$data['planname'];
    //$planid=$data['planid'];
    PDO_Execute("insert into plans(planname,isactive,planvalue,basicplanvalue,pvalue,pvalue2,enablejoining) values (?,?,?,?,?,?,?)",[$planname,$isactive,$planvalue,$basicplanvalue,$pvalue,$pvalue2,$enablejoinig]);
    $q->planid=PDO_LastInsertId;
    $q->result=1;
}

if($routename=="releasesallary")
{
    $rowid=$data['rowid'];
    PDO_Execute("Update userssalary set paidon =now() where rowid=?",[$rowid]);
    $q->result=1;
}


if($routename=="adminstock")
{
    $q->result=1;
    $q->stocklist=PDO_FetchAll("Select ip.productname,ip.productid,sum(instock-outstock) from repurchaseproducts ip join adminstock on adminstock.productid=ip.productid group by ip.productid,ip.productname");
}

if($routename=="resellerstock")
{
    $userid=$data['userid'];
    $q->result=1;
    $q->stocklist=PDO_FetchAll("Select ip.productname,ip.productid,sum(instock-outstock) from repurchaseproducts ip join resellerstock rs on rs.productid=ip.productid where userid=? group by ip.productid,ip.productname",[$userid]);
 
}

if($routename=="getuserdetail")
{
    $userid=$data['userid'];
	$q->result=1;
	$data=PDO_FetchRow("select pf.userid,pf.name,pf.city from personalinfo pf where userid=?",[$userid]);
    $q->data=$data;
	if(!$data) $q->result=0;
 
}

if($routename=="upgradetofranchise_x")
{
    $userid=$data['userid'];
    $q->result=1;
    PDO_Execute("Update `binary` set isdistributor=1 where userid=?",[$userid]);
}


if($routename=="updateuserproducts")
{
    extract($data);
    $q->result=1;
    PDO_Execute("update userproducts set status=?,statuson=now(),statusby=?,remarks=?,productname=? where userid=?",[$status,$username,$remarks,$productname,$userid]);
}

if($routename=="userproducts")
{
    extract($data);
    $q->result=PDO_FetchRow("select up.*,pf.name,pf.city,pf.contact,ups.status currentstatus from userproducts up join personalinfo pf on pf.userid=up.userid join userproductsstatus ups on ups.rowid=up.status where up.userid=?",[$userid]);
}

if($routename=="removefranchise")
{
    $userid=$data['userid'];
    $q->result=1;
    PDO_Execute("Update `binary` set isdistributor=null where userid=?",[$userid]);
}

if($routename=="allotpins")
{
	extract($data);
    $q->result=1;
    PDO_Execute("Insert into pins (pinno,forid,allotedon,planid,allotedby) select FLOOR(RAND()*(100000-10000+1)+10000),?,now(),?,? from generator_4k limit ".$qty,[$userid,$planid,$username]);
}

if($routename=="upgradeplan")
{
	$userid=$data['userid'];
	PDO_Execute("update `binary` b join upliners on upliners.userid=b.userid set upliners.pvalue=1,upliners.udoa=now() where b.userid=? and b.planid=2",[$userid]);
PDO_Execute("update `binary` b set b.planid=1,b.greenon=now(),greentype=3 where b.userid=? and b.planid=2",[$userid]);
	$q->result=1;
}


if ($routename == "allotedpins") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
            if (isset($data["fromdate"]) && $data["fromdate"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.allotedon>=?";
                $paramarr[] = $data["fromdate"];
            }

            if (isset($data["uptodate"]) && $data["uptodate"] != "" ) {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.allotedon<=date_add(?,interval 1 day)";
                $paramarr[] = $data["uptodate"];
            }
			
		
			if (isset($data["planid"]) && $data["planid"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`plans`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }
		
			if (isset($data["userid"]) && $data["userid"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "personalinfo.userid=?";
                $paramarr[] = $data["userid"];
            }

           
              $SELECT_query = "SELECT personalinfo.userid, personalinfo.name, personalinfo.doj, personalinfo.city, `pins`.allotedon, plans.planname, count(*) qty, allotedby
             From  personalinfo join pins on pins.forid=personalinfo.userid 
			 join plans on plans.planid=`pins`.planid " . $qparam . " group by personalinfo.userid, personalinfo.name, personalinfo.doj, personalinfo.city, `pins`.allotedon, plans.planname, allotedby order by `pins`.allotedon desc " . $limit;
			
			
            $count_query = "select count(*) from (SELECT personalinfo.userid 
             From  personalinfo
			join pins on pins.forid=personalinfo.userid 
            Join `plans` on plans.planid=pins.planid " . $qparam . " group by personalinfo.userid, personalinfo.name, personalinfo.doj, personalinfo.city, `pins`.allotedon, plans.planname) t1";



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}


if ($routename == "kyclist") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
            
			$orderparam=" order by `userkyc`.submitted_on desc ";
		
			if (isset($data["status"]) && $data["status"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`userkyc`.status,0)=?";
                $paramarr[] = $data["status"];
            }
		
			if (isset($data["userid"]) && $data["userid"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "personalinfo.userid=?";
                $paramarr[] = $data["userid"];
            }
		
		if ((isset($data["fromdate"]) && $data["fromdate"] != "") && (isset($data["uptodate"]) && $data["uptodate"] != "")) {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
				if($data['status']=='1')				
                	$qparam = $qparam . "userkyc.submitted_on >= ? and submitted_on <=date_add(?,interval 1 day)";               
				else	
				{
				 	$qparam = $qparam . "userkyc.status_on >= ? and status_on <=date_add(?,interval 1 day)";
					$orderparam=" order by `userkyc`.status_on desc ";
				}
                $paramarr[] = $data["fromdate"];
				$paramarr[] = $data["uptodate"];
								
            }
		
	

           
              $SELECT_query = "SELECT personalinfo.userid, personalinfo.name, personalinfo.doj, personalinfo.city, personalinfo.contact mobile,pan,ifsc,acno,aadhar, `userkyc`.submitted_on, kyctype,docvalue,status_by,status_on, `kycstatus`.status,`userkyc`.rowid
             From  personalinfo join userkyc on userkyc.userid=personalinfo.userid 
			 join `kycstatus` on `kycstatus`.rowid=`userkyc`.status " . $qparam . $orderparam;
			
			
            $count_query = "select count(*) from (SELECT personalinfo.userid
             From  personalinfo join userkyc on userkyc.userid=personalinfo.userid 
			 join `kycstatus` on `kycstatus`.rowid=`userkyc`.status " . $qparam . ") t1";



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}

if($routename=="updatekyc")
{
	extract($data);
    $q->result=1;
    PDO_Execute("update userkyc set status=?,status_on=now(),status_by=? where rowid=?",[$status,$username,$rowid]);
}


if ($routename == "usedpins") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
            if (isset($data["fromdate"]) && $data["fromdate"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.usedon>=?";
                $paramarr[] = $data["fromdate"];
            }

            if (isset($data["uptodate"]) && $data["uptodate"] != "" ) {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.usedon<=date_add(?,interval 1 day)";
                $paramarr[] = $data["uptodate"];
            }
			
		
			if (isset($data["planid"]) && $data["planid"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`plans`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }
		
			if (isset($data["userid"]) && $data["userid"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "personalinfo.userid=?";
                $paramarr[] = $data["userid"];
            }
		
		
			if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "pins.usagetype=1";
           
            $SELECT_query = "SELECT personalinfo.userid, personalinfo.name, personalinfo.doj, personalinfo.city, `pins`.usedon, plans.planname,pins.pinno 
             From  personalinfo join pins on pins.usedby=personalinfo.userid 
			 join plans on plans.planid=`pins`.planid " . $qparam . " order by `pins`.usedon desc " . $limit;
			
			
            $count_query = "SELECT count(*) as tcount 
             From  personalinfo
			join pins on pins.usedby=personalinfo.userid 
            Join `plans` on plans.planid=pins.planid " . $qparam ;
      



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "transferredpins") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
            if (isset($data["fromdate"]) && $data["fromdate"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.usedon>=?";
                $paramarr[] = $data["fromdate"];
            }

            if (isset($data["uptodate"]) && $data["uptodate"] != "" ) {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`pins`.usedon<=date_add(?,interval 1 day)";
                $paramarr[] = $data["uptodate"];
            }
			
		
			if (isset($data["planid"]) && $data["planid"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`plans`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }
		
			if (isset($data["userid"]) && $data["userid"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "(pins.forid=? or pins.usedby=?)";
                $paramarr[] = $data["userid"];
				$paramarr[] = $data["userid"];
            }
		
		
			if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "pins.usagetype=2";
           
            $SELECT_query = "SELECT personalinfo1.userid fromuserid, personalinfo1.name fromname, personalinfo2.userid touserid, personalinfo2.name toname, `pins`.usedon, plans.planname,pins.pinno 
             From  personalinfo personalinfo1 join pins on pins.forid=personalinfo1.userid 
			 join personalinfo personalinfo2 on personlinfo2.userid=pins.usedby
			 join plans on plans.planid=`pins`.planid " . $qparam . " order by `pins`.usedon desc " . $limit;
			
			
            $count_query = "SELECT count(*) as tcount 
             From  personalinfo
			join pins on pins.usedby=personalinfo.userid 
            Join `plans` on plans.planid=pins.planid " . $qparam ;
      



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "availablepins") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
           
			
		
			if (isset($data["planid"]) && $data["planid"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`plans`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }
		
			if (isset($data["userid"]) && $data["userid"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "pins.forid=?";
                $paramarr[] = $data["userid"];
            }
			if ($qparam == "") $qparam = " where usedby is null ";
                else {
                    $qparam = $qparam . " and usedby is null ";
                }
           
            $SELECT_query = "SELECT count(*) qty,personalinfo.userid,personalinfo.city,personalinfo.name,plans.planname
             From personalinfo join pins on  pins.forid=personalinfo.userid 
			 join plans on plans.planid=`pins`.planid " . $qparam . " group by personalinfo.userid,personalinfo.city,personalinfo.name,plans.planname order by `pins`.allotedon desc " . $limit;
			
			
            $count_query = "SELECT count(*) as tcount from (select personalinfo.userid
             From  personalinfo join pins on  pins.forid=personalinfo.userid 
            Join `plans` on plans.planid=pins.planid " . $qparam. " group by personalinfo.userid) t1";
      



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}



if($routename=="updateprofile")
{
	extract($data);
	if(PDO_FetchOne("select count(*) from `binary` where userid=?",[$sid])==1)
		PDO_Execute("update `binary` set sid=? where userid=?",[$sid,$userid]);
	PDO_Execute("Update `personalinfo` set name=?,contact=?,pan=?,ifsc=?,acno=? where userid=?",[$name,$mobile,$pan,$ifsc,$acno,$userid]);
	PDO_Execute("update users set password=? where username=?",[$password,$userid]);
    $q->status=1;
    
}

if($routename=="updateaccount")
{
	extract($data);
	PDO_Execute("Update `personalinfo` set ifsc=?,acno=? where userid=?",[$ifsc,$acno,$userid]);
	$q->result=1;
    
}




if($routename=="upgradetobooster")
{
    $userid=$data['userid'];
  
            PDO_Execute("Update `binary` set directrefunded=1 where userid=?",[$userid]);
          
	$q->result=1;
}

if($routename=="removebooster_x")
{
    $userid=$data['userid'];
    $invoiceid=PDO_FetchOne("select GROUP_CONCAT(invoiceid) from usersinvoices where userid=? and saletypeid=1",[$userid]);
    PDO_Execute("delete from usersinvoices where userid=? and saletypeid=1",[$userid]);	
	PDO_Execute("delete from usersaledetail where invoiceid in (?)",[$invoiceid]);
    PDO_Execute("Update `binary` set boosterupgraded=null where userid=?",[$userid]);
    PDO_Execute("delete from upliners where showlist=0 and userid=?",[$userid]);
    PDO_Execute("delete from boosterpayout where child_userid=?",[$userid]);            
	$q->result=1;
}



if($routename=="adminusers")
{
    $q->data=PDO_FetchAll("select * from adminusers");
}

if($routename=="userrights")
{
    $userid=$data["userid"];
    $q->data=PDO_FetchAll("Select adminrights.rightname from adminrights join userrights on userrights.rightid=adminrights.rowid where userrights.userid=?",[$userid]);
}

if($routename=="adduserright")
{
    $userid=$data['userid'];
    $rightid=$data['rightid'];
    if(PDO_FetchOne("select count(*) userrights where userid=? and rightid=?",[$userid,]) ==0)
    PDO_Execute("Insert into userrights(userid,rightid) values(?,?)",[$userid,$rightid]);
    $q->result=1;
}

if($routename=="deleteuserright")
{
    $userid=$data['userid'];
    $rightid=$data['rightid'];
    PDO_Execute("delete from userrights where userid=? and rightid=?",[$userid,$rightid]);
    $q->result=1;
}

if($routename=="activateduserlist")
{
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $invoiceby=$data['username'];
    
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$fromdate;
    $params[]=$uptodate;
    
    $strqury=" from `binary` b join personalinfo pf on b.userid=pf.userid join plans p on p.planid=b.planid where b.doa >= ? and b.doa < date_add(?,interval 1 day) ";
    if($username != "")
    {
        $strqury=$strqury." and b.activatedby=? ";
        $params[]=$invoiceby;
    }
    
   
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.city, p.planname,b.doa ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqurycount,$params);
    
}


if($routename=="activateuser")
{
    $userid=$data['userid'];
    $planid=$data['planid'];
	
    $planrow=PDO_FetchRow("select * from plans where planid=?",[$planid]);
    PDO_Execute("Update `binary` set isApproved=1, ismanualapproved=1, planid=?, doa=now(),dor=now(), activatedby=?, recoid=1 where userid=?",[$planid,$username,$userid]);
    PDO_Execute("Update upliners set pvalue=?, udoa=now() where userid=?",[$planrow['pvalue'],$userid]);
    PDO_Execute("Update upliners set sdoa=now() where upliners=?",[$userid]);
	
   
    if($planrow['pvalue']  > 0)
    {
		PDO_Execute("update `binary` set greenon=now(),greentype=3 where userid=?",[$userid]);
        PDO_Execute("Insert into userproducts(userid,productname,status,statuson,remarks,statusby) values (?,'Joining Product',1,now(),'',?)",[$userid,$username]);
        $invoiceid=PDO_LastInsertId();      
     
    }
    $q->result="1";
}


if($routename=="deactivateuser")
{
    $userid=$data['userid'];
    $planid=PDO_FetchOne("select planid from `binary`where userid=?",[$userid]);
    $planrow=PDO_FetchOne("select * from plans where planid=?",[$planid]);
    PDO_Execute("Update `binary` set isApproved=0, ismanualapproved=0,  doa=null,dor=null, activatedby=null where userid=?",[$userid]);
    PDO_Execute("Update upliners set pvalue=null, udoa=null where userid=?",[$userid]);
    PDO_Execute("Update upliners set sdoa=null where upliners=?",[$userid]);
    PDO_Execute("delete from adminaccount where userid=?",[$userid]);
	PDO_Execute("delete from directusers where suserid=?",[$userid]);
	PDO_Execute("delete from boosterpayout where child_userid=?",[$userid]);
	PDO_Execute("delete from lifetimebonanzaachivers where userid=?",[$userid]);
    $invoiceid=PDO_FetchOne("select invoiceid from `usersinvoices` where userid=?",[$userid]);
	PDO_Execute("delete from userssaledetail where invoiceid=? and productid=99",[$invoiceid]);
	//PDO_Execute("delete from usersinvices where invoiceid=?",[$invoiceid]);   
    $q->result="1";
}

if($routename=="payoutlist")
{
	//extract($data);
	$q->data=PDO_FetchAll("select * from payout order by payoutid desc");
	$q->result=1;
}



if($routename=="dashboardsummary")
{
	$output=new stdClass;
	$output->totaljoinig=PDO_FetchOne("select count(*) from `binary`");
	$output->totaljoinignew=PDO_FetchOne("select count(*) from `personalinfo` where doj > (select max(upperdate) from payout)");
	$output->totalgreen=PDO_FetchOne("select count(*) from `binary` where planid <> 2 and isapproved=1");
	$output->totalgreennew=PDO_FetchOne("select count(*) from `binary` where doa > (select max(upperdate) from payout) and planid<>2");
	$output->totalblue=PDO_FetchOne("select count(*) from `binary` where planid = 2 and isapproved=1");
	$output->totalbluenew=PDO_FetchOne("select count(*) from `binary` where doa > (select max(upperdate) from payout) and planid=2");
	$output->totalpinallotedgreen=PDO_FetchOne("select count(*) from pins join users on users.username=pins.allotedby where planid <> 2 and isadmin >0");
	$output->totalpinallotedblue=PDO_FetchOne("select count(*) from pins join users on users.username=pins.allotedby where planid =2 and isadmin >0");
	$output->totalpinusedgreennew=PDO_FetchOne("select count(*) from pins where planid <> 2 and usagetype=1 and usedby is not null");
	$output->totalpinusedbluenew=PDO_FetchOne("select count(*) from pins where planid = 2  and usagetype=1 and usedby is not null");
	$output->totalpinunusedgreennew=PDO_FetchOne("select count(*) from pins where planid <> 2 and usedby is null");
	$output->totalpinunusedbluenew=PDO_FetchOne("select count(*) from pins where planid = 2 and usedby is null");
	$output->amount=PDO_FetchOne("select sum(ifnull(amount,0)) from useraccount");
	$output->camount=PDO_FetchOne("select sum(ifnull(camount,0)) from useraccount");
	$output->balance=$output->amount-$output->camount;
	$q->data=$output;
	$q->result=1;
}

if($routename=="payoutsummary")
{
	extract($data);
	
	$q->data=PDO_FetchAll("select * from payoutsummary where payoutid=? order by userid",[$payoutid]);
	$q->result=1;
}

if($routename=="binarypayout")
{
	extract($data);
	if($auserid!='')
		$q->data=PDO_FetchAll("select payout.payoutduration,binarypayout.* from binarypayout join payout on payout.payoutid=binarypayout.durationid where userid=? order by payout.payoutid desc",['DW'.$auserid]);
	else
		$q->data=PDO_FetchAll("select payout.payoutduration,binarypayout.* from binarypayout join payout on payout.payoutid=binarypayout.durationid where durationid=? order by userid",[$payoutid]);
	$q->result=1;
}

if($routename=="goldpayout")
{
	extract($data);
	if($auserid!='')
		$q->data=PDO_FetchAll("select payout.payoutduration,goldpayout.* from goldpayout join payout on payout.payoutid=goldpayout.durationid where userid=? order by payout.payoutid desc",['DW'.$auserid]);
	else
		$q->data=PDO_FetchAll("select payout.payoutduration,goldpayout.* from goldpayout join payout on payout.payoutid=goldpayout.durationid where durationid=? order by userid",[$payoutid]);
	$q->result=1;
}

if($routename=="platinumpayout")
{
	extract($data);
	if($auserid!='')
		$q->data=PDO_FetchAll("select payout.payoutduration,platinumpayout.* from platinumpayout join payout on payout.payoutid=platinumpayout.durationid where userid=? order by payout.payoutid desc",['DW'.$auserid]);
	else
		$q->data=PDO_FetchAll("select payout.payoutduration,platinumpayout.* from platinumpayout join payout on payout.payoutid=platinumpayout.durationid where durationid=? order by userid",[$payoutid]);
	$q->result=1;
}

if($routename=="diamondpayout")
{
	extract($data);
	if($auserid!='')
		$q->data=PDO_FetchAll("select payout.payoutduration,diamondpayout.* from diamondpayout join payout on payout.payoutid=diamondpayout.durationid where userid=? order by payout.payoutid desc",['DW'.$auserid]);
	else
		$q->data=PDO_FetchAll("select payout.payoutduration,diamondpayout.* from diamondpayout join payout on payout.payoutid=diamondpayout.durationid where durationid=? order by userid",[$payoutid]);
	$q->result=1;
}

if($routename=="directpayout")
{
	extract($data);
	$q->data=PDO_FetchAll("select * from directusers where sdoa between ? and ? order by userid",[$fromdate,$uptodate]);
	$q->result=1;
}

if($routename=="royaltypayout")
{
	extract($data);
	$q->data=PDO_FetchAll("select * from royaltypayout where rmonth=? and ryear=? order by userid",[$rmonth,$ryear]);
	$q->result=1;
}

if($routename=="salarypayout")
{
	extract($data);
	$q->data=PDO_FetchAll("select * from salary where rmonth=? and ryear=? order by userid",[$rmonth,$ryear]);
	$q->result=1;
}

if($routename=="boosterpayout")
{
	extract($data);
	$q->data=PDO_FetchAll("select * from boosterpayments where tdate between ? and ? order by userid",[$fromdate,$uptodate]);
	$q->result=1;
}

if($routename=="adminpurchaseinvoicelist")
{
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $invoiceby=$data['username'];   
    $pagesize=$data['pagesize'];
    $page=$data['page'];
	$params=array();
    $params[]=$fromdate;
    $params[]=$uptodate;
   
    $strqury=" from adminpurchaseinvoices where invoicedate >= ? and invoicedate < date_add(?,interval 1 day) ";
    if($invoiceby != "")
    {
        $strqury=$strqury." and invoiceby=? ";
        $params[]=$invoiceby;
    }
    
  
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select * ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqury,$params);
    
}





if($routename=="adminstocklistproductwise")
{
    $productid=$data['productid'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$productid;
    $strqury=" from adminstock where productid=? ";
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select * ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqurycount,$params);
}

if($routename=="adminpurchaseinvoicedetail")
{
    $invoiceid=$data['invoiceid'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$invoiceid;
    $strqury=" from adminpurchasedetail rid join repurchaseproducts rp on rp.productid=rid.productid where invoiceid=? ";
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select rp.productname,rid.* ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqury,$params);
}



if($routename=="newsale")
{
    $userid=$data['userid'];
	$usertype=PDO_FetchOne("select ifnull(isdistributor,0) from `binary` where userid=?",[$userid]);
    //$productlist=$data['productlist'];
    $saletype=$data['saletype'];
   	$products=json_decode($data['productlist']);   
    PDO_Execute("Insert into usersinvoices(userid,invoicedate,invoiceby,remarks,saletypeid) values (?,now(),?,'',?)",[$userid,$username,$saletype]);
    $invoiceid=PDO_LastInsertId();
    foreach($products as $product)
    {
        $productid=$product->productid;
        $qty=$product->stock;
        $mrp=$product->mrp;
		$srp=$product->srp;
		$dp=$product->dp;
        PDO_Execute("Insert into adminstock(productid,instock,outstock,invoiceid,saletypeid) values(?,0,?,?,1)",[$productid,$qty,$invoiceid]);
        PDO_Execute("Insert into userssaledetail(invoiceid,productid,qty,mrp,cashback) values(?,?,?,?,?)",[$invoiceid,$productid,$qty,$mrp,$dp]);
		if($usertype=='1')
		{
			PDO_Execute("Insert into resellerstock(productid,outstock,instock,invoiceid,saletypeid,userid) values(?,0,?,?,1,?)",[$productid,$qty,$invoiceid,$userid]);
		}
    }
    if($saletype==1)
	{
    	PDO_Execute("insert into adminaccount(transdate,amount,camount,entrytype,userid,username,invoiceid) select now(),sum(qty*mrp),0,4,?,?,invoiceid from userssaledetail where invoiceid=? group by invoiceid",[$invoiceid,$userid,$username]);
		
		if($usertype==1)
		{
		 	PDO_Execute("Insert into retaileraccount(userid,amount,camount,transdate,invoiceid,narration) select userid,sum(mrp*qty),0,now(),invoiceid,concat('Products purchase Invoice No.',invoiceid) from retailerssaledetail where invoiceid=?",[$invoiceid]);
		 	PDO_Execute("Insert into useraccount(userid,amount,camount,tranadate,invoiceid,narration) select userid,sum(((mrp*retailercommission)/100)*qty),0,now(),invoiceid,concat('Products purchase Commission Invoice No.',invoiceid) from retailerssaledetail where invoiceid=?",[$invoiceid]);
		}
		else
		{
			PDO_Execute("insert into cashbackaccount(transdate,amount,camount,userid,username,invoiceid) select now(),sum(qty*cashback),0,?,?,invoiceid from userssaledetail where invoiceid=? group by invoiceid",[$invoiceid,$userid,$username]);
		}
	}
		
    $q->result=1;
    $q->invoiceid=$invoiceid;    
}

if($routename=="purchasehistory")
{
	$userid=$data['userid'];
	$q->totalamount=PDO_FetchOne("select sum(ifnull(mrp,0)*ifnull(qty,0)) from userssaledetail usd join usersinvoices ui on ui.invoiceid=usd.invoiceid where ui.saletypeid=2 and ui.userid=?",[$userid]);
	$q->invoicelist=PDO_FetchAll("select productname,usd.mrp,usd.qty,invoicedate from userssaledetail usd join usersinvoices ui on ui.invoiceid=usd.invoiceid join repurchaseproducts rp on rp.productid=usd.productid where ui.saletypeid=2 and ui.userid=?",[$userid]);
}

if($routename=="adminsaleinvoicelist")
{
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $invoiceby=$data['invoiceby'];
	$userid=$data['userid'];
    $saletype=$data['saletype'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$fromdate;
    $params[]=$uptodate;    
    $strqury=" from usersinvoices where invoicedate >= ? and invoicedate < date_add(?,interval 1 day) ";
    if($invoiceby != "")
    {
        $strqury=$strqury." and invoiceby=? ";
        $params[]=$invoiceby;
    } 
	
	if($userid != "")
    {
        $strqury=$strqury." and userid=? ";
        $params[]=$userid;
    }
    if($saletype > 0 )
    {
        $strqury=$strqury. " and saletype = ?";
        $params[]=$saletype;
    }
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select * ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqury,$params);
}

if($routename=="saleinvoicedetail")
{
   	extract($data);
    $params=array();
    $params[]=$invoiceid;
    $strqury=" from userssaledetail rid join repurchaseproducts rp on rp.productid=rid.productid where invoiceid=? ";
    //$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select rp.productname,(rid.srp*rid.qty) total,rid.* ".$strqury,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqurycount,$params);
}

if($routename=="verifyuserid") 
{
	$userid=$data['userid'];
	$row=PDO_FetchRow("select name,ifnull(`binary`.isdistributor,0) isdistributor,ifnull(`binary`.boosterupgraded,0) boosterupgraded from personalinfo join `binary` on `binary`.userid=personalinfo.userid where personalinfo.userid=?",[$userid]);
	if(!$row)
		$q->result=0;
	else
	{
		$q->result=1;
		$q->name=$row['name'];
		$q->isfranchise=$row['isdistributor'];
		$q->boosterupgraded=$row['boosterupgraded'];
	}
	
}

if($routename=="newretailersale")
{
    $userid=$data['userid'];
    //$productlist=$data['productlist'];
    $products=json_decode($data['productlist']);
    PDO_Execute("Insert into retailersinvoices(userid,invoicedate,invoiceby,remarks) values (?,now(),?,'')",[$userid,$username]);
    $invoiceid=PDO_LastInsertId();
    foreach($products as $product)
    {
        $productid=$product->productid;
        $qty=$product->stock;
        $mrp=$product->mrp;
		$srp=$product->srp;
        PDO_Execute("Insert into adminstock(productid,instock,outstock,invoiceid,saletypeid) values(?,0,?,?,2)",[$productid,$qty,$invoiceid]);
        PDO_Execute("Insert into retailerssaledetail(invoiceid,productid,qty,mrp) values(?,?,?,?)",[$invoiceid,$productid,$qty,$mrp]);
    }
    PDO_Execute("Insert into retaileraccount(userid,amount,camount,transdate,invoiceid,narration) select userid,sum(mrp*qty),0,now(),invoiceid,concat('Products purchase Invoice No.',invoiceid) from retailerssaledetail where invoiceid=?",[$invoiceid]);
    PDO_Execute("insert into adminaccount(transdate,amount,camount,entrytype,userid,username,invoiceid) select now(),amount,0,3,?,?,invoiceid from retaileraccount where invoiceid=?",[$invoiceid,$userid,$username]);
    PDO_Execute("Insert into useraccount(userid,amount,camount,tranadate,invoiceid,narration) select userid,sum(((mrp*retailercommission)/100)*qty),0,now(),invoiceid,concat('Products purchase Commission Invoice No.',invoiceid) from retailerssaledetail where invoiceid=?",[$invoiceid]);
    $q->result=1;
    $q->invoiceid=$invoiceid;    
}

if($routename=="newpurchase")
{
    $userid=$data['supplierid'];
    //$productlist=$data['productlist'];
   $products=json_decode($data['productlist']);
    PDO_Execute("Insert into adminpurchaseinvoices(userid,invoicedate,invoiceby) values (?,now(),?)",[$userid,$username]);
    $invoiceid=PDO_LastInsertId();
    foreach($products as $product)
    {
       $productid=$product->productid;
        $qty=$product->stock;
        $mrp=$product->mrp;
		$srp=$product->srp;
        PDO_Execute("Insert into adminstock(productid,instock,outstock,invoiceid) values(?,?,0,?)",[$productid,$qty,$invoiceid]);
        PDO_Execute("Insert into adminpurchasedetail(invoiceid,productid,qty,mrp) values(?,?,?,?)",[$invoiceid,$productid,$qty,$srp]);
    }
    PDO_Execute("Insert into supplieraccount(userid,amount,camount,transdate,invoiceid,narration) select userid,sum(mrp*qty),0,now(),invoiceid,concat('Products purchase Invoice No.',invoiceid) from adminpurchasedetail where invoiceid=?",[$invoiceid]);
    PDO_Execute("insert into adminaccount(transdate,amount,camount,entrytype,userid,username,invoiceid) select now(),0,amount,5,?,?,invoiceid from supplieraccount where invoiceid=?",[$invoiceid,$userid,$username]);
    $q->result=1;
    $q->invoiceid=$invoiceid;    
}

if($routename=="changeuserplan")
{
    $userid=$data['userid'];
    $planid=$data['planid'];
    $planrow=PDO_FetchOne("select * from plans where planid=?",[$planid]);
    PDO_Execute("Update `binary` b set planid=? where userid=?",[$userid,$planid]);
    PDO_Execute("Update `upliners` u set pvalue=? where userid=?",[$planrow['pvlaue'],$userid]);
    PDO_Execute("Update directusers set amount=? where suserid=?",[$planrow['firstincome']]);
    PDO_Execute("insert into adminaccount(transdate,amount,camount,entrytype,userid,username) values(now(),?,0,1,?,?)",[$planrow['basicplanvalue'],$userid,$username]);
    PDO_Execute("insert into adminaccount(transdate,amount,camount,entrytype,userid,username) select now(),0,amount,2,userid,? from adminaccount where entrytype=1 and userid=?",[$username,$userid]);
    if($planid==28)
    {
        $invoiceid=PDO_FetchOne("select invoiceid from userinvoices where userid=? and productid=99",[$userid]);
        PDO_Execute("Update userssaledetail set qty=2 where invoiceid=?",[$invoiceid]);
        PDO_Execute("Update `binary` set boosterupgraded=1 where userid=?",[$userid]);
        PDO_Execute("insert into upliners(upliners.userid,upliners,upliners.side,upliners.sdoa,upliners.levelid,upliners.udoa,upliners.pvalue,showlist)
        select upliners.userid,upliners,upliners.side,upliners.sdoa,upliners.levelid,now(),?,0 from upliners where userid=?",[$planrow['pvalue'],$userid]);
        if(PDO_Execute("select boosterupgraded from `binary` where userid=?",[$sid])==1)            
            $boosterfirstpayment=5000;
        else    $boosterfirstpayment=2000;
        PDO_Execute("insert into boosterpayout(userid,child_userid,level,amount,tdate)
        values(?,?,1,?,now())",[$sid,$userid,$boosterfirstpayment]);
        $boosterpaymentcount=PDO_FetchOne("select count(*) from `boosterpayments` where level >0");
        $i=0;
        while ($i < $boosterpaymentcount)
        {
            $sid=PDO_FetchOne("select sid from `binary` where userid=?",[$sid]);
            if($sid!="" && $sid)
            {
                if(PDO_Execute("select boosterupgraded from `binary` where userid=?",[$sid])==1) 
                {
                    $i++;
                    PDO_Execute("insert into boosterpayout(userid,child_userid,level,amount,tdate)
    select ?,?,level,boosterpayments.amount,now() from boosterpayments where level=?",[$sid,$userid,$i]);
                }
            }
        }
    }
    else
    {
        $invoiceid=PDO_FetchOne("select invoiceid from userinvoices where userid=? and productid=99",[$userid]);
        PDO_Execute("Update userssaledetail set qty=1 where invoiceid=?",[$invoiceid]);
        PDO_Execute("Update `binary` set boosterupgraded=0 where userid=?",[$userid]);
        PDO_Execute("Delete from upliners where userid=? and showlist=0",[$userid]);
        PDO_Execute("Delete from boosterpayout where child_userid=?",[$userid]); 
    }
}

if($routename=="banklist")
{
    $minamt=$data['minamt'];
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.acno,pf.ifsc,city,branch,concat(round(sum(ifnull(amount,0))-sum(ifnull(camount,0)),0),'.00') balance,`binary`.doa,pf.pan from useraccount join personalinfo pf on pf.userid=useraccount.userid join `binary` on `binary`.userid=pf.userid where `binary`.isapproved=1 group by pf.userid,pf.name,pf.acno,pf.ifsc having sum(ifnull(amount,0))-sum(ifnull(camount,0)) > ? order by pf.userid",[$minamt]);
	$q->lastpayout=PDO_FetchRow("select * from payout order by payoutid desc limit 1");
	
}

if($routename=="paidbanklist")
{
    $minamt=$data['paiddate'];
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.acno,pf.ifsc,city,branch,camount from useraccount join personalinfo pf on pf.userid=useraccount.userid where date_format(tdate,'%Y-%m-%d')=? and payoutpayment=1",[$minamt]);
	
	
}

if($routename=="paiddatebanklist")
{
   
    $q->result=1;
    $q->data=PDO_FetchAll("select date_format(tdate,'%Y-%m-%d') tdate from useraccount where payoutpayment=1 group by date_format(tdate,'%Y-%m-%d') order by date_format(tdate,'%Y-%m-%d') desc");
	
	
}

if($routename=="cashbacklist")
{
    $minamt=$data['minamt'];
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.acno,pf.ifsc,city,branch,concat(round(sum(ifnull(amount,0))-sum(ifnull(camount,0)),0),'.00') balance,`binary`.doa from cashbackaccount join personalinfo pf on pf.userid=cashbackaccount.userid join `binary` on `binary`.userid=pf.userid where `binary`.isapproved=1 group by pf.userid,pf.name,pf.acno,pf.ifsc having sum(ifnull(amount,0))-sum(ifnull(camount,0)) > ? order by pf.userid",[$minamt]);
	$q->lastpayout=PDO_FetchRow("select * from payout order by payoutid desc limit 1");
	
}

if($routename=="paidcashbacklist")
{
    $minamt=$data['paiddate'];
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.acno,pf.ifsc,city,branch,camount from cashbackaccount join personalinfo pf on pf.userid=useraccount.userid where date_format(transdate,'%Y-%m-%d')=? and camount>0 limit 50",[$minamt]);
	
	
}

if($routename=="paiddatecashbacklist")
{
   
    $q->result=1;
    $q->data=PDO_FetchAll("select date_format(transdate,'%Y-%m-%d') tdate from cashbackaccount where camount>0 group by date_format(transdate,'%Y-%m-%d') order by date_format(transdate,'%Y-%m-%d') desc");
	
	
}


if($routename=="tdslist")
{
   extract($data);
	$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select pf.userid,pf.name,pf.pan,pf.city,pf.contact,sum(ifnull(aamount,0)) aamount, sum(ifnull(aamount,0)*tds/100) tdsamt,tds from useraccount join personalinfo pf on pf.userid=useraccount.userid where useraccount.tdate between date_add(?,interval 1 day) and date_add(?,interval 2 day) and tds=? group by pf.userid".$limit,[$fromdate,$uptodate,$tds]);
	$q->totalrows=PDO_FetchOne("select count(DISTINCT userid) from useraccount where useraccount.tdate between ? and ? and tds=?",[$fromdate,$uptodate,$tds]);
	$q->total=PDO_FetchRow("select sum(ifnull(aamount,0)) aamount, sum(ifnull(aamount,0)*tds/100) tdsamt from useraccount where useraccount.tdate between date_add(?,interval 1 day) and date_add(?,interval 2 day) and tds=?",[$fromdate,$uptodate,$tds]);
	
	
}



if($routename=="retataileraccountsummary")
{
    $minamt=$data['minamt'];
    $q->result=1;
    $q->accountlist=PDO_FetchAll("select pf.*,sum(ifnull(amount,0))-sum(ifnull(camount,0)) balance from retaileraccount join retailerinfo pf on pf.userid=retaileraccount.userid group by pf.userid,pf.name,pf.acno,pf.ifsc order by sum(ifnull(amount,0))-sum(ifnull(camount,0)) desc having sum(ifnull(amount,0))-sum(ifnull(camount,0)) > ?",[$minamt]);
}

if($routename=="useraccountdetail")
{
    $userid=$data['userid'];
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$userid;
    //$params[]=$fromdate;
    //$params[]=$uptodate;
    //$strqury=" from useraccount where userid=? and tdate >= ? and tdate < date_add(?,interval 1 day) order by accountid desc ";
	$strqury=" from useraccount where userid=? order by tdate desc , accountid desc";
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select *,tdate transdate ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqury,$params);
	$q->accountsummary=PDO_FetchRow("select sum(amount) amount,sum(camount) camount,sum(amount)-sum(camount) balance from useraccount where userid=?",[$userid]);
    //$limit=" limit ".parseInt($page)-1 * parseInt($pagesize) . "," . $pagesize ;
}

if($routename=="retaileraccountdetail")
{
    $userid=['userid'];
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$userid;
    $params[]=$fromdate;
    $params[]=$uptodate;
    $strqury=" from retaileraccount where userid=? and transdate >= ? and transdate < date_add(?,interval 1 day) order by accountid desc ";
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select * ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqurycount,$params);
    //$limit=" limit ".parseInt($page)-1 * parseInt($pagesize) . "," . $pagesize ;
}


if($routename=="adminaccountdetail")
{
    $userid=['userid'];
    $fromdate=$data['fromdate'];
    $uptodate=$data['uptodate'];
    $pagesize=$data['pagesize'];
    $page=$data['page'];
    $params=array();
    $params[]=$userid;
    $params[]=$fromdate;
    $params[]=$uptodate;
    $strqury=" from useraccount where userid=? and transdate >= ? and transdate < date_add(?,interval 1 day) ";
    if($userid!="")
    {
        $strqury=$strqury." and userid=? ";
        $params[]=$userid;
    }  
    $strqury=$strqury." order by accountid desc ";
    $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result=1;
    $q->data=PDO_FetchAll("select rp.productname,rid.* ".$strqury.$limit,$params);
    $q->totalrows=PDO_FetchOne("select count(*) ".$strqurycount,$params);
    //$limit=" limit ".parseInt($page)-1 * parseInt($pagesize) . "," . $pagesize ;
}

if($routename=="addadminaccountentry")
{
    $amount=$data['amount'];
    $camount=$data['camount'];
    $remarks=$data['remarks'];
    PDO_Execute("Insert into adminaccount (transdate,amount,camount,remarks,entryby) values(now(),?,?,?,?)",[$amount,$camount,$remarks,$username]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
}


	
	if($routename=="addcashbackaccountentry")
{
    $userid=$data['userid'];
    $amount=$data['amount'];
    $camount=$data['camount'];
    $remarks=$data['remarks'];
	
	
		
    PDO_Execute("Insert into cashbackaccount (userid,tdate,amount,camount,narration,entryby) values(?,now(),?,?,?,?)",[$userid,$amount,$camount,$remarks,$username]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
	
	if($data['sendsms']=='1' && $camount > 0)
	{
		$pfdata=PDO_FetchRow("select contact mobile,name from personalinfo where userid=?",[$userid]);
		$name=$pfdata['name'];
		$mobile=$pfdata['mobile'];
		$msgtext="Dear *".$name."*, We have paid a sum of Rs.  *".$camount."* into account mentioned in your Member Id *" . $userid ."*. Please check your account within 24 hrs. Please contact us if you have not received the same. प्रिय ग्राहक, आपके ऊपर दिए गए मेम्बर संख्या में संरक्षित खाता संख्या में रूपए *".$camount."* भेजे गए है. कृपया अपना खाता जांच करें. यदि आपको यह रकम प्राप्त नहीं हुई है तो कृपया हमसे तुरंत संपर्क करें. धन्यवाद।";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://wasms.simpact.co.in/api/sendText?token=".$watoken."&phone=91".$mobile."&message=".urlencode($msgtext));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$authToken = curl_exec($ch);
		//var_dump(json_decode($authToken));
		$q->smsstatus=json_decode($authToken,true)['status'];
	}
	
}

if($routename=="adduseraccountentry")
{
    $userid=$data['userid'];
    $amount=$data['amount'];
    $camount=$data['camount'];
    $remarks=$data['remarks'];
	$payoutpayment=$data['payment_type'];
	if($payoutpayment)
	{
		if ($payoutpayment=='1')
			PDO_Execute("Insert into useraccount (userid,tdate,amount,camount,narration,entryby,payoutpayment) values(?,now(),?,?,?,?,1)",[$userid,$amount,$camount,$remarks,$username]);
		if($payoutpayment=='2')
			PDO_Execute("Insert into useraccount (userid,tdate,amount,camount,narration,entryby,cashbackpayment) values(?,now(),?,?,?,?,1)",[$userid,$amount,$camount,$remarks,$username]);
	}
		else
    PDO_Execute("Insert into useraccount (userid,tdate,amount,camount,narration,entryby) values(?,now(),?,?,?,?)",[$userid,$amount,$camount,$remarks,$username]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
	
	if($data['sendsms']=='2' && $camount > 0)
	{
		$pfdata=PDO_FetchRow("select contact mobile,name from personalinfo where userid=?",[$userid]);
		$name=$pfdata['name'];
		$mobile=$pfdata['mobile'];
		$today = date('d/m/Y');
		$msgtext="Dear Consumer, a sum of Rs. ".$camount." has been credited to your bank account for payout on ".$today." for distributor Id ".$userid." in Dummy Company. ";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://sms.simpact.co.in/sendsms/sendsms.php?username=dummy&password=yugal1&type=TEXT&sender=RMTLTD&mobile=" . $mobile. "&message=". urlencode($msgtext)."&PEID=1201166618513667468&HeaderId=1205166989433824389&TemplateId=1207168380522399082");
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$authToken = curl_exec($ch);
		//var_dump(json_decode($authToken));
		$q->smsstatus=json_decode($authToken,true)['status'];
	}
	
}

if($routename=="addretaileraccountentry")
{
    $userid=$data['userid'];
    $amount=$data['amount'];
    $camount=$data['camount'];
    $remarks=$data['remarks'];
    PDO_Execute("Insert into retaileraccount (userid,transdate,amount,camount,remarks,entryby) values(?,now(),?,?,?,?)",[$userid,$amount,$camount,$remarks,$username]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
}

if($routename=="rewardlist"){
 $q->data=PDO_FetchAll("select r.bonanzaname, r.bonanzaid, r.lefttarget, r.righttarget, r.completiontime,ifnull( r.dbonanzaid,0) dbonanzaid, ifnull( r.dcount,0) dcount,j.bonanzaname bonanzaname2 from lifetimebonanza r left join lifetimebonanza j on r.dbonanzaid=j.bonanzaid ORDER by r.bonanzaid");
    $q->result=1;
}

if($routename=="newreward")
{
    $bonanzaname=$data['bonanzaname'];
    $left=$data['left'];
    $right=$data['right'];
	 $ctime=$data['ctime'];
	 $dbonanzaid=$data['dbonanzaid'];
	 $dcount=$data['dcount'];
    PDO_Execute("insert into lifetimebonanza (bonanzaname,lefttarget,righttarget,completiontime,dbonanzaid,dcount) values(?,?,?,?,?,?)",[$bonanzaname,$left,$right,$ctime,$dbonanzaid,$dcount]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
}

if($routename=="updatereward")
{
    $bonanzaid=$data['bonanzaid'];
    $bonanzaname=$data['bonanzaname'];
    $left=$data['left'];
    $right=$data['right'];
	 $ctime=$data['ctime'];
	 $dbonanzaid=$data['dbonanzaid'];
	 $dcount=$data['dcount'];
    PDO_Execute("update lifetimebonanza set bonanzaname=?,lefttarget=?,righttarget=?,completiontime=?,dbonanzaid=?,dcount=? where bonanzaid=?",[$bonanzaname,$left,$right,$ctime,$dbonanzaid,$dcount,$bonanzaid]);
    $q->result=1;
}

if($routename=="deletereward")
{
    $bonanzaid=$data['bonanzaid'];
 
    PDO_Execute("delete from lifetimebonanza where bonanzaid=?",[$bonanzaid]);
    
    $q->result=1;
}

if($routename=="bonanzalist"){
 $q->data=PDO_FetchAll("select * from bonanzainfo ORDER by bonanzainfo.rowid desc",[$rowid]);
    $q->result=1;
}

if($routename=="newbonanza")
{
    $bonanzaname=$data['bonanzaname'];
    $from=$data['from'];
    $upto=$data['upto'];
    PDO_Execute("insert into bonanzainfo (bonanzaname,fromdate,uptodate) values(?,?,?)",[$bonanzaname,$from,$upto]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
}

if($routename=="updatebonanza")
{
    $bonanzaid=$data['bonanzaid'];
    $bonanzaname=$data['bonanazaname'];
    $from=$data['from'];
    $upto=$data['upto'];
    PDO_Execute("update bonanzainfo set bonanzaname=?,from=?,upto=? where bonanzaid=?)",[$bonanzaname,$from,$upto,$bonanzaid]);
    $q->result=1;
}

if($routename=="deletebonanza")
{
    $bonanzaid=$data['bonanzaid'];
    $bonanzaname=$data['bonanazaname'];
    $from=$data['from'];
    $upto=$data['upto'];
    PDO_Execute("delete bonanza where bonanzainfoid=?)",[$bonanzaid]);
    PDO_Execute("delete bonanzainfo where bonanzaid=?)",[$bonanzaid]);
    $q->result=1;
}

if($routename=="newbonanzagift")
{
    $bonanzaid=$data['bonanzaid'];
    $giftname=$data['name'];
    $leftbv=$data['leftbv'];
    $rightbv=$data['rightbv'];
    $leftiv=$data['leftiv'];
    $rightbv=$data['rightiv'];
    $recoid=$data['recoid'];
    PDO_Execute("insert into bonanza (rewarditemname,recoid,target1,target2,bonanzainfoid,bvtarget1,bvtarget2) values(?,?,?,?,?,?,?)",[$giftname,$recoid,$leftbv,$rightbv,$bonanzaid,$leftiv,$rightbv]);
    $q->result=1;
    $q->rowid=PDO_LastInsertId();
}


if($routename=="rewardachievers")
{
    $rewardid=$data['rewardid'];
	$auserid=$data['auserid'];
	$paidstatus=$data['paidstatus'];
	$page=$data['page'];
	$pagesize=$data['pagesize'];
	$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
	if($auserid!='')
	{
		$q->data=PDO_FetchAll("SELECT lifetimebonanzaachivers.rowid,pf.name,pf.userid,pf.city,pf.contact,prizeallotedon,lifetimebonanza.bonanzaname,achieved,bvqualified,teamqualified FROM lifetimebonanzaachivers join personalinfo pf on pf.userid=lifetimebonanzaachivers.userid join lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid where pf.userid=?".$limit,[$auserid]);
		$q->totalrows=PDO_FetchOne("select count(*) from lifetimebonanza");
	}
	else
	{
		if($paidstatus=='0')
		{
			 $q->data=PDO_FetchAll("SELECT lifetimebonanzaachivers.rowid, pf.name,pf.userid,pf.city,pf.contact,prizeallotedon,lifetimebonanza.bonanzaname,achieved,bvqualified,teamqualified FROM lifetimebonanzaachivers join personalinfo pf on pf.userid=lifetimebonanzaachivers.userid join lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid where lifetimebonanzaachivers.achieved=1  and lifetimebonanza.bonanzaid=?".$limit,[$rewardid]);
			$q->totalrows=PDO_FetchOne("select count(*) from lifetimebonanzaachivers where achieved=1 and bonanzaid=?",[$rewardid]);
		}
	else if($paidstatus=='1')
	{
    $q->data=PDO_FetchAll("SELECT lifetimebonanzaachivers.rowid, pf.name,pf.userid,pf.city,pf.contact,prizeallotedon,lifetimebonanza.bonanzaname,achieved,bvqualified,teamqualified FROM lifetimebonanzaachivers join personalinfo pf on pf.userid=lifetimebonanzaachivers.userid join lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid where lifetimebonanzaachivers.achieved=1 and lifetimebonanzaachivers.prizeallotedon is not null and lifetimebonanza.bonanzaid=?".$limit,[$rewardid]);
		$q->totalrows=PDO_FetchOne("select count(*) from lifetimebonanzaachivers where achieved=1 and prizeallotedon is not null and bonanzaid=?",[$rewardid]);
	}
		else
		{
			 $q->data=PDO_FetchAll("SELECT  lifetimebonanzaachivers.rowid, pf.name,pf.userid,pf.city,pf.contact,prizeallotedon,lifetimebonanza.bonanzaname,achieved,bvqualified,teamqualified FROM lifetimebonanzaachivers join personalinfo pf on pf.userid=lifetimebonanzaachivers.userid join lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid where lifetimebonanzaachivers.achieved=1 and lifetimebonanzaachivers.prizeallotedon is null and lifetimebonanza.bonanzaid=?".$limit,[$rewardid]);
			$q->totalrows=PDO_FetchOne("select count(*) from lifetimebonanzaachivers where achieved=1 and prizeallotedon is null and bonanzaid=?",[$rewardid]);
		}
	}
    $q->result=1;    
}

if($routename=="updaterewardstatus")
{
	$rowid=$data['rowid'];
	PDO_Execute("update lifetimebonanzaachivers set prizeallotedon=case when prizeallotedon is null then now() else null end where rowid=?",[$rowid]);
}


if($routename=="updaterewardstatuscomplete")
{
	PDO_Execute("UPDATE lifetimebonanzaachivers ltba JOIN (select upliners,lifetimebonanza.bonanzaid,sum(pvalue) pvalue FROM upliners JOIN lifetimebonanzaachivers on lifetimebonanzaachivers.userid=upliners.upliners JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid WHERE upliners.side=1 and upliners.udoa BETWEEN startdate and enddate and lifetimebonanzaachivers.achieved is null group by upliners.upliners,lifetimebonanza.bonanzaid) u on u.upliners=ltba.userid and ltba.bonanzaid=u.bonanzaid set ltba.leftbv=u.pvalue");
	PDO_Execute("UPDATE lifetimebonanzaachivers ltba JOIN (select upliners,lifetimebonanza.bonanzaid,sum(pvalue) pvalue FROM upliners JOIN lifetimebonanzaachivers on lifetimebonanzaachivers.userid=upliners.upliners JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid WHERE upliners.side=0 and upliners.udoa BETWEEN startdate and enddate and lifetimebonanzaachivers.achieved is null group by upliners.upliners,lifetimebonanza.bonanzaid) u on u.upliners=ltba.userid and ltba.bonanzaid=u.bonanzaid set ltba.rightbv=u.pvalue");
	PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid set lifetimebonanzaachivers.bvqualified=1 WHERE lifetimebonanzaachivers.leftbv >= lifetimebonanza.lefttarget and lifetimebonanzaachivers.rightbv >= lifetimebonanza.righttarget and lifetimebonanzaachivers.bvqualified is null");
	PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid set lifetimebonanzaachivers.bvqualified=0 WHERE lifetimebonanzaachivers.bvqualified is null and enddate < now();");
	PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid set achieved=1 WHERE lifetimebonanza.dcount=0 and lifetimebonanzaachivers.bvqualified=1");
	PDO_Execute("UPDATE lifetimebonanzaachivers set achieved=0 WHERE  lifetimebonanzaachivers.bvqualified=0");
	
	for($i;$i<=4;$i++)
	{
		PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid JOIN ( select upliners.upliners,lb.bonanzaid,lb.bonanzaname, count(*) totalcount from upliners join lifetimebonanzaachivers lbq on upliners.userid=lbq.userid join personalinfo pf on pf.userid=upliners.userid join lifetimebonanza lb on lb.bonanzaid=lbq.bonanzaid where upliners.side=0 and lbq.achieved=1 group by lb.bonanzaid,lb.bonanzaname,upliners.upliners) qu on qu.upliners=lifetimebonanzaachivers.userid and qu.bonanzaid=lifetimebonanza.dbonanzaid set lifetimebonanzaachivers.rightteam=qu.totalcount");
		PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid JOIN ( select upliners.upliners,lb.bonanzaid,lb.bonanzaname, count(*) totalcount from upliners join lifetimebonanzaachivers lbq on upliners.userid=lbq.userid join personalinfo pf on pf.userid=upliners.userid join lifetimebonanza lb on lb.bonanzaid=lbq.bonanzaid where upliners.side=1 and lbq.achieved=1 group by lb.bonanzaid,lb.bonanzaname,upliners.upliners) qu on qu.upliners=lifetimebonanzaachivers.userid and qu.bonanzaid=lifetimebonanza.dbonanzaid set lifetimebonanzaachivers.leftteam=qu.totalcount");
		PDO_Execute("UPDATE lifetimebonanzaachivers JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.bonanzaid set lifetimebonanzaachivers.teamqualified=1 WHERE lifetimebonanzaachivers.leftteam >= lifetimebonanza.dcount and lifetimebonanzaachivers.rightteam >= lifetimebonanza.dcount");
		PDO_Exeucte("UPDATE lifetimebonanzaachivers set lifetimebonanzaachivers.achieved=1 WHERE lifetimebonanzaachivers.bvqualified=1 and teamqualified=1 and achieved is null");
	}
}




if($routename=="bonanzaachievers")
{
    	$rowid=$data['rowid'];	
		$bonanzaid=PDO_FetchOne("select bonanzainfoid from bonanza where rowid=?",[$rowid]);
		$bonanzainfodetail=PDO_FetchRow("select * from bonanzainfo where rowid=?",[$bonanzaid]);
		if(PDO_FetchOne("select count(*) from bonanzaachivers where bonanzaid=?",[$bonanzaid])==0)
		{
			
			PDO_Execute("insert into bonanzaachivers(userid,bonanzaid,mleft,mright,rleft,rright) select userid,?,0,0,0,0 from `binary` where ifnull(isapproved,0)=1",[$bonanzaid]);
			PDO_Execute("update bonanzaachivers join (select upliners,sum(ifnull(pvalue,0)) mcount from upliners where udoa >= ? and udoa < date_add(?,interval 1 day) and side=1 group by upliners) u on u.upliners=bonanzaachivers.userid set mleft=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(ifnull(pvalue,0)) mcount from upliners where udoa >= ? and udoa < date_add(?,interval 1 day) and side=0 group by upliners) u on u.upliners=bonanzaachivers.userid set mright=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(usd.qty*rp.bv) mcount from upliners join usersinvoices ui on ui.userid=upliners.userid join userssaledetail usd on usd.invoiceid=ui.invoiceid join repurchaseproducts rp on rp.productid=usd.productid where ui.invoicedate >= ? and ui.invoicedate < date_add(?,interval 1 day) and side=1 and ui.saletypeid <= 1 group by upliners) u on u.upliners=bonanzaachivers.userid set rleft=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(usd.qty*rp.bv) mcount from upliners join usersinvoices ui on ui.userid=upliners.userid join userssaledetail usd on usd.invoiceid=ui.invoiceid join repurchaseproducts rp on rp.productid=usd.productid where ui.invoicedate >= ? and ui.invoicedate < date_add(?,interval 1 day) and side=0 and ui.saletypeid <= 1 group by upliners) u on u.upliners=bonanzaachivers.userid set rright=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
		}
			if((time()-(60*60*24)) < strtotime($bonanzainfodetail['uptodate']))
			{
				
				PDO_Execute("update bonanzaachivers join (select upliners,sum(ifnull(pvalue,0)) mcount from upliners where udoa >= ? and udoa < date_add(?,interval 1 day) and side=1 group by upliners) u on u.upliners=bonanzaachivers.userid set mleft=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(ifnull(pvalue,0)) mcount from upliners where udoa >= ? and udoa < date_add(?,interval 1 day) and side=0 group by upliners) u on u.upliners=bonanzaachivers.userid set mright=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(usd.qty*rp.bv) mcount from upliners join usersinvoices ui on ui.userid=upliners.userid join userssaledetail usd on usd.invoiceid=ui.invoiceid join repurchaseproducts rp on rp.productid=usd.productid where ui.invoicedate >= ? and ui.invoicedate < date_add(?,interval 1 day) and side=1 and ui.saletypeid <= 1 group by upliners) u on u.upliners=bonanzaachivers.userid set rleft=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
				PDO_Execute("update bonanzaachivers join (select upliners,sum(usd.qty*rp.bv) mcount from upliners join usersinvoices ui on ui.userid=upliners.userid join userssaledetail usd on usd.invoiceid=ui.invoiceid join repurchaseproducts rp on rp.productid=usd.productid where ui.invoicedate >= ? and ui.invoicedate < date_add(?,interval 1 day) and side=0 and ui.saletypeid <= 1 group by upliners) u on u.upliners=bonanzaachivers.userid set rright=u.mcount where bonanzaid=?",[$bonanzainfodetail['fromdate'],$bonanzainfodetail['uptodate'],$bonanzaid]);
			}
	else			
	{
		PDO_Execute("Delete from bonanzaachivers where mleft=0 and mright=0 and rleft=0 and rright=0");
	}
		if(PDO_FetchOne("select max(rowid) from bonanza where bonanzainfoid=?",[$bonanzaid])==$rowid)
		{
			$data=PDO_FetchAll("Select pf.userid,pf.name,pf.city,pf.contact,ba.mleft,ba.mright,ba.rleft,ba.rright from personalinfo pf join bonanzaachivers ba on ba.userid=pf.userid join bonanza on ba.mleft >= bonanza.target1 and ba.mright >= bonanza.target2 and rleft >= bvtarget1 and rright>= bvtarget2 where bonanza.rowid=? and ba.bonanzaid=?",[$rowid,$bonanzaid]);
		}
	else
	{
		$rowid2=PDO_FetchOne("select rowid from bonanza where rowid > ? and bonanzainfoid=? order by rowid limit 1",[$rowid,$bonanzaid]);
		$data=PDO_FetchAll("Select pf.userid,pf.name,pf.city,pf.contact,ba.mleft,ba.mright,ba.rleft,ba.rright from personalinfo pf join bonanzaachivers ba on ba.userid=pf.userid , bonanza , bonanza b2 where ba.mleft >= bonanza.target1 and ba.mright >= bonanza.target2 and ba.rleft >= bonanza.bvtarget1 and ba.rright>= bonanza.bvtarget2 and ((ba.mleft < b2.target1 or ba.mright < b2.target2) or (ba.rleft < case b2.bvtarget1 when 0 then 50000000 else b2.bvtarget1 end or ba.rright < case b2.bvtarget2 when 0 then 50000000 else b2.bvtarget2 end)) and bonanza.rowid=? and b2.rowid=? and ba.bonanzaid=?",[$rowid,$rowid2,$bonanzaid]);
	}
	$q->debug=$rowid2;
	$q->data=$data;
	
    $q->result=1;
    
}

if($routename=="userrecolist")
{
	extract($data);
	$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
	if($userid =='')
	{
		$q->data=PDO_FetchAll("select pf.userid,pf.name,pf.city,recname from  personalinfo pf join `binary` on `binary`.userid=pf.userid join reco on reco.recid=`binary`.recoid where reco.recid=? order by `binary`.doa desc ".$limit,[$recid]);
		$q->totalrows=PDO_FetchOne("select count(*) from `binary` where recoid=?",[$recid]);
	}
	else
	{
		$q->data=PDO_FetchAll("select pf.userid,pf.name,pf.city,recname from `binary` join reco on reco.recid=`binary`.recoid join personalinfo pf on pf.userid=userreco.userid where `binary`.userid=?",[$userid]);
		$q->totalrows=1;
	}
	$q->result=1;
}

if($routename=="recolist")
{
	
		$q->data=PDO_FetchAll("select * from reco where recid > 0 order by reco.recid",[$recoid]);
	
	$q->result=1;
}

if($routename=="updatereco")
{
	
		PDO_Execute("TRUNCATE TABLE userreco;
    CREATE TEMPORARY TABLE uplinerscount SELECT sum(case when side=1 THEN pvalue else 0 end) leftpvalue,sum(case when side=0 then pvalue else 0 end) rightpvalue,0 midvalue,upliners FROM upliners where upliners.udoa is not null GROUP BY upliners;
    update uplinerscount set midvalue=case when leftpvalue <= rightpvalue then leftpvalue else rightpvalue end;
    INSERT IGNORE INTO userreco(userreco.userid,userreco.recoid) SELECT upliners,reco.recid from uplinerscount JOIN reco on midvalue BETWEEN pairs and maxpairs;" );
	
	$q->result=1;
}

if($routename=="updatebonanzagift")
{
    $rowid=$data['rowid'];
    $bonanzaid=$data['bonanzaid'];
    $giftname=$data['name'];
    $leftbv=$data['leftbv'];
    $rightbv=$data['rightbv'];
    $leftiv=$data['leftiv'];
    $rightiv=$data['rightiv'];
    $recoid=$data['recoid'];
    PDO_Execute("update bonanza set rewarditemname=?,recoid=?,target1=?,target2=?,bonanzainfoid=?,bvtarget1=?,bvtarget2=? where rowid=?",[$giftname,$recoid,$leftbv,$rightbv,$bonanzaid,$leftiv,$rightiv,$rowid]);
    $q->result=1;
    
}

if($routename=="bonanzagiftlist")
{
    $rowid=$data['bonanzaid'];
    $q->data=PDO_FetchAll("select * from bonanza where bonanzainfoid=? order by rowid",[$rowid]);
    $q->result=1;
}

if($routename=="deletebonanzagift")
{
    $rowid=$data['rowid'];
    PDO_Execute("delete bonanza where rowid=?",[$rowid]);
    $q->result=1;
}



if ($routename == "downlinelist") {
    try {
        $paramarr=array();
		$qparam="";
        extract($data);
       	


        if ($findparam != "2") {
           
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "upliners.side=?";
                $paramarr[] = $findparam;
            }
	
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "upliners.udoa > ?";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "upliners.udoa < date_add(?,interval 1 day)";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "upliners.upliners=?";
            $paramarr[]=$fromdate;
            $paramarr[]=$uptodate;
            $paramarr[] = $userid;

            $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            upliners.udoa, plans.planname, personalinfo.city,`binary`.sid,`binary`.`uid`, plans.planvalue,ifnull(`binary`.isapproved,0) isapproved
            from upliners
            join personalinfo on personalinfo.userid = upliners.userid
            join `binary`on `binary`.userid= upliners.userid
            join plans on plans.planid = `binary`.planid " . $qparam . " order by `personalinfo`.userid " ;
            $count_query = "select count(*) as tcount ,sum(upliners.pvalue) tpvalue
            from upliners
            join personalinfo on personalinfo.userid = upliners.userid
            join `binary`on `binary`.userid= upliners.userid
            join plans on plans.planid = `binary`.planid  " . $qparam;
       



        $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totals = PDO_FetchRow($count_query, $paramarr);
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "golddownlinelist") {
    try {
        $paramarr=array();
		$qparam="";
        extract($data);
       	


        if ($findparam != "2") {
           
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "gold_upliners.side=?";
                $paramarr[] = $findparam;
            }
	
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "gold_upliners.udoa > ?";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "gold_upliners.udoa < date_add(?,interval 1 day)";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "gold_upliners.upliners=?";
            $paramarr[]=$fromdate;
            $paramarr[]=$uptodate;
            $paramarr[] = $userid;

            $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            gold_upliners.udoa, plans.planname, personalinfo.city,`binary`.sid,`binary`.`uid`, plans.planvalue,ifnull(`binary`.isapproved,0) isapproved
            from gold_upliners
            join personalinfo on personalinfo.userid = gold_upliners.userid
            join `binary`on `binary`.userid= gold_upliners.userid
            join plans on plans.planid = `binary`.planid " . $qparam . " order by `personalinfo`.userid " ;
            $count_query = "select count(*) as tcount,0 tpvalue
            from gold_upliners
            join personalinfo on personalinfo.userid = gold_upliners.userid
            join `binary`on `binary`.userid= gold_upliners.userid
            join plans on plans.planid = `binary`.planid  " . $qparam;
       



        $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totals = PDO_FetchRow($count_query, $paramarr);
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "platinumdownlinelist") {
    try {
        $paramarr=array();
		$qparam="";
        extract($data);
       	


        if ($findparam != "2") {
           
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "platinum_upliners.side=?";
                $paramarr[] = $findparam;
            }
	
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "platinum_upliners.udoa > ?";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "platinum_upliners.udoa < date_add(?,interval 1 day)";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "platinum_upliners.upliners=?";
            $paramarr[]=$fromdate;
            $paramarr[]=$uptodate;
            $paramarr[] = $userid;

            $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            platinum_upliners.udoa, plans.planname, personalinfo.city,`binary`.sid,`binary`.`uid`, plans.planvalue,ifnull(`binary`.isapproved,0) isapproved
            from platinum_upliners
            join personalinfo on personalinfo.userid = platinum_upliners.userid
            join `binary`on `binary`.userid= platinum_upliners.userid
            join plans on plans.planid = `binary`.planid " . $qparam . " order by `personalinfo`.userid " ;
            $count_query = "select count(*) as tcount,0 tpvalue
            from platinum_upliners
            join personalinfo on personalinfo.userid = platinum_upliners.userid
            join `binary`on `binary`.userid= platinum_upliners.userid
            join plans on plans.planid = `binary`.planid  " . $qparam;
       



        $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totals = PDO_FetchRow($count_query, $paramarr);
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "diamonddownlinelist") {
    try {
        $paramarr=array();
		$qparam="";
        extract($data);
       	


        if ($findparam != "2") {
           
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "diamond_upliners.side=?";
                $paramarr[] = $findparam;
            }
	
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "diamond_upliners.udoa > ?";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "diamond_upliners.udoa < date_add(?,interval 1 day)";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "diamond_upliners.upliners=?";
            $paramarr[]=$fromdate;
            $paramarr[]=$uptodate;
            $paramarr[] = $userid;

            $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            diamond_upliners.udoa, plans.planname, personalinfo.city,`binary`.sid,`binary`.`uid`, plans.planvalue,ifnull(`binary`.isapproved,0) isapproved
            from diamond_upliners
            join personalinfo on personalinfo.userid = diamond_upliners.userid
            join `binary`on `binary`.userid= diamond_upliners.userid
            join plans on plans.planid = `binary`.planid " . $qparam . " order by `personalinfo`.userid " ;
            $count_query = "select count(*) as tcount,0 tpvalue
            from diamond_upliners
            join personalinfo on personalinfo.userid = diamond_upliners.userid
            join `binary`on `binary`.userid= diamond_upliners.userid
            join plans on plans.planid = `binary`.planid  " . $qparam;
       



        $limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totals = PDO_FetchRow($count_query, $paramarr);
        $q->status = 1;
        
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "activeplanlist") {
    try {

        $SELECT_query = "SELECT planid, planname From plans where enablejoining=1";
        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query, $paramarr);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}





if ($routename == "memberslist") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();

        $qparam = "";
        $paramarr = array();
       


       

            if (isset($data["fromdate"]) && $data["fromdate"] != "" && $data['search']=='' && $data['isfranchise']=='3') {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "personalinfo.doj>=?";
                $paramarr[] = $data["fromdate"];
            }

            if (isset($data["uptodate"]) && $data["uptodate"] != ""  && $data['search']=='' && $data['isfranchise']=='3') {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "personalinfo.doj<=date_add(?,interval 1 day)";
                $paramarr[] = $data["uptodate"];
            }
			
			if (isset($data["sortby"]) && $data["sortby"] != "3" && $data['search']=='' && $data['isfranchise']=='3') {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`binary`.isapproved,0)=?";
                $paramarr[] = $data["sortby"];
            }
		
			if (isset($data["planid"]) && $data["planid"] != "0" && $data['search']=='' && $data['isfranchise']=='3') {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`binary`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }

            if (isset($data["search"]) && $data["search"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "(personalinfo.name like ? or users.username like ? or personalinfo.city like ?)";
                $paramarr[] = "%" . $data["search"] . "%";
                $paramarr[] = "%" . $data["search"] . "%";
				$paramarr[] = "%" . $data["search"] . "%";
            }
		
		if (isset($data["isfranchise"]) && $data["isfranchise"] != "3") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
				if($data['isfranchise']=='1')
                $qparam = $qparam . "ifnull(`binary`.isdistributor,0)=?";
				if($data['isfranchise']=='2')
                $qparam = $qparam . "ifnull(`binary`.boosterupgraded,0)=?";
                $paramarr[] = '1';
            }

           
            $SELECT_query = "SELECT personalinfo.userid, personalinfo.name, personalinfo.doj, `binary`.doa, ifnull(`binary`.isapproved,0) isapproved,ifnull(`binary`.directrefunded,0) directrefunded ,users.username,users.password ,personalinfo.city, `binary`.sid,personalinfo.pan,personalinfo.ifsc,personalinfo.acno,users.password, ifnull(`binary`.isdistributor,0) isdistributor, ifnull(`binary`.boosterupgraded,0) boosterupgraded, plans.planname, plans.planid,personalinfo.contact mobile
             From  personalinfo
			join users on users.username=personalinfo.userid
            Join `binary`on `binary`.userid= users.username  join plans on plans.planid=`binary`.planid " . $qparam . " order by `personalinfo`.doj desc " . $limit;
			
			
            $count_query = "SELECT count(*) as tcount 
             From  personalinfo
			join users on users.username=personalinfo.userid 
            Join `binary`on `binary`.userid= users.username " . $qparam ;
      



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		$q->lastpayoutdate=PDO_FetchOne("select date_add(upperdate,interval 1 day) from payout order by payoutid desc limit 1");
        $q->status = 1;
        // $SELECT_query = "SELECT personalinfo.name,personalinfo.userid, personalinfo.city,`binary`.sID,personalinfo.doj,plans.planname From personalinfo,`binary`,plans, upliners where personalinfo.userid=`binary`.userid and `binary`.planID=plans.planID and `binary`.UID='" . $userid . "' and `binary`.UID='".$userid. "' and side='".$data['side']."' and udoa >= '".$data['Fromdate']."' and udoa='".$data['uptodate']."' Order by `binary`.userid limit " . $data['pageno'] . "," . $data['pagesize'];
        // $count_query = "SELECT count(*) as tcount From personalinfo,`binary`,plans where personalinfo.userid=`binary`.userid and `binary`.planID=plans.planID and `binary`.UID='" . $userid . "' and side='".$data['side']."' and udoa='".$data['Fromdate']."' and udoa='".$data['uptodate']. "' Order by `binary`.userid";
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}

if($routename == 'sponsordetail'){
	extract($data);
	$q->data=PDO_FetchRow("select spf.userid sid,spf.name sidname,upf.userid uid,upf.name uidname,`binary`.leftright from
							`binary` join personalinfo spf on spf.userid=`binary`.sid join personalinfo upf on upf.userid=`binary`.uid
							where `binary`.userid=?",[$userid]);
	$q->result=1;
}

if ($routename == "activatedlist") {
    try {
        $qparam = "";
        $qparamval = "";
        $paramarr = array();
        $qparam = "";
        $paramarr = array();
            if (isset($data["fromdate"]) && $data["fromdate"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`binary`.doa>=?";
                $paramarr[] = $data["fromdate"];
            }

            if (isset($data["uptodate"]) && $data["uptodate"] != "" ) {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`binary`.doa<=date_add(?,interval 1 day)";
                $paramarr[] = $data["uptodate"];
            }
			
			
		
			if (isset($data["planid"]) && $data["planid"] != "0") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "ifnull(`binary`.planid,0)=?";
                $paramarr[] = $data["planid"];
            }

            if (isset($data["search"]) && $data["search"] != "") {
                if ($qparam == "") $qparam = " where ";
                else {
                    $qparam = $qparam . " and ";
                }
                $qparam = $qparam . "`binary`.activatedby=?";
                $paramarr[] =  $data["search"] ;
            }
		
	

           
            $SELECT_query = "SELECT personalinfo.userid, personalinfo.name, personalinfo.doj, `binary`.doa, ifnull(`binary`.isapproved,0) isapproved,users.username,users.password ,personalinfo.city, personalinfo.pan,personalinfo.ifsc,personalinfo.acno,users.password, `binary`.activatedby,ifnull(`binary`.isdistributor,0) isdistributor, ifnull(`binary`.boosterupgraded,0) boosterupgraded, plans.planname,personalinfo.contact mobile
             From  personalinfo
			join users on users.username=personalinfo.userid
            Join `binary`on `binary`.userid= users.username  join plans on plans.planid=`binary`.planid " . $qparam . " order by `binary`.doa desc " . $limit;
			
			
            $count_query = "SELECT count(*) as tcount 
             From  personalinfo
			join users on users.username=personalinfo.userid 
            Join `binary`on `binary`.userid= users.username " . $qparam ;
      



        if (isset($data["page"])) {
            $pagecount = (((int)$data['page'])-1) * (int)$data['pagesize'];
            $limit =  " limit " . $pagecount . "," . $data['pagesize'];
        }


        $q = new \stdClass();
		$q->page=(((int)$data['page'])-1) * (int)$data['pagesize'];
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
		$q->lastpayoutdate=PDO_FetchOne("select date_add(upperdate,interval 1 day) from payout order by payoutid desc limit 1");
        $q->status = 1;
        // $SELECT_query = "SELECT personalinfo.name,personalinfo.userid, personalinfo.city,`binary`.sID,personalinfo.doj,plans.planname From personalinfo,`binary`,plans, upliners where personalinfo.userid=`binary`.userid and `binary`.planID=plans.planID and `binary`.UID='" . $userid . "' and `binary`.UID='".$userid. "' and side='".$data['side']."' and udoa >= '".$data['Fromdate']."' and udoa='".$data['uptodate']."' Order by `binary`.userid limit " . $data['pageno'] . "," . $data['pagesize'];
        // $count_query = "SELECT count(*) as tcount From personalinfo,`binary`,plans where personalinfo.userid=`binary`.userid and `binary`.planID=plans.planID and `binary`.UID='" . $userid . "' and side='".$data['side']."' and udoa='".$data['Fromdate']."' and udoa='".$data['uptodate']. "' Order by `binary`.userid";
    } catch (PDOException $e) {
        echo 'prepare failed: ' . $e->getMessage();
    }
}

if($routename=='changepassword')
{
    $newpassword=$_POST['password'];
    $q=new \stdClass();
    $oldpassword=PDO_FetchOne("SELECT password from users where username=?",[$userid]);
    if($oldpassword==$newpassword)
    {
        PDO_Execute("Update users set password=? where username=?",[$newpassword,$userid]);
        $q->result=1;
    }
    else
    $q->result=0;
}

if($routename=="updateadminuser")
{
	extract($data);
	PDO_Execute("update users set islockedout=?,password=?,isadmin=? where username=?",[$islockedout,$password,$isadmin,$username]);
	$q->result=1;
}

if($routename=="newadminuser")
{
	extract($data);
	PDO_Execute("Insert into users(username,password,isadmin,islockedout) values(?,?,?,0)",[$username,$password,$isadmin]);
	$q->result=1;
}

if($routename=="adminusers")
{
	extract($data);
	$q->data=PDO_FetchAll("select users.username,users.password,users.islockedout,users.isadmin,adminrights.rightname from users join adminrights on adminrights.rowid=users.isadmin where isadmin <> 0");
	$q->result=1;
}

if($routename=="adminrights")
{
	$q->data=PDO_FetchAll("select * from adminrights order by rowid");
}

if($routename=="addnews")
{
    $q= new \stdClass();
    $newtitle=$data['title'];
    $newdescription=$data['newsdescription'];
    PDO_Execute("Insert into news (newsheading,newsdescription,newsdate) values(?,?,now())", [$newtitle,$newdescription]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="addgallery")
{
    $q= new \stdClass();
    $newtitle=$data['title'];
    $newdescription=$data['description'];
    PDO_Execute("Insert into gallery (galleryname) values(?)", [$newtitle]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="addlegaldoc")
{
    $q= new \stdClass();
    $newtitle=$data['title'];    
    PDO_Execute("Insert into legaldocs (title) values(?)", [$newtitle]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="addgalleryphoto")
{
    $q= new \stdClass();
    $newtitle=$data['title'];
    $galleryid=$data['galleryid'];
    PDO_Execute("Insert into galleryphotos(subgalleryid,photodatah) values(?,?)", [$galleryid,$newtitle]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="addproduct")
{
    $q= new \stdClass();
    $productname=$data['productname'];
    $mrp=$data['mrp'];
    $discount=$data['discount'];
    $description=$data['description'];
    PDO_Execute("Insert into products (productname,mrp,discount,description) values(?,?,?,?)", [$productname,$mrp,$discount,$description]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}




if($routename=="addbanner")
{
    $q= new \stdClass();   
    PDO_Execute("insert into banner(adddate) VALUES(now())");
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="updateproduct")
{
    $q= new \stdClass();
    $productid=$data['productid'];
    $productname=$data['productname'];
    $mrp=$data['mrp'];
    $discount=$data['discount'];
    $description=$data['description'];
    PDO_Execute("update products set productname=?,mrp=?,discount=?,description=? where productid=?", [$productname,$mrp,$discount,$description,$productid]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}



if($routename=="deletenews")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from news where newsid=?", [$id]);
    unlink("../uploads/news/".$id.".jpg");    
    $q->result=1;
}


if($routename=="deletelegaldoc")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from legaldocs where rowid=?", [$id]);
    unlink("../uploads/legaldocs/".$id.".jpg");  
    $q->result=1;
}

if($routename=="deletegallery")
{
    $q= new \stdClass();
    $id=$data['id'];
    $photolist=PDO_FetchAll("Select subgalleryid from galleryphotos where galleryid=?",[$id]);
    foreach($photolist as $photoid)
    {
        unlink("../uploads/galleryphotos/".$photoid['subgalleryid'].".jpg");
    }
    unlink("../uploads/gallery/".$id.".jpg");
    PDO_Execute("delete from galleryphotos where subgalleryid=?", [$id]);
    PDO_Execute("delete from gallery where galleryid=?", [$id]);
    $q->result=1;
}

if($routename=="deletegalleryphoto")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from galleryphotos where photoid=?", [$id]);
    unlink("../uploads/galleryphotos/".$id.".jpg");
    $q->result=1;
}

if($routename=="deleteproduct")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from products where productid=?", [$id]);
    unlink("../uploads/products/".$id.".jpg");
    $q->result=1;
}

if($routename=="addrepurchaseproduct")
{
	extract($data);
    $q= new \stdClass();  
    PDO_Execute("Insert into repurchaseproducts (productname,mrp,srp,pp,bv,retailercommission,dp,vat,otherinfo) values(?,?,?,?,?,?,?,?,?)", [$productname,$mrp,$srp,$pp,$bv,$commission,$dp,$vat,$description]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="repurchaseproduct")
{
	//extract($data);
    $q= new \stdClass();  
    $q->products=PDO_FetchAll("select * from repurchaseproducts order by productname");
    $q->result=1;
	
}

if($routename=="supplierlist")
{
  $q= new \stdClass();  
    $q->products=PDO_FetchAll("select * from suppliers order by suppliername");
    $q->result=1;
}

if($routename=="addsupplier")
{
    $q= new \stdClass();
   extract($data);
    PDO_Execute("Insert into suppliers (suppliername,gst,address,contact) values(?,?,?,?)", [$suppliername,$gst,$address,$contact]);
    $newsid=PDO_LastInsertId();
    $q->id=$newsid;
}

if($routename=="deletesupplier")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from suppliers where supplierid=?", [$id]);    
    $q->result=1;
}

if($routename=="availablestock")
{
	$q->result=1;
	$q->data=PDO_FetchAll("SELECT adminstock.productid, sum(ifnull(instock,0))-sum(ifnull(outstock,0)) stock,repurchaseproducts.productname,mrp,srp price,dp cashback FROM adminstock JOIN repurchaseproducts on repurchaseproducts.productid=adminstock.productid GROUP BY adminstock.productid,repurchaseproducts.productname ORDER BY productname",[$userid]);
}

if($routename=="adminstockdetail")
{
	$productid=$data['productid'];
	$q->result=1;
	$q->data=PDO_FetchAll("SELECT * from adminstock where productid=?",[$productid]);
}


if($routename=="editrepurchaseproduct")
{				
    $productid=$data['productid'];
    $productname=$data['productname'];
    $mrp=$data['mrp'];
    $srp=$data['srp'];
	$pp=$data['pp'];
    $bv=$data['bv'];
    $retailercommission=$data['commission'];
    $isavailable=$data['isavailable'];
    $otherinfo=$data['description'];
    $vat=$data['vat']; 
	$dp=$data['dp'];   
    PDO_Execute("update repurchaseproducts set productname =?,mrp =?,srp =?, pp=?,bv =?,retailercommission =?,isavailable =?,otherinfo =?,vat =?, dp=? where productid=?", [$productname,$mrp,$srp,$pp,$bv,$retailercommission,$isavailable,$otherinfo,$vat,$dp,$productid]);
    $newsid=PDO_LastInsertId();
    $q->result=1;
    $q->id=$newsid;
}

if($routename=="deleterepurchaseproduct")
{
    $q= new \stdClass();
    $id=$data['id'];
	$salecount1=PDO_FetchOne("select count(*) from usersaledetail where productid=?",[$id]);
	$salecount2=PDO_FetchOne("select count(*) from retailersaledetail where productid=?",[$id]);
	if($salecount1==0 && $salecount2==0)
	{
    	PDO_Execute("delete from repurchaseproducts where productid=?", [$id]);
    	$q->result=1;
	}
	else
		$q->result=0;
}

if($routename=="deleterebanner")
{
    $q= new \stdClass();
    $id=$data['id'];
    PDO_Execute("delete from banner where rowid=?", [$id]);
    $q->result=1;
}
echo json_encode($q);
