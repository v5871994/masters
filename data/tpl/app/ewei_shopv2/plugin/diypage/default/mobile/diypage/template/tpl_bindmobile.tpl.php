<?php defined('IN_IA') or exit('Access Denied');?><div class="fui-cell-group fui-cell-click" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; background-color: <?php  echo $diyitem['style']['background'];?>;">
    <a class="fui-cell" href="<?php  echo $diyitem['params']['linkurl'];?>" data-nocache="true">
        <?php  if(!empty($diyitem['params']['iconclass'])) { ?>
            <div class="fui-cell-icon" style="color: <?php  echo $diyitem['style']['iconcolor'];?>;"><i class="icon <?php  echo $diyitem['params']['iconclass'];?>"></i></div>
        <?php  } ?>
        <div class="fui-cell-text" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;"><?php  if(!empty($diyitem['params']['title'])) { ?><?php  echo $diyitem['params']['title'];?><?php  } else { ?>绑定手机号<?php  } ?></div>
        <div class="fui-cell-remark"></div>
    </a>
    <?php  if(!empty($diyitem['params']['text'])) { ?>
        <div class="fui-cell-tip" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['text'];?></div>
    <?php  } ?>
</div>