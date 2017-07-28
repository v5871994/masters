<?php defined('IN_IA') or exit('Access Denied');?>
<div class="detail-sale" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; margin-bottom: <?php  echo $diyitem['style']['marginbottom'];?>px;">

    <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $saledata) { ?>

        <?php  if($saledata['type']=='yushou') { ?>

            <?php  if($goods['ispresell']==1 && ( $goods['preselltimeend'] > time() ||  $goods['preselltimeend'] == 0)) { ?>
            <div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0'>
                <div class="fui-list">
                    <div class="fui-list-media">
                        <div class='fui-cell-text'>
                            <span class="fui-label fui-label-safety">预售</span>
                        </div>
                    </div>
                    <div class="fui-list-inner" style="font-size:0.65rem; color: <?php  echo $diyitem['style']['textcolor'];?>;">
                        <?php  if($goods['preselltimeend'] > 0) { ?>
                        结束时间：<?php  echo date('m月d日 H:i:s', $goods['preselltimeend'])?><br />
                        <?php  } ?>
                        预计发货：<?php  if($goods['presellsendtype']>0) { ?>购买后<span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $goods['presellsendtime'];?></span>天发货<?php  } else { ?><span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo date('m月d日', $goods['presellsendstatrttime'])?></span><?php  } ?>
                    </div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='erci') { ?>

            <?php  if(floatval($goods['buyagain'])>0 && empty($seckillinfo)) { ?>
            <div class="fui-cell-group  fui-sale-group" style="margin-top:0; background: <?php  echo $diyitem['style']['background'];?>;">
                <div class="fui-cell">
                    <div class="fui-cell-text" style="white-space: normal; color: <?php  echo $diyitem['style']['textcolor'];?>;">此商品二次购买 可享受 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $goods['buyagain'];?></span> 折优惠
                        <?php  if(empty($goods['buyagain_sale'])) { ?>
                        <br>二次购买的时候 不与其他优惠共享
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='huiyuan' && empty($seckillinfo)) { ?>

            <?php  if(empty($goods['isdiscount']) || (!empty($goods['isdiscount']) &&$goods['isdiscount_time']<time())) { ?>
                <?php  if(!empty($memberprice) && $memberprice!=$goods['minprice'] && !empty($level)) { ?>
                <div class="fui-cell-group  fui-sale-group" style="margin-top:0; background: <?php  echo $diyitem['style']['background'];?>;">
                    <div class="fui-cell">
                        <div class="fui-cell-text" style="white-space: normal; color: <?php  echo $diyitem['style']['textcolor'];?>;">您的会员等级是 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $level['levelname'];?></span> 可享受 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;">￥<?php  echo $memberprice;?></span> 的价格</div>
                    </div>
                </div>
                <?php  } ?>
            <?php  } ?>

        <?php  } else if($saledata['type']=='jifen') { ?>

            <?php  if((!empty($goods['deduct']) && $goods['deduct'] != '0.00')  || !empty($goods['credit'])) { ?>
            <div class='fui-cell-group  fui-sale-group' style='margin-top:0; background: <?php  echo $diyitem['style']['background'];?>;'>
                <div class='fui-cell'>
                    <div class='fui-cell-text' style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $_W['shopset']['trade']['credittext'];?> <?php  if(!empty($goods['deduct']) && $goods['deduct'] != '0.00') { ?>最高抵扣 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $goods['deduct'];?></span> 元<?php  } ?> <?php  if(!empty($goods['credit'])) { ?>购买赠送 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $goods['credit'];?></span> <?php  echo $_W['shopset']['trade']['credittext'];?><?php  } ?></div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='bupeisong') { ?>

            <?php  if($has_city) { ?>
            <div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0; background: <?php  echo $diyitem['style']['background'];?>;' id="city-picker">
                <div class='fui-cell'>
                    <div class='fui-cell-text' style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  if(empty($onlysent)) { ?>不<?php  } else { ?>只<?php  } ?>配送区域:
                        <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
                        <?php  echo $item;?>
                        <?php  } } ?>
                    </div>
                    <div class='fui-cell-remark'></div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='youhui' && empty($seckillinfo)) { ?>

            <?php  if($hasSales) { ?>
            <div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0; background: <?php  echo $diyitem['style']['background'];?>;' id="sale-picker">
                <div class='fui-cell'>
                    <div class='fui-cell-text' style="color: <?php  echo $diyitem['style']['textcolor'];?>;">优惠
                        <?php  if($enoughfree && $enoughfree==-1) { ?>
                        全场包邮
                        <?php  } else { ?>
                        <?php  if($goods['ednum']>0) { ?>单品满 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?'件':$goods['unit']?>包邮<?php  } ?>
                        <?php  if($goods['edmoney']>0) { ?>单品满 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;">￥<?php  echo $goods['edmoney'];?></span> 包邮<?php  } ?>
                        <?php  if($enoughfree) { ?>全场满 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;">￥<?php  echo $enoughfree;?></span> 包邮<?php  } ?>
                        <?php  } ?>
                        <?php  if($enoughs && count($enoughs)>0) { ?>
                        全场满 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;">￥<?php  echo $enoughs[0]['enough'];?></span> 立减 <span class="text-danger" style="color: <?php  echo $diyitem['style']['textcolorhigh'];?>;">￥<?php  echo $enoughs[0]['money'];?></span>
                        <?php  } ?>
                    </div>
                    <div class='fui-cell-remark'></div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='biaoqian') { ?>

            <?php  if($hasServices || $labelname) { ?>
            <div class="fui-cell-group fui-option-group" style="margin-top:0;">
                <div class="goods-label-demo">
                    <div class="goods-label-list
                            <?php  if(empty($style['style'])) { ?>goods-label-style1
                            <?php  } else if($style['style']==1) { ?>goods-label-style2
                            <?php  } else if($style['style']==2) { ?>goods-label-style3
                            <?php  } else if($style['style']==3) { ?>goods-label-style4
                            <?php  } else if($style['style']==4) { ?>goods-label-style5<?php  } ?>" style="background: <?php  echo $diyitem['style']['background'];?>;">
                        <?php  if($goods['cash']==2) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>货到付款</strong></span><?php  } ?>
                        <?php  if($goods['quality']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>正品保证</strong></span><?php  } ?>
                        <?php  if($goods['repair']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>保修</strong></span><?php  } ?>
                        <?php  if($goods['invoice']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>发票</strong></span><?php  } ?>
                        <?php  if($goods['seven']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>7天退换</strong></span><?php  } ?>
                        <?php  if($labelname) { ?>
                        <?php  if(is_array($labelname)) { foreach($labelname as $item) { ?>
                        <span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $item;?></strong></span>
                        <?php  } } ?>
                        <?php  } ?>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='coupon') { ?>
            <?php  if(com('coupon')&&$coupons) { ?>
                <div class="fui-cell-group fui-cell-click">
                    <div class="fui-cell">
                        <div class="fui-cell-text coupon-selector">领取可用优惠券</div>
                        <div class="fui-cell-remark"></div>
                    </div>
                </div>
            <?php  } ?>

        <?php  } else if($saledata['type']=='zengpin') { ?>

            <?php  if($gifts && $goods['total'] > 0) { ?>
            <div class='fui-cell-group fui-sale-group' style='margin-top:0'>
                <div class='fui-cell'>
                    <?php  if(count($gifts)>1) { ?>
                    <div class='fui-cell-text fui-cell-giftclick'>
                        赠品: <label id="gifttitle">请选择赠品</label>
                        <input type="hidden" name="giftid" id="giftid" value="">
                    </div>
                    <?php  } else { ?>
                    <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
                    <div class='fui-cell-text' onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/gift',array('id'=>$item['id']))?>'">
                        赠品:<?php  echo $gifttitle;?><input type="hidden" name="giftid" id="giftid" value="<?php  echo $item['id'];?>">
                    </div>
                    <?php  } } ?>
                    <?php  } ?>
                    <div class='fui-cell-remark'></div>
                </div>
            </div>
            <?php  } ?>

        <?php  } ?>

    <?php  } } ?>
</div>