<?php $this->display('inc_daohang.php'); ?>
<link rel="stylesheet" href="/css/nsc/dzyh.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/huodong.css?v=1.16.11.6" />
    </head>
    <body>
        <div id="contentBox" class="activity_main">
            <div class="right_meun" id="siderbar">
                <div class="r_tit-bg"><h3 class="r_tit">热门活动</h3></div>
                <ul>
			        	<li >
			                <a href="/index.php/score/rotate">幸运大转盘</a>
			            </li>
						<li >
			                <a href="/index.php/score/dodzyh">投资理财</a>
			            </li>
						<!--<li >
			                <a href="/index.php/score/zadan">幸运砸蛋</a>
			            </li>

						<li >
			                <a href="/index.php/score/goods/current">积分兑换</a>
			            </li>
						<li class="current">
			                <a href="/index.php/event/index">充值福利</a>
			            </li>
						<li>
			                <a href="/index.php/score/yongjin">新至尊佣金活动</a>
			            </li>
			            <li >
			                <a href="/index.php/score/chuangguan">VIP返利活动</a>
			            </li>-->
			            
			    </ul>
            </div>
            <div class="left_activity">

<!--<div id="subContent_bet_re">
<div class="activity_content">
    <div class="activity_banner"><img src="/"/ height="150"></div>
    <div class="activity_banner"><img src="/images/nsc/activity/2.jpg" height="150"></div>
    <div class="activity_title">
    	<h2>积分兑换</h2>
       <a href="#" class="check_jf">可用积分：<?=$this->user['score']?></a>
    </div>
    <div class="activity_nr">
    	<h4 class="x-title">具体内容</h4>
	
<div class="x-text"><table width="300" border="0" cellspacing="0" cellpadding="0" class="x-table1">
  <tr>
    <th>价值</th>
    <th>积分</th>
    <th>剩余</th>
	<th>参与人数</th>
	<th>兑换</th>
    </tr>
	<?php
     $colors=array('#f00','#224D3C','#384161','#125222','#3A352F','#AE3C15','#1b1b1b');
        if($args[0]) foreach($args[0]['data'] as $var){
    ?>
    <tr>
    <td><?=$var['price']?></td>
    <td><?=$var['score']?></td>
    <td><?=$this->iff($var['sum']=='0', '不限', $var['sum']-$var['surplus'])?></td>
	<td><?=$var['persons']?> 人</td>
	<td><a href="/index.php/score/swap/<?= $var['id'] ?>" target="modal" width="500px" height="300px" title="兑换<?=$var['price']?>元"  >我要兑换</a></td>
  </tr>
<?php } ?>
  </table>

</div>
 
        <div class="x-text">
        			<p><p> </p> <p> </p> <p> 活动说明</p> <p>积分兑换 尊享实惠</p> <p>全新一轮积分兑换等待您的到来，希望大家一如既往的支持闯关，多多盈利！</p> <p>活动时间：随时有效</p> <p>活动限制彩种：全彩种</p> <p>活动针对用户：所有用户。</p> <p>注意事项：</p> <p>1、全彩种活动，活动流水与天天砸金蛋活动共享</p> <p>2、用户打开官网“活动公告”中的“热门活动”，</p> <p>3、任何的无风险投注，对冲，对打均不计算有效投注。有效投注定义：玩法投注不得超过该玩法投注最大注数的70%，即定位胆不得超过7注，二星不得超过70注，三星不得超过700注，四星不得超过7000注，五星不得超过70000注。如发现利用活动存在对冲等恶意套利行为，添好运有权扣除违规所得。</p> <p>4、平台保有修改活动以及解释活动之权利。 </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p> <p> </p></p>		    </div>
    </div>
	
</div>
﻿</div>
<div style="clear: both"></div>
﻿</div>﻿</div>﻿</div>﻿</div>﻿</div>
<?php $this->display('inc_che.php'); ?> -->

</body>
</html>
