<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading"> 
    <span class='pull-right'>
       	<a class='btn btn-default btn-sm' href="<?php  echo referer()?>">返回</a>
    </span>
    <h2>评论管理</h2> </div>

<?php  if(!empty($board) && !empty($post)) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right aops">

              <a class='<?php  if($post['deleted']==1) { ?>text-default<?php  } else { ?>text-danger<?php  } ?>'
                <?php if(cv('sns.posts.delete')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['deleted'];?>'
                data-switch-value0='0|正常|text-danger|<?php  echo webUrl('sns/posts/delete',array('deleted'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|已删除|text-default|<?php  echo webUrl('sns/posts/delete',array('deleted'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                <?php  if($post['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
            </a>

            <a class='<?php  if($post['checked']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['checked'];?>'
                data-switch-value0='0|待审核|text-default|<?php  echo webUrl('sns/posts/check',array('checked'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|已审核|text-danger|<?php  echo webUrl('sns/posts/check',array('checked'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                <?php  if($post['checked']==1) { ?>已审核<?php  } else { ?>待审核<?php  } ?>
            </a>

            <a class='<?php  if($post['isboardbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isboardbest'];?>'
                data-switch-value0='0|版块精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>0, 'id'=>$post['id']))?>'
                data-switch-value1='1|版块精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
               版块精华
            </a>

            <a class='<?php  if($post['isbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isbest'];?>'
                data-switch-value0='0|全站精华|text-default|<?php  echo webUrl('sns/posts/best',array('best'=>1,'all'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|全站精华|text-danger|<?php  echo webUrl('sns/posts/best',array('best'=>0,'all'=>1,'id'=>$post['id']))?>'
                <?php  } ?>>
                全站精华
            </a>


            <a class='<?php  if($post['isboardbest']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['isboardbest'];?>'
                data-switch-value0='0|版块置顶|text-default|<?php  echo webUrl('sns/posts/best',array('top'=>1,'all'=>0, 'id'=>$post['id']))?>'
                data-switch-value1='1|版块置顶|text-danger|<?php  echo webUrl('sns/posts/best',array('top'=>0,'all'=>0,'id'=>$post['id']))?>'
                <?php  } ?>>
                版块置顶
            </a>

            <a class='<?php  if($post['istop']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>'
                <?php if(cv('sns.posts.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $post['istop'];?>'
                data-switch-value0='0|全站置顶|text-default|<?php  echo webUrl('sns/posts/top',array('top'=>1,'all'=>1,'id'=>$post['id']))?>'
                data-switch-value1='1|全站置顶|text-danger|<?php  echo webUrl('sns/posts/top',array('top'=>0,'all'=>1,'id'=>$post['id']))?>'
                <?php  } ?>>
                全站置顶
            </a>
            
        </span>
        版块: <?php  echo $board['title'];?>
    </div>
    <div class="panel-body">

        <div class="row">
        <div class="col-sm-2" style="line-height:22px;">
            <?php if(cv('member.list.view')) { ?><a href="<?php  echo webUrl('member/list/detail',array('id' => $member['id']));?>" title='会员信息' target='_blank'>
             <img src="<?php  echo $post['avatar'];?>" style="border:1px solid #ccc;width:80px;height:80px; padding:1px" /><br />
             <span><?php  echo $post['nickname'];?></span>
        </a>

            <?php  } else { ?>
            <img src="<?php  echo $post['avatar'];?>" style="border:1px solid #ccc;width:80px;height:80px; padding:1px" /><br />
            <span><?php  echo $post['nickname'];?></span>

            <?php  } ?>

            <br/>
            <span class="label label-default" style="background:<?php  echo $level['bg'];?>;color:<?php  echo $level['color'];?>"><?php  echo $level['levelname'];?></span>
            <?php  if($isManager) { ?>
            <br/><span class="label label-warning">版主</span>
            <?php  } ?>
            <br/>积分: <?php  echo $member['sns_credit'];?>
            <br/>话题: <?php  echo $member['postcount'];?>
            <br/>评论: <?php  echo $member['replycount'];?>


        </div>

            <div class="col-sm-10">
                <h3><?php  echo $post['title'];?> <h4 style="padding:0;line-height: 5px;font-weight: normal;"><br/>发布时间: <?php  echo date('Y-m-d H:i:s',$post['createtime'])?></h4></h3><br/>
                <?php  echo $post['content'];?>
                <?php  if(count($post['images'])>0) { ?>
                <br/>
<?php  if(is_array($post['images'])) { foreach($post['images'] as $img) { ?>
                <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:100px;border:1px solid #ccc;padding:1px;margin:2px;" /></a>
                <?php  } } ?>
                <?php  } ?>

            </div>

        </div>
    </div>

</div>
<?php  } ?>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="sns.replys" />
    <input type="hidden" name="id"  value="<?php  echo $pid;?>" />
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

            <th style='width:100px;'></th>
            <th style='width: 320px;'>内容</th>
            <th style='width: 90px;'>回复时间</th>
            <th style="width:60px">状态</th>
             <th style="width: 145px;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td style="overflow-x: hidden; vertical-align: top">
                <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
            </td>

            <td style="overflow-x: hidden; vertical-align: top">
                <?php if(cv('member.list.view')) { ?>
                <a href="<?php  echo webUrl('member/list/detail',array('id' => $row['member']['id']));?>" title='会员信息' target='_blank'>
                    <img src="<?php  echo $row['avatar'];?>" style="border:1px solid #ccc;width:60px;height:60px; padding:1px" /><br />
                    <span><?php  echo $row['nickname'];?></span>
                </a>

                <?php  } else { ?>
                <img src="<?php  echo $row['avatar'];?>" style="border:1px solid #ccc;width:60px;height:60px; padding:1px" /><br />
                <span><?php  echo $row['nickname'];?></span>

                <?php  } ?>

                <br/>
                <span class="label label-default" style="background:<?php  echo $row['level']['bg'];?>;color:<?php  echo $row['level']['color'];?>"><?php  echo $row['level']['levelname'];?></span>
                <?php  if($row['isAuthor']) { ?>
                <br/><span class="label label-primary">楼主</span>
                <?php  } ?>
                <?php  if($row['isManager']) { ?>
                <br/><span class="label label-warning">版主</span>
                <?php  } ?>
                <br/>积分: <?php  echo $row['member']['sns_credit'];?>
                <br/>话题: <?php  echo $row['member']['postcount'];?>
                <br/>评论: <?php  echo $row['member']['replycount'];?>


            </td>

            <td class='full' style="overflow-x: hidden; vertical-align: top">
                <?php  if(!empty($row['parent'])) { ?>
                回复:<?php  echo $row['parent']['nickname'];?><br/>
                <?php  } ?>
                <?php  echo $row['content'];?>
                <?php  if(count($row['images'])>0) { ?>
                <br/>
                <?php  if(is_array($row['images'])) { foreach($row['images'] as $img) { ?>
                <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" /></a>
                <?php  } } ?>
                <?php  } ?>
            </td>
            <td  style="overflow-x: hidden; vertical-align: top">
                <?php  echo date('Y-m-d', $row['createtime'])?><br/>
                <?php  echo date('H:i', $row['createtime'])?>
            </td>
<td  style="overflow-x: hidden; vertical-align: top">

    <span class='label <?php  if($row['deleted']==1) { ?>label-default<?php  } else { ?>label-success<?php  } ?>'
    <?php if(cv('sns.posts.delete')) { ?>
    data-toggle='ajaxSwitch'
    data-switch-value='<?php  echo $row['deleted'];?>'
    data-switch-value0='0|正常|label  label-success|<?php  echo webUrl('sns/posts/delete',array('deleted'=>1,'id'=>$row['id']))?>'
    data-switch-value1='1|已删除|label label-default|<?php  echo webUrl('sns/posts/delete',array('deleted'=>0,'id'=>$row['id']))?>'
    <?php  } ?>>
    <?php  if($row['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
    </span>
<br/>
    <span class='label <?php  if($row['checked']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
    <?php if(cv('sns.posts.edit')) { ?>
    data-toggle='ajaxSwitch'
    data-switch-value='<?php  echo $row['checked'];?>'
    data-switch-value0='0|待审核|label label-default|<?php  echo webUrl('sns/posts/check',array('checked'=>1,'id'=>$row['id']))?>'
    data-switch-value1='1|已审核|label label-success|<?php  echo webUrl('sns/posts/check',array('checked'=>0,'id'=>$row['id']))?>'
    <?php  } ?>>
    <?php  if($row['checked']==1) { ?>已审核<?php  } else { ?>待审核<?php  } ?>
    </span>
</td>
            <td style="text-align:left;vertical-align: top"">
                <?php if(cv('sns.posts.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/posts/delete1', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要彻底删除此帖子吗?'><i class="fa fa-trash"></i> 彻底删除</a>
                <?php  } ?>
            </td>
        </tr>
        <?php  if(!empty($row['subject'])) { ?>
        <tr>
            <td>&nbsp;</td>
            <td colspan="5">
                <div class="panel panel-info" >
                    <div class="panel-body">
                        <div class="row">
                          <a href="<?php  echo webUrl('sns/replys',array('id'=>$row['pid']))?>" target="_blank">
                        <div class="col-sm-1"><img src="<?php  echo tomedia($row['subject']['thumb'])?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" /></div>
                        <div class="col-sm-11"><h4 style="padding:0;line-height: 0px;"><?php  echo $row['subject']['title'];?></h4>
                            <br/>
                            版块: <?php  echo $row['subject']['boardtitle'];?>
                        </div>
                          </a>
                        </div>
                    </div>
                </div>

            </td>

        </tr>
        <?php  } ?>
        <?php  } } ?>

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