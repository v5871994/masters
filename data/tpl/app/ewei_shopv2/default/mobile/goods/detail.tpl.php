<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .fui-cell-group{width:100%;}
</style>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">
<!--<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/160714pnewdetail.css">-->
<style>

.page-goods-detail .fui-comment-group .fui-cell .comment .info .star .shine{color:#3cb4b9 !important}
.page-goods-detail .fui-comment-group .fui-cell .comment .info{color:#3cb4b9 }
.text-danger{color:#3cb4b9}
.fui-page, .fui-page-group{background:#F2F2F2}
.page-goods-detail .follow_topbar ~ .detail-block.in {
    -webkit-transform: translate3d(0, -2rem, 0);
    transform: translate3d(0, -2rem, 0);
    bottom: 0;
}

.fui-page .fui-header div{height:2rem;position:absolute}
.fui-page .fui-header div a{height:2rem;line-height:2rem}
.title .fui-tab a{height:2rem;line-height:2rem;font-size:0.7rem;background:white}

.head-logo{height:3.4rem;width:100%;border-bottom:1px solid #E9E9E9;border-top:1px solid #E9E9E9;position:absolute;display:flex;background:white;z-index:10 }
.head-logo  i{display:block}
.head-logo  div{display:flex}
.head-logo .left{flex:1;height:100%;align-items:center;}
.head-logo .left .l-i{ background:url(../addons/ewei_shopv2/static/images/head-back1.png) no-repeat ;width:1rem;height:1.2rem;background-size:1rem 1.2rem;margin-left:0.6rem}
.head-logo .middle{flex:3;height:100%;justify-content:center;align-items:center;}
.head-logo .middle .m-i{background:url(../addons/ewei_shopv2/static/images/head-logo.png) no-repeat ;width:3rem;height:2.2rem;background-size:3rem 2.2rem;}
.head-logo .right{flex:1;height:100%;align-items:center;justify-content:flex-end}
.head-logo .right .r-i{background:url(../addons/ewei_shopv2/static/images/head-more1.png) no-repeat ;width:1.2rem;height:0.3rem;background-size:1.2rem 0.3rem;margin-right:0.6rem}
.follow_topbar ~ .head-logo{top:2.6rem}
.follow_topbar ~ .fui-content {top: 6rem}
.fui-content {top: 3.4rem}
.page-goods-detail .follow_topbar ~ .fui-header {top: 6rem;}
.page-goods-detail .fui-header {top: 3.4rem;}
.page-goods-detail .follow_topbar ~ .fui-content {top: 8rem}
.page-goods-detail .fui-content {top:5.4rem;width:100%}

.page-goods-detail .fui-tab{width:100%;margin:0}
.fui-tab.fui-tab-danger a{color:#545454}
.fui-tab.fui-tab-danger a.active{border-color:#3CB6B6;color:#87C9C8}
</style>
<script>

</script>
<div class='fui-page fui-page-current  page-goods-detail' id='page-goods-detail-index'>
    

    <?php  if(empty($err)) { ?>
	<div class='head-logo'>
		<div class='left' onclick='javascript:history.go(-1)'><i class='l-i'></i></div>
		<div class='middle'><i class='m-i'></i></div>
		<div class='right'><i class='r-i'></i></div>
	</div>
    <div class="fui-header " style='height:2rem;'>
       <!-- <div class="fui-header-left">
            <a class="back" id="btn-back"></a>
        </div>-->
        <div class="title">
            <div id="tab" class="fui-tab fui-tab-danger">
                <a data-tab="tab1" class="tab active">商品</a>
                <a data-tab="tab2" class="tab">详情</a>
<!--			
                <?php  if(count($params)>0) { ?>
                <a data-tab="tab3" class="tab">参数</a>
                <?php  } ?>
-->				
                <?php  if($getComments) { ?>
                <a  data-tab="tab4" class="tab"  id="tabcomment">评价</a>
                <?php  } ?>
            </div>
        </div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } else { ?>
    <div class="fui-header ">
        <div class="fui-header-left">
            <a class="back" id="btn-back"></a>
        </div>
        <div class="title">
            找不到宝贝
        </div>
    </div>
    <?php  } ?>

    <?php  if(empty($err)) { ?>


  <?php  if(count($params)>0) { ?>
     <-- <div class="fui-content param-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
        <div class="fui-cell-group">
            <?php  if(!empty($params)) { ?>
            <?php  if(is_array($params)) { foreach($params as $p) { ?>
            <div class="fui-cell">
                <div class="fui-cell-label" ><?php  echo $p['title'];?></div>
                <div class="fui-cell-info overflow"><?php  echo $p['value'];?></div>
            </div>
            <?php  } } ?>

            <?php  } else { ?>
            <div class="fui-cell">
                <div class="fui-cell-info text-align">商品没有参数</div>
            </div>
            <?php  } ?>
        </div>
    </div>-->
    <?php  } ?>
<!--detail table-->
    <div class='fui-content comment-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>' data-getcount='1' id='comments-list-container'>
		<div class='fui-icon-group col-5 ' style='border-top:none'>
			<div class='fui-icon-col' data-level='all'><span class='text-danger'>全部<br/><span class="count"></span></span></div>
			<div class='fui-icon-col' data-level='good'><span>好评<br/><span class="count"></span></span></div>
			<div class='fui-icon-col' data-level='normal'><span>中评<br/><span class="count"></span></span></div>
			<div class='fui-icon-col' data-level='bad'><span>差评<br/><span class="count"></span></span></div>
			<div class='fui-icon-col' data-level='pic'><span>晒图<br/><span class="count"></span></span></div>
		</div>
		<div class='content-empty' style='display:none;'>
			<i class='icon icon-community'></i><br/>暂时没有任何评价
		</div>
		<div class='container' id="comments-all"></div>
		<div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
	</div>

	<div class="fui-content detail-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
	<!--	<div class="text-danger look-basic"><i class='icon icon-unfold'></i> <span>上拉返回商品详情</span></div>-->
		<div class='content-block content-images'></div>
	</div>


<div class='fui-content basic-block pulldown <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>' >


<?php  if(!empty($err)) { ?>
<div class='content-empty'>
    <i class='icon icon-search'></i><br/> 宝贝找不到了~ 您看看别的吧 ~<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'>到处逛逛</a>
</div>
<?php  } else { ?>
<?php  if($commission_data['qrcodeshare'] > 0) { ?>
<i class="icon icon-qrcode" id="alert-click"></i>
<?php  } ?>
<div class='fui-swipe goods-swipe' >
    <div class='fui-swipe-wrapper'>
        <?php  if(is_array($thumbs)) { foreach($thumbs as $thumb) { ?>
        <div class='fui-swipe-item'><img src="<?php echo EWEI_SHOPV2_PLACEHOLDER;?>"  data-lazy="<?php  echo tomedia($thumb)?>" /></div>
        <?php  } } ?>
    </div>
    <div class='fui-swipe-page'></div>
    <?php  if($goods['total']<=0 && !empty($_W['shopset']['shop']['saleout'])) { ?>
    <div class="salez">
        <img src="<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>">
    </div>
    <?php  } ?>
</div>

<?php  if(!empty($seckillinfo) ) { ?>
<div class="seckill-container <?php  if($seckillinfo['status']==1) { ?>notstart<?php  } ?>"
     data-starttime="<?php  echo $seckillinfo['starttime']-time();?>"
     data-endtime="<?php  echo $seckillinfo['endtime']-time();?>"
     data-status="<?php  echo $seckillinfo['status'];?>">
    <div class="fui-list seckill-list" style="" >
        <div class="fui-list-media seckill-price">
            &yen;<span><?php  echo $seckillinfo['price'];?></span>
        </div>
        <div class="fui-list-inner">
            <div class="text"><span class="stitle" style="white-space:nowrap; overflow:hidden; width:3.9rem;"><?php  echo $seckillinfo['tag'];?></span></div>
            <div class="text"><span class="oldprice">&yen;<?php  echo $goods['minprice'];?></span></div>
        </div>
    </div>

    <div class="fui-list seckill-list1" >
        <div class="fui-list-inner">
            <div class="text "><?php  if($seckillinfo['status']==0) { ?>已出售 <?php  echo $seckillinfo['percent'];?>%<?php  } ?></div>
            <div class="text "><?php  if($seckillinfo['status']==0) { ?><span class="process"><div class="inner" style="width:<?php  echo $seckillinfo['percent'];?>%"></div></span><?php  } ?></div>
        </div>
    </div>

    <div class="fui-list seckill-list2" style="" >
        <div class="fui-list-inner">
            <div class="text ">距<?php  if($seckillinfo['status']==1) { ?>开始<?php  } else { ?>结束<?php  } ?>还有</div>
            <div class="text timer">
                <span class="time-hour">-</span>&nbsp;:&nbsp;<span class="time-min">-</span>&nbsp;:&nbsp;<span class="time-sec">-</span>
            </div>
        </div>

    </div>


</div>
<?php  } ?>

<style>
.dv-t{margin-top:0.6rem;}
.dv-t-t{font-size:0.72rem;color:#333;}
.dv-t-s1{font-size:0.6rem;color:#adadad;padding-left:0.25rem}
.dv-t-s2{font-size:0.72rem;color:#333;font-weight:bold;}
.dv-t-s3{font-size:0.6rem;color:#3cb4b9;padding-left:0.25rem;font-weight:bold}
.dv-t-a{font-size:0.6rem;color:#C3C3C3;}
.page-goods-detail .fui-detail-group{margin-top:0.5rem}

.fui-cell-group:not(.fui-cell-group-o):before {display:none}
.fui-cell-group:after{display:none}

.cell-param{width:100%;background:white;position:relative;margin-top:0.5rem}
.cell-param-title{width:100%;padding:0.2rem 0 0.2rem 0.5rem;height:1.8rem;position:relative;margin-top:0.2rem;border-bottom:1px solid #f2f2f2;}

.cell-param-title .name{font-size:0.6rem;color:#333;width:4rem;float:left;line-height:1.5rem;height:100%}
.cell-param-title .icon{width:2rem;float:right;height:100%}
.cell-param-title .icon:after{content: " "; display: inline-block;-webkit-transform: rotate(135deg);transform: rotate(135deg); height: 0.45rem;width: 0.45rem;border-width: 2px 2px 0 0; border-color: #C8C8CD;border-style: solid;position: relative;top: -1px;margin-left: .3em;
	transition: transform .4s;
    -webkit-transition: transform .4s;
	}
.cell-param-title .icon.on:after{content: "";display: inline-block;-webkit-transform: rotate(315deg);transform: rotate(315deg); transition: transform .4s; -webkit-transition: transform .4s;}
.cell-param-text{width:100%;display:flex;padding:0.2rem 0 0.2rem 0.5rem;}
.cell-param-text .name{width:4rem;font-size:0.6rem;color:#adadad;}
.cell-param-text .content{flex:1;font-size:0.6rem;color:#333}

.cell-more{display:none;}
.cell-param-text-more{width:100%;display:flex;padding:0.2rem 0 0.2rem 0.5rem;}
.cell-param-text-more .name{width:4rem;font-size:0.72rem;color:#666}
.cell-param-text-more .content{flex:1;font-size:0.72rem;color:#333}


</style>
<div class="fui-cell-group fui-detail-group" >
    <div class="fui-cell">
        <div class="fui-cell-text dv-t " >
           <span class='dv-t-t'> <?php  echo $goods['title'];?> </span><span class='dv-t-s1'>销量 <?php  echo number_format($goods['sales'],0)?></span>
			<?php  if($goods['productprice']>0) { ?><span class="dv-t-s1">专柜价:<s>￥<?php  echo $goods['productprice'];?></s></span><?php  } ?>
        </div>
     
    </div>
   <?php  if(!empty($goods['subtitle'])) { ?>
    <div class="fui-cell goods-subtitle">
        <span class='text-danger'><?php  echo $goods['subtitle'];?></span>
    </div>
    <?php  } ?>

    <?php  if(empty($seckillinfo)) { ?>
    <div class="fui-cell">
        <div class="fui-cell-text price">
			<span class="text-danger-ex1">
		
			<span class="dv-t-s2">￥<?php  echo $goods['productprice'];?></span> 
			<?php  if($discounts_s['default']>0) { ?><span class="dv-t-s3"><?php  echo $discounts_s['default'];?>折</span><?php  } ?>
			</span>
        </div>
    </div>
	<?php  } ?>
	
<?php  if($goods['ispresell']==1 && ($goods['preselltimestart'] > time() || $goods['preselltimeend'] > time())) { ?>
<div class="row row-time">
    <div id='time-presell' class='fui-labeltext fui-labeltext-danger'
        data-now="<?php  echo date('Y-m-d H:i:s')?>"
        data-start-label='距离预售开始'
        data-end-label='距离预售结束'
        data-end-text='活动已经结束，下次早点来~'
        data-start="<?php  echo date('Y-m-d H:i:s', $goods['preselltimestart'])?>"
        data-end="<?php  echo date('Y-m-d H:i:s', $goods['preselltimeend'])?>">
        <div class='label'>预售</div>
        <div class='text'>
            <span class="day number"></span><span class="time">天</span><span class="hour number"></span><span class="time">小时</span><span class="minute number"></span><span class="time">分</span><span class="second number"></span><span class="time">秒</span>
        </div>
    </div>
</div>
<?php  } ?>

</div>


	 <?php  if(count($params)>0) { ?>
    <div class="cell-param">
			<div class="cell-param-title">
				<div class="name">商品参数</div>
				<div class="icon" id='arrow-param'></div>
			</div>
            <?php  if(!empty($params)) { ?>
            <?php  if(is_array($params)) { foreach($params as $ind=>$p) { ?>
				<?php  if($ind<3) { ?>
				<div class="cell-param-text">
					<div class="name" ><?php  echo $p['title'];?></div>
					<div class="content"><?php  echo $p['value'];?></div>
				</div>
				<?php  } ?>
            <?php  } } ?>
			<div id='param-remain' class='cell-more'>
			<?php  if(is_array($params)) { foreach($params as $ind=>$p) { ?>
				<?php  if($ind>3) { ?>
					<div class="cell-param-text">
					<div class="name" ><?php  echo $p['title'];?></div>
						<div class="content"><?php  echo $p['value'];?></div>
					</div>
				<?php  } ?>
            <?php  } } ?>
			
			</div>
			<div class="cell-param-text" style='font-size:0.6rem;color:#adadad'>
				展示图片仅供参考，产品请以实物为准
			</div>
            <?php  } else { ?>
            <div class="fui-cell">
                <div class="fui-cell-info text-align">商品没有参数</div>
            </div>
            <?php  } ?>
        
    </div>
    <?php  } ?>



<?php  if($goods['ispresell']==1 && ( $goods['preselltimeend'] > time() ||  $goods['preselltimeend'] == 0)) { ?>
<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0'>
    <div class="fui-list">
        <div class="fui-list-media">
            <div class='fui-cell-text'>
                <span class="fui-label fui-label-safety">预售</span>
            </div>
        </div>
        <div class="fui-list-inner" style="font-size:0.65rem;color:#666;">
            <?php  if($goods['preselltimeend'] > 0) { ?>
            结束时间：<?php  echo date('m月d日 H:i:s', $goods['preselltimeend'])?><br />
            <?php  } ?>
            预计发货：<?php  if($goods['presellsendtype']>0) { ?>购买后<?php  echo $goods['presellsendtime'];?>天发货<?php  } else { ?><?php  echo date('m月d日', $goods['presellsendstatrttime'])?><?php  } ?>
        </div>
    </div>
</div>
<?php  } ?>

<?php  if(com('coupon')&&$coupons) { ?>
<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell">
        <div class="fui-cell-text coupon-selector">领取可用优惠券</div>
        <div class="fui-cell-remark"></div>
    </div>
</div>
<?php  } ?>


<?php  if(empty($seckillinfo)) { ?>
<?php  if(floatval($goods['buyagain'])>0) { ?>
<div class="fui-cell-group  fui-sale-group" style="margin-top:0">
    <div class="fui-cell">
        <div class="fui-cell-text" style="white-space: normal;">此商品二次购买 可享受 <span class="text-danger"><?php  echo $goods['buyagain'];?></span> 折优惠
            <?php  if(empty($goods['buyagain_sale'])) { ?>
            <br>二次购买的时候 不与其他优惠共享
            <?php  } ?>
        </div>
    </div>
</div>
<?php  } ?>
<!--
<?php  if(empty($goods['isdiscount']) || (!empty($goods['isdiscount']) &&$goods['isdiscount_time']<time())) { ?>
<?php  if(!empty($memberprice) && $memberprice!=$goods['minprice'] && !empty($level)) { ?>
<div class="fui-cell-group  fui-sale-group" style="margin-top:0">
    <div class="fui-cell">
        <div class="fui-cell-text" style="white-space: normal;">您的会员等级是 <span class="text-danger"><?php  echo $level['levelname'];?></span> 可享受 <span class="text-danger">￥<?php  echo $memberprice;?></span> 的价格</div>
    </div>
</div>
<?php  } ?>
<?php  } ?>
-->
<?php  } ?>

<?php  if((!empty($goods['deduct']) && $goods['deduct'] != '0.00')  || !empty($goods['credit'])) { ?>
<div class='fui-cell-group  fui-sale-group' style='margin-top:0'>
    <div class='fui-cell'>
        <div class='fui-cell-text'><?php  echo $_W['shopset']['trade']['credittext'];?> <?php  if(!empty($goods['deduct']) && $goods['deduct'] != '0.00') { ?>最高抵扣 <span class="text-danger"><?php  echo $goods['deduct'];?></span> 元<?php  } ?> <?php  if(!empty($goods['credit'])) { ?>购买赠送 <span class="text-danger"><?php  echo $goods['credit'];?></span> <?php  echo $_W['shopset']['trade']['credittext'];?><?php  } ?></div>
    </div>
</div>
<?php  } ?>

<?php  if($has_city) { ?>
<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0' id="city-picker">
    <div class='fui-cell'>
        <div class='fui-cell-text'><?php  if(empty($onlysent)) { ?>不<?php  } else { ?>只<?php  } ?>配送区域:
            <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
            <?php  echo $item;?>
            <?php  } } ?>
        </div>

        <div class='fui-cell-remark'></div>
    </div>
</div>
<?php  } ?>

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

<?php  if($hasSales && empty($seckillinfo)) { ?>

<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0' id="sale-picker">
    <div class='fui-cell'>
        <div class='fui-cell-text'>优惠
            <?php  if($enoughfree && $enoughfree==-1) { ?>
            全场包邮
            <?php  } else { ?>
            <?php  if($goods['ednum']>0) { ?>单品满 <span class="text-danger"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?'件':$goods['unit']?>包邮<?php  } ?>
            <?php  if($goods['edmoney']>0) { ?>单品满 <span class="text-danger">￥<?php  echo $goods['edmoney'];?></span> 包邮<?php  } ?>
            <?php  if($enoughfree) { ?>全场满 <span class="text-danger">￥<?php  echo $enoughfree;?></span> 包邮<?php  } ?>
            <?php  } ?>
            <?php  if($enoughs && count($enoughs)>0) { ?>
            全场满 <span class="text-danger">￥<?php  echo $enoughs[0]['enough'];?></span> 立减 <span class="text-danger">￥<?php  echo $enoughs[0]['money'];?></span>
            <?php  } ?>
        </div>

        <div class='fui-cell-remark'></div>
    </div>
</div>

<?php  } ?>

<?php  if($hasServices || $labelname) { ?>
<div class="fui-cell-group fui-option-group" style='margin-top:0'>

    <div class="goods-label-demo">
        <div class="goods-label-list
        <?php  if(empty($style['style'])) { ?>goods-label-style1
        <?php  } else if($style['style']==1) { ?>goods-label-style2
        <?php  } else if($style['style']==2) { ?>goods-label-style3
        <?php  } else if($style['style']==3) { ?>goods-label-style4
        <?php  } else if($style['style']==4) { ?>goods-label-style5<?php  } ?>">
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


<?php  if(!empty($stores)) { ?>
<script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
<div class='fui-according-group'>
    <div class='fui-according'>
        <div class='fui-according-header'>
            <i class='icon icon-shop'></i>
            <span class="text">适用门店</span>
            <span class="remark"><div class="badge"><?php  echo count($stores)?></div></span>
        </div>
        <div class="fui-according-content store-container">
            <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
            <div  class="fui-list store-item"

                  data-lng="<?php  echo floatval($item['lng'])?>"
                  data-lat="<?php  echo floatval($item['lat'])?>">
                <div class="fui-list-media">
                    <i class='icon icon-shop'></i>
                </div>
                <div class="fui-list-inner store-inner">
                    <div class="title"><span class='storename'><?php  echo $item['storename'];?></span></div>
                    <div class="text">
                        地址: <span class='realname'><?php  echo $item['address'];?></span>
                    </div>
                    <div class="text">
                        电话: <span class='address'><?php  echo $item['tel'];?></span>
                    </div>
                </div>
                <div class="fui-list-angle ">
                    <?php  if(!empty($item['tel'])) { ?><a href="tel:<?php  echo $item['tel'];?>" class='external '><i class=' icon icon-phone' style='color:green'></i></a><?php  } ?>
                    <a href="<?php  echo mobileUrl('store/map',array('id'=>$item['id'],'merchid'=>$item['merchid']))?>" class='external' ><i class='icon icon-location' style='color:#f90'></i></a>
                </div>
            </div>
            <?php  } } ?>
        </div>

        <div id="nearStore" style="display:none">

            <div class='fui-list store-item'  id='nearStoreHtml'></div>
        </div>
    </div></div>
<?php  } ?>



<?php  if($goods['canbuy']) { ?>
<!--<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell">
        <div class="fui-cell-text option-selector">请选择<?php  if(empty($spec_titles)) { ?>数量<?php  } else { ?><?php  echo $spec_titles;?>等<?php  } ?></div>
        <div class="fui-cell-remark"></div>
    </div>
</div>-->

<?php  } else { ?>
<!--
<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell">
        <div class="fui-cell-text">
            <?php  if($goods['userbuy']==0) { ?>
            您已经超出最大<?php  echo $goods['usermaxbuy'];?>件购买量
            <?php  } else if($goods['levelbuy']==0) { ?>
            您当前会员等级没有购买权限
            <?php  } else if($goods['groupbuy']==0) { ?>
            您所在的用户组没有购买权限
            <?php  } else if($goods['timebuy'] ==-1) { ?>
            未到开始抢购时间!
            <?php  } else if($goods['timebuy'] ==1) { ?>
            抢购时间已经结束!
            <?php  } else if($goods['total'] <=0) { ?>
            商品已经售罄!
            <?php  } ?></div>
    </div>
</div>
-->
<?php  } ?>

<?php  if($packages && $goods['total'] > 0) { ?>
<?php  if(count($packages)<=3) { ?>
<style>
    .package-goods{padding:0.2rem 1rem;}
</style>
<div class="fui-cell-group fui-comment-group">
    <div class="fui-cell fui-cell-click">
        <div class="fui-cell-text desc">相关套餐</div>
        <div class="fui-cell-text desc label" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package',array('goodsid'=>$goods['id']))?>'">更多套餐</div>
        <div class="fui-cell-remark"></div>
    </div>
    <div class="fui-cell">
        <div class="fui-cell-text comment ">
            <div class="fui-list package-list">
                <?php  if(is_array($packages)) { foreach($packages as $item) { ?>
                <div class="fui-list-inner package-goods" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package/detail',array('pid'=>$package_goods['pid']))?>'">
                    <img src="<?php  echo tomedia($item['thumb'])?>" class="package-goods-img" alt="<?php  echo $item['title'];?>">
                    <span><?php  echo $item['title'];?></span>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
</div>
<?php  } else { ?>
<div class="fui-cell-group fui-comment-group">
    <div class="fui-cell fui-cell-click">
        <div class="fui-cell-text desc">相关套餐</div>
        <div class="fui-cell-text desc label" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package',array('goodsid'=>$goods['id']))?>'">更多套餐</div>
        <div class="fui-cell-remark"></div>
    </div>
    <div id="product" class="fui-list">
        <span class="prev fui-list-media"><i class="icon icon-left"></i></span>
        <div id="content" class="fui-list-inner">
            <div id="content_list" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package/detail',array('pid'=>$package_goods['pid']))?>'">
                <?php  if(is_array($packages)) { foreach($packages as $item) { ?>
                <dl class="package-goods package-goods3">
                    <dt><img class="package-goods-img" src="<?php  echo tomedia($item['thumb'])?>"/></dt>
                    <dd><?php  echo $item['title'];?></dd>
                </dl>
                <?php  } } ?>
            </div>
        </div>
        <span class="next fui-list-media"><i class="icon icon-right1"></i></span>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var page = 1;
        var i = 3; //每版放4个图片
        //向后 按钮
        $("span.next").click(function(){    //绑定click事件
            var content = $("div#content");
            var content_list = $("div#content_list");
            var v_width = content.width();
            var len = content.find("dl").length;
            var page_count = Math.ceil(len / i) ;   //只要不是整数，就往大的方向取最小的整数
            if( !content_list.is(":animated") ){    //判断“内容展示区域”是否正在处于动画
                if( page == page_count ){  //已经到最后一个版面了,如果再向后，必须跳转到第一个版面。
                    content_list.animate({ left : '0px'}, "slow"); //通过改变left值，跳转到第一个版面
                    page = 1;
                }else{
                    content_list.animate({ left : '-='+v_width }, "slow");  //通过改变left值，达到每次换一个版面
                    page++;
                }
            }
        });
        //往前 按钮
        $("span.prev").click(function(){
            var content = $("div#content");
            var content_list = $("div#content_list");
            var v_width = content.width();
            var len = content.find("dl").length;
            var page_count = Math.ceil(len / i) ;   //只要不是整数，就往大的方向取最小的整数
            if(!content_list.is(":animated") ){    //判断“内容展示区域”是否正在处于动画
                if(page == 1 ){  //已经到第一个版面了,如果再向前，必须跳转到最后一个版面。
                    content_list.animate({ left : '-='+v_width*(page_count-1) }, "slow");
                    page = page_count;
                }else{
                    content_list.animate({ left : '+='+v_width }, "slow");
                    page--;
                }
            }
        });
		
    });
</script>
<?php  } ?>

<script type="text/javascript">
    $(function(){
        $(".package-goods-img").height($(".package-goods-img").width());
    })
</script>
<?php  } ?>

<div id='comments-container'></div>

<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell" style='margin:0.3rem 0;padding:0.3rem 0.5rem'>
        <div class="fui-cell-text " style='font-size:0.6rem;color:#333' id="show_twxq">图文详情</div>
        <div class="fui-cell-remark"></div>
    </div>
</div>

<!--
<div class="fui-cell-group fui-shop-group">
    <div class='fui-list'>
        <div class='fui-list-media'>
            <img data-lazy="<?php  echo tomedia($shopdetail['logo'])?>" />
        </div>
        <div class='fui-list-inner'>
            <div class='title'><?php  echo $shopdetail['shopname'];?></div>
            <div class='subtitle'><?php  echo $shopdetail['description'];?></div>
        </div>
    </div>

    <div class="fui-cell">
        <div class="fui-cell-text center"><?php  echo $statics['all'];?><p>全部</p></div>
        <div class="fui-cell-text center"><?php  echo $statics['new'];?><p>新品</p></div>
        <div class="fui-cell-text center"><?php  echo $statics['discount'];?><p>促销</p></div>
    </div>
    <div class="fui-cell btns">
        <div class="fui-cell-text center">
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl1'];?>"><?php  if(!empty($shopdetail['btntext1'])) { ?><?php  echo $shopdetail['btntext1'];?><?php  } else { ?>全部商品<?php  } ?></a>
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl2'];?>"><?php  if(!empty($shopdetail['btntext2'])) { ?><?php  echo $shopdetail['btntext2'];?><?php  } else { ?>进店逛逛<?php  } ?></a>
        </div>
    </div>
</div>
-->


<?php  if($buyshow==1 && !empty($goods['buycontent'])) { ?>
<div class="fui-cell-group">
    <div class="fui-cell">
        <div class="content-block"><?php  echo $goods['buycontent'];?></div>
    </div>
</div>
<?php  } ?>

<div class="fui-cell-group">
    <!--<div class="fui-cell">
        <div class="fui-cell-text text-center look-detail"><i class='icon icon-fold'></i> <span>上拉查看图文详情</span></div>
    </div>-->
</div>
<?php  } ?>
</div>
<?php  if($isgift && $goods['total'] > 0) { ?>
<div id='gift-picker-modal' style="margin:-100%;">
    <div class='gift-picker'>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>
            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    请选择赠品:
                    <div class="dispatching-info" style="max-height:12rem;overflow-y: auto ">
                        <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
                        <div class="fui-list goods-item align-start" data-giftid="<?php  echo $item['id'];?>">
                            <div class="fui-list-media">
                                <input type="radio" name="checkbox" class="fui-radio fui-radio-danger gift-item" value="<?php  echo $item['id'];?>" style="display: list-item;">
                            </div>
                            <div class="fui-list-inner">
                                <?php  if(is_array($item['gift'])) { foreach($item['gift'] as $gift) { ?>
                                <div class="fui-list">
                                    <div class="fui-list-media image-media" style="position: initial;">
                                        <a href="javascript:void(0);">
                                            <img class="round" src="<?php  echo tomedia($gift['thumb'])?>" data-lazyloaded="true">
                                        </a>
                                    </div>
                                    <div class="fui-list-inner">
                                        <a href="javascript:void(0);">
                                            <div class="text">
                                                <?php  echo $gift['title'];?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='fui-list-angle'>
                                        <span class="price">&yen;<del class='marketprice'><?php  echo $gift['marketprice'];?></del></span>
                                    </div>
                                </div>
                                <?php  } } ?>
                            </div>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php  } ?>
<style>
.fix_shopcar{width:100%;margin:0 auto;}
.fix_shopcar div{position: fixed;bottom: 0px;width:100%;height: 2.2rem;background: #fff;z-index:22;border-top: 1px solid #e2e2e2;font-family:Arial,'华文细黑','微软雅黑';}
.fix_car_a{border-right: 1px solid #e2e2e2;height:100%;display: inline-block;line-height: 2rem;position: relative;float:left;}
.fix_car{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/icon_car.jpg) center no-repeat;width:2.2rem;height:100%;display: inline-block;background-size:50% 50%;}
.icon_car .fix_car_i,.icon_car_me .fix_car_i{border-radius:50%;width: 8px;height: 8px;display: inline-block;background:#ff8a81;position:absolute;}
.icon_car .fix_car_i,.icon_car_me .fix_car_i{top: 1%;right:-5%;}
.fix_car_a .fix_car_i{top: 10%;right: 16%;border-radius:50%;width: 21px;height: 21px;line-height:21px; text-align:center; display: inline-block;background:#ff8a81;position:absolute;color:#fff;font-size:16px;}
.fix_cnslt,.fix_incar,.fix_incarout,.fix_depay,.fix_fullpay,.fix_salout,.fix_order{color:#fff;font-size:0.8rem;text-align: center;display:inline-block;height: 100%;line-height: 2rem;}
.fix_cnslt{background:#ff8a81;}
.fix_incar{background:#de5a50;}
.fix_incarout{background:#999;}
.fix_depay{background:#ff9990;}
.fix_fullpay{background:#f6827a;}
.fix_salout{background:rgb(168,168,168);}
.fix_order{background:#f6827a;}

.qg_top{width:100%;color:black;height:50%;float:left;line-height:1rem;font-size:0.5rem}
.qg_bottom{width:100%;color:black;height:50%;float:left;line-height:1rem;font-size:0.5rem}

.dv-qg{margin:0 auto;position: fixed;bottom: 0px;width:100%;height: 2.2rem;background: #fff;z-index:25;border-top: 1px solid #e2e2e2;font-family:Arial,'华文细黑','微软雅黑';}
.dv-car{width:2.2rem;height:2.2rem;display: inline-block;background-size:50% 50%;float:left}
.dv-btn-left{float:left;background:#ff9990;height:100%;text-align:center}
.dv-btn-left .title{color:white;font-size:0.63rem;height:1rem;line-height:1.1rem}
.dv-btn-left .time{color:white;font-size:0.7rem;height:1.2rem;line-height:1.1rem}
.dv-btn-right{float:left;text-align:center;line-height: 2.2rem;height: 100%;background:#f6827a;color:white}
.page-goods-detail .fui-comment-group .fui-cell .comment .remark{font-size:0.6rem}
.btn.btn-danger{background:#3cb4b9}
.fui-swipe-bullet.active{background:#3cb4b9}
</style>
<!--底部菜单-->
<?php  if($goods['canbuy']) { ?>
	
	 <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
		
		<div class="dv-qg" id='s-dv-time'>
			<div class="dv-car" >
				<a href="<?php  echo mobileUrl('member/cart')?>" ><em class="fix_car"><i class="fix_car_i" style="display:none">0</i></em></a>
			</div>
			<div class="dv-btn-left">
				<div class='title'>抢购倒计时</div>
				<div class='time' id='time_dis' data-now="<?php  echo date('Y-m-d H:i:s')?>"
				data-end="<?php  echo date('Y-m-d H:i:s', $goods['isdiscount_time'])?>" data-dif='<?php  echo ($goods["isdiscount_time"]-strtotime("now"))?>'>
					
					<span class="time" id='s-h'></span>时
					<span class="time" id='s-m'></span>分
					<span class="time" id='s-s'></span>秒
				</div>
			</div>
			<div class="dv-btn-right buybtn">立即抢购</div>
		</div>
		<script>
			
			var wth_window=$(window).width();
			var wth_car=$(".dv-car").width();
			var wth_btn=(wth_window-wth_car)/2;
			$(".dv-btn-left").css('width',wth_btn);
			$(".dv-btn-right").css('width',wth_btn);
			
		</script>
		<script id='ch_dv_show'>
			<div class="fix_shopcar">
				<div>
					<a href="<?php  echo mobileUrl('member/cart')?>" class="fix_car_a"><em class="fix_car"><i class="fix_car_i" style="display:none">0</i></em></a>
					<a href="javascript:;"  class="fix_salout btn-left ">已售罄</a><a href="javascript:;" class="fix_order btn-right ">预定</a>
				</div>
			</div>
		</script>
	<?php  } else if($goods['isdiscount'] && $goods['isdiscount_time']<time()) { ?>	
		<div class="fix_shopcar">
			<div>
				<a href="<?php  echo mobileUrl('member/cart')?>" class="fix_car_a"><em class="fix_car"><i class="fix_car_i" style="display:none">0</i></em></a>
				<a href="javascript:;"  class="fix_salout btn-left ">已售罄</a><a href="javascript:;" class="fix_order btn-right">预定</a>
			</div>
		</div>
	 <?php  } else { ?>
		<div class="fix_shopcar">
			<div>
				<a href="<?php  echo mobileUrl('member/cart')?>" class="fix_car_a"><em class="fix_car"><i class="fix_car_i" style="display:none">0</i></em></a>
			<a href="http://www.cdj1946.cn/master/matter.html" style='background:#6BC6CB'  class="fix_depay btn-left dv-btn-left cartbtn">转发售卖</a><a  style='background:#3DB4BA' class="fix_fullpay btn-right buybtn">立即购买</a>
			<!--<a href="javascript:;" style='background:#6BC6CB'  class="fix_depay btn-left dv-btn-left cartbtn">我喜欢</a><a  style='background:#3DB4BA' class="fix_fullpay btn-right buybtn">立即购买</a>-->
			</div>
		</div>
		
	 <?php  } ?>

<?php  } else { ?>
	<?php  if(($goods['total'] <=0)) { ?>
	<div class="fix_shopcar">
		<div>
			<a href="<?php  echo mobileUrl('member/cart')?>" class="fix_car_a"><em class="fix_car"><i class="fix_car_i" style="display:none">0</i></em></a>
			<a href="javascript:;" style='background:#ADADAD'  class="fix_salout btn-left">已售罄</a><a style='background:#3DB4BA' href="javascript:;" class="fix_order btn-right">预定</a>
		</div>
	</div>
	<?php  } ?>
<?php  } ?>

<?php  if($has_city) { ?>
<div id='city-picker-modal' style="margin: -100%;">
    <div class='city-picker'>
        <div class='fui-cell-title'>促销活动</div>

        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>

            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    <?php  if(empty($onlysent)) { ?>不<?php  } else { ?>只<?php  } ?>配送区域:
                    <div class="dispatching-info">
                        <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
                        <i><?php  echo $item;?></i>
                        <?php  } } ?>
                    </div>
                </div>
            </div>


            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php  } ?>

<div id='sale-picker-modal' style="margin: -100%;">
    <div class='sale-picker'>
        <div class='fui-cell-title'>促销活动</div>

        <div class="fui-cell-group fui-sale-group" style='margin-top:0'>
            <?php  if($enoughfree && $enoughfree==-1) { ?>
            <div class="fui-cell"><div class="fui-cell-text">全场包邮</div></div>
            <?php  } else { ?>

            <?php  if($enoughfree>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text">全场满 <span class="text-danger">￥<?php  echo $enoughfree;?></span> 包邮</div>
            </div>
            <?php  } ?>

            <?php  if($goods['ednum']>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text">单品满 <span class="text-danger"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?'件':$goods['unit']?>包邮
                </div>
            </div>
            <?php  } ?>
            <?php  if($goods['edmoney']>0) { ?>

            <div class="fui-cell">
                <div class="fui-cell-text">单品满 <span class="text-danger">￥<?php  echo $goods['edmoney'];?></span> 包邮
                </div>
            </div>

            <?php  } ?>
            <?php  } ?>



            <?php  if($enoughfree || ($enoughs && count($enoughs)>0)) { ?>

            <?php  if($enoughs && count($enoughs)>0) { ?>
            <div class='fui-according'>
                <div class='fui-according-header'>
                    <div class="text">
                        <div class="fui-cell-text">全场满 <span class="text-danger">￥<?php  echo $enoughs[0]['enough'];?></span> 立减 <span class="text-danger">￥<?php  echo $enoughs[0]['money'];?></span></div>
                    </div>
                    <?php  if(count($enoughs)>1) { ?><span class="remark">更多</span><?php  } ?>
                </div>
                <?php  if(count($enoughs)>1) { ?>
                <div class='fui-according-content'>
                    <?php  if(is_array($enoughs)) { foreach($enoughs as $key => $enough) { ?>
                    <?php  if($key>0) { ?>
                    <div class="fui-cell">
                        <div class="fui-cell-text">满 <span class="text-danger">￥<?php  echo $enough['enough'];?></span> 立减 <span class="text-danger">￥<?php  echo $enough['money'];?></span></div>
                    </div>
                    <?php  } ?>
                    <?php  } } ?>
                </div>
                <?php  } ?>
            </div>
            <?php  } ?>



            <?php  } ?>
            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>

<?php  if($getComments) { ?>
<script type='text/html' id='tpl_goods_detail_comments_list'>
    <div class="fui-cell-group fui-comment-group">
        <%each list as comment%>
        <div class="fui-cell">
            <div class="fui-cell-text comment ">
                <div class="info head">
                    <div class='img'><img src='../addons/ewei_shopv2/template/mobile/default/static/images/zx/pllogo.jpg'/></div>
                    <div class='nickname'><%comment.nickname%></div>

                  
                    <div class="star" style='float:right'>
                        <span <%if comment.level>=1%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>>★</span>
                    </div>
                </div>
                <div class="remark" style='padding-left:1.2rem'><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img" style='padding-left:1.2rem'>
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" /></div>
                    <%/each%>
                </div>
                <%/if%>
				 <div class="date" style='color:#ADADAD;padding-left:1.2rem'><%comment.createtime%></div>
                <%if comment.reply_content%>
                <div class="reply-content" style="background:#EDEDED;" style='padding-left:1.2rem'>
                    掌柜回复：<%comment.reply_content%>
                    <%if comment.reply_images.length>0%>
                    <div class="remark img" style='padding-left:1.2rem'>
                        <%each comment.reply_images as img%>
                        <div class="img"><img data-lazy="<%img%>" /></div>
                        <%/each%>
                    </div>
                    <%/if%>
                </div>
                <%/if%>
                <%if comment.append_content && comment.replychecked==0%>
                <div class="remark reply-title" style='padding-left:1.2rem'>用户追加评价</div>
                <div class="remark" style='padding-left:1.2rem'><%comment.append_content%></div>
                <%if comment.append_images.length>0%>
                <div class="remark img" style='padding-left:1.2rem'>
                    <%each comment.append_images as img%>
                    <div class="img"><img data-lazy="<%img%>" /></div>
                    <%/each%>
                </div>
                <%/if%>
                <%if comment.append_reply_content%>
                <div class="reply-content" style="background:#EDEDED;padding-left:1.2rem">
                    掌柜回复：<%comment.append_reply_content%>
                    <%if comment.append_reply_images.length>0%>
                    <div class="remark img">
                        <%each comment.append_reply_images as img%>
                        <div class="img"><img data-lazy="<%img%>" /></div>
                        <%/each%>
                    </div>
                    <%/if%>
                </div>
                <%/if%>
                <%/if%>
            </div>
        </div>
        <%/each%>
    </div>
</script>

<script type='text/html' id='tpl_goods_detail_comments'>
    <div class="fui-cell-group fui-comment-group">

        <div class="fui-cell ">
            <div class="fui-cell-text desc">商品评论(<%count.all%>)</div>
            <!--<div class="fui-cell-text desc label"><span><%percent%>%</span> 好评</div>
            <div class="fui-cell-remark"></div>-->
        </div>
        <%each list as comment%>
        <div class="fui-cell">
			
            <div class="fui-cell-text comment ">
			<div class="info head">
                    <div class='img'><img src='../addons/ewei_shopv2/template/mobile/default/static/images/zx/pllogo.jpg'/></div>
                    <div class='nickname'><%comment.nickname%></div>

                    
                    <div class="star" style='float:right'>
                        <span <%if comment.level>=1%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>>★</span>
                    </div>
            </div>
              
                <div class="remark"  style='padding-left:1.2rem'><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img" style='padding-left:1.2rem'>
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" height="50" /></div>
                    <%/each%>
                </div>
                <%/if%>
				<div class="date" style='color:#ADADAD;padding-left:1.2rem'><%comment.createtime%></div>
            </div>
        </div>
        <%/each%>
		<div style="margin:0 0.5rem;border-top:1px solid #D9D9D9"></div>
		<div class="fui-cell fui-cell-click" style=''>
            <div class="fui-cell-text desc" style='color:#333;font-size:0.6rem'>查看更多评论</div>
            <div class="fui-cell-text desc label"></div>
            <div class="fui-cell-remark"></div>
        </div>
    </div>
</script>
<?php  } ?>

<?php  } else { ?>

<div class='fui-content'>
    <div class='content-empty'>
        <i class='icon icon-searchlist'></i><br/> 商品已经下架，或者已经删除!<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'>到处逛逛</a>
    </div>
</div>
<?php  } ?>


<div id='cover'>
    <div class='fui-mask-m visible'></div>
    <div class='arrow'></div>
    <div class='content'><?php  if(empty($share['goods_detail_text'])) { ?>请点击右上角<br/>通过【发送给朋友】<br/>邀请好友购买<?php  } else { ?><?php  echo $share['goods_detail_text'];?><?php  } ?></div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH)) : (include template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH));?>
<script language="javascript">
	css_sq();

    require(['biz/goods/detail'], function (modal) {
        modal.init({
            goodsid:"<?php  echo $goods['id'];?>",
            getComments : "<?php  echo $getComments;?>",
            seckillinfo: <?php  echo json_encode($seckillinfo)?>,
            attachurl_local:"<?php  echo $GLOBALS['_W']['attachurl_local'];?>",
            attachurl_remote:"<?php  echo $GLOBALS['_W']['attachurl_remote'];?>",
            coupons: <?php  echo json_encode($coupons)?>
        });
    });
	
	var is_stop=1;
	if($("#s-dv-time").length>0){
		is_stop=0;
	}
	var counttdown=setInterval(cal_time,200);
	function cal_time(){
		if(is_stop==0){
			var time_end=$("#time_dis").data('end').replace(/-/g,'/');
			var s_now=new Date();
			var s_end=new Date(time_end);
			var s_dif=Number(s_end.getTime()-s_now.getTime()); //毫秒级
			if(s_dif<=0){
				clearInterval(counttdown);
				show_sq();
			}
			var hour=Math.floor(s_dif/1000/3600);
			var minute=parseInt(s_dif/1000/60%60);
			var second=parseInt(s_dif/1000%60);
			$("#s-h").text(hour);
			$("#s-m").text(minute);
			$("#s-s").text(second);
		}else{
			clearInterval(counttdown);
		}
	}
	
	function css_sq(){
		var width_blank=$(".fix_car_a").width();
		var width_left=$(window).width()-width_blank-1;
		$(".btn-left").css('width',width_left/2);
		$(".btn-right").css('width',width_left/2);
	}
	
	function show_sq(){
		var html=$("#ch_dv_show").html();
		$("#s-dv-time").replaceWith(html);
		css_sq();alert('ok');
	}
	//show_sq();
	
	
	$('#arrow-param').click(function(){
		var clazz=$(this).hasClass('on');
		
		if(clazz==true){
		
			$(this).removeClass('on');    
			//$("#param-remain").css({'height':'0','transition':'all 500ms ease'});
			//$('#param-remain').hide();
			//$("#param-remain").animate({height:"toggle"},500);
		}else{
			
			$(this).addClass('on');
		//	$("#param-remain").css({'height':h+'px','transition':'all 500ms ease'});
		//	$('.cell-param-text-more').css('display','flex');
		
			
			//$("#param-remain").animate({height:"toggle"},500);
		}
		$("#param-remain").animate({'height':"toggle"},600);
	});
</script>
</div>

<div id="alert-picker">
    <script type="text/javascript" src="../addons/ewei_shopv2/static/js/dist/jquery/jquery.qrcode.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".alert-qrcode-i").html('')
            $(".alert-qrcode-i").qrcode({
                typeNumber: 0,      //计算模式
                correctLevel: 0,//纠错等级
                text:"<?php  echo $_W['siteroot'].'app/'.mobileUrl('goods/detail', array('id'=>$goods['id'],'mid'=>$mid))?>"/*<?php  echo $_W['siteroot'].'app/'.mobileUrl('goods/detail', array('id'=>$goods['id']))?>*/
            });
        });
    </script>
    <div id="alert-mask"></div>
    <?php  if($commission_data['codeShare'] == 1) { ?>
    <div class="alert-content">
        <div class="alert">
            <i class="alert-close alert-close1 icon icon-close"></i>
            <div class="fui-list alert-header">
                <div class="fui-list-media">
                    <img class="round" src="<?php  echo tomedia($_W['shopset']['shop']['logo'])?>">
                </div>
                <div class="fui-list-inner">
                    <?php  echo $_W['shopset']['shop']['name'];?>
                </div>
            </div>
            <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert-goods-img" alt="">
            <div class="fui-list alert-qrcode">
                <div class="fui-list-media">
                    <i class="alert-qrcode-i"></i>
                </div>
                <div class="fui-list-inner alert-content">
                    <h2 class="alert-title"><?php  echo $goods['title'];?></h2>
                    <span>&yen;<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>&yen;<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>&yen;<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="share-text1">截屏保存分享给您的朋友</div>
        </div>
    </div>
    <?php  } else { ?>
    <div class="alert-content">
        <div class="alert2">
            <div class="fui-list alert2-goods">
                <div class="fui-list-media">
                    <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert2-goods-img" alt="">
                </div>
                <div class="fui-list-inner">
                    <h2 class="alert2-title"><?php  echo $goods['title'];?></h2>
                    <span>&yen;<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>&yen;<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>&yen;<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="alert2-qrcode">
                <i class="alert-qrcode-i"></i>
            </div>
            <div class="share-text2">截屏保存分享给您的朋友</div>
            <a href="javascript:void(0);" class="alert-close2"><?php  echo $_W['shopset']['shop']['name'];?></a>
        </div>
    </div>
    <?php  } ?>
</div>

<style type="text/css">
    .share-text1{text-align: center;padding:0.5rem 0.5rem 0;font-size:0.6rem;color:#666;line-height: 1rem;}
    .share-text2{text-align: center;padding:0 0.5rem 0.5rem;font-size:0.6rem;color:#666;line-height: 1rem;}
</style>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
