<?php defined('IN_IA') or exit('Access Denied');?>                <div class="form-group key_item">
                    
                    <label class="col-sm-2 control-label must">自定义键</label>

                      <?php if( ce('messages.template' ,$list) ) { ?>
                    <div class="col-sm-9" style="padding:0;padding-left:15px;">
                        <input type="text" name="tp_kw[]" class="form-control" value="<?php  echo $list2['keywords'];?><?php  echo $tpkw;?>" placeholder="键名"  />
                    </div> 
                  
                     <?php  } else { ?>
                       <div class="col-sm-9 col-xs-12">
                             <div class='form-control-static'><?php  echo $list2['keywords'];?></div>
                      </div>
                     <?php  } ?>
                </div>

            <div class="form-group key_item">
                    
                    <label class="col-sm-2 control-label"></label>

                      <?php if( ce('messages.template' ,$list) ) { ?>
                   
                    <div class="col-sm-7"  style="padding:0;padding-left:15px;">
                        <textarea name="tp_value[]" class="form-control" placeholder="键值"><?php  echo $list2['value'];?></textarea>
                    </div>
		   <div class="col-sm-1" style="padding:0">
			     <input type="color" name="tp_color[]" value="<?php  echo $list2['color'];?>" style="width:32px;height:32px;" />
                    </div>
                     <a class="btn btn-default" href='javascript:;' onclick="$(this).closest('.key_item').remove()"><i class='fa fa-remove'></i> 删除</a>
                     <?php  } else { ?>
                       <div class="col-sm-9 col-xs-12">
                             <div class='form-control-static'>内容: <?php  echo $list2['value'];?>  颜色: <?php  echo $list2['color'];?></div>
                      </div>
                     <?php  } ?>
                </div>
  