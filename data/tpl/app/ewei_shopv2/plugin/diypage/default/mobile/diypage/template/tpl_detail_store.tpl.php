<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($stores)) { ?>
<script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
<div class='fui-according-group' style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px; margin-bottom: <?php  echo $diyitem['style']['marginbottom'];?>px; background: <?php  echo $diyitem['style']['background'];?>;">
    <div class='fui-according'>
        <div class='fui-according-header'>
            <i class='icon icon-shop' style="color: <?php  echo $diyitem['style']['titlecolor'];?>;"></i>
            <span class="text" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;">适用门店</span>
            <span class="remark"><div class="badge"><?php  echo count($stores)?></div></span>
        </div>
        <div class="fui-according-content store-container">
            <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
            <div  class="fui-list store-item" data-lng="<?php  echo floatval($item['lng'])?>" data-lat="<?php  echo floatval($item['lat'])?>">
                <div class="fui-list-media">
                    <i class='icon icon-shop'></i>
                </div>
                <div class="fui-list-inner store-inner">
                    <div class="title" style="color: <?php  echo $diyitem['style']['shopnamecolor'];?>;"><span class='storename'><?php  echo $item['storename'];?></span></div>
                    <div class="text" style="color: <?php  echo $diyitem['style']['shopiconcolor'];?>;">地址: <span class='realname'><?php  echo $item['address'];?></span></div>
                    <div class="text">电话: <span class='address'><?php  echo $item['tel'];?></span></div>
                </div>
                <div class="fui-list-angle ">
                    <?php  if(!empty($item['tel'])) { ?><a href="tel:<?php  echo $item['tel'];?>" class='external '><i class=' icon icon-phone' style="color: <?php  echo $diyitem['style']['navtelcolor'];?>"></i></a><?php  } ?>
                    <a href="<?php  echo mobileUrl('store/map',array('id'=>$item['id'],'merchid'=>$item['merchid']))?>" class='external' ><i class='icon icon-location' style="color: <?php  echo $diyitem['style']['navlocationcolor'];?>;"></i></a>
                </div>
            </div>
            <?php  } } ?>
        </div>
        <div id="nearStore" style="display:none">
            <div class='fui-list store-item'  id='nearStoreHtml'></div>
        </div>
    </div></div>
<?php  } ?>