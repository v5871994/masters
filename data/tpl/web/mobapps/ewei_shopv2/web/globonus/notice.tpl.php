<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .select2{
        margin:0;
        width:100%;
        height:34px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice{
        height: 34px;
        line-height: 32px;
        border-radius: 3px;
        border-color: rgb(229, 230, 231);
    }
    .select2 .select2-choice .select2-arrow{
        background: #fff;
    }
    .form-group .radio-inline{
        padding-top: 0px;;
    }
</style>
<div class="page-heading">
    <div class="pull-right" style="text-align: right;margin-top: 10px;" >
        <strong>高级模式</strong>
        <?php if(cv('globonus.notice.edit')) { ?>
        	<input class="js-switch small" type="checkbox" <?php  if(!empty($data['tm']['is_advanced'])) { ?>checked<?php  } ?>/>
        <?php  } else { ?>
        	<?php  if(!empty($data['tm']['is_advanced'])) { ?>开启<?php  } else { ?>关闭<?php  } ?>
        <?php  } ?>
    </div>
    <h2>通知设置</h2>

</div>
<form id="setform"  <?php if(cv('globonus.notice.edit')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">
    <input type="hidden" value="<?php  echo intval($data['tm']['is_advanced'])?>" name='data[is_advanced]' />
    <?php if(cv('globonus.notice.edit')) { ?>
    <div class='alert alert-success' id="advanced_alert">
        使用高级模式 , 将全部启用自定义的模板内容进行推送 ! <span class="text-danger"><a href="<?php  echo webUrl('sysset/tmessage')?>">模板库(点击进入)</a></span>
    </div>
    <div class='alert alert-info' id="normal_alert">
        默认为全部开启，用户在会员中心可自行设置是否开启, 模板消息自动替换变量
    </div>
    <?php  } ?>
    <div id="normal">
        <div class="form-group">
            <label class="col-sm-2 control-label">任务处理通知</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <input type="text" name="data[templateid]" class="form-control" value="<?php  echo $data['tm']['templateid'];?>" />
                <div class="help-block">公众平台模板消息编号: OPENTM200605630 </div>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['templateid'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">成为股东通知</label>
            <div class="col-sm-9 col-xs-12">

                <?php if(cv('globonus.notice.edit')) { ?>
                <input type="text" name="data[becometitle]" class="form-control" value="<?php  echo $data['tm']['becometitle'];?>" />
                <div class="help-block">标题，默认"成为股东通知"</div>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['becometitle'];?></div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <textarea  name="data[become]" class="form-control" ><?php  echo $data['tm']['become'];?></textarea>
                模板变量: [昵称] [时间]
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['become'];?></div>
                <?php  } ?>

            </div>
        </div>
 


        <div class="form-group">
            <label class="col-sm-2 control-label">分红发放通知</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <input type="text" name="data[paytitle]" class="form-control" value="<?php  echo $data['tm']['paytitle'];?>" />
                <div class="help-block">标题，默认"分红发放通知"</div>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['paytitle'];?></div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <textarea  name="data[pay]" class="form-control" ><?php  echo $data['tm']['pay'];?></textarea>
                模板变量 [昵称] [打款方式] [金额] [时间]
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['pay'];?></div>
                <?php  } ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">股东等级升级通知</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <input type="text" name="data[upgradetitle]" class="form-control" value="<?php  echo $data['tm']['upgradetitle'];?>" />
                <div class="help-block">标题，默认"股东等级升级通知"</div>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['upgradetitle'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('globonus.notice.edit')) { ?>
                <textarea  name="data[upgrade]" class="form-control" ><?php  echo $data['tm']['upgrade'];?></textarea>
                模板变量: [昵称] [旧等级]  [旧分红比例] [新等级] [新分红比例] [时间]
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $data['tm']['upgrade'];?></div>
                <?php  } ?>
            </div>
        </div>
    </div>
    <div id="advanced">
        <div class="form-group">
            <label class="col-sm-2 control-label">成为股东通知</label>
            <div class="col-sm-9 col-xs-12">
                <select class="select2" <?php if(cv('globonus.notice.edit')) { ?>name="data[become_advanced]"<?php  } else { ?>disabled<?php  } ?>>
                    <option value=''>从模板消息库中选择</option>
                    <?php  if(is_array($template_list)) { foreach($template_list as $template_val) { ?>
                    <option value="<?php  echo $template_val['id'];?>" <?php  if($data['tm']['become_advanced'] == $template_val['id'] ) { ?>selected<?php  } ?>><?php  echo $template_val['title'];?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>
        <div class="form-group-title">升级通知</div>
        <div class="form-group">
            <label class="col-sm-2 control-label">股东等级升级通知</label>
            <div class="col-sm-9 col-xs-12">
                <select class="select2" <?php if(cv('globonus.notice.edit')) { ?>name="data[upgrade_advanced]"<?php  } else { ?>disabled<?php  } ?>>
                <option value=''>从模板消息库中选择</option>
                <?php  if(is_array($template_list)) { foreach($template_list as $template_val) { ?>
                <option value="<?php  echo $template_val['id'];?>" <?php  if($data['tm']['upgrade_advanced'] == $template_val['id'] ) { ?>selected<?php  } ?>><?php  echo $template_val['title'];?></option>
                <?php  } } ?>
                </select>
            </div>
        </div>

        <div class="form-group-title">分红通知</div>
        <div class="form-group">
            <label class="col-sm-2 control-label">分红发放通知</label>
            <div class="col-sm-9 col-xs-12">
                <select class="select2" <?php if(cv('globonus.notice.edit')) { ?>name="data[pay_advanced]"<?php  } else { ?>disabled<?php  } ?>>
                    <option value=''>从模板消息库中选择</option>
                    <?php  if(is_array($template_list)) { foreach($template_list as $template_val) { ?>
                    <option value="<?php  echo $template_val['id'];?>" <?php  if($data['tm']['pay_advanced'] == $template_val['id'] ) { ?>selected<?php  } ?>><?php  echo $template_val['title'];?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>


    </div>
    <?php if(cv('globonus.notice.edit')) { ?>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <input type="submit" value="提交" class="btn btn-primary" />
        </div>
    </div>
    <?php  } ?>
</form>
<script>
    $(function () {
        $(".js-switch").click(function () {
            $(":input[name='data[is_advanced]']").val( this.checked ?1:0);
            if (this.checked)
            {
                $("#advanced,#advanced_alert").show();
                $("#normal,#normal_alert").hide();
            }
            else
            {
                $("#advanced,#advanced_alert").hide();
                $("#normal,#normal_alert").show();
            }
        })

        if($(":input[name='data[is_advanced]']").val() == 1)
        {
            $("#advanced,#advanced_alert").show();
            $("#normal,#normal_alert").hide();
        }
        else
        {
            $("#advanced,#advanced_alert").hide();
            $("#normal,#normal_alert").show();
        }
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>