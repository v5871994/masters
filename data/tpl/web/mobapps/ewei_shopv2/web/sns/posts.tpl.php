<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading" xmlns:border-top="http://www.w3.org/1999/xhtml">
    <span class='pull-right'>
        <?php  if($isManager) { ?>
        	<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sns/posts/add')?>"><i class='fa fa-plus'></i> 发表话题</a>
        <?php  } ?>
        <?php if(cv('sns.board.add')) { ?>
        	<a class='btn btn-primary btn-sm' href="<?php  echo webUrl('sns/board/add')?>"><i class='fa fa-plus'></i> 添加版块</a>
        <?php  } ?>
    </span>

    <h2>话题管理
        <?php  if(!empty($board)) { ?><small>版块: <?php  echo $board['title'];?></small><?php  } ?>
        <?php  if(!empty($m)) { ?><small>会员: <?php  echo $m['nickname'];?> </small><?php  } ?>
    </h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="sns.posts" />
    <input type="hidden" name="id"  value="<?php  echo $id;?>" />
    <input type="hidden" name="uid"  value="<?php  echo $uid;?>" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">
            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('sns.board.delete')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>1))?>"><i class='fa fa-circle'></i> 恢复</button>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/delete',array('deleted'=>0))?>"><i class='fa fa-circle-o'></i> 删除</button>
                <?php  } ?>

                <?php if(cv('sns.board.edit')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>1))?>"><i class='fa fa-circle'></i> 审核通过</button>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/posts/check',array('checked'=>0))?>"><i class='fa fa-circle-o'></i> 取消审核</button>
                <?php  } ?>
            </div>
        </div>


        <div class="col-sm-6 pull-right">
            <select name="checked" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['checked'] == '') { ?> selected<?php  } ?>>审核</option>
                <option value="1" <?php  if($_GPC['checked'] == '1') { ?> selected<?php  } ?>>通过</option>
                <option value="0" <?php  if($_GPC['checked']== '0') { ?> selected<?php  } ?>>不通过</option>
            </select>
            <select name="deleted" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['deleted'] == '') { ?> selected<?php  } ?>>状态</option>
                <option value="0" <?php  if($_GPC['deleted'] == '0') { ?> selected<?php  } ?>>正常</option>
                <option value="1" <?php  if($_GPC['deleted']== '1') { ?> selected<?php  } ?>>删除</option>
            </select>
            <div class="input-group">
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="会员信息/话题标题"> <span class="input-group-btn">
                    		
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

            <th style='width:30px; text-align: center;'></th>
            <th style='width: 240px;'>标题</th>
            <th style='width: 50px;'>回复数</th>

            <th style='width:60px'>最后回复</th>
            <th style="width: 145px;">操作(红色表示有未审核评论)</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td>
                <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
            </td>

            <td style="text-align: center;">
                <img style="width:30px;height:30px;padding1px;border:1px solid #ccc" src="<?php  echo tomedia($row['avatar'])?>">
            </td>

            <td class="full"><label class="label label-primary"><?php  echo $row['boardtitle'];?></label><br/><?php  echo $row['title'];?></td>
            <td><?php  echo number_format($row['replycount'],0)?></td>

            <td>
                <?php  echo date('Y-m-d', $row['replytime'])?><br/>
                <?php  echo date('H:i', $row['replytime'])?>
            </td>
            <td style="text-align:left;">
                <?php  if($isManager && !empty($row['isadmin'])) { ?>
                <a class='btn btn-default btn-sm' href="<?php  echo webUrl('sns/posts/edit', array('id' => $row['id']))?>" title="编辑">
                    <i class='fa fa-edit'></i>编辑</a>
                <?php  } ?>
                <?php if(cv('sns.posts')) { ?>
                <a href="<?php  echo webUrl('sns/replys', array('id' => $row['id']))?>" class="btn btn-default btn-sm"
                style="<?php  if($row['needchecks']>0) { ?>color:red<?php  } ?>">
                    <i class='fa fa-comment'></i> 详情<?php  if($row['needchecks']>0) { ?>(<?php  echo $row['needchecks'];?>)<?php  } ?>
                </a>
                <?php  } ?>

                <?php if(cv('sns.posts.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/posts/delete1', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要彻底删除此帖子吗?'><i class="fa fa-trash"></i> 彻底删除</a>
                <?php  } ?>
            </td>
        </tr>

        <tr>
<td colspan="2" style=';border-top:none;'></td>
            <td  style='border-top:none;'>
             <a href="javascript:;" onclick="$(this).closest('tr').next('tr').toggle()">[话题内容]</a>
            </td>
            <td colspan="3" style='text-align: right;border-top:none;' class='aops'>

                <a class='<?php  if($row['deleted']==1) { ?>text-default<?php  } else { ?>text-danger<?php  } ?>'
                <?php if(cv('sns.posts.delete')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['deleted'];?>'
                data-switch-value0='0|正常|text-danger|<?php  echo webUrl('sns/posts/delete',array('deleted'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|已删除|text-default|<?php  echo webUrl('sns/posts/delete',array('deleted'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
                <?php  if($row['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
                </a>

                <a class='<?php  if($row['checked']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['checked'];?>'
                data-switch-value0='0|待审核|text-default|<?php  echo webUrl('sns/posts/check',array('checked'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|已审核|text-danger|<?php  echo webUrl('sns/posts/check',array('checked'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
                <?php  if($row['checked']==1) { ?>已审核<?php  } else { ?>待审核<?php  } ?>
                </a>

                <a class='<?php  if($row['isboardbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['isboardbest'];?>'
                data-switch-value0='0|版块精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>0, 'id'=>$row['id']))?>'
                data-switch-value1='1|版块精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
               版块精华
                </a>

                <a class='<?php  if($row['isbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['isbest'];?>'
                data-switch-value0='0|全站精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|全站精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>1,'id'=>$row['id']))?>'
                <?php  } ?>>
                全站精华
                </a>


                <a class='<?php  if($row['isboardtop']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['isboardtop'];?>'
                data-switch-value0='0|版块置顶|text-default|<?php  echo webUrl('sns/posts/best',array('top'=>1,'all'=>0, 'id'=>$row['id']))?>'
                data-switch-value1='1|版块置顶|text-danger|<?php  echo webUrl('sns/posts/best',array('top'=>0,'all'=>0,'id'=>$row['id']))?>'
                <?php  } ?>>
                版块置顶
                </a>

                <a class='<?php  if($row['istop']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['istop'];?>'
                data-switch-value0='0|全站置顶|text-default|<?php  echo webUrl('sns/posts/top',array('top'=>1,'all'=>1,'id'=>$row['id']))?>'
                data-switch-value1='1|全站置顶|text-danger|<?php  echo webUrl('sns/posts/top',array('top'=>0,'all'=>1,'id'=>$row['id']))?>'
                <?php  } ?>>
                全站置顶
                </a>

            </td>
        </tr>



        <tr style="display:none;">
            <td colspan="2" style=';border-top:none;'></td>
            <td colspan="4"  style='border-top:none;' class="full">
                <?php  echo $row['content'];?>
                <br/>
                <?php  if(count($row['images'])>0) { ?>
                <?php  if(is_array($row['images'])) { foreach($row['images'] as $img) { ?>
                <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" /></a>
                <?php  } } ?>
                <?php  } ?>

            </td>
        </tr>

        <?php  } } ?>
        <tr>
            <td colspan='6'>
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