<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Headers: X-Requested-With');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
    header('Access-Control-Max-Age: 86400');
    header("HTTP/1.1 200 OK");
    exit();
}

header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: *");

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
$data = $json_data['token'];


// if (isset($json_data['token'])) {
//     $token    = $json_data['token'];
//     $routename = $json_data['route'];
//     // if ($json_data["data"] != null) {
//     //     $dataArray = $json_data["data"];
//     //     $user_typeid = $json_data["user_typeid"];
//     if (isset($json_data["user_typeid"])) {
//         $user_typeid = $json_data["user_typeid"];
//         $dataArray = $json_data["data"];
//     } else {
//         $data = $json_data["single_data"];
//         $user_typeid = $json_data["user_typeid"];
//     }
// } elseif (isset($json_data[0]['token'])) {
//     $token    = $json_data[0]['token'];
//     $routename = $json_data[1]['route'];
//     $data = $json_data[2][0];
// } else if (isset($_POST['token'])) {
//     $token = $_POST['token'];
//     $routename = $_POST['route'];
// } else {
//     //echo 'not found 2';
//     header("HTTP/1.1 401 Unauthorized");
//     // exit;
// }
if (isset($json_data['token'])) {
    $token = $json_data['token'];
    $routename = $json_data['route'];

    if (isset($json_data["user_typeid"])) {
        $user_typeid = $json_data["user_typeid"];
        $dataArray = $json_data["data"] ?? null;
    } else {
        $data = $json_data["single_data"] ?? null;
        $user_typeid = $json_data["user_typeid"] ?? null;
    }
} elseif (isset($json_data[0]['token'])) {
    $token = $json_data[0]['token'];
    $routename = $json_data[1]['route'];
    $data = $json_data[2][0] ?? null;
} elseif (isset($_POST['token'])) {
    $token = $_POST['token'];
    $routename = $_POST['route'];
    $data = $_POST['data'] ?? null; // Adjust this line based on your form structure
} else {
    header("HTTP/1.1 401 Unauthorized");
    exit;
}














$q = new \stdClass();

if (isset($token)) {

    if ($token == "1111-1111-1111-1111-1111")
        $userid = '10001';
    else {

        $qparam = '';
        $qparamval = '';
        $arrcount = 0;
        $paramarr = array();

        $qparam = " Where token=? ";
        $paramarr[$arrcount] = $token;

        $signout_date = date("Y-m-d H:i:s");

        //$qparam = $qparam . " and expireson >=? ";
        //$paramarr[$arrcount + 1] = $signout_date;
        $pagesize = 50;

        $SELECT_query = "SELECT * From tokens " . $qparam;

        $resultrow = PDO_FetchRow($SELECT_query, $paramarr);

        if ($resultrow != null) {
            $userid = $resultrow['username'];
        } else {
            $q->token = "";
            $q->result = 0;
            $q->token = $token;
            $q->msg = 'login again2';
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode($q);
            exit;
        }
    }
} else if (isset($_GET['token']) && $_GET['token'] != "") {

    $qparam = '';
    $qparamval = '';
    $arrcount = 0;
    $paramarr = array();

    $qparam = " Where token=? ";
    $paramarr[$arrcount] = $_GET['token'];

    $qparam = $qparam . " and signoutdate >=? ";
    $paramarr[$arrcount + 1] = $signout_date;


    $SELECT_query = "SELECT * From token " . $qparam;

    $resultrow = PDO_FetchRow($SELECT_query, $paramarr);

    if ($resultrow != null) {
        $userid = $result['username'];
        // $id = $resultrow['cusid'];
        // $rowid = $resultrow['id'];
    } else {
        $q->token = "";
        $q->result = 0;
        $q->msg = 'login again3';
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
//echo $userid;
$q = new \stdClass();

if ($routename == "downlinelist") {
    try {
        $paramarr = array();
        $qparam = "";
        // extract($data);
        //$pagesize=50;
        if ($sortby != "3") {

            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "ifnull(`binary`.isapproved,0)=?";
            $paramarr[] = $sortby;
        }

        if ($findparam != "3") {
            if ($findparam != "4") {
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
            $qparam = $qparam . "ifnull(upliners.udoa,personalinfo.doj) > ?";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "ifnull(upliners.udoa,personalinfo.doj) < date_add(?,interval 1 day)";
            if ($qparam == "") $qparam = " where ";
            else {
                $qparam = $qparam . " and ";
            }
            $qparam = $qparam . "upliners.upliners=?";
            $paramarr[] = $fromdate;
            $paramarr[] = $uptodate;
            $paramarr[] = $userid;

            $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            upliners.udoa,  personalinfo.city,`binary`.sid,`binary`.`uid`, ifnull(`binary`.isapproved,0) isapproved
            from upliners
            join personalinfo on personalinfo.userid = upliners.userid
            join `binary`on `binary`.userid= upliners.userid" . $qparam . " order by ifnull(upliners.udoa,personalinfo.doj) desc";
            $count_query = "select count(*) as tcount 
            from upliners
            join personalinfo on personalinfo.userid = upliners.userid
            join `binary`on `binary`.userid= upliners.userid" . $qparam;
        }



        $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
        $q->status = 1;
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}


if ($routename == "activationhistory") {
    try {
        $paramarr = array();
        $qparam = "";
        extract($data);



        $qparam = $qparam . "`binary`.doa > ?";
        if ($qparam == "") $qparam = " where ";
        else {
            $qparam = $qparam . " and ";
        }
        $qparam = $qparam . "`binary`.doa < date_add(?,interval 1 day)";
        if ($qparam == "") $qparam = " where ";
        else {
            $qparam = $qparam . " and ";
        }
        $paramarr[] = $fromdate;
        $paramarr[] = $uptodate;
        if ($planid != "0") {
            $qparam = $qparam . " and plans.planid=? ";
            $paramarr[] = $planid;
        }
        $qparam = $qparam . " and `binary`.activatedby=?";

        $paramarr[] = $userid;

        $SELECT_query = "select personalinfo.userid, personalinfo.name, personalinfo.doj,
            plans.planname, personalinfo.city,`binary`.sid,`binary`.`uid`, plans.planvalue,ifnull(`binary`.isapproved,0) isapproved
            from personalinfo
            join `binary`on `binary`.userid= personalinfo.userid
            join plans on plans.planid = `binary`.planid " . $qparam . " order by ifnull(`binary`.doa) desc";
        $count_query = "select count(*) as tcount 
            from personalinfo
            join `binary`on `binary`.userid= personalinfo.userid
            join plans on plans.planid = `binary`.planid  " . $qparam;



        $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;


        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, $paramarr);
        $q->totalcount = PDO_FetchOne($count_query, $paramarr);
        $q->status = 1;
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "boosterlist") {
    extract($data);
    try {

        $SELECT_query = "select pf.userid,pf.name,pf.city,tdate,amount,level from boosterpayout join personalinfo pf on pf.userid=boosterpayout.child_userid where boosterpayout.userid=? and level=?";
        $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query . $limit, [$userid, $level]);
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

if ($routename == "activatecreditlist") {
    try {
        extract($data);
        $paramarr = array();
        $paramarr[] = $userid;
        $paramarr[] = $planid;
        $paramarr[] = $status;
        $SELECT_query = "select * from activatecredit where userid=? and planid=? and ifnull(usedon,0)=?";
        $q = new \stdClass();
        $q->result = 1;
        $q->data = PDO_FetchAll($SELECT_query, $paramarr);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}


if ($routename == "searchtreeview") {
    extract($data);
    if ($searchname && $searchname != "") {
        $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
        $q->result = PDO_FetchAll("select pf.name,pf.city,pf.userid from personalinfo pf join upliners up on up.userid=pf.userid where up.upliners=? and pf.name like ?" . $limit, [$userid, "%$searchname%"]);
        $q->totalcount = PDO_FetchOne("select count(*) from personalinfo pf join upliners up on up.userid=pf.userid where up.upliners=? and pf.name like ?", [$userid, "%$searchname%"]);
    } else {
        $q->result = PDO_FetchAll("select pf.name,pf.city,pf.userid from personalinfo pf join upliners up on up.userid=pf.userid where up.upliners=? and up.userid=?", [$userid, $searchuserid]);
    }
}

if ($routename == "recolist") {


    $q->result = 1;
    $q->data = PDO_FetchAll("select * from reco order by recid desc");
}

if ($routename == "userreco") {

    $params = array();
    $params[] = $userid;

    $q->result = 1;
    $q->data = PDO_FetchRow("select * from userreco where userid=?", $params);
}


if ($routename == "members_rewards") {
    try {

        $SELECT_query = "SELECT mr.*,r.rewarditemname from memberrewards mr join rewards r on r.rewardid=mr.rewardid where mr.userid=?";
        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query, [$userid]);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "bonanzalist") {
    try {

        $SELECT_query = "SELECT * from bonanzainfo order by rowid desc";
        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "bonanzadetail") {
    try {

        extract($data);
        $SELECT_query = "SELECT * from bonanza where bonanzainfoid=? order by target1";
        $q = new \stdClass();
        $q->result = PDO_FetchAll($SELECT_query, [$bonanzaid]);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "bonanzastatus") {
    try {
        if (PDO_FetchOne("select ifnull(isapproved,0) from `binary` where userid=?", [$userid]) == 1) {
            extract($data);
            $bonanzainfo = PDO_FetchRow("select * from bonanzainfo where rowid=?", [$bonanzaid]);
            if ((time() - (60 * 60 * 24)) < strtotime($bonanzainfo['uptodate'])) {
                $SELECT_query = "select sum(ifnull(pvalue,0)) count,side from upliners where upliners.udoa >= ? and upliners.udoa < date_add(?,interval 1 day) and  upliners.upliners=?  group by side";
                $pvresult = PDO_FetchAll($SELECT_query, [$bonanzainfo['fromdate'], $bonanzainfo['uptodate'], $userid]);
                $pvleft = 0;
                $pvright = 0;
                foreach ($pvresult as $r) {
                    if ($r['side'] == "1")
                        $pvleft = $r['count'];
                    else
                        $pvright = $r['count'];
                }

                $SELECT_query = "select sum(ifnull(rp.bv,0)*usd.qty) count,side from upliners join usersinvoices ui on ui.userid=upliners.userid JOIN userssaledetail usd on usd.invoiceid=ui.invoiceid JOIN repurchaseproducts rp on rp.productid=usd.productid where ui.invoicedate >= ? and ui.invoicedate < date_add(?,interval 1 day) and upliners.upliners=? and ifnull(ui.saletypeid,1)<=1 group by side";
                $pvrresult = PDO_FetchAll($SELECT_query, [$bonanzainfo['fromdate'], $bonanzainfo['uptodate'], $userid]);
                $pvrleft = 0;
                $pvrright = 0;
                foreach ($pvrresult as $r) {
                    if ($r['side'] == "1")
                        $pvrleft = $r['count'];
                    elseif ($r['side'] == "0")
                        $pvrright = $r['count'];
                }

                $bonanzagift = PDO_FetchOne("select bonanza.rewarditemname from bonanza where bonanza.bonanzainfoid=? and target1 <= ? and target2 <= ? and bvtarget1 <= ? and bvtarget2 <= ? order by bonanza.rowid desc limit 1", [$bonanzaid, $pvleft, $pvright, $pvrleft, $pvrright]);
            } else {
                $bonanzarow = PDO_FetchRow("select bonanzaachivers.*,rewarditemname from bonanzaachivers join bonanza on bonanza.rowid=bonanzaachivers.bonanzaid where userid=? and bonanzaachivers.bonanzainfoid=?", [$userid, $bonanzaid]);
                $pvleft = $bonanzarow['mleft'];
                $pvright = $bonanzarow['mright'];
                $pvrleft = $bonanzarow['rleft'];
                $pvrright = $bonanzarow['rright'];
                $bonanzagift = $bonanzarow['rewarditemname'];
            }

            $q = new \stdClass();
            $result = new \stdClass();
            $result->pvleft = $pvleft;
            $result->pvright = $pvright;
            $result->pvrleft = $pvrleft;
            $result->pvrright = $pvrright;
            $result->giftachieved = $bonanzagift;
            $q->result = $result;
        } else {
            $q = new \stdClass();
            $result = new \stdClass();
            $result->pvleft = 0;
            $result->pvright = 0;
            $result->pvrleft = 0;
            $result->pvrright = 0;
            $result->giftachieved = 0;
            $q->result = $result;
        }
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "lifetimebonanzastatus") {
    $qparam = "";
    $paramarr = array();
    $limit = "";
    //extract($data);
    // PDO_Execute("UPDATE lifetimebonanzaachivers ltba JOIN (select upliners,bonanzaid,sum(pvalue) pvalue FROM upliners JOIN lifetimebonanzaachivers on lifetimebonanzaachivers.userid=upliners.upliners JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.boanznaid WHERE upliners.side=1 and upliners.udoa BETWEEN startdate and enddate and lifetimebonanzaachivers.achieved is null group by upliners.upliners,lifetimebonanza.bonanzaid) u on u.upliners=ltba.userid and ltba.boanznaid=u.bonanzaid set ltba.leftbv=u.pvalue");
    // PDO_Execute("UPDATE lifetimebonanzaachivers ltba JOIN (select upliners,bonanzaid,sum(pvalue) pvalue FROM upliners JOIN lifetimebonanzaachivers on lifetimebonanzaachivers.userid=upliners.upliners JOIN lifetimebonanza on lifetimebonanza.bonanzaid=lifetimebonanzaachivers.boanznaid WHERE upliners.side=0 and upliners.udoa BETWEEN startdate and enddate and lifetimebonanzaachivers.achieved is null group by upliners.upliners,lifetimebonanza.bonanzaid) u on u.upliners=ltba.userid and ltba.boanznaid=u.bonanzaid set ltba.rightbv=u.pvalue");
    $SELECT_query = "SELECT bonanzaname,ltbq.* , ifnull(ltbq.achieved,2) achieved2, datediff(enddate,now()) daysleft
    From lifetimebonanzaachivers ltbq Join
    lifetimebonanza ltb ON ltb.bonanzaid=ltbq.bonanzaid
        Where ltbq.userid =? ";
    $q = new \stdClass();
    $q->result = PDO_FetchAll($SELECT_query, [$userid]);
    $q->status = 1;
}



if ($routename == "downlinelifetimebonanzaachievers") {

    PDO_Execute("create temporary table downlinedata(bonanzaid int,bonanzaname varchar(50),mleft int, mright int)");
    PDO_Execute("insert into downlinedata(bonanzaid,bonanzaname,mleft,mright) select lb.bonanzaid,lb.bonanzaname, count(*) ,0
    from upliners 
    join lifetimebonanzaachivers lbq on upliners.userid=lbq.userid 
    join personalinfo pf on pf.userid=upliners.userid 
    join lifetimebonanza lb on lb.bonanzaid=lbq.bonanzaid where upliners.side=1 and upliners.upliners=? and lbq.achieved=1  group by lb.bonanzaid,lb.bonanzaname", [$userid]);
    PDO_Execute("insert into downlinedata(bonanzaid,bonanzaname,mleft,mright) select lb.bonanzaid,lb.bonanzaname, 0,count(*)
    from upliners 
    join lifetimebonanzaachivers lbq on upliners.userid=lbq.userid 
    join personalinfo pf on pf.userid=upliners.userid 
    join lifetimebonanza lb on lb.bonanzaid=lbq.bonanzaid where upliners.side=0 and upliners.upliners=? and lbq.achieved=1  group by lb.bonanzaid,lb.bonanzaname", [$userid]);

    $q = new \stdClass();
    $q->result = PDO_FetchAll("select bonanzaname,sum(mleft) mleft, sum(mright) mright from downlinedata group by bonanzaid,bonanzaname order by bonanzaid");
    PDO_Execute("drop table downlinedata");
    $q->status = 1;;
}

if ($routename == "payoutsummary") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select userpayoutsummary.*,royaltyamt royaltyamount,boosteramt boosteramount,salaryamt salaryamount,ifnull(petrolamt,0) petroling ,payout.payoutduration,payout.payouttype from userpayoutsummary join payout on payout.payoutid=userpayoutsummary.payoutid where userid=? order by userpayoutsummary.payoutid desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from userpayoutsummary where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "binarypayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select payout.payoutduration,previousleft,previousright,pairs,amtperpair from binarypayout join payout on payout.payoutid=binarypayout.durationid where userid=? order by durationid desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from binarypayout where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "directpayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select plans.planname,directusers.* from directusers join plans on plans.planid=directusers.planid where userid=? order by directusers.rowid desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from directusers where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "repurchasepayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select monthname(concat('2021-',pmonth,'-1')) month,userrepurchasepayout.* from userrepurchasepayout where userid=? order by rowid desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from userrepurchasepayout where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "royaltypayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select monthname(concat('2021-',rmonth,'-1')) month,royaltypayout.* from royaltypayout where userid=? order by ryear desc,rmonth desc,businesstype,recoid" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from royaltypayout where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "franchisepayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    if ($payoutype != 2)
        $query = "SELECT userid,franchiseid,amount,incomeid,invoiceid,date_format(transdate,'%d/%m/%Y') transdate FROM `franchiseincome` where userid=? and incomeid=? order by rowid desc";
    else
        $query = "SELECT userid,franchiseid,amount,incomeid,invoiceid,date_format(transdate,'%d/%m/%Y') transdate FROM `franchiseincome` where franchiseid=? and incomeid=? order by rowid desc";

    $q->data = PDO_FetchAll($query . $limit, [$userid, $payouttype]);
    $q->totalrows = PDO_FetchOne($query, [$userid, $payouttype]);
    $q->result = 1;
}

if ($routename == "boosterpayout") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select * from boosterpayout where userid=? order by rowid desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from boosterpayout where userid=?", [$userid]);
    $q->result = 1;
}

if ($routename == "petrolingbonus") {
    extract($data);
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->data = PDO_FetchAll("select monthname(concat('2021-',bmonth,'-1')) month,petrolingbonus.*,byear ryear,slabid slab from petrolingbonus where userid=? order by byear desc,bmonth desc" . $limit, [$userid]);
    $q->totalrows = PDO_FetchOne("select count(*) from petrolingbonus where userid=?", [$userid]);
    $q->showbusiness = false;
}

if ($routename == "salarypayout") {
    extract($data);
    $query = "";
    $params = array();
    $params[] = $userid;
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    if ($planid) {
        $query = $query . ' and planid=?';
        $params[] = $planid;
    }

    if ($paidstatus == 1) {
        $query = $query = ' and paidon is not null';
    }

    if ($paidstatus == 0) {
        $query = $query = ' and paidon is null';
    }

    $q->data = PDO_FetchAll("select * from userssalary where userid=? " . $query . " order by rowid desc" . $limit, $params);
    $q->totalrows = PDO_FetchOne("select count(*) from userssalary where userid=? " . $query, $params);
    $q->result = 1;
}

if ($routename == "newevent") {
    extract($data);
    PDO_Execute("Insert into salaryevent(userid,eventdate,eventlocation) values (?,?,?)", [$userid, $eventdate, $eventlocation]);
    $eventid = PDO_LastInsertId();
    $q->result = 1;
    $q->eventid = $eventid;
}

if ($routename == "addeventphotos") {
    extract($data);
    PDO_Execute("Insert into eventphotos(eventid) values (?)", [$eventid]);
    $photoid = PDO_LastInsertId();
    $q->result = 1;
    $q->photoid = $photoid;
}

if ($routename == "uploadedevents") {
    $events = PDO_FetchAll("select * from salaryevent where userid=? order by rowid desc", [$userid]);
    $q->result = 1;
    $q->data = $events;
}

if ($routename == "eventphotlist") {
    extract($data);
    $events = PDO_FetchAll("select rowid from eventphotos where eventid=? order by rowid desc", [$eventid]);
    $q->result = 1;
    $q->data = $events;
}

if ($routename == "myaccountsummary") {
    $amount = PDO_FetchOne("Select sum(iFnull(amount,0)) from useraccount where userid=?", [$userid]);
    $camount = PDO_FetchOne("Select sum(iFnull(camount,0)) from useraccount where userid=?", [$userid]);
    $q->amount = $amount;
    $q->camount = $camount;
}


if ($routename == "myaccount") {
    extract($data);
    $paramarr = array();
    $paramarr[] = $fromdate;
    $paramarr[] = $uptodate;
    $paramarr[] = $userid;
    //$paramarr[]=$side;
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    if ($side == "0") {
        $SELECT_query = "select * from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=? order by tdate desc" . $limit;
        $count_query = "SELECT count(*) as tcount from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=?";
    } else if ($side == "1") {
        $SELECT_query = "select * from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=? and amount >0 order by tdate desc" . $limit;
        $count_query = "SELECT count(*) as tcount from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=? and amount>0";
    } else if ($side == "2") {
        $SELECT_query = "select * from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=? and camount >0 order by tdate desc" . $limit;
        $count_query = "SELECT count(*) as tcount from useraccount where tdate >= ? and tdate < date_add(?,interval 1 day) and userid=? and camount>0";
    }
    $q = new \stdClass();
    $q->result = PDO_FetchAll($SELECT_query, $paramarr);
    $q->totalcount = PDO_FetchOne($count_query, $paramarr);
}

if ($routename == "franchiseaccount") {
    extract($data);
    $paramarr = array();

    $paramarr[] = $userid;
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;

    $SELECT_query = "select * from retaileraccount where userid=? order by transdate desc" . $limit;
    $count_query = "SELECT count(*) as tcount from retaileraccount where userid=?";


    $q = new \stdClass();
    $q->result = PDO_FetchAll($SELECT_query, $paramarr);
    $q->totalcount = PDO_FetchOne($count_query, $paramarr);
}

if ($routename == "cashbackaccount") {
    extract($data);
    $paramarr = array();

    $paramarr[] = $userid;
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;

    $SELECT_query = "select * from cashbackaccount where userid=? order by transdate desc" . $limit;
    $count_query = "SELECT count(*) as tcount from cashbackaccount where userid=?";


    $q = new \stdClass();
    $q->result = PDO_FetchAll($SELECT_query, $paramarr);
    $q->totalcount = PDO_FetchOne($count_query, $paramarr);
}

if ($routename == "myaccountsummery") {
    try {
        $qparam = "";
        $paramarr = array();
        $limit = "";

        $GenAmt = PDO_FetchOne("Select sum(amount) from useraccount Where userid='" . $userid . "'");
        $PaidAmt = PDO_FetchOne("Select sum(camount) from useraccount Where userid='" . $userid . "'");
        // Select @GenAmt as genAmt ,@PaidAmt as Paid, @GenAmt-@PaidAmt as balance;";

        $q = new \stdClass();
        $q->result = array('generated' =>  $GenAmt, 'paid' =>  $PaidAmt, 'balance' => $GenAmt - $PaidAmt);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}


if ($routename == "franchiseaccountsummary") {
    try {
        $qparam = "";
        $paramarr = array();
        $limit = "";

        $GenAmt = PDO_FetchOne("Select sum(amount) from retaileraccount Where userid='" . $userid . "'");
        $PaidAmt = PDO_FetchOne("Select sum(camount) from retaileraccount Where userid='" . $userid . "'");
        // Select @GenAmt as genAmt ,@PaidAmt as Paid, @GenAmt-@PaidAmt as balance;";

        $q = new \stdClass();
        $q->result = array('generated' =>  $GenAmt, 'paid' =>  $PaidAmt, 'balance' => $GenAmt - $PaidAmt);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "cashbackaccountsummary") {
    try {
        $qparam = "";
        $paramarr = array();
        $limit = "";

        $GenAmt = PDO_FetchOne("Select sum(amount) from cashbackaccount Where userid='" . $userid . "'");
        $PaidAmt = PDO_FetchOne("Select sum(camount) from cashbackaccount Where userid='" . $userid . "'");
        // Select @GenAmt as genAmt ,@PaidAmt as Paid, @GenAmt-@PaidAmt as balance;";

        $q = new \stdClass();
        $q->result = array('generated' =>  $GenAmt, 'paid' =>  $PaidAmt, 'balance' => $GenAmt - $PaidAmt);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

if ($routename == "checkunpaidid") {
    $auserid = $data['userid'];
    try {
        $SELECT_query = "SELECT pf.userid,pf.name,pf.city,bn.isapproved,bn.uid,bn.sid,plans.planname,plans.planid from personalinfo pf  join `binary` bn on bn.userid=pf.userid left join plans on plans.planid=bn.planid where pf.userid=? and bn.doa is null";
        $q = new \stdClass();
        $q->result = PDO_FetchRow($SELECT_query, [$auserid]);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}



if ($routename == "getpersonalinfobyid") {
    try {
        $SELECT_query = "SELECT pf.*,bn.isapproved,bn.boosterupgraded,isdistributor isfranchise from personalinfo pf join `binary` bn on bn.userid=pf.userid where pf.userid=?";
        $q = new \stdClass();
        $q->result = PDO_FetchRow($SELECT_query, [$userid]);
    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}
if ($routename == "updatepersonalinfo") {

    $qparam = "";
    $paramarr = array();
    extract($data);

    PDO_Execute(
        "update personalinfo set fathername=?,city=?,coname=?,corealtion=?,dob=?,address=?,pan=?,acno=?,ifsc=? where userid=?",
        [$fathername, $city, $coname, $corelation, $dob, $address, $pan, $acno, $ifsc, $userid]
    );
    $q = new \stdClass();
    $q->status = 1;
}

if ($routename == "changepassword") {
    extract($data);
    if (PDO_FetchOne("select password from users where username=?", [$userid]) == $oldpassword) {
        PDO_Execute("update users set password=? where username=?", [$newpassword, $userid]);
        $q->status = 1;
    } else
        $q->status = 0;
}

// dashboard
if ($routename == "downlinestatus") {
    try {
        $qparam = "";
        $paramarr = array();
        $limit = "";
        $result1 = array();
        $result = array();

        // echo $userid;
        // exit;
        $teamrows = PDO_FetchAll("SELECT COUNT(*) as total_row FROM `binary` WHERE sid = ?", [$userid]);
        $totalteams = PDO_FetchAll("SELECT COUNT(*) as total_members FROM `binary`");
        // if ($teamrows[0]['side'] == 1) {
        //     $left = $teamrows[0]['pvalue'] ?? 0;
        //     $right = $teamrows[1]['pvalue'] ?? 0;
        // } else {
        //     $left = $teamrows[1]['pvalue'] ?? 0;
        //     $right = $teamrows[0]['pvalue'] ?? 0;
        // }

        

        $total = PDO_FetchAll("SELECT SUM(roi + binaryamt + direct) AS total
        FROM payoutsummary
        WHERE userid = ?" ,  [$userid]);
        

        $direct_view = PDO_FetchAll("SELECT name FROM personalinfo WHERE sponsorid = ?" ,  [$userid]);
        
        $q = new \stdClass();
        
        $q->total_sid =$teamrows;
        $q->total_global = $totalteams;
        $q->total_income = $total;
        $q->direct_view = $direct_view;
        $q->status = 1;


    } catch (PDOException $e) {
        echo 'Prepare failed: ' . $e->getMessage();
    }
}

// if ($routename == "downlinestatus") {
//     try {
//         $qparam = "";
//         $paramarr = array();
//         $limit = "";
//         $result = array();

//         $teamrows = PDO_FetchAll("SELECT binary_data, COUNT(*) as total_members FROM members WHERE sid = ?", [$userid]);
//         if ($teamrows[0]['side'] == 1) {
//             $left = $teamrows[0]['pvalue'] ?? 0;
//             $right = $teamrows[1]['pvalue'] ?? 0;
//         } else {
//             $left = $teamrows[1]['pvalue'] ?? 0;
//             $right = $teamrows[0]['pvalue'] ?? 0;
//         }

//         $pointrows = PDO_FetchAll("SELECT sum(ifnull(pvalue,0)) pvalue,side from upliners where upliners.upliners= ? and upliners.udoa is not null group by upliners.side ", [$userid]);
//         if ($pointrows[0]['side'] == 1) {
//             $leftnew = $pointrows[0]['pvalue'] ?? 0;
//             $rightnew = $pointrows[1]['pvalue'] ?? 0;
//         } else {
//             $leftnew = $pointrows[1]['pvalue'] ?? 0;
//             $rightnew = $pointrows[0]['pvalue'] ?? 0;
//         }

//         $paidrows = PDO_FetchAll("SELECT sum(ifnull(pvalue,0)) pvalue,side from upliners where upliners.upliners= ? and upliners.udoa is not null group by upliners.side ", [$userid]);
//         if ($pointrows[0]['side'] == 1) {
//             $leftpaid = $paidrows[0]['pvalue'] ?? 0;
//             $rightpaid = $paidrows[1]['pvalue'] ?? 0;
//         } else {
//             $leftpaid = $paidrows[1]['pvalue'] ?? 0;
//             $rightpaid = $paidrows[0]['pvalue'] ?? 0;
//         }


//         $CountRow = PDO_FetchRow("Select Ifnull(previousleft,0) leftcount, ifnull(previousright,0) rightcount from binarypayout Where  UserID=? order by durationid desc limit 1", [$userid]);
//         $leftcf = $CountRow['leftcount'] ?? 0;
//         $rightcf = $CountRow['rightcount'] ?? 0;




//         $reco = PDO_FetchOne("Select reco.recname from reco Where pairs <= ? Order by pairs desc limit 0,1", [$MeadPoint]);
//         $isapproved = PDO_FetchOne("Select ifnull(isapproved,0) from `binary` where userid=?", [$userid]);
//         $amount = PDO_FetchOne("Select sum(iFnull(amount,0)) from useraccount where userid=?", [$userid]);
//         $camount = PDO_FetchOne("Select sum(iFnull(camount,0)) from useraccount where userid=?", [$userid]);



//         $result[] = ['left' => $left, 'right' => $right, 'leftnew' => $leftnew, 'rightnew' => $rightnew, 'leftpaid' => $leftpaid, 'rightpaid' => $rightpaid, 'leftcf' => $leftcf, 'rightcf' => $rightcf, 'leftbonanza' => $leftbonanza, 'rightbonanza' => $rightbonanza, 'leftiv' => $leftiv, 'rightiv' => $rightiv, 'leftrbv' => $leftiv, 'rightrbv' => $rightiv, 'leftrpv' => $leftrpv, 'rightrpv' => $rightrpv, 'leftivcf' => $leftcfiv, 'rightivcf' => $rightcfiv, 'selfiv' => $SIV, 'leftbonanzaiv' => $leftbonanzaiv, 'rightbonanzaiv' => $rightbonanzaiv, 'reco' => $reco, 'isapproved' => $isapproved, 'amount' => $amount, 'camount' => $camount, 'leftlifebonanza' => $leftlifebonanza, 'rightlifebonanza' => $rightlifebonanza];
//         $q = new \stdClass();

//         $q->result = $result;
//     } catch (PDOException $e) {
//         echo 'Prepare failed: ' . $e->getMessage();
//     }
// }


if ($routename == "treeview") {

    $q = new \stdClass();

    $xuserid = $data['tuserid'];
    $payoutdate = PDO_FetchOne("select date_add(payoutdate,interval 1 day) from payout order by payoutid desc limit 1");
    if (strtoupper($xuserid) != strtoupper($userid)) {
        if (PDO_FetchOne("select count(*) from upliners where upliners=? and userid=?", [$userid, $xuserid]) == 0) {
            $q->result = 0;
        } else
            $finduserid = $xuserid;
    } else
        $finduserid = $userid;
    $leftright = 1;
    $members = array();

    for ($i = 0; $i < 7; $i++) {
        $treedetail = new \stdClass();
        $treedetail->position = $i + 1;
        if ($i == 0)
            $treedetail->userid = $finduserid;
        if ($i == 1)
            $leftright = 1;
        if ($i == 2)
            $leftright = 0;
        if ($i == 3) {
            $finduserid = $members[1]->userid;
            $leftright = 1;
        }
        if ($i == 4) {
            $finduserid = $members[1]->userid;
            $leftright = 0;
        }
        if ($i == 5) {
            $finduserid = $members[2]->userid;
            $leftright = 1;
        }
        if ($i == 6) {
            $finduserid = $members[2]->userid;
            $leftright = 0;
        }

        if ($i > 0) {
            if ($finduserid != 'Blank' && $finduserid != 'join') {
                $tuserid = PDO_FetchOne("SELECT ifnull(userid,'Blank') userid from `binary` where leftright=? and uid=?", [$leftright, $finduserid]);
                if ($tuserid != "" && $tuserid != null)
                    $treedetail->userid = $tuserid;
                else
                    $treedetail->userid = 'Blank';
            } else
                $treedetail->userid = 'Blank';
        }


        if ($treedetail->userid != 'Blank') {
            $pfinfo = PDO_FetchRow("select name,city,doj,doa from personalinfo join `binary` on `binary`.userid=personalinfo.userid where personalinfo.userid=?", [$treedetail->userid]);
            $treedetail->name = $pfinfo['name'];
            $treedetail->city = $pfinfo['city'];
            $treedetail->doj = $pfinfo['doj'];

            $bclass = PDO_FetchOne("select case when doa is null then 'danger' else 'success' end from `binary` where userid=?", [$treedetail->userid]);
            $treedetail->bclass = $bclass;
            /* $amountrows = PDO_FetchAll("SELECT sum(ifnull(pvalue,0)) totalamount,side from upliners where upliners.upliners=? and udoa is not null group by side", [$treedetail->userid]);
            $treedetail->leftamount = 0;
            $treedetail->rightamount = 0;
            foreach ($amountrows as $x) {
                if ($x['side'] == 1)
                    $treedetail->leftamount = $x['totalamount'];
                else
                    $treedetail->rightamount = $x['totalamount'];
            }

            $treedetail->leftunpaidmembers = 0;
            $treedetail->rightunpaidmembers = 0;

            $unpaidrows = PDO_FetchAll("SELECT sum(ifnull(pvalue,0)) totalamount,side from upliners where upliners.upliners=? and udoa > ? group by side", [$treedetail->userid,$payoutdate]);
            foreach ($unpaidrows as $x) {
                if ($x['side'] == 1)
                    $treedetail->leftunpaidmembers = $x['totalamount'];
                else
                    $treedetail->rightunpaidmembers = $x['totalamount'];
            }

            $treedetail->leftpaidmembers = 0;
            $treedetail->rightpaidmembers = 0;

            $paidrows = PDO_FetchRow("SELECT previousleft,previousright from binarypayout  where  userid=? order by durationid desc limit 1", [$treedetail->userid]);

           
                $treedetail->leftpaidmembers = $paidrows['previousleft'];
                $treedetail->rightpaidmembers = $paidrows['previousright'];
         */
        }
        array_push($members, $treedetail);
    }
    $q->result = 1;
    $q->members = $members;
}


if ($routename == "register") {
    extract($data);
    //echo $side;
    if ($side_register == '2') {
        $side_register == '1';
        $sidecount = PDO_FetchOne("select count(*) from `binary` where uid=? and leftright=?", [$uid, $side_register]);
        if ($sidecount > 0)
            $side_register == '0';
    }
    $sidecount = PDO_FetchOne("select count(*) from `binary` where uid=? and leftright=?", [$uid, $side_register]);
    $uidcount = PDO_FetchOne("select count(*) from `binary` where userid=?", [$uid]);
    $teamcount = PDO_FetchOne("select count(*) from upliners where userid=? and upliners=?", [$uid, $userid]);
    //echo $sidecount.$uidcount.$teamcount;
    if ($sidecount == 0 && $uidcount > 0 && $teamcount > 0) {
        $tempuserid = PDO_FetchOne("select userid from newids where used is null order by rowid desc");
        PDO_Execute("update newids set used=1 where userid=?", [$tempuserid]);
        $newuserid = 'DW' . $tempuserid;
        if ($side == '2') $side == '1';
        PDO_Execute("Insert into `binary`(userid,uid,sid,leftright,planid) values(?,?,?,?,?)", [$newuserid, $uid, $userid, $side_register, $planid]);
        PDO_Execute("Insert into personalinfo(userid,name,city,contact,ifsc,acno,pan,doj) values(?,?,?,?,?,?,?,now())", [$newuserid, $name, $city, $mobile, $ifsc, $acno, $pan]);
        PDO_Execute("Insert into users(username,password) values(?,?)", [$newuserid, 'DREAM']);
        PDO_Execute("Insert into upliners(userid,upliners,side,levelid,showlist) values(?,?,?,1,1)", [$newuserid, $uid, $side_register]);
        PDO_Execute("Insert into upliners(userid,upliners,side,levelid,showlist) select ?,upliners,side,levelid+1,1 from upliners where userid=? and showlist=1", [$newuserid, $uid]);
        $q->result = 1;
        $q->newuserid = $newuserid;
        $msgtext = "Welcome *" . $name . "* to MS Dream World Family. You have successfully Registered with us. Your username is *" . $newuserid . "* and your password is *DREAM*. Activate your account to get your product and earning earliest. M/s Dream World में आपका स्वागत है. आपने सफलता पूर्वक अपना रजिस्ट्रेशन कर लिया है. आपका यूजर  नेम *" . $newuserid . "*. और  पासवर्ड *DREAM*  है. आप अपने अकाउंट  को जल्दी से  एक्टिवेट  करवाए  ताकि आप अपने प्रोडक्ट्स  और अन्य  सुविधाएँ  प्राप्त  कर सकें। धन्यवाद।";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://wasms.simpact.co.in/api/sendText?token=" . $watoken . "&phone=91" . $mobile . "&message=" . urlencode($msgtext));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $authToken = curl_exec($ch);
    } else
        $q->result = 0;
}

if ($routename == "purchaseinvoicedetail") {
    extract($data);
    $params = array();
    $params[] = $invoiceid;
    $strqury = " from userssaledetail rid join repurchaseproducts rp on rp.productid=rid.productid where invoiceid=? ";
    //$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result = 1;
    $q->data = PDO_FetchAll("select rp.productname,(rid.srp*rid.qty) total,rid.* " . $strqury, $params);
    $q->totalrows = PDO_FetchOne("select count(*) " . $strqurycount, $params);
}

if ($routename == "saleinvoicedetail") {
    extract($data);
    $params = array();
    $params[] = $invoiceid;
    $strqury = " from userssaledetail rid join repurchaseproducts rp on rp.productid=rid.productid where invoiceid=? ";
    //$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->result = 1;
    $q->data = PDO_FetchAll("select rp.productname,(rid.srp*rid.qty) total,rid.* " . $strqury, $params);
    $q->totalrows = PDO_FetchOne("select count(*) " . $strqurycount, $params);
}



if ($routename == "checkuserid") {
    extract($data);
    $params = array();
    $params[] = $cuserid;
    $strqury = " from personalinfo where userid=? ";
    //$limit=" limit ". intval(($page-1)*$pagesize) . " , " . $pagesize;
    $q->status = 1;

    $q->customername = PDO_FetchOne("select personalinfo.name " . $strqury, $params);
}

if ($routename == "purchaseinvoicelist") {
    extract($data);
    $params = array();
    $params[] = $userid;
    $strqury = " from usersinvoices JOIN userssaledetail on userssaledetail.invoiceid=usersinvoices.invoiceid where userid=? and saletypeid=3 group by invoiceid order by invoiceid desc";
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->result = 1;
    $q->data = PDO_FetchAll("select usersinvoices.*,sum(qty*srp) amount " . $strqury . $limit, $params);
    $q->totalrows = PDO_FetchOne("select count(*) " . $strqurycount, $params);
}

if ($routename == "saleinvoicelist") {
    extract($data);
    $params = array();
    $params[] = $userid;
    $strqury = " from usersinvoices JOIN userssaledetail on userssaledetail.invoiceid=usersinvoices.invoiceid where invoiceby=? group by invoiceid order by invoiceid desc";
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->result = 1;
    $q->data = PDO_FetchAll("select usersinvoices.*,sum(qty*srp) amount " . $strqury . $limit, $params);
    $q->totalrows = PDO_FetchOne("select count(*) " . $strqurycount, $params);
}

if ($routename == "customersaleinvoicelist") {
    extract($data);
    $params = array();
    $params[] = $userid;
    $strqury = " from usersinvoices JOIN userssaledetail on userssaledetail.invoiceid=usersinvoices.invoiceid where userid=? group by invoiceid order by invoiceid desc";
    $limit = " limit " . intval(($page - 1) * $pagesize) . " , " . $pagesize;
    $q->result = 1;
    $q->data = PDO_FetchAll("select usersinvoices.*,sum(qty*srp) amount " . $strqury . $limit, $params);
    $q->totalrows = PDO_FetchOne("select count(*) " . $strqurycount, $params);
}



if ($routename == "activateuser") {
    $auserid = $data['userid'];
    $planid = $data['planid'];
    if (PDO_FetchOne("select count(*) from activatecredit where userid=? and planid=?", [$userid, $planid]) > 0) {
        PDO_Execute("Update activatecredit set used=1,auserid=?,usedon=now() where rowid=(select rowid from activatecredit where userid=? and planid=? limit 1)", [$auserid, $userid, $planid]);
        $planrow = PDO_FetchOne("select * from plans where planid=?", [$planid]);
        PDO_Execute("Update `binary` set isApproved=1, ismanualapproved=1, planid=?, doa=now(),dor=now(), activatedby=? where userid=?", [$planid, $userid, $auserid]);
        PDO_Execute("Update upliners set pvalue=?, udoa=now() where userid=?", [$planrow['pvalue'], $auserid]);
        PDO_Execute("Update upliners set sdoa=now() where upliners=?", [$auserid]);

        $sid = PDO_FetchOne("select sid from `binary` where userid=?", [$userid]);
        if ($planid >= 25) {
            PDO_Execute("Insert into usersinvoices(userid,invoicedate,invoiceby,remarks) values (?,now(),?,'')", [$auserid, $userid]);
            $invoiceid = PDO_LastInsertId();
            if ($planid == 28) {
                PDO_Execute("Insert into userssaledetail(invoiceid,productid,qty,mrp) values(?,99,2,1500)", [$invoiceid]);
                PDO_Execute("Update `binary` set boosterupgraded=1 where userid=?", [$userid]);
                //PDO_Execute("insert into upliners(upliners.userid,upliners,upliners.side,upliners.sdoa,upliners.levelid,upliners.udoa,upliners.pvalue,showlist)
                // select upliners.userid,upliners,upliners.side,upliners.sdoa,upliners.levelid,now(),?,0 from upliners where userid=?",[$planrow['pvalue'],$userid]);
                if (PDO_Execute("select boosterupgraded from `binary` where userid=?", [$sid]) == 1)
                    $boosterfirstpayment = 5000;
                else    $boosterfirstpayment = 2000;
                PDO_Execute("insert into boosterpayout(userid,child_userid,level,amount,tdate)
            values(?,?,1,?,now())", [$sid, $userid, $boosterfirstpayment]);
                $boosterpaymentcount = PDO_FetchOne("select count(*) from `boosterpayments` where level >0");
                $i = 0;
                while ($i < $boosterpaymentcount) {
                    $sid = PDO_FetchOne("select sid from `binary` where userid=?", [$sid]);
                    if ($sid != "" && $sid) {
                        if (PDO_Execute("select boosterupgraded from `binary` where userid=?", [$sid]) == 1) {
                            $i++;
                            PDO_Execute("insert into boosterpayout(userid,child_userid,level,amount,tdate)
		select ?,?,level,boosterpayments.amount,now() from boosterpayments where level=?", [$sid, $userid, $i]);
                        }
                    }
                }
            } else
                PDO_Execute("Insert into userssaledetail(invoiceid,productid,qty,mrp) values(?,99,1,1500)", [$invoiceid]);
        }
        $q->result = "1";
    } else
        $q->result = 0;
}

if ($routename == "newsale") {
    $auserid = $data['userid'];
    $products = json_decode($data['salestr']);
    $saletype = $data['saletype'];

    PDO_Execute("Insert into usersinvoices(userid,invoicedate,invoiceby,remarks,saletypeid) values (?,now(),?,'',1)", [$auserid, $userid]);
    $invoiceid = PDO_LastInsertId();
    foreach ($products as $product) {
        $productid = $product->productid;
        $qty = $product->stock;
        $mrp = $product->mrp;
        $srp = $product->price;
        $dp = $product->cashback;
        PDO_Execute("Insert into resellerstock(productid,instock,outstock,invoiceid,userid) values(?,0,?,?,?)", [$productid, $qty, $invoiceid, $userid]);
        PDO_Execute("Insert into userssaledetail(invoiceid,productid,qty,mrp,srp,cashback) values(?,?,?,?,?,?)", [$invoiceid, $productid, $qty, $mrp, $srp, $dp]);
    }
    $userstate = PDO_FetchOne("select ifnull(isapproved,0) from `binary` where userid=?", [$auserid]);
    if ($userstate == 0) {
        $totalbv = PDO_FetchOne("SELECT sum(rp.bv*usd.qty) bv from usersinvoices ui JOIN userssaledetail usd on usd.invoiceid=ui.invoiceid JOIN repurchaseproducts rp on rp.productid=usd.productid WHERE ui.userid=?", [$auserid]);
        if ($totalbv >= 400)
            PDO_Execute("update `binary` set planid=38, isapproved=1,doa=now() where userid=?", [$auserid]);
        PDO_Execute("update `upliners` set udoa=now() where userid=?", [$auserid]);
        $userstate = 1;
    }
    if ($userstate == 1) {
        $amount = PDO_FetchOne("select usd.qty*rp.price from userssaledetail usd join repurchaseproducts rp on rp.productid=usd.productid where usd.invoiceid=?", [$invoiceid]);
        $comm = PDO_FetchRow("SELECT * from franchisetypes join `binary` on `binary`.`franchisetype`=franchisetypes.rowid where userid=? limit 1", [$userid]);
        if (isset($comm)) {
            $fcomm = $amount * $comm['discount'] / 100;
            $scomm = $fcomm * 5 / 100;
            PDO_Execute("Insert into franchiseincome(userid,franchiseid,incomeid,invoiceid,transdate,amount) values(?,?,2,?,now(),?)", [$auserid, $userid, $invoiceid, $fcomm]);
            PDO_Execute("Insert into franchiseincome(userid,franchiseid,incomeid,invoiceid,transdate,amount) values(?,?,3,?,now(),?)", [$auserid, $userid, $invoiceid, $scomm]);
        }
    }
    PDO_Execute("insert into cashbackaccount(transdate,amount,camount,userid,username,invoiceid) select now(),sum(qty*cashback),0,?,?,invoiceid from userssaledetail where invoiceid=? group by invoiceid", [$auserid, $userid, $invoiceid]);
    $q->result = 1;
    $q->orderid = $invoiceid;
}

if ($routename == "availablestock") {
    $q->result = 1;
    $q->data = PDO_FetchAll("SELECT resellerstock.productid, sum(ifnull(instock,0))-sum(ifnull(outstock,0)) stock,repurchaseproducts.productname,mrp,srp price,dp cashback,bv FROM resellerstock JOIN repurchaseproducts on repurchaseproducts.productid=resellerstock.productid WHERE resellerstock.userid=? GROUP BY resellerstock.productid,repurchaseproducts.productname ORDER BY stock DESC", [$userid]);
}

if ($routename == "getfcomm") {
    $q->result = 1;
    $q->data = PDO_FetchOne("SELECT discount from franchisetypes join `binary` on `binary`.`franchisetype`=franchisetypes.rowid where userid=?", [$userid]);
}


echo json_encode($q);
