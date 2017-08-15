<div class="subNavBox">
                
                    <div class="subNav">时时彩
					<span style="float:right;color:#C3C3C3;font-size:10px;">最高奖金180000</span>
					</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=1");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/ssc.png" width="55" height="55"></p>' . $row['title'] . '</a></li>';
    
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>
                    
                    <div class="subNav">11选5<img src="/images/fire.png" align="center">
					<span style="float:right;color:#C3C3C3;font-size:10px;">玩法多样</span>
					</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=2");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/11x5.png" width="55" height="55"></p>' . $row['title'] . '</a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>
                    
                    
                   <div class="subNav">快3</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=9");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/k3.png" width="55" height="55"></p>' . $row['title'] . '</a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>
                    
                    

                    </ul>
                    
                    <div class="subNav">PK10
					<span style="float:right;color:#C3C3C3;font-size:10px;">返奖率高</span>
					</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=6");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/pk10.png" width="55" height="55"></p>' . $row['title'] . '</a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>
                    

                    </ul>
                    
                    
                    
                    
                    <div class="subNav">六合彩<img src="/images/fire.png" align="center">
					<span style="float:right;color:#C3C3C3;font-size:10px;">超高奖金</span>
					</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=10");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/lhc' . $m . '.png" width="55" height="55"></p>' . $row['title'] . '</a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>
                    

                    </ul>

                    
                    
                    
                    
                    
                    
                    
                    
                   <!-- <div class="subNav"><a href="javascript:void(0)" onclick="$('<div>').append('<br/><br/><br/><center>正在开发维护中···</center><br/><br/><br/>').dialog({position:['center','middle'],minHeight:40,title:'系统提示',buttons:''});"><img src="/images/ad_img.png" width="206" height="50" alt=""/></a></div>
                    <div class="subNav"><a href="/index.php/index/usercenter_hdzx"><img src="/images/ad_img2.png" width="206" height="50" alt=""/></a></div>-->
                </div>