<?php
$this->freshSession();
//更新级别
$ngrade = $this->getValue("select max(level) from {$this->prename}member_level where minScore <= {$this->user['scoreTotal']}");
if ($ngrade > $this->user['grade']) {
    $sql = "update {$this->prename}members set grade={$ngrade} where uid=?";
    $this->update($sql, $this->user['uid']);
} else {
    $ngrade = $this->user['grade'];
}
$date = strtotime('00:00:00');
?>
                
                    <dl>
                        <p class="user_img"><img src="/images/yh_img.jpg" width="43" height="50" alt=""/></p>
                        <dd><div class="user_vip0">VIP1</div><span style="color:#fff;font-size:16px;overflow:hidden;font-weight:500;font-family:Microsoft Yahei;"><?= $this->user['username'] ?>欢迎您</span></dd>
                    </dl>
                    <div class="money">
                        <div class="line">
                            <div class="cover"></div>
                        </div>
                        <p><span style="color:#fff;font-size:15px;font-family:Microsoft Yahei;">余额：<?= $this->user['coin'] ?> 元</span><span><a href="javascript:void(0)" onClick="reloadMemberInfo();" style=" cursor: pointer; float:right;font-family:Microsoft Yahei;color:#fff" class="money_news"></a>
						</span><br/><br/>
						<span style="color:#fff;font-size:13px;font-family:Microsoft Yahei;">积分：<?= $this->user['score'] ?></span>
						<span><a href="/index.php/index/usercenter_hdzx" style=" cursor: pointer; float:right;font-family:Microsoft Yahei;color:#fff">兑换</a>
						</span>
						</p>
                    </div>
                    <div class="group_button">
                        <a href="/index.php/index/usercenter_cz" title="充值">充值</a>
                        <a href="/index.php/index/usercenter_cz_tx" title="提款">提款</a>

                    </div>
                