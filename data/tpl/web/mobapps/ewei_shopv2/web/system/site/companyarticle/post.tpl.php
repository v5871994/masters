<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> 
	
	<span class='pull-right'>
		
		<?php if(cv('system.site.companyarticle.add')) { ?>
                            <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('system/site/companyarticle/add')?>">添加新内容</a>
		<?php  } ?>
                
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('system/site/companyarticle')?>">返回列表</a>
                
                
	</span>
	<h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>幻灯片 <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?></small></h2>
</div>
 
 
    <form <?php if( ce('system.site.companyarticle' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
 
                <div class="form-group">
                    <label class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                                <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>" />
                                <span class='help-block'>数字越大，排名越靠前</span>
                        <?php  } else { ?>
                            <div class='form-control-static'><?php  echo $item['displayorder'];?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label must">文章分类</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                        <select name='cate' id="cate" class='form-control select2'>
                            <option value=''></option>
                            <?php  if(is_array($category)) { foreach($category as $k => $c) { ?>
                            <option value='<?php  echo $k;?>' <?php  if($item['cate']==$k) { ?>selected<?php  } ?>><?php  echo $c['name'];?></option>
                            <?php  } } ?>
                        </select>
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  if(empty($item['cate'])) { ?>暂时无分类<?php  } else { ?> <?php  echo $category[$item['cate']]['name'];?><?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label must">文章标题</label>
                    <div class="col-sm-9 col-xs-12 ">
                        <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                        <input type="text" id='title' name="title" class="form-control" value="<?php  echo $item['title'];?>" data-rule-required="true" />
                        <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $item['title'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">作者</label>
                    <div class="col-sm-9 col-xs-12 ">
                         <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                        <input type="text" name="author" class="form-control" value="<?php  echo $item['author'];?>"/>
                         <?php  } else { ?>
                        <div class='form-control-static'><?php  echo $item['author'];?></div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">文章列表图片</label>
                    <div class="col-sm-9 col-xs-12">
                         <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                        <?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
                        <span class='help-block'>建议尺寸:640 * 350 , 请将所有幻灯片图片尺寸保持一致</span>
                        <?php  } else { ?>
                            <?php  if(!empty($item['thumb'])) { ?>
                                  <a href='<?php  echo tomedia($item['thumb'])?>' target='_blank'>
                            <img src="<?php  echo tomedia($item['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                                  </a>
                            <?php  } ?>
                        <?php  } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">文章内容</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_ueditor('content',$item['content'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-9 col-xs-12">
                            <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                        <label class='radio-inline'>
                            <input type='radio' name='status' value='1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 显示
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='status' value='0' <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 隐藏
                        </label>
                     <?php  } else { ?>
                            <div class='form-control-static'><?php  if(empty($item['status'])) { ?>隐藏<?php  } else { ?>显示<?php  } ?></div>
                        <?php  } ?>
                    </div>
                </div>
            
            <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                           <?php if( ce('system.site.companyarticle' ,$item) ) { ?>
                            <input type="submit" value="提交" class="btn btn-primary"  />
                            
                        <?php  } ?>
                       <input type="button" name="back" onclick='history.back()' <?php if(cv('system.site.companyarticle.add|system.site.companyarticle.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />
                    </div>
            </div>
 
    </form>
 

<script language='javascript'>
    $('form').submit(function(){
        if ($("#cate").isEmpty()) {
            $('form').attr('stop',1);
            tip.msgbox.err("请填写文章分类!");
            return false;
        }
        $('form').removeAttr('stop');
        return true;
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>