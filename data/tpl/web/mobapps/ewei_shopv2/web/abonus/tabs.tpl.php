<?php defined('IN_IA') or exit('Access Denied');?><div class='menu-header'><?php  echo $this->plugintitle?></div>

<?php if(cv('abonus.partner|abonus.level')) { ?>
<ul>
    <?php if(cv('abonus.partner')) { ?><li <?php  if($_W['routes']=='abonus.agent') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/agent')?>">代理商管理</a></li><?php  } ?>
    <?php if(cv('abonus.level')) { ?><li <?php  if($_W['routes']=='abonus.level') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/level')?>">代理商等级</a></li><?php  } ?>
</ul>
<?php  } ?>

<style type='text/css'>
    .abonus-list a {
        position: relative;
    }
    .abonus-list span  {
        float:right;margin-right:20px;
    }
</style>
<?php if(cv('abonus.bonus.status0|abonus.bonus.status1|abonus.bonus.status2|abonus.bonus.build')) { ?>


<?php  $totals = $this->model->getTotals()?>
<div class='menu-header'>结算单</div>
<ul class="abonus-list">

    <?php if(cv('abonus.bonus.status0')) { ?><li <?php  if(($_W['routes']=='abonus.bonus.status0') || ($_W['routes']=='abonus.bonus.detail' && $data['status']==0)) { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/bonus/status0')?>">待确认 <span  class='text-cancel'  id="total0">-</span></a></li><?php  } ?>
    <?php if(cv('abonus.bonus.status1')) { ?><li <?php  if(($_W['routes']=='abonus.bonus.status1') || ($_W['routes']=='abonus.bonus.detail' && $data['status']==1)) { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/bonus/status1')?>">待结算 <span  class='text-danger' id="total1">-</span></a></li><?php  } ?>
    <?php if(cv('abonus.bonus.status2')) { ?><li <?php  if(($_W['routes']=='abonus.bonus.status2') || ($_W['routes']=='abonus.bonus.detail' && $data['status']==2)) { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/bonus/status2')?>">已结算 <span  class='text-success' id="total2">-</span></a></li><?php  } ?>
    <?php if(cv('abonus.bonus.build')) { ?><li <?php  if($_W['routes']=='abonus.bonus.build') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/bonus/build')?>">创建结算单</a></li><?php  } ?>
</ul>
<?php  } ?>

<?php if(cv('abonus.cover|abonus.notice|abonus.set')) { ?>
<div class="menu-header">设置</div>
<ul>
    <?php if(cv('abonus.cover')) { ?><li <?php  if($_W['routes']=='abonus.cover') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/cover')?>">入口设置</a></li><?php  } ?>
    <?php if(cv('abonus.notice')) { ?><li <?php  if($_W['routes']=='abonus.notice') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/notice')?>">通知设置</a></li><?php  } ?>
    <?php if(cv('abonus.set')) { ?><li <?php  if($_W['routes']=='abonus.set') { ?>class="active"<?php  } ?>><a href="<?php  echo webUrl('abonus/set')?>">基础设置</a></li><?php  } ?>
</ul>

<?php  } ?>

<script>
    $(function () {
        $.ajax({type: "GET",async: false,url: "<?php  echo webUrl('abonus/bonus/totals')?>",dataType:"json",success: function(data){
            var res = data.result;
            $("#total0").text(res.total0);
            $("#total1").text(res.total1);
            $("#total2").text(res.total2);
        }
        });
    });
</script>