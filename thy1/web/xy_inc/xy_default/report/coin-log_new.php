<?php
	$this->getTypes();
	$this->getPlayeds();
	$_REQUEST['fromTime']=$_REQUEST['fromTime_1'];
	$_REQUEST['toTime']=$_REQUEST['toTime_1'];
	// 日期限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$timeWhere=' and l.actionTime between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
	}elseif($_REQUEST['fromTime']){
		$timeWhere=' and l.actionTime >='. strtotime($_REQUEST['fromTime']);
	}elseif($_REQUEST['toTime']){
		$timeWhere=' and l.actionTime <'. strtotime($_REQUEST['toTime']);
	}else{
		
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
	}
	
	// 帐变类型限制
	if($_REQUEST['liqType']){
		$liqTypeWhere=' and liqType='.intval($_REQUEST['liqType']);
		if($_REQUEST['liqType']==2) $liqTypeWhere=' and liqType between 2 and 3';
	}
	

	//用户限制
	$userWhere=" and u.uid={$this->user['uid']}";
	
	// 冻结查询
	if($this->action=='fcoinModal'){
		$fcoinModalWhere='and l.fcoin!=0';
	}
	
	$sql="select b.type, b.playedId, b.actionNo, b.mode, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType not in(4,11,104) order by l.id desc";
	//echo $sql;
	
	$list=$this->getPage($sql, $this->page, $this->pageSize);
	$params=http_build_query($_REQUEST, '', '&');
	$modeName=array('2.000'=>'元', '0.200'=>'角', '0.020'=>'分', '0.002'=>'厘');
	$liqTypeName=array(
		1=>'充值',
		2=>'返点',
		//3=>'返点',//分红
		//4=>'抽水金额',
		5=>'停止追号',
		6=>'中奖金额',
		7=>'撤单',
		8=>'提现失败返回冻结金额',
		9=>'管理员充值',
		10=>'解除抢庄冻结金额',
		//11=>'收单金额',
		12=>'上级充值',
		13=>'上级充值成功扣款',
		50=>'签到赠送',
		51=>'首次绑定工行卡赠送',
		52=>'充值佣金',
		53=>'消费佣金',
		54=>'充值赠送',
		55=>'注册佣金',
		
		100=>'抢庄冻结金额',
		101=>'投注冻结金额',
		102=>'追号投注',
		103=>'抢庄返点金额',
		//104=>'抢庄抽水金额',
		105=>'抢庄赔付金额',
		106=>'提现冻结',
		107=>'提现成功扣除冻结金额',
		108=>'开奖扣除冻结金额',
		255=>'未开奖退回投注金额'
	);
	
?> 
                            <table class="table text-center">
                                <thead>
                                <tr class="odd">
                                    <th class="th_first">时间</th>
                                    <th>用户名</th>
                                    <th>帐变类型</th>
                                    <th>单号</th>
                                    <th>游戏</th>
                                    <th>玩法</th>
                                    <th>期号</th>
                                    <th>模式</th>
                                    <th>资金</th>
                                    <th class="th_last">余额</th>
                                </tr>
                                </thead>
                                <tbody>
                                
		<?php if($list['data']) {foreach($list['data'] as $var){ ?>
		<tr class="even">
			<td><?php echo substr(date('Y-m-d H:i:s', $var['actionTime']),2)?></td>
			<td><?=$var['username']?></td>
			<td><?=$liqTypeName[$var['liqType']]?></td>
			<!-- <td><?//=$var['info']?></td> -->
			
			<?php if($var['extfield0'] && in_array($var['liqType'], array(2,3,4,5,6,7,10,11,100,101,102,103,104,105,108))){ ?>
                <td><a href="/index.php/record/betInfo/<?=$var['extfield0']?>" width="800" title="投注信息" target="modal"><?=$this->getValue("select wjorderId from {$this->prename}bets where id=?", $var['extfield0'])?></a>
                </td>
                <td><?=$this->types[$var['type']]['shortName']?></td>
                <td><?=$this->playeds[$var['playedId']]['name']?></td>
                <td><?=$var['actionNo']?></td>
                <td><?=$modeName[$var['mode']]?></td>
			<?php }elseif(in_array($var['liqType'], array(1,9,52))){?>
                <td><a href="/index.php/cash/rechargeModal/<?=$var['extfield0']?>" width="500" title="充值信息" target="modal"><?=$var['extfield1']?></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
			<?php }elseif(in_array($var['liqType'], array(8,106,107))){?>
                <td><a href="/index.php/cash/cashModal/<?=$var['extfield0']?>" width="500" title="提现信息" target="modal"><?=$var['extfield0']?></a></td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                
            <?php }else{ ?>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
            <?php } ?>
            
            <td><?=number_format($var['coin'],2)?></td>
			<td><?=$var['userCoin']?></td>
		</tr>
        <?php } }else{ ?>
		<tr class="even"><td colspan="12">暂无投注信息</td></tr>
		<?php } ?>                          
                                </tbody>
                            </table>
							<?php
                                //print_r($args);exit;
                                $pageSize=$this->pageSize;
                                $pageurl="/index.php/index/usercenter_zbjl-{page}/{$this->type}?$params";
                                if(isset($list['total'])){
                                    if($list['total']>1){
                                        $recordCount=$list['total'];
                                    }else{
                                        $recordCount=1;
                                    }
                                }else{
                                    $recordCount=1;
                                }
                                $pageCount=ceil($recordCount/$pageSize);
                                
                                if($pageCount==1){
                                    // 只有多页时才显示
                                    if($pageCount<=1) return;
                                }elseif($pageCount==2){
                                    // 只有有列表时才显示
                                    if($recordCount<=1) return;
                                }
                                
                                $listPageSize=5;
                                $startPage=$this->page-floor($listPageSize/2);
                                if($startPage<1) $startPage=1;
                                $prePage=$this->page-1;
                                if($prePage<1) $prePage=1;
                                $nextPage=$this->page+1;
                                if($nextPage>$pageCount) $nextPage=$pageCount;
                                
                                if(!function_exists('set_page_url')){
                                    function set_page_url($page, $urlString, $flag='{page}'){
                                        return str_replace($flag, $page, $urlString);
                                    }
                                }
                            ?>
                            <div class="page">
                            
	<?php if($this->page==1){ ?>
		<a class="#">首页</a>&nbsp;
        <a class="#">上一页</a>&nbsp;
	<?php }else{ ?>
	<a href="<?=set_page_url(1, $pageurl)?>">首页</a>&nbsp;
    <a href="<?=set_page_url($prePage, $pageurl)?>">上一页</a>&nbsp;
	<?php }
		
		for($page=$startPage; $page<=$startPage+$listPageSize; $page++){
			if($page>$pageCount) break;
	?>
	
	&nbsp;<a href="<?=set_page_url($page, $pageurl)?>"<?=($page==$this->page?' class="shu on"':'')?>><?=$page?></a>&nbsp;

	
	<?php
		}
		if($page>$pageCount) $page=$pageCount;
	
		if($this->page==$pageCount){
	?>
	<a class="#">下一页</a>
	<a class="#">尾页</a>
	<?php }else{ ?>
	<a href="<?=set_page_url($nextPage, $pageurl)?>">下一页</a>
	<a href="<?=set_page_url($pageCount, $pageurl)?>">尾页</a>
	<?php } ?>
	<span>第<b><?=$this->page?></b>页/共<b><?=$pageCount?>页</b></span>              
                            </div>