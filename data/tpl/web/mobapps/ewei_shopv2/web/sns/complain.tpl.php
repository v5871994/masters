<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
    .full-content-info{max-height:42px;line-height: 21px;overflow: hidden;}
    select.select-sm{width:120px;}
</style>
<div class="page-heading" xmlns:border-top="http://www.w3.org/1999/xhtml">
    <h2>投诉管理 <small>数量: <span class='text-danger'><?php  echo $total;?></span> 条</small></h2>
</div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="sns.complain" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-7">
            <div class="btn-group btn-group-sm" style="float:left;">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <select name='searchtime' class='form-control  input-sm select-md' style="width:85px;padding:0;"  >
                    <option value=''>不按时间</option>
                    <option value='create' <?php  if($_GPC['searchtime']=='create') { ?>selected<?php  } ?>>投诉时间</option>
                    <option value='checked' <?php  if($_GPC['searchtime']=='checked') { ?>selected<?php  } ?>>审核时间</option>
                </select>
                <?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);?>
            </div>
        </div>


        <div class="col-sm-5 pull-right">
            <div class="input-group">
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="投诉内容"> <span class="input-group-btn">
                <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>
        </div>

    </div>
</form>

<form action="" method="post">
    <?php  if(count($complains)>0) { ?>
    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
        <tr>
            <th style="width:25px;"><input type='checkbox' /></th>
            <th style='width:30px; text-align: center;'></th>
            <th style='width: 240px;'>投诉话题/评论</th>
            <th style='width: 100px;'>投诉人</th>
            <th style='width:100px'>投诉时间</th>
            <th style="width: 145px;">操作(红色表示有未审核评论)</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($complains)) { foreach($complains as $row) { ?>
        <tr>
            <td>
                <input type='checkbox' value="<?php  echo $row['id'];?>"/>
            </td>
            <td style="text-align: center;">
                <img style="width:30px;height:30px;padding1px;border:1px solid #ccc" src="<?php  echo tomedia($row['complainant']['avatar'])?>">
            </td>
            <td class="full">
                <label class="label label-danger"><?php  echo $row['typename'];?></label>
                <div class="full-content-info">
                    <a href="<?php  echo webUrl('member/list/detail',array('id'=>$row['complainant']['id']))?>"><?php  echo $row['complainant']['nickname'];?></a>:<?php  echo $row['content'];?>
                </div>
            </td>
            <td>
                <a href="<?php  echo webUrl('member/list/detail',array('id'=>$row['defendant']['id']))?>"><?php  echo $row['defendant']['nickname'];?></a>
            </td>
            <td>
                <?php  echo date('Y-m-d H:i', $row['createtime'])?>
            </td>
            <td style="text-align:right;">
                <?php if(cv('sns.complain.check')) { ?>
                <?php  if($row['checked']==0) { ?>
                <a data-toggle="ajaxModal" href="<?php  echo webUrl('sns/complain/checked', array('id' => $row['id'],'type'=>$row['complaint_type']))?>" class="btn btn-default btn-sm" style="<?php  if($row['needchecks']>0) { ?>color:red<?php  } ?>">
                    审核
                </a>
                <?php  } ?>
                <?php  } ?>
                <?php if(cv('sns.complain.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/complain/delete', array('id' => $row['id']))?>" class="btn btn-default btn-sm" data-confirm='确认要删除此投诉吗?' title="删除">
                    <i class="fa fa-remove"></i>
                </a>
                <?php  } ?>
                <?php if(cv('sns.complain.delete')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('sns/complain/delete1', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要彻底删除此投诉吗?'>
                    <i class="fa fa-trash"></i> 彻底删除
                </a>
                <?php  } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" style=';border-top:none;'></td>
            <td  style='border-top:none;'>
                <a href="javascript:;" onclick="$(this).closest('tr').next('tr').toggle()">[投诉内容]</a>
            </td>
            <td colspan="3" style='text-align: right;border-top:none;' class='aops'>
                <a class="<?php  if($row['deleted']==1) { ?>text-default<?php  } else { ?>text-danger<?php  } ?>" href="javascript:void(0);">
                <?php  if($row['deleted']==1) { ?>已删除<?php  } else { ?>正常<?php  } ?>
                </a>
                <a class="<?php  if($row['checked']==1) { ?>text-danger<?php  } else { ?>text-default<?php  } ?>" href="javascript:void(0);">
                <?php  if($row['checked']==1) { ?>已审核<?php  } else if($row['checked']==-1) { ?>未通过<?php  } else { ?>待审核<?php  } ?>
                </a>
            </td>
        </tr>
        <tr style="display:none;">
            <td colspan="2" style=';border-top:none;'></td>
            <td colspan="4"  style='border-top:none;' class="full">
                <?php  echo $row['complaint_text'];?>
                <br/>
                <?php  if(count($row['images'])>0) { ?>
                <?php  if(is_array($row['images'])) { foreach($row['images'] as $img) { ?>
                <a href="<?php  echo tomedia($img)?>" target="_blank"><img src="<?php  echo tomedia($img)?>" style="width:50px;border:1px solid #ccc;padding:1px;margin:2px;" /></a>
                <?php  } } ?>
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
            暂时没有任何投诉!
        </div>
    </div>
    <?php  } ?>

</form>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>