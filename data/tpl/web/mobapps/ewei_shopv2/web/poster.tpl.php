<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
  
<div class="page-heading"> 
	<span class="pull-right">
            	 <?php if(cv('poster.add')) { ?>
                                 <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('poster/add')?>"><i class="fa fa-plus"></i> 添加海报</a>
                            <?php  } ?>
		<?php if(cv('poster.clear')) { ?>
		<button class="btn btn-danger btn-sm" type="button" data-toggle='ajaxPost' data-confirm="确认要清空缓存?" data-href="<?php  echo webUrl('poster/clear')?>"><i class='fa fa-trash'></i> 清除当前公众号海报缓存</button>
                   <?php  } ?>	
	</span>
	<h2>海报管理 <small>总数: <?php  echo $total;?></small></h2> 
</div>
	
        <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="ewei_shopv2" />
                <input type="hidden" name="do" value="web" />
                <input type="hidden" name="r"  value="poster" />
<div class="page-toolbar row m-b-sm m-t-sm">
                            <div class="col-sm-4">
				 
			   <div class="input-group-btn">
			        <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
				 
				<?php if(cv('poster.delete')) { ?>	
			        <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('poster/delete')?>"><i class='fa fa-trash'></i> 删除</button>
					<?php  } ?>
		
		
			   </div> 
                               </div>	
	  
			 
                            <div class="col-sm-6 pull-right">
			 		 
				<select name="type" class='form-control input-sm select-sm'>
					 <option value="" <?php  if($_GPC['type'] == '') { ?> selected<?php  } ?>>类型</option>
                            <option value="1" <?php  if($_GPC['type'] == '1') { ?> selected<?php  } ?>>商城</option>
                            <option value="2" <?php  if($_GPC['type'] == '2') { ?> selected<?php  } ?>>小店</option>
                            <option value="3" <?php  if($_GPC['type'] == '3') { ?> selected<?php  } ?>>商品</option>
                            <option value="4" <?php  if($_GPC['type'] == '4') { ?> selected<?php  } ?>>关注</option>
				</select>	
				<div class="input-group">				 
                                        <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
						
                                     <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
                                </div>
								
                            </div>
</div>
  </form>
<form action="" method="post" >

   <?php  if(count($list)>0) { ?>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
		      <th style="width:25px;"><input type='checkbox' /></th>
                        <th  style='width:150px;'>海报名称</th>
                        <th style='width:80px;'>海报类型</th>
                        <th style='width:80px;'>扫描数</th>
                        <th  style='width:80px;'>关注数</th>
                        <th  style='width:80px;'>是否默认</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        
								<td>
									<input type='checkbox'   value="<?php  echo $row['id'];?>"/>
							</td>
							<td><?php  echo $row['title'];?></td>
                        <td>
                            <?php  if($row['type']==1) { ?>
                            <label class='label label-primary'>商城</label>
                            <?php  } else if($row['type']==2) { ?>
                            <label class='label label-success'>小店</label>
                            <?php  } else if($row['type']==3) { ?>
                            <label class='label label-warning'>商品</label>
                            <?php  } else if($row['type']==4) { ?>
                            <label class='label label-danger'>关注</label>
                         
                            <?php  } ?>
                        </td>
                        <td><?php  if($row['type']!=4) { ?><?php  echo $row['times'];?><?php  } else { ?>--<?php  } ?></td>
                        <td><?php  if($row['type']==4) { ?><?php  echo $row['follows'];?><?php  } else { ?>--<?php  } ?></td>
                            <td>
                                   <?php  if($row['isdefault']==1) { ?>
                                   <i class='fa fa-check' style='color:green'></i> 
                          <?php  } ?>
                        </td>
                        <td>
                        
                                <?php if(cv('poster.log')) { ?>
				 <?php  if($row['type']==4) { ?>
				<a class='btn btn-default btn-sm' href="<?php  echo webUrl('poster/log', array('id' => $row['id']))?>"  ><i class='fa fa-qrcode'></i> 关注记录</a>
				<?php  } else { ?>
				<a class='btn btn-default  btn-sm' href="<?php  echo webUrl('poster/scan', array('id' => $row['id']))?>"><i class='fa fa-qrcode'></i> 扫描记录</a>
				<?php  } ?>
                            <?php  } ?>
                            <?php if(cv('poster.edit|poster.view')) { ?><a class='btn btn-default btn-sm' href="<?php  echo webUrl('poster/edit', array('id' => $row['id']))?>"><i class='fa fa-edit'></i> <?php if(cv('poster.edit')) { ?>编辑<?php  } else { ?>查看<?php  } ?></a><?php  } ?>
			 <?php  if($row['isdefault']==0) { ?>
			 <?php if(cv('poster.setdefault')) { ?><a class='btn btn-default btn-sm' data-toggle='ajaxPost' href="<?php  echo webUrl('poster/setdefault', array('id' => $row['id']))?>" data-confirm="确认设置此海报为默认海报吗？"><i class='fa fa-check'></i> 默认</a><?php  } ?>
			 <?php  } ?>
                            <?php if(cv('poster.delete')) { ?><a class='btn btn-default btn-sm' data-toggle='ajaxRemove'  href="<?php  echo webUrl('poster/delete', array('id' => $row['id']))?>" data-confirm="确认删除此海报吗？"><i class='fa fa-remove'></i> 删除</a></td><?php  } ?>
						
                    </tr>
                    <?php  } } ?>
                 
                </tbody>
            </table>
  <?php  echo $pager;?>        <?php  } else { ?>
<div class='panel panel-default'>
	<div class='panel-body' style='text-align: center;padding:30px;'>
		 暂时没有任何海报!
	</div>
</div>
<?php  } ?>
       
         </form> 
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
