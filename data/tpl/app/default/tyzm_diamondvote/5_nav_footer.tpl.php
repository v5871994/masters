<?php defined('IN_IA') or exit('Access Denied');?><div style="height:50px;"></div>
<div class="footer">
<ul>

<li><a href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'index' || $_GPC['do'] == '' ) { ?>class="on"<?php  } ?>><div class='nav'><div class='ih ispr'></div><p>首页</p></div></a></li>
<?php  if($myvoteid!="" ) { ?>
<li><a href="<?php  echo $this->createMobileUrl('view', array('rid' => $rid,'id' => $myvoteid))?>" <?php  if($_GPC['do'] == 'view') { ?>class="on"<?php  } ?> ><div class='nav'><div class='ic ispr'></div><p>我的</p></div></a></li>
<?php  } else { ?>

<?php  if($aptime!=2) { ?>
<li><a href="javascript:;" <?php  if($_GPC['do'] == 'join') { ?>class="on"<?php  } ?> onclick="get_ap();"><div class='nav'><div class='ib ispr'></div><p>报名</p></div></a></li>
<?php  } ?>

<?php  } ?>
<li><a href="<?php  echo $this->createMobileUrl('prize', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'prize') { ?>class="on"<?php  } ?>><div class='nav'><div class='is ispr'></div><p>奖品</p></div></a></li>
<li><a href="<?php  echo $this->createMobileUrl('ranking', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'ranking' ) { ?>class="on"<?php  } ?> ><div class='nav'><div class='if ispr'></div><p>榜单</p></div></a></li>
</ul>
</div>
<script type="text/javascript">
function get_ap(){
  <?php  if($aptime==1) { ?>
      dialog2("未开始报名！报名时间为：</br> <?php  echo date('Y-m-d',$reply['apstarttime'])?> 至 <?php  echo date('Y-m-d ',$reply['apendtime'])?>");
	  return false;
  <?php  } ?>
  location.href="<?php  echo $this->createMobileUrl('join', array('rid' => $rid))?>";
}
</script>

