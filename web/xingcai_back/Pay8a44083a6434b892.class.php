<?php
class Pay8a44083a6434b892 extends WebBase{
	public final function notify(){
 	$clientIp = $this->get_client_ip();
	if($clientIp !== "13.75.113.199")exit;	
	$MerId = $_REQUEST["MerId"];		//商户ID
        $OrdId = $_REQUEST["OrdId"];		//订单号
        $OrdAmt = $_REQUEST["OrdAmt"];		//订单金额
        $OrdNo = $_REQUEST["OrdNo"];		//支付系统流水号
        $ResultCode = $_REQUEST["ResultCode"];	//处理结果码 
        $Remark = $_REQUEST["Remark"];		//Remark
        $SignType = $_REQUEST["SignType"];	//签名方式, 固定填写 MD5
        $SignInfo = $_REQUEST["SignInfo"];	//加密串
        
        $src = "MerId=".$MerId
        ."&OrdId=".$OrdId
        ."&OrdAmt=".$OrdAmt
        ."&OrdNo=".$OrdNo
        ."&ResultCode=".$ResultCode
        ."&Remark=".$Remark
        ."&SignType=".$SignType;

        $MerKey = "H27imAMZQ2BMp32Z25QG2xhwPbG7CQ3i";		//测试支付密钥，正式环境请更换成您的正式密钥
        $SignLocal = md5( md5($src) . $MerKey );
        $ret2 = ($SignLocal == $SignInfo);
        echo 'success|9999'; 
        if(!$ret2) exit;
        if(trim($ResultCode) !== "success002") exit;
        //充值到账户
        $sql="select * from {$this->prename}member_recharge where rechargeId=?";
        $data=$this->getRow($sql, $OrdId);
        if(!$data) {
            exit;
        }
        if($data['state']) {
            exit;
        }
        if($data['isDelete']){
            exit;
        } 
        $startTime = strtotime(date('Y-m-d 00:00:00',time()));
        $endTime = strtotime(date('Y-m-d 23:59:59',time()));
        $sql4="select sum(amount)  amount from blast_member_recharge where uid=? and state!= 0 and rechargeTime between {$startTime} and {$endTime}";
        $recharge_money = $this->getRow($sql4, $data['uid']);
        if(!$recharge_money['amount'])$recharge_money['amount']=0;
        $para['rechargeAmount'] = $data['amount'];
        try{
            $this->beginTransaction();
            $para=array_merge(array('rechargeAmount'=>$para['rechargeAmount'], 'state'=>1, 'info'=>'手动确认', 'actionUid'=>$this->user['uid'], 'rechargeTime'=>$this->time, 'actionIP'=>$this->ip(true)), $this->getRow("select coin, fcoin from {$this->prename}members where uid={$data['uid']}"));
            $this->updateRows($this->prename .'member_recharge', $para, 'id='. $data['id']);
            if($this->updateRows($this->prename .'member_recharge', $para, 'id='. $data['id'])){
                $this->addCoin(array(
                    'uid'=>$data['uid'],
                    'coin'=>$para['rechargeAmount'],
                    'liqType'=>1,
                    'extfield0'=>$data['id'],
                    'extfield1'=>$data['rechargeId'],
                    'info'=>'充值'
                ));

            }
            //$this->rechargeCommission($para['rechargeAmount'], $data['uid'], $data['id'], $data['rechargeId']);
            //$this->addLog(2,$this->adminLogType[2].'[充值编号:'.$data['rechargeId'].']', $data['uid'], $data['username']);
            //充值抽奖
            $sql1="select * from blast_leavl where type=1";
            $data1=$this->query($sql1);
            if($data1){
                if ($recharge_money['amount'] == 0) {
                    foreach($data1 as $var){ 
                        if ($var['min_cz_money']<=$para['rechargeAmount']) {
                            $paras=array(                                      //定义存款记录
                                'uid'=>$data['uid'],
                                'amount'=>$para['rechargeAmount'],
                                'add_time'=>time(),
                                'status'=>0,
                                'leval_id'=>$var['id'],
                                'money'=>0,
                                'type'=>1
                            );
                            $this->insertRow($this->prename .'member_prize', $paras); 
                        }
                    }	
                }else{
                    $new_money = $recharge_money['amount']+$para['rechargeAmount'];
                    $leavl_id = $this->getRow("select id from blast_leavl where type=1 and min_cz_money<={$new_money} and max_cz_money>={$new_money}");
                    $member_prize = $this->getRow("select MAX(amount) amount from blast_member_prize where uid={$data['uid']} and type=1 and  add_time between {$startTime} and {$endTime}");
                    
                    foreach($data1 as $var){ 
                        if ($var['min_cz_money']<=$new_money && $var['min_cz_money']>$member_prize['amount']) {
                            $paras=array(                                      //定义存款记录
                                'uid'=>$data['uid'],
                                'amount'=>$new_money,
                                'add_time'=>time(),
                                'status'=>0,
                                'leval_id'=>$var['id'],
                                'money'=>0,
                                'type'=>1
                            );
                            $this->insertRow($this->prename .'member_prize', $paras); 
                        }
                    }
                }	
            }
            $this->commit();
        }catch(Exception $e){
            $this->rollBack();
            throw $e;
        }
    }


    /**
	 * 用户资金变动
	 *
	 * 请在一个事务里使用
	 */
	public function addCoin($log){
		if(!isset($log['uid'])) $log['uid']=$this->user['uid'];
		if(!isset($log['info'])) $log['info']='';
		if(!isset($log['coin'])) $log['coin']=0;
		if(!isset($log['type'])) $log['type']=0;
		if(!isset($log['fcoin'])) $log['fcoin']=0;
		if(!isset($log['extfield0'])) $log['extfield0']=0;
		if(!isset($log['extfield1'])) $log['extfield1']='';
		if(!isset($log['extfield2'])) $log['extfield2']='';
		
		$sql="call setCoin({$log['coin']}, {$log['fcoin']}, {$log['uid']}, {$log['liqType']}, {$log['type']}, '{$log['info']}', {$log['extfield0']}, '{$log['extfield1']}', '{$log['extfield2']}')";
		
		//echo $sql;exit;
		$this->insert($sql);
	}

	// 获取客户端IP地址
public function get_client_ip() {
    static $ip = NULL;
    if ($ip !== NULL) return $ip;
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos =  array_search('unknown',$arr);
        if(false !== $pos) unset($arr[$pos]);
        $ip   =  trim($arr[0]);
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';
    return $ip;
}
}
