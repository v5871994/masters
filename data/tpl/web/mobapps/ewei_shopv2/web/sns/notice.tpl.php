<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='page-heading'><h2>通知设置</h2></div>
 <div class='alert alert-info'>
                    请将公众平台模板消息所在行业选择为： IT科技/互联网|电子商务
</div>
 
    <form <?php if(cv('sns.notice.edit')) { ?> action="" method="post" <?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data" >
        <input type='hidden' name='setid' value="<?php  echo $set['id'];?>" />
        <input type='hidden' name='op' value="notice" />
        <div class="panel panel-default">

            <div class='panel-body'>

                <div class="form-group">
                    <label class="col-sm-2 control-label">任务处理通知</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('commission.notice.edit')) { ?>
                        <input type="text" name="tm[templateid]" class="form-control" value="<?php  echo $set['tm']['templateid'];?>" />
                        <div class="help-block">公众平台模板消息编号: OPENTM200605630 </div>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $data['tm']['templateid'];?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">会员升级通知标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sns.notice.edit')) { ?>
                        <input type="text" name="tm[upgrade_title]" class="form-control" value="<?php  echo $set['tm']['upgrade_title'];?>" />
                        <div class="help-block">默认为 "社区等级升级"</div>
                        <?php  } else { ?>
	                        <div class="form-control-static"><?php  echo $set['tm']['upgrade_title'];?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">会员升级通知内容</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sns.notice.edit')) { ?>
                        <textarea class="form-control" name="tm[upgrade_content]"><?php  echo $set['tm']['upgrade_content'];?></textarea>
                        <span class="help-block">变量: [昵称] [新等级] [旧等级] [时间]</span>
                        <?php  } else { ?>
                        <div class="form-control-static"><?php  echo $set['tm']['upgrade_content'];?></div>
                        <?php  } ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">评论通知标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sns.notice.edit')) { ?>
                        <input type="text" name="tm[reply_title]" class="form-control" value="<?php  echo $set['tm']['reply_title'];?>" />
                        <div class="help-block">默认为 "您的话题有新的评论"</div>
                        <?php  } else { ?>
                        <div class="form-control-static"><?php  echo $set['tm']['reply_title'];?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">评论通知内容</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if(cv('sns.notice.edit')) { ?>
                        <textarea class="form-control" name="tm[reply_content]"><?php  echo $set['tm']['reply_content'];?></textarea>
                        <span class="help-block">变量: [版块] [话题] [评论者] [内容] [时间] </span>
                        <?php  } else { ?>
                        <div class="form-control-static"><?php  echo $set['tm']['reply_content'];?></div>
                        <?php  } ?>
                    </div>
                </div>


                 	  
                 <div class="form-group"></div>
            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if(cv('sns.notice.edit')) { ?>
                            <input type="submit" value="提交" class="btn btn-primary"  />
                            
                          <?php  } ?>
                     </div>
            </div>
                       

            </div>
           
        </div>     
    </form>
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>     