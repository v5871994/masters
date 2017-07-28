<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
	
	<span class='pull-right'>
 
                
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('sale/coupon/coupon')?>">返回列表</a>
                
                
	</span>
    <h2>优惠券记录 <small><?php  if(!empty($coupon)) { ?>优惠券: <?php  echo $coupon['couponname'];?><?php  } ?> 总数: <span class="text-danger"><?php  echo $total;?></span></small></h2>
</div>


<form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="sale.coupon.log" />
    <input type="hidden" name="couponid" value="<?php  echo $couponid;?>" />




    <?php  if(empty($coupon)) { ?>

    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-12 pull-right">
            <div class='input-group input-group-sm'  style='float:left;'  >
                <?php  echo tpl_daterange('time', array('sm'=>true,'placeholder'=>'获得时间'),true);?>
            </div>
            <div class='input-group input-group-sm'  style='float:left;'  >
                <?php  echo tpl_daterange('time1', array('sm'=>true,'placeholder'=>'使用时间'),true);?>
            </div>


            <select name='gettype' class='form-control input-sm select-sm' style='width:110px;'>
                <option value=''>获得方式</option>
                <option value='0' <?php  if($_GPC['gettype']=='0') { ?>selected<?php  } ?>>后台发放</option>
                <option value='1' <?php  if($_GPC['gettype']=='1') { ?>selected<?php  } ?>>领券中心</option>
                <option value='2' <?php  if($_GPC['gettype']=='2') { ?>selected<?php  } ?>>积分商城</option>
                <option value='3' <?php  if($_GPC['gettype']=='3') { ?>selected<?php  } ?>>超级海报</option>
                <option value='4' <?php  if($_GPC['gettype']=='4') { ?>selected<?php  } ?>>活动海报</option>
                <option value='5' <?php  if($_GPC['gettype']=='5') { ?>selected<?php  } ?>>口令优惠券</option>
                <option value='6' <?php  if($_GPC['gettype']=='6') { ?>selected<?php  } ?>>任务发送</option>
                <option value='7' <?php  if($_GPC['gettype']=='7') { ?>selected<?php  } ?>>兑换中心</option>
            </select>

            <select name='used' class='form-control input-sm select-sm'>
                <option value=''>状态</option>
                <option value='0' <?php  if($_GPC['used']=='0') { ?>selected<?php  } ?>>未使用</option>
                <option value='1' <?php  if($_GPC['used']=='1') { ?>selected<?php  } ?>>已使用</option>
            </select>




        </div>
    </div>
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-12 pull-right">

            <select name='type' class='form-control input-sm select-sm'>
                <option value='' <?php  if($_GPC['type']=='') { ?>selected<?php  } ?>>类型</option>
                <option value='0' <?php  if($_GPC['type']=='0') { ?>selected<?php  } ?>>消费</option>
                <option value='1' <?php  if($_GPC['type']=='1') { ?>selected<?php  } ?>>充值</option>
            </select>

            <select name='searchfield' class='form-control input-sm select-sm'>
                <option value='coupon' <?php  if($_GPC['searchfield']=='coupon') { ?>selected<?php  } ?>>优惠券</option>
                <option value='member' <?php  if($_GPC['searchfield']=='member') { ?>selected<?php  } ?> >会员</option>
            </select>

            <div class="input-group">
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
						
                                
                                     <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> 
                                           <?php if(cv('sale.coupon.log.export')) { ?>
                        <button type="submit" name="export" value="1" class="btn btn-success btn-sm">导出</button>
                        <?php  } ?>
                                        </span>
            </div>

        </div>
    </div>
    <?php  } else { ?>
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-12 pull-right">
            <div class='input-group input-group-sm'  style='float:left;'  >
                <?php  echo tpl_daterange('time', array('sm'=>true,'placeholder'=>'获得时间'),true);?>
            </div>
            <div class='input-group input-group-sm'  style='float:left;'  >
                <?php  echo tpl_daterange('time1', array('sm'=>true,'placeholder'=>'使用时间'),true);?>
            </div>
            <div class="input-group">



                <button class="btn btn-sm btn-primary" type="submit"> 搜索</button>
                <?php if(cv('sale.coupon.log.export')) { ?>
                <button type="submit" name="export" value="1" class="btn btn-success btn-sm">导出</button>
                <?php  } ?>

            </div>

        </div></div>
    <?php  } ?>

</form>
<?php  if(count($list)>0) { ?>
<table class="table table-hover table-responsive">
    <thead class="navbar-inner" >
    <tr>

        <th style='width:150px;'>优惠券名称</th>
        <th style='width:90px;'>会员信息</th>
        <th style='width:100px;'></th>
        <th style='width:80px;'>获得方式</th>
        <th style='width:100px;'>获得时间</th>
        <th style='width:100px;'>使用时间</th>
        <th style='width:180px;'>使用单号</th>
    </tr>
    </thead>
    <tbody>
    <?php  if(is_array($list)) { foreach($list as $row) { ?>
    <tr>

        <td><?php  if($row['coupontype']==0) { ?>
            <label class='label label-success'>消费</label>
            <?php  } else { ?>
            <label class='label label-warning'>充值</label>
            <?php  } ?><?php  echo $row['couponname'];?>
        </td>
        <td>
            <span data-toggle='tooltip'  title='<?php  echo $row['nickname'];?>'>
            <img src='<?php  echo tomedia($row['avatar'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
            <?php  if(empty($row['nickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?></span>
        </td>
        <td>
            <?php  echo $row['realname'];?><br/><?php  echo $row['mobile'];?>
        </td>
        <td><?php  echo $row['gettypestr'];?></td>
        <td><?php  echo date('Y-m-d',$row['gettime'])?><br/><?php  echo date('H:i',$row['gettime'])?></td>
        <td><?php  if(empty($row['usetime'])) { ?>
            ---
            <?php  } else { ?>
            <?php  echo date('Y-m-d',$row['usetime'])?><br/><?php  echo date('H:i',$row['usetime'])?>
            <?php  } ?>
        </td>

        <td><?php echo empty($row['ordersn'])?'---':$row['ordersn']?></td>


    </tr>
    <?php  } } ?>
    </tbody>
</table>
<?php  echo $pager;?>
<?php  } else { ?>
<div class='panel panel-default'>
    <div class='panel-body' style='text-align: center;padding:30px;'>
        暂时没有任何发放使用记录!
    </div>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>