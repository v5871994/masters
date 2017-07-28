<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> <h2>订单统计</h2> <span>按时间查询订单数和订单金额 共计 <span style="color:red; "><?php  echo $totalcount;?></span> 个订单 , 金额共计 <span style="color:red; "><?php  echo $totalmoney;?></span> 元</span></div>

<form action="./index.php" method="get" class="form-horizontal"  id="form1">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="statistics.order" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-5">

            <div class="btn-group btn-group-sm" style='float:left'>
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>

            </div>

            <?php  echo tpl_daterange('datetime', array('sm'=>true,'placeholder'=>'下单时间'),true);?>

        </div>

        <div class="col-sm-6 pull-right">

            <select name='searchfield'  class='form-control  input-sm select-md'   style="width:120px;">

                <option value='ordersn' <?php  if($_GPC['searchfield']=='ordersn') { ?>selected<?php  } ?>>订单号</option>
                <option value='member' <?php  if($_GPC['searchfield']=='member') { ?>selected<?php  } ?>>会员信息</option>
                <option value='address' <?php  if($_GPC['searchfield']=='address') { ?>selected<?php  } ?>>收件人信息</option>
            </select>
            <div class="input-group">
                <input type="text" class="form-control input-sm"  name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"/>
				<span class="input-group-btn">
							
					<button class="btn btn-sm btn-primary btn-sm" type="submit"> 搜索</button>
   <?php if(cv('statistics.order.export')) { ?>
                    <button type="submit" name="export" value="1" class="btn btn-success  btn-sm">导出 Excel</button>
                    <?php  } ?>
				</span>
            </div>

        </div>
    </div>

</form>

<table class="table table-hover">
    <thead class="navbar-inner">
    <tr>
        <th style="width:220px">订单号</th>
        <th>总金额</th>

        <th>付款方式</th>
        <th>会员名称</th>
        <th>收货人</th>
        <th style="width:160px">下单时间</th>
    </tr>
    </thead>
    <tbody>

    <?php  if(is_array($list)) { foreach($list as $row) { ?>
    <tr  style="background: #eee">
        <td><?php  echo $row['ordersn'];?></td>
        <td
                ><b><?php  echo $row['price'];?></b> <a ><i class="fa fa-question-circle"  data-toggle='popover' data-placement='bottom' data-html='true' data-trigger='hover'
                                               data-content="<table class='table table-hover'>
                        
                        <tr><th>总金额</th><td><?php  echo $row['price'];?></td></tr>
                        <tr><th>商品小计</th><td><?php  echo $row['goodsprice'];?></td></tr>
                        <tr><th>运费</th><td><?php  echo $row['dispatchprice'];?></td></tr>
                        <tr><th>会员折扣</th><td><?php  if($row['discountprice']>0) { ?>-<?php  echo $row['discountprice'];?><?php  } ?></td></tr>
                        <tr><th>积分抵扣</th><td><?php  if($row['deductprice']>0) { ?>-<?php  echo $row['deductprice'];?><?php  } ?></td></tr>
                        <tr><th>余额抵扣</th><td><?php  if($row['deductcredit2']>0) { ?>-<?php  echo $row['deductcredit2'];?><?php  } ?></td></tr>
                        <tr><th>满额立减</th><td><?php  if($row['deductenough']>0) { ?>-<?php  echo $row['deductenough'];?><?php  } ?></td></tr>
                        <tr><th>优惠券优惠</th><td><?php  if($row['couponprice']>0) { ?>-<?php  echo $row['couponprice'];?><?php  } ?></td></tr>
                        <tr><th>卖家改价</th><td><?php  if(0<$item['changeprice']) { ?>+<?php  } else { ?>-<?php  } ?><?php  echo number_format(abs($item['changeprice']),2)?></td></tr>
                        <tr><th>卖家改运费</th><td><?php  if(0<$item['changedipatchpriceprice']) { ?>+<?php  } else { ?>-<?php  } ?><?php  echo number_format(abs($item['changedipatchpriceprice']),2)?></td></tr>
                        </table>"></i></a></td>


        <td><?php  if($row['paytype'] == 1) { ?>
            <span class="label label-primary">余额支付</span>
            <?php  } else if($row['paytype'] == 11) { ?>
            <span class="label label-default">后台付款</span>
            <?php  } else if($row['paytype'] == 2) { ?>
            <span class="label label-danger">在线支付</span>
            <?php  } else if($row['paytype'] == 21) { ?>
            <span class="label label-success">微信支付</span>
            <?php  } else if($row['paytype'] == 22) { ?>
            <span class="label label-warning">支付宝支付</span>
            <?php  } else if($row['paytype'] == 23) { ?>
            <span class="label label-primary">银联支付</span>
            <?php  } else if($row['paytype'] == 3) { ?>
            <span class="label label-success">货到付款</span>
            <?php  } ?>
        </td>
        <td><?php  echo $row['realname'];?></td>
        <td><?php  echo $row['addressname'];?></td>
        <td><?php  echo date('Y-m-d H:i',$row['createtime'])?></td>
    </tr>
    <tr >

        <td colspan="6">
            <?php  if(is_array($row['goods'])) { foreach($row['goods'] as $g) { ?>
            <table style="width:200px;float:left;margin:10px 10px 0 10px;" title="<?php  echo $g['title'];?>">
                <tr>
                    <td style="width:60px;"><img src="<?php  echo tomedia($g['thumb'])?>" style="width: 50px; height: 50px;border:1px solid #ccc;padding:1px;"></td>
                    <td>
                        单价: <?php  echo $g['realprice']/$g['total']?><br/>
                        数量: <?php  echo $g['total'];?><br/>
                        总价: <strong><?php  echo $g['realprice'];?></strong>
                    </td>
                </tr>
            </table>
            <?php  } } ?>

        </td></tr>
    <?php  } } ?>
</table>
<?php  echo $pager;?>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>