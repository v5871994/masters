<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
<style>
.thumbadimg{border:1px;}
.nav_1,.nav_2,.nav_3,.nav_4{display:none}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
white-space: normal;
word-wrap: break-word;
word-break: normal;
}
.thumbnail>img{width:120px;height:120px;}
    .context-menu-list {
        color: #000;
    }
    .btn-warning .fa-remove {
        margin-right: 0;
    }
	.nav_8{display:none}
	.tanchuad img,.adimgbox img{background: url(../attachment/images/global/nopic.jpg);
    background-size: 100% 100%;}
	.thumbnail .caption {
  padding: 20px;
  color: #333;
}
</style>
  <div class="panel panel-heading"> 
<ul class="nav nav-pills navtab">
  <li><a href="<?php  echo $this->createWebUrl('friendship');?>">会员设置</a></li>
  <li  class="active"><a href="<?php  echo $this->createWebUrl('viporder');?>" onclick="">会员订单</a></li>
</ul>
 </div>
    
 
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="tyzm_diamondvote" />
        	<input type="hidden" name="do" value="viporder" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" placeholder="订单号，昵称，商户订单号" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
 			<div class="form-group">
			</div>
		</form>
		<button class="btn btn-primary" type="button">  支付总数 <span class="badge"><?php  echo $vipfee;?>元</span>
</button>
		
	</div>
 
    </div>
    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr><th  width="50">ID</th>	
					<th   width="60">头像</th>	
                    <th>用户openid</th>	
					<th>会员套餐</th>
					<th>有效期</th>
					<th>价格/数量</th>
					<th>订单号</th>
					<th>商户订单号</th>
					<th>状态</th>
					<th>ip</th>
					<th>时间</th>
					<th>操作</th>
                </tr>
            </thead> 
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td><?php  echo $row['id'];?></td>
					<td style="text-align:center"><img src="<?php  echo $row['avatar'];?>" width="48"></td>
					<td><?php  echo $row['nickname'];?><br /><?php  echo $row['openid'];?></td>	
                    <td><img src="<?php  echo $row['packicon'];?>" width="48"><br/><span class="label  label-primary"><?php  echo $row['packname'];?></span></td>
					<td><?php  echo date('Y-m-d H:i:s',$row['packtime'])?></td>					
					<td><span class="label label-success"><?php  echo $row['fee'];?></span></br>				
					<span class="label label-success"><?php  echo $row['packnum'];?></span></td>
					<td><?php  echo $row['ptid'];?></td>
					<td><?php  echo $row['uniontid'];?></td>
					<td><?php  if($row['ispay']==0) { ?><span class="label label-danger">未付款</span><?php  } else { ?><span class="label label-success">已付款</span><?php  } ?></td>			
					<td><?php  echo $row['user_ip'];?></td>	
					<td><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></td>				
					<td><a class="btn  btn-danger" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?删除不可恢复！', '<?php  echo $this->createWebUrl('otherset',array('ty'=>'deleteviporder','id'=>$row['id']))?>');" title="删除"><i class="fa fa-times"></i> 删除</a></td>	
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>

</div>
<script>
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>