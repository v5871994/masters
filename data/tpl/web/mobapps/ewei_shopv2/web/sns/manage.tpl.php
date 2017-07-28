<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> 
    <span class='pull-right'>
        <?php if(cv('sns.manage.add')) { ?>
        	<a class='btn btn-primary btn-sm' data-toggle="ajaxModal" href="<?php  echo webUrl('sns/manage/add')?>"><i class='fa fa-plus'></i> 添加版主</a>
        <?php  } ?>
    </span>
    <h2>版主管理</h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="sns.manage" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">

            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>

                <?php if(cv('sns.manage.delete')) { ?>	
                	<button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sns/manage/delete')?>"><i class='fa fa-trash'></i> 删除</button>
                <?php  } ?>
            </div>
        </div>	


        <div class="col-sm-6 pull-right">

            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
                    		
                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>

        </div>
    </div>
</form>

<form action="" method="post">
    <?php  if(count($list)>0) { ?>

    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th style='width:120px'>版块</th>
                <th style='width:100px'>版主</th>
                <th></th>

                <th >操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>

            <tr>
                <td style="position: relative; ">
                    <input type='checkbox'   value="<?php  echo $row['id'];?>"/></td>
                <td><?php  echo $row['title'];?></td>
                <td  >
                    <div  >
                        <?php  if(!empty($row['avatar'])) { ?>
                        <img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                        <?php  } ?>
                        <?php  if(empty($row['nickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?>
                    </div>
                </td>
                <td><?php  echo $row['realname'];?><br/><?php  echo $row['mobile'];?></td>

                    <td style="text-align:left;">
                        <?php if(cv('sns.manage.view|sns.manage.edit')) { ?>
	                        <a data-toggle="ajaxModal" href="<?php  echo webUrl('sns/manage/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm">
	                        	<i class='fa fa-edit'></i> <?php if(cv('sns.manage.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>
	                        </a>
                        <?php  } ?>
                        <?php if(cv('sns.manage.delete')) { ?>
                        	<a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/manage/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除此幻灯片吗?'><i class="fa fa-trash"></i> 删除</a>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?> 
                <tr>
                    <td colspan='5'>
                        <div class='pagers' style='float:right;'>
                            <?php  echo $pager;?>			
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何版主!
            </div>
        </div>
        <?php  } ?>

    </form>


    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>