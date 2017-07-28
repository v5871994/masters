<?php defined('IN_IA') or exit('Access Denied');?><!-- 商品信息块 -->
<div class="fui-cell-group fui-detail-group" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; margin-bottom: <?php  echo $diyitem['style']['marginbottom'];?>px; background: <?php  echo $diyitem['style']['background'];?>;" >
    <div class="fui-cell">
        <div class="fui-cell-text name" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;"><?php  if($goods['ispresell']==1) { ?><i class="fui-tag fui-tag-danger" style="vertical-align: bottom;">预</i> <?php  } ?><?php  echo $goods['title'];?></div>
        <?php  if(empty($diyitem['params']['hideshare'])) { ?>
            <a class="fui-cell-remark share"  <?php  if(!empty($diyitem['params']['share_link'])) { ?>href="<?php  echo $diyitem['params']['share_link'];?>" data-nocache="true"<?php  } else if(!empty($goods['sharebtn']) && $member['isagent']==1 && $member['status']==1) { ?> href="<?php  echo mobileUrl('commission/qrcode', array('goodsid'=>$goods['id']))?>" <?php  } else { ?> id='btn-share' <?php  } ?>>
            <i class="icon <?php echo empty($diyitem['params']['share_icon'])?'icon-share':$diyitem['params']['share_icon']?>"></i><p><?php echo !empty($diyitem['params']['share'])?$diyitem['params']['share']:"分享"?></p>
            </a>
        <?php  } ?>
    </div>
    <?php  if(!empty($goods['subtitle'])) { ?>
    <div class="fui-cell goods-subtitle">
        <span class='text-danger' style="color: <?php  echo $diyitem['style']['subtitlecolor'];?>;"><?php  echo $goods['subtitle'];?></span>
    </div>
    <?php  } ?>

    <?php  if(empty($seckillinfo)) { ?>

    <div class="fui-cell">
        <div class="fui-cell-text price">
			<span class="text-danger">
			￥<?php  if($goods['ispresell']>0 && ($goods['preselltimeend'] == 0 || $goods['preselltimeend'] > time())) { ?><?php  echo $goods['presellprice'];?>
                <?php  } else { ?>
                    <?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?>
                <?php  } ?>
			<?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
			     <span class="original">￥<?php  echo $goods['productprice'];?></span>
			<?php  } else { ?>
			<?php  if($goods['productprice']>0) { ?><span  class="original">￥<?php  echo $goods['productprice'];?></span><?php  } ?>
			<?php  } ?>
			</span>
        </div>
    </div>


        <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
        <div class="row row-time">
            <div id='discount-container' class='fui-labeltext fui-labeltext-danger' style="border-color: <?php  echo $diyitem['style']['timecolor'];?>;"
                 data-now="<?php  echo date('Y-m-d H:i:s')?>"
                 data-end="<?php  echo date('Y-m-d H:i:s', $goods['isdiscount_time'])?>"
                 data-end-label='<?php echo empty($goods['isdiscount_title'])?'促销':$goods['isdiscount_title']?>' >
            <div class='label' style="background: <?php  echo $diyitem['style']['timecolor'];?>;"><?php echo empty($goods['isdiscount_title'])?'促销':$goods['isdiscount_title']?></div>
            <div class='text'><span class="day number text-danger" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;">-</span><span class="time">天</span><span class="hour number text-danger" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;">-</span><span class="time">小时</span><span class="minute number text-danger" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;">-</span><span class="time">分</span><span class="second number text-danger" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;">-</span><span class="time">秒</span>
            </div>
        </div>
    </div>
    <?php  } ?>


<?php  if($goods['istime']) { ?>
<div class="row row-time">
    <div id='time-container' class='fui-labeltext fui-labeltext-danger' style="border-color: <?php  echo $diyitem['style']['timecolor'];?>";
         data-now="<?php  echo date('Y-m-d H:i:s')?>"
         data-start-label='距离限时购开始'
         data-end-label='距离限时购结束'
         data-end-text='活动已经结束，下次早点来~'
         data-start="<?php  echo date('Y-m-d H:i:s', $goods['timestart'])?>"
         data-end="<?php  echo date('Y-m-d H:i:s', $goods['timeend'])?>">
        <div class='label' style="background: <?php  echo $diyitem['style']['timecolor'];?>;">限时购</div>
        <div class='text'>
            <span class="day number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span>
            <span class="time">天</span>
            <span class="hour number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span>
            <span class="time">小时</span>
            <span class="minute number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span>
            <span class="time">分</span>
            <span class="second number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span>
            <span class="time">秒</span>
        </div>
    </div>
</div>
<?php  } ?>
<?php  } ?>

<?php  if($goods['ispresell']==1 && ($goods['preselltimestart'] > time() || $goods['preselltimeend'] > time())) { ?>
<div class="row row-time">
    <div id='time-presell' class='fui-labeltext fui-labeltext-danger'
         data-now="<?php  echo date('Y-m-d H:i:s')?>"
         data-start-label='距离预售开始'
         data-end-label='距离预售结束'
         data-end-text='活动已经结束，下次早点来~'
         data-start="<?php  echo date('Y-m-d H:i:s', $goods['preselltimestart'])?>"
         data-end="<?php  echo date('Y-m-d H:i:s', $goods['preselltimeend'])?>" style="border-color: <?php  echo $diyitem['style']['timecolor'];?>">
        <div class='label' style="background: <?php  echo $diyitem['style']['timecolor'];?>;">预售</div>
        <div class='text'>
            <span class="day number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span><span class="time">天</span><span class="hour number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span><span class="time">小时</span><span class="minute number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span><span class="time">分</span><span class="second number" style="color: <?php  echo $diyitem['style']['timetextcolor'];?>;"></span><span class="time">秒</span>
        </div>
    </div>
</div>
<?php  } ?>

<div class="fui-cell">
    <div class="fui-cell-text flex">
        <?php  if(is_array($goods['dispatchprice'])) { ?>
        <?php  if($goods['type']==1) { ?>
        <span style="color: <?php  echo $diyitem['style']['textcolor'];?>;">快递:  <?php  echo number_format($goods['dispatchprice']['min'],2)?> ~ <?php  echo number_format($goods['dispatchprice']['max'],2)?></span>
        <?php  } ?>
        <?php  } else { ?>
        <?php  if($goods['type']==1) { ?>
        <span style="color: <?php  echo $diyitem['style']['textcolor'];?>;">快递:  <?php echo $goods['dispatchprice'] == 0 ? '包邮' : number_format($goods['dispatchprice'],2)?></span>
        <?php  } ?>
        <?php  } ?>
        <?php  if($goods['showtotal'] == 1) { ?>
        <span style="color: <?php  echo $diyitem['style']['textcolor'];?>;">库存:  <?php  echo $goods['total'];?></span>
        <?php  } ?>
        <span style="color: <?php  echo $diyitem['style']['textcolor'];?>;">销量:  <?php  echo number_format($goods['sales'],0)?> <?php  echo $goods['unit'];?></span>
        <?php  if($goods['province'] != '请选择省份' && $goods['city'] != '请选择城市') { ?>
        <span style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $goods['province'];?> <?php  echo $goods['city'];?></span>
        <?php  } ?>
    </div>
</div>
</div>