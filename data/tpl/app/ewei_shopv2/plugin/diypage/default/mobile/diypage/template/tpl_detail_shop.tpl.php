<?php defined('IN_IA') or exit('Access Denied');?><div class="fui-cell-group fui-shop-group">
    <div class='fui-list'>
        <div class="fui-list-media <?php  echo $diyitem['params']['logostyle'];?>">
            <img data-lazy="<?php  echo tomedia($shopdetail['logo'])?>" />
        </div>
        <div class='fui-list-inner'>
            <div class='title' style="color: <?php  echo $diyitem['style']['shopnamecolor'];?>;"><?php  echo $shopdetail['shopname'];?></div>
            <div class='subtitle' style="color: <?php  echo $diyitem['style']['shopdesccolor'];?>;"><?php  echo $shopdetail['description'];?></div>
        </div>
    </div>
    <?php  if(empty($diyitem['params']['hidenum'])) { ?>
    <div class="fui-cell">
        <div class="fui-cell-text center" style="color: <?php  echo $diyitem['style']['goodsnumcolor'];?>;"><?php  echo $statics['all'];?><p style="color: <?php  echo $diyitem['style']['goodstextcolor'];?>;">全部</p></div>
        <div class="fui-cell-text center" style="color: <?php  echo $diyitem['style']['goodsnumcolor'];?>;"><?php  echo $statics['new'];?><p style="color: <?php  echo $diyitem['style']['goodstextcolor'];?>;">新品</p></div>
        <div class="fui-cell-text center" style="color: <?php  echo $diyitem['style']['goodsnumcolor'];?>;"><?php  echo $statics['discount'];?><p style="color: <?php  echo $diyitem['style']['goodstextcolor'];?>;">促销</p></div>
    </div>
    <?php  } ?>
    <div class="fui-cell btns">
        <div class="fui-cell-text center">
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl1'];?><?php  if(!empty($_GPC['frommyshop'])) { ?>&frommyshop=1<?php  } ?>" style="border-color: <?php  echo $diyitem['style']['leftnavcolor'];?>; color: <?php  echo $diyitem['style']['leftnavcolor'];?>;"><?php  if(!empty($shopdetail['btntext1'])) { ?><?php  echo $shopdetail['btntext1'];?><?php  } else { ?>全部商品<?php  } ?></a>
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl2'];?>" style="border-color: <?php  echo $diyitem['style']['rightnavcolor'];?>; color: <?php  echo $diyitem['style']['rightnavcolor'];?>;"><?php  if(!empty($shopdetail['btntext2'])) { ?><?php  echo $shopdetail['btntext2'];?><?php  } else { ?>进店逛逛<?php  } ?></a>
        </div>
    </div>
</div>