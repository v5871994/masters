<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
    <span class="pull-right">
        <?php if(cv('goods.label.add')) { ?>
        <a href="<?php  echo webUrl('goods/label/add')?>" class="btn btn-primary"><i class="fa fa-plus"></i> 添加新标签组</a>
        <?php  } ?>
    </span>
    <h2>标签组管理</h2>
</div>
<ul class="nav nav-arrow-next nav-tabs" id="myTab">
    <li class="active" >
        <a href="<?php  echo webUrl('goods/label')?>">标签管理</a>
    </li>
    <li>
        <a href="<?php  echo webUrl('goods/label/style')?>">设置样式</a>
    </li>
</ul>
<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="goods.label" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('goods.label.edit')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('goods/label/status',array('status'=>1))?>"><i class='fa fa-circle'></i> 启用</button>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('goods/label/status',array('status'=>0))?>"><i class='fa fa-circle-o'></i> 禁用</button>
                <?php  } ?>
                <?php if(cv('goods.label.delete')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sns/level/delete')?>"><i class='fa fa-trash'></i> 删除</button>
                <?php  } ?>
            </div>
        </div>
        <div class="col-sm-6 pull-right">
            <select name="enabled" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['enabled'] == '') { ?> selected<?php  } ?>>状态</option>
                <option value="1" <?php  if($_GPC['enabled']== '1') { ?> selected<?php  } ?>>启用</option>
                <option value="0" <?php  if($_GPC['enabled'] == '0') { ?> selected<?php  } ?>>禁用</option>
            </select>
            <div class="input-group">
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
                <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>
        </div>
    </div>
</form>
<form action="" method="post" >
    <?php  if(count($label)>0) { ?>
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th style="width:25px;"><input type='checkbox' /></th>
            <th>标签组名称</th>
            <th style="width:80px;">状态</th>
            <th style="width:200px;text-align: center;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($label)) { foreach($label as $row) { ?>
        <tr>
            <td>
                <?php  if($row['id']!='default') { ?>
                <input type='checkbox' value="<?php  echo $row['id'];?>"/>
                <?php  } ?>
            </td>
            <td><?php  echo $row['label'];?></td>
            <td>
                <span class='label <?php  if($row['status']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
                <?php if(cv('goods.label.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['status'];?>'
                data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('goods/label/status',array('status'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|启用|label label-success|<?php  echo webUrl('goods/label/status',array('status'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
                <?php  if($row['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>
            </td>
            <td>
                <?php if(cv('goods.label.view|goods.label.edit')) { ?>
                <a href="<?php  echo webUrl('goods/label/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm">
                    <i class='fa fa-edit'></i> <?php if(cv('goods.label.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>
                </a>
                <?php  } ?>
                <?php  if($row['id']!='default') { ?>
                <?php if(cv('goods.label.delete')) { ?><a data-toggle='ajaxRemove' href="<?php  echo webUrl('goods/label/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除此标签组吗?'><i class="fa fa-trash"></i> 删除</a><?php  } ?>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>

        </tbody>
    </table>
    <div style="text-align:right;width:100%;">
        <?php  echo $pager;?>
    </div>
    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有任何标签组!
        </div>
    </div>
    <?php  } ?>
</form>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
