<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <span class='pull-right'>
        <?php if(cv('sns.board.add')) { ?>
        	<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sns/board/add')?>"><i class='fa fa-plus'></i> 添加版块</a>
        <?php  } ?>
    </span>
    <h2>版块管理</h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="sns.board" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('sns.board.edit')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/board/status',array('status'=>1))?>"><i class='fa fa-circle'></i> 显示</button>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/board/status',array('status'=>0))?>"><i class='fa fa-circle-o'></i> 隐藏</button>
                <?php  } ?>
                <?php if(cv('sns.board.delete')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('sns/board/delete')?>"><i class='fa fa-trash'></i> 删除</button>
                <?php  } ?>
            </div>
        </div>


        <div class="col-sm-6 pull-right">
            <select name="status" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['status'] == '') { ?> selected<?php  } ?>>状态</option>
                <option value="1" <?php  if($_GPC['status']== '1') { ?> selected<?php  } ?>>显示</option>
                <option value="0" <?php  if($_GPC['status'] == '0') { ?> selected<?php  } ?>>隐藏</option>
            </select>
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
            <th style='width:30px'>顺序</th>
            <th style='width:45px; text-align: center;'>图标</th>
            <th style='width: 120px;'>标题</th>
            <th style='width: 50px;'>话题数</th>
            <th style='width: 50px;'>关注数</th>
            <th style='width:60px'>显示</th>
            <th style="width: 145px;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td>
                <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
            </td>
            <td>
                <?php if(cv('sns.board.edit')) { ?>
                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('sns/board/displayorder',array('id'=>$row['id']))?>" ><?php  echo $row['displayorder'];?></a>
                <?php  } else { ?>
                <?php  echo $row['displayorder'];?>
                <?php  } ?>
            </td>
            <td style="text-align: center;">
                <img style="width:30px;height:30px;padding1px;border:1px solid #ccc" src="<?php  echo tomedia($row['logo'])?>">
            </td>
            <td>
                <label class="label label-primary"><?php  echo $category[$row['cid']]['name'];?></label><br/><?php  echo $row['title'];?>
                <br/>
                <a href="javascript:;" class='js-clip' data-url="<?php  echo mobileUrl('sns/board', array('id' => $row['id']),true)?>"><i class='fa fa-link'></i> 复制链接</a>
                <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true" data-content="<img src='<?php  echo $row['qrcode'];?>' width='130' alt='链接二维码'>" data-placement="auto right">
                    <i class="glyphicon glyphicon-qrcode"></i>
                </span>
            </td>
            <td><?php  echo number_format($row['postcount'],0)?></td>
            <td><?php  echo number_format($row['followcount'],0)?></td>
            <td>

                <span class='label <?php  if($row['status']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
                <?php if(cv('sns.board.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['status'];?>'
                data-switch-value0='0|隐藏|label label-default|<?php  echo webUrl('sns/board/status',array('status'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|显示|label label-success|<?php  echo webUrl('sns/board/status',array('status'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
                <?php  if($row['status']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?>
                </span>


            </td>
            <td style="text-align:left;">
                <?php if(cv('sns.posts')) { ?>
                <a href="<?php  echo webUrl('sns/posts', array('id' => $row['id']))?>" class="btn btn-default btn-sm">
                    <i class='fa fa-comment'></i> 话题管理
                </a>
                <?php  } ?>

                <?php if(cv('sns.board.view|sns.board.edit')) { ?>
                <a href="<?php  echo webUrl('sns/board/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm">
                    <i class='fa fa-edit'></i> <?php if(cv('sns.board.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>
                </a>
                <?php  } ?>
                <?php if(cv('sns.board.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/board/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除此版块吗?'><i class="fa fa-trash"></i> 删除</a>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>
        <tr>
            <td colspan='8'>
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
            暂时没有任何版块!
        </div>
    </div>
    <?php  } ?>

</form>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>