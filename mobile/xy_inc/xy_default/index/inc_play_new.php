
                   

<div class="subNavBox">
               <div style="height:38px;
    background-color:;border-radius: 13px 13px 13px 13px;
"> <li style="width:100%;margin-bottom:5px;"><img src="/images/biaoti.png"  style="height:38px;float:left;width:20%;"></img><marquee behavior="scroll" style="float:right;width:80%;margin:4px 0;"  scrollamount="3" direction="left" ><font style="font-size:x-large;"><?php
if ($this->settings['webGG']) {
?> <?= $this->settings['webGG'] ?> <?php
}
?></font></marquee></li></div>
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=1");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/ssc.png" style="
    margin: 0% 10%;
" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                 <li style="width:100%;margin-bottom:5px;"><img src="/images/biaoti1.png"></img></li>
               
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=2");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/11x5.png" style="
    margin: 0% 10%;
" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    
                   <li style="width:100%;margin-bottom:5px;"><img src="/images/biaoti2.png"></img></li>
                    
             
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=9");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img src="/images/k3.png" style="
    margin: 0% 10%;
" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                <li style="width:100%;margin-bottom:5px;"></li>
                    <!--
                    <div class="subNav">快乐十分</div>
                    <ul class="navContent ">
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=4");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img  style="
    margin: 0% 10%;
" src="/images/s_img' . $m . '.png" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    </ul>--><li style="width:100%;margin-bottom:5px;"><img src="/images/biaoti3.png"></img></li>
                    
                    
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=6");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img style="
    margin: 0% 10%;
" src="/images/pk10.png" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>

                   <!--<div class="subNav">快乐8</div>-->
                 
					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=8");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img style="
    margin: 0% 10%;
"  src="/images/s_img' . $m . '.png" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                    
                    
                    
                <li style="width:100%;margin-bottom:5px;"><img src="/images/biaoti4.png"></img></li>
                    
                    
				<!--	<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=10");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img style="
    margin: 0% 10%;
" src="/images/s_img' . $m . '.png" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?><li style="width:100%;margin-bottom:5px;"></li> -->

					<?php
$rows = $this->getRows("select * from {$this->prename}type where enable=1 and type=3");
$m    = 0;
foreach ($rows as $row) {
    $m += 1;
    echo '<li style="width:20%;margin-bottom:5px;"><a href="/index.php/index/game/' . $row['id'] . '"><p><img style="
    margin: 0% 10%;
" src="/images/3d.png" width="55" height="55"></p><div style="
    text-align: center;
">' . $row['title'] . '</div></a></li>';
    if ($m % 2 == 0) {
        '<span><img src="/images/line.png" width="190" height="14" alt=""/></span>';
    }
}
?>
                  
                    
                    
                    
                    
                    
                    
                    
                    
                   <!-- <div class="subNav"><a href="javascript:void(0)" onclick="$('<div>').append('<br/><br/><br/><center>正在开发维护中···</center><br/><br/><br/>').dialog({position:['center','middle'],minHeight:40,title:'系统提示',buttons:''});"><img src="/images/ad_img.png" width="206" height="50" alt=""/></a></div>
                    <div class="subNav"><a href="/index.php/index/usercenter_hdzx"><img src="/images/ad_img2.png" width="206" height="50" alt=""/></a></div>-->
                </div>