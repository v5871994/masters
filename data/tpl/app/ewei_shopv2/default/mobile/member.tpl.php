<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
.ico{width:1.2rem;height:1.2rem;display:block}
.ico-hy{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_03.png) no-repeat center;background-size:0.7rem 0.7rem;width:0.7rem;height:0.7rem;display:inline-block}
.ico-dfk{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_07.png)  no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem }
.ico-dsh{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_10.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}
.ico-all{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_12.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}

.ico-wdzl{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_18.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}
.ico-gz{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_20.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}
.ico-zj{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_23.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}
.ico-hdzx{background:url(../addons/ewei_shopv2/template/mobile/default/static/images/zx/gr_25.png) no-repeat center;background-size:1.2rem 1.2rem;height:1.2rem;width:1.2rem}

.wddd .fui-icon-col .icon{display:flex;justify-content:center;align-items:center}

.member-page{top:0;}
.member-page .headinfo{background:url(../addons/ewei_shopv2/static/images/1bj.jpg) no-repeat;background-size:100% 100%;height:8rem;border:none;padding:0}
.member-page .headinfo .left{flex:1}
.member-page .headinfo .left i{position:absolute;left:0.5rem;top:0.5rem;font-size:1rem}
.member-page .headinfo .mid{flex:3;display:flex;align-items:center;justify-content:center;flex-direction:column}
.member-page .headinfo .right{flex:1}
.member-page .headinfo .mid img{width:4rem;height:4rem;border-radius:50%;border:1px solid #F0F0F0}
.member-page .headinfo .mid section{font-size:0.7rem;color:#3cb4b9;margin-top:0.2rem}
.member-page .headinfo .mid article{font-size:0.72rem;color:#333;margin-top:0.3rem}
.fui-cell-group .fui-cell{padding:0.3rem 0.5rem}
.wddd{margin-bottom:0.3rem;}
.fui-icon-group{padding-top:0.3rem}
.fui-icon-group  .fui-icon-col{width:33.33%;}
.fui-icon-group  .fui-icon-col .badge{background:#3cb4b9;}
.fui-icon-group  .fui-icon-col .text{color:#adadad;font-size:0.55rem}
.fui-icon-group  .fui-icon-col:before{display:none}
.fui-icon-group  .fui-icon-col .icon i{color:#666}
.wddd  .fui-icon-col .icon{width:2rem;background:#D4F7F9;border-radius:50%;margin-bottom:0.2rem}
.text-s{color:#333;font-size:0.6rem;line-height:1.2rem;}

.wdzc{margin-bottom:0.3rem}
.wdzc a{margin:0.5rem 0}
.wdzc:before{content:'';width:1px;height:60%;position:absolute;left:33.33%;display:block;background:#e0e0e0;top:20%}
.wdzc:after{content:'';width:1px;height:60%;position:absolute;left:66.66%;display:block;background:#e0e0e0;top:20%}
.wdtm{padding:0;}
.wdtm a{margin:0.6rem 0;padding:0 !important}
.wdtm .fui-icon-col{width:25%;padding-top:0 !important}
.wdtm .fui-icon-col .icon{display:flex;justify-content:center;align-items:center;height:1.2rem}

.hyjlb{font-size:0.6rem;background:#3cb4b9;color:#DCF1F1;height:1rem;position:absolute;right:0;top:6rem;line-height:1rem;}
.hyjlb:before{content:'';border-radius:1rem 0 0 1rem;position:absolute;width:0.5rem;height:1rem;background:#3cb4b9;display:block;left:-0.5rem}
.hyjlb:after{    content: " ";
    display: inline-block;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    height: 0.3rem;
    width: 0.3rem;
    border-width: 2px 2px 0 0;
    border-color: #C8C8CD;
    border-style: solid;
    position: relative;
    top: -1px;
	margin-right:0.2rem
   }
</style>
<div class='fui-page  fui-page-current'>
	<div class='fui-content member-page navbar'>
	
		<div class="headinfo" >
			<div class='left'> <i class='icon icon-back'></i></div>
			<div class='mid'>
				<img src="<?php  echo $member['avatar'];?>" >
				<section>
					 <?php  if(empty($level['id'])) { ?>
				    <?php  if(empty($_W['shopset']['shop']['levelname'])) { ?>普通会员<?php  } else { ?><i class='ico-hy'></i><?php  echo $_W['shopset']['shop']['levelname'];?><?php  } ?>
				    <?php  } else { ?>
				    <?php  echo $level['levelname'];?>
				    <?php  } ?>
				</section>
				<article><?php  echo $member['nickname'];?></article>
			</div>
			<div class='right'> </div>
			<a class="setbtn" href="<?php  echo mobileUrl('member/info')?>" data-nocache='true' style='display:none'><i class="icon icon-settings"></i></a>
			<div class='hyjlb'>会员俱乐部<i class=''></i></div>
		</div>	

		<?php  if($needbind) { ?>
			<div class="fui-cell-group fui-cell-click external">
				<a class="fui-cell"  href="<?php  echo mobileUrl('member/bind')?>">
					<div class="fui-cell-icon"><i class="icon icon-mobile"></i></div>
					<div class="fui-cell-text"><p class="text text-danger">绑定手机号</p></div>
					<div class="fui-cell-remark"></div>
				</a>
				<div class="fui-cell-tip">如果您用手机号注册过会员或您想通过微信外购物请绑定您的手机号码</div>
			</div>
		<?php  } ?>
<!--
	<div class="fui-notice" style="background:#B6E9ED" data-speed="<?php  echo $diyitem['params']['speed'];?>">
       
        <div class="icon" style='color:#333;font-size:0.68rem'><i class="icon icon-notification1" style="font-size: 0.rem; color:#333;padding:0;margin-right:0.2rem"></i>温馨提示:</div>
        <div class="text" style="color:#333;">
            <ul>
				<li><a href="#" style="color:#333;font-size:0.6rem" data-nocache="true">广告广告广告广告广告广告</a></li>
            </ul>
        </div>
    </div>
-->	
	
	<div class="fui-cell-group fui-cell-click " style='margin:0'>
		
			<div class="fui-icon-group selecter wddd">
			    <a class="fui-icon-col external" href="<?php  echo mobileUrl('order',array('status'=>0))?>">
					<?php  if($statics['order_0']>0) { ?><div class="badge"><?php  echo $statics['order_0'];?></div><?php  } ?>
					<div class="icon icon-green radius"><div class="ico-dfk"></div></div>
					<div class="text-s">待付款</div>
				</a>
				
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('order',array('status'=>2))?>">
					<?php  if($statics['order_2']>0) { ?><div class="badge"><?php  echo $statics['order_2'];?></div><?php  } ?>
					<div class="icon icon-blue radius"><div class="ico-dsh"></div></div>
					<div class="text-s">待收货</div>
				</a>
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('order')?>">
					<?php  if($statics['order_4']>0) { ?><div class="badge"><?php  echo $statics['order_4'];?></div><?php  } ?>
					<div class="icon icon-pink radius"><div class="ico-all"></div></div>
					<div class="text-s">全部订单</div>
				</a>
			</div>
	</div>
	
	<div class="fui-cell-group fui-cell-click">
			<a class="fui-cell external" href="javascript:void(0)">
				
				<div class="fui-cell-text">我的资产</div>
				<div class="fui-cell-remark" style="font-size: 0.6rem;color:#adadad">更多</div>
			</a>
			<div class="fui-icon-group wdzc">
			    <a class="fui-icon-col external" href="<?php  echo mobileUrl('sale/coupon/my')?>">
					<div class="text-s">优惠券</div>
					<div class="text "><?php  if($statics['coupon']>0) { ?>$statics['coupon']<?php  } else { ?>0<?php  } ?>张可用</div>
				</a>
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('order',array('status'=>1))?>">
					<div class="text-s">积分</div>
					<div class="text">0</div>
				</a>
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('order',array('status'=>2))?>">
					<div class="text-s">余额</div>
					<div class="text"><?php  echo number_format($member['credit2'],2)?></div>
				</a>
				
			</div>
	</div>	
	
	<div class="fui-cell-group fui-cell-click">
			<a class="fui-cell external" href="javascript:void(0)">
				<div class="fui-cell-text">我的特卖</div>
			</a>
			<div class="fui-icon-group selecter wdtm">
			    <a class="fui-icon-col external" href="<?php  echo mobileUrl('member/info')?>">
					
					<div class="icon icon-green radius"><div class="ico-wdzl"></div></div>
					<div class="text-s">我的资料</div>
				</a>
				
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('member/favorite');?>">
					<?php  if($statics['order_2']>0) { ?><div class="badge"><?php  echo $statics['order_2'];?></div><?php  } ?>
					<div class="icon icon-blue radius"><div class="ico-gz"></div></div>
					<div class="text-s">关注</div>
				</a>
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('member/favorite');?>">
					<?php  if($statics['order_4']>0) { ?><div class="badge"><?php  echo $statics['order_4'];?></div><?php  } ?>
					<div class="icon icon-pink radius"><div class="ico-zj"></div></div>
					<div class="text-s">足迹</div>
				</a>
				<a class="fui-icon-col external" href="<?php  echo mobileUrl('member/history');?>">
					<?php  if($statics['order_4']>0) { ?><div class="badge"><?php  echo $statics['order_4'];?></div><?php  } ?>
					<div class="icon icon-pink radius"><div class="ico-hdzx"></div></div>
					<div class="text-s">活动中心</div>
				</a>
			</div>
	</div>	

	<div class="fui-cell-group fui-cell-click">
		<a class="fui-cell" href="<?php  echo mobileUrl('member/cart');?>" style='margin:0.3rem 0;font-size:0.6rem'>
				<div class="fui-cell-text"><p>会员俱乐部</p></div>
				<div class="fui-cell-remark" style='color:#adadad;font-size:0.6rem'>签到领奖</div>
		</a>
		
		<a class="fui-cell" href="<?php  echo mobileUrl('member/cart');?>" style='margin:0.3rem 0;font-size:0.6rem;padding:0.5rem 0.5rem'>
				<div class="fui-cell-text"><p>成为店主</p></div>
				<div class="fui-cell-remark" style='color:#adadad;font-size:0.6rem'></div>
		</a>
	
	 </div>


		


		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
	</div>
	<script language='javascript'>
		require(['biz/member/index'], function (modal) {
			modal.init();
		});
	</script>
</div>

<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
