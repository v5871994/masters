<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
    <h2>基础设置</h2>
</div>

<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" novalidate="novalidate">

    <div class="form-group">
        <label class="col-sm-2 control-label">个人中心显示</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <label class="radio-inline"><input type="radio" name="showmember" value="0" <?php  if(empty($set['showmember'])) { ?>checked<?php  } ?>> 否</label>
            <label class="radio-inline"><input type="radio" name="showmember" value="1" <?php  if(!empty($set['showmember'])) { ?>checked<?php  } ?>> 是</label>
            <?php  } else { ?>
            <div class="form-control-static"><?php  if(empty($set['showmember'])) { ?> 否<?php  } else { ?>是<?php  } ?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">显示类型</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <label class="radio-inline"><input type="radio" name="showtype" value="0" <?php  if(empty($set['showtype'])) { ?>checked<?php  } ?>> 展开内容</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="1" <?php  if(!empty($set['showtype'])) { ?>checked<?php  } ?>> 跳转详情页</label>
            <?php  } else { ?>
            <div class="form-control-static"><?php  if(empty($set['showtype'])) { ?> 展开内容<?php  } else { ?>跳转详情页<?php  } ?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">分享设置</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <label class="radio-inline"><input type="radio" name="share" value="0" <?php  if(empty($set['share'])) { ?>checked<?php  } ?>> 商城首页</label>
            <label class="radio-inline"><input type="radio" name="share" value="1" <?php  if(!empty($set['share'])) { ?>checked<?php  } ?>> 当前页面</label>
            <?php  } else { ?>
            <div class="form-control-static"><?php  if(empty($set['share'])) { ?> 商城首页<?php  } else { ?>当前页面<?php  } ?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group splitter"></div>

    <div class="form-group">
        <label class="col-sm-2 control-label">页面链接(点击复制)</label>
        <div class="col-sm-9 col-xs-12">
            <div class="form-control-static">
                <a data-href="<?php  echo mobileUrl('qa', null, true)?>" class="js-clip"><?php  echo mobileUrl('qa', null, true)?></a>
                <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"
                      data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='链接二维码'>" data-placement="auto right">
                    <i class="glyphicon glyphicon-qrcode"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">入口关键字</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <input type="text" class="form-control valid" name="keyword" value="<?php  echo $set['keyword'];?>" placeholder="">
            <?php  } else { ?>
            <div class="form-control-static"><?php  echo $set['keyword'];?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">入口标题</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <input type="text" class="form-control valid" name="enter_title" value="<?php  echo $set['enter_title'];?>" placeholder="">
            <?php  } else { ?>
            <div class="form-control-static"><?php  echo $set['enter_title'];?></div>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">入口图片</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <?php  echo tpl_form_field_image('enter_img', $set['enter_img'])?>
            <?php  } else { ?>
            <img width="150" class="img-responsive img-thumbnail" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" src="<?php  echo tomedia($set['enter_img'])?>">
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">入口介绍</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('qa.set.save')) { ?>
            <textarea name="enter_desc" class="form-control valid" rows="4" placeholder="" style="padding: 5px;"><?php  echo $set['enter_desc'];?></textarea>
            <?php  } else { ?>
            <div class="form-control-static"><?php  echo $set['enter_desc'];?></div>
            <?php  } ?>
        </div>
    </div>

    <?php if(cv('qa.set.save')) { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <input type="submit" value="提交" class="btn btn-primary">
        </div>
    </div>
    <?php  } ?>

</form>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>