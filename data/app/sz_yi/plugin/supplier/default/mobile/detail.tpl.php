<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script language="javascript" src="../addons/sz_yi/static/js/dist/bootstrap.min.js"></script>
<link href="../addons/sz_yi/static/css/bootstrap.min.css" rel="stylesheet">

<title>订单详情</title>
<style type="text/css">
    body {margin:0px; background:#efefef; -moz-appearance:none;}


    .detail_topbar {height:44px; background:#5f6e8b; padding:15px;box-sizing: content-box;}
    .detail_topbar .ico {height:44px; width:30px; line-height:34px; float:left; font-size:26px; text-align:center; color:#fff;}
    .detail_topbar .tips {height:34px;  margin-left:10px; font-size:13px; color:#fff; line-height:17px;}
    
    
    .detail_user {box-sizing: content-box;height:54px;  background:#fff; padding:5px; border-bottom:1px solid #eaeaea;}
    .detail_user .info .ico { float:left;  height:50px; width:30px; line-height:50px; font-size:26px; text-align:center; color:#666}
    .detail_user .info .info1 {height:54px; width:100%; float:left;margin-left:-30px;margin-right:-30px;}
    .detail_user .info .info1 .inner { margin-left:30px;margin-right:30px;overflow:hidden;}
    .detail_user .info .info1 .inner .user {height:30px; width:100%; font-size:16px; color:#333; line-height:35px;overflow:hidden;}
    .detail_user .info .info1 .inner .address {height:20px; width:100%; font-size:14px; color:#999; line-height:20px;overflow:hidden;}
    .detail_user .info .ico2 {height:50px; width:30px;padding-top:15px; float:right; font-size:16px; text-align:right; color:#999;}

    .detail_exp {height:42px; width:94%; background:#fff; padding:0px 3%; border-bottom:1px solid #eaeaea; line-height:42px; font-size:16px; color:#333;}
    .detail_exp .t1 {height:42px; width:auto; float:left;}
    .detail_exp .t2 {height:42px; width:auto; float:right;}
    .detail_exp .ico {height:42px; width:10%; float:right;text-align:right;color:#999; font-size:16px;margin-top:5px; }
    
    .detail_good {height:auto;padding:10px;background:#fff;  margin-top:16px; border-top:1px solid #eaeaea;}
    .detail_good .ico {height:6px; width:10%; line-height:36px; float:left; text-align:center;}
    .detail_good .shop {height:36px; width:90%; padding-left:10%; border-bottom:1px solid #eaeaea; line-height:36px; font-size:18px; color:#333;}
    .detail_good .good {height:50px; width:100%; padding:10px 0px; border-bottom:1px solid #eaeaea;}
    .detail_good .img {height:50px; width:50px; float:left;}
    .detail_good .img img {height:100%; width:100%;}
    .detail_good .info {width:100%;float:left; margin-left:-50px;margin-right:-60px;}
    .detail_good .info .inner { margin-left:60px;margin-right:60px; }
    .detail_good .info .inner .name {height:32px; width:100%; float:left; font-size:12px; color:#555;overflow:hidden;}
    .detail_good .info .inner .option {height:16px; width:100%; float:left; font-size:12px; color:#888;overflow:hidden;word-break: break-all}
    .detail_good span { color:#666;}
    .detail_good .price { float:right;width:60px;;height:54px;margin-left:-60px;;}
    .detail_good .price .pnum { height:20px;width:100%;text-align:right;font-size:14px; }
    .detail_good .price .num { height:20px;width:100%;text-align:right;}
    
    .detail_price {height:auto; padding:10px; padding-bottom:20px;  background:#fff;   }
    .detail_price .price {height:auto; width:100%; }
    .detail_price .price .line {height:26px; width:100%; font-size:13px; color:#666; line-height:26px;}
    .detail_price .price .line span {height:26px; width:auto; float:right;}
    
   
    .detail_pay {height:60px; width:100%; background:#fff; padding:0px 2%; margin-top:30px; border-top:1px solid #eaeaea;position:fixed;bottom:0px}
    .detail_pay span {height:60px; width:auto; margin-right:16px; float:right; line-height:60px; color:#ff771b; font-size:16px;}
    .detail_pay .paysub {height:38px; width:auto;margin-left:5px; background:#ff771b; padding:0px 10px; margin-top:10px; border-radius:5px; color:#fff; line-height:38px; float:right;border-color:#ff771b }
    
    .detail_pay .paysub1 {height:38px; width:auto; margin-left:5px;background:#fff; padding:0px 10px; margin-top:10px; border-radius:5px; color:#5f6e8b; line-height:38px; float:right;border:1px solid #5f6e8b;}
       
       
    .chooser {height: 100%; width: 100%; background:#efefef; position: fixed; top: 0px; right: -100%; z-index: 1;}
    .chooser .address {height:50px; width:94%; background:#fff; padding:10px 3%; border-bottom:1px solid #eaeaea;}
    .chooser .address .ico {height:50px; width:10%; line-height:50px; float:left; font-size:20px; text-align:center; color:#999;}
    .chooser .address .info {height:50px; width:77%; margin-right:3%; float:left;}
    .chooser .address .info .name {height:28px; width:100%; font-size:16px; color:#666; line-height:28px;}
    .chooser .address .info .addr {height:22px; width:100%; font-size:14px; color:#999; line-height:22px;}
    .chooser .address .edit {height:50px; width:10%; float:left; }

    .chooser .add_address {height:44px; width:94%; background:#fff; padding:0px 3%; border-bottom:1px solid #eaeaea; line-height:44px; font-size:16px; color:#666;}
    
    .detail_nav { height:30px; width:94%;padding:10px;}
    .detail_nav .nav { padding:2px 5px 2px 5px;; border:1px solid #5f6e8b; color:#5f6e8b; background:#fff; float:left; margin-left:10px;}
    .detail_nav .selected { border:1px solid #ff6600; color:#ff6600; }
    
.address_main {height:100%; width:94%; background:#fff; padding:0px 3%;  position: fixed; top: 0px; right: -100%; z-index: 1;}
.address_main .line {height:44px; width:100%; border-bottom:1px solid #f0f0f0; line-height:44px;}

.address_main .line input {float:left; height:44px; width:100%; padding:0px; margin:0px; border:0px; outline:none; font-size:16px; color:#666;padding-left:5px;}
.address_main .line select  { border:none;height:25px;width:100%;color:#666;font-size:16px;}
.address_main .address_sub1 {height:44px; width:94%; margin:14px 3% 0px; background:#ff4f4f; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
.address_main .address_sub2 {height:44px; width:94%; margin:14px 3% 0px; background:#ddd; border-radius:4px; text-align:center; font-size:18px; line-height:44px; color:#666; border:1px solid #d4d4d4;}
.stores {overflow:hidden;background:#fff;}
.store {height:65px;  background:#fff; padding:5px; border-bottom:1px solid #eaeaea;}
.store .info .ico { float:left;  height:50px; width:30px; line-height:30px; font-size:16px; text-align:center; color:#666}
.store .info .info1 {height:54px; width:100%; float:left;margin-left:-30px;margin-right:-60px;}
.store .info .info1 .inner { margin-left:30px;margin-right:60px;overflow:hidden;}
.store .info .info1 .inner .user {height:25px; width:100%; font-size:14px; color:#333; line-height:25px;overflow:hidden;}
.store .info .info1 .inner .tel {height:20px; width:100%; font-size:13px; color:#999; line-height:20px;overflow:hidden;}
.store .info .info1 .inner .address {height:20px; width:100%; font-size:13px; color:#999; line-height:20px;overflow:hidden;}
.store .info .ico2 {height:50px; width:30px;padding-top:15px; float:right; font-size:24px; text-align:center; color:#ccc;}
.store .info .ico3 {height:50px; width:30px;padding-top:15px; float:right; font-size:24px; text-align:center; color:#ccc;} 
.store_title {height:44px; width:94%; overflow: hidden; background:#fff; padding:0px 3%; margin-top:14px; border-bottom:1px solid #eaeaea; border-top:1px solid #eaeaea; line-height:44px; color:#666; font-size:14px;} 
.store_more {height:20px;  background:#fff; font-size:14px; color:#999; line-height:20px; padding:5px; border-bottom:1px solid #eaeaea; text-align: center;}
.page_topbar .nav { position:absolute;right:5px;;color:#333;}

.detail_good .text { padding:10px; color:#666;font-size:13px;}


    .diyform_info {height:auto;  background:#fff; margin-top:14px; border-bottom:1px solid #e8e8e8; border-top:1px solid #e8e8e8;}
    .diyform_info .dline {margin:0 10px; height:40px; border-bottom:1px solid #e8e8e8; line-height:40px; color:#666;}
    .diyform_info .dline .dtitle {height:40px; width:90px; line-height:40px; color:#444; float:left; font-size:16px;  }
    .diyform_info .dline .dinfo { width:100%;float:right;margin-left:-90px; position: relative; font-size:14px; color:#999; line-height:40px; height:40px; }
    .diyform_info .dline .dinner { margin-left:90px; }
    .diyform_info .dline1  { height:auto;overflow:hidden;}
     .diyform_info .dline2 .dinfo img  { margin-top:5px;}
   .diyform_info .dline1 .dinfo { height:auto; line-height:35px;}
   .diyform_info1 { border:none; margin-top:0px; border:1px solid #efefef; border-top:none;  }
   .diyform_info1 .dline { margin:0;}
   .diyform_info1 .dline .dtitle { padding-left:10px;width:80px;font-size:13px;}
   .diyform_info1 .dline .dinner { font-size:13px;}
   .diyform_info .btn { text-decoration: none;  display: block; background:#f0f0f0; width:100%; text-align: center; color: #999;padding:3px; border-radius:1px; line-height:25px;  }
</style>
<div id='container'></div>

<script id='tpl_detail' type='text/html'>
<div class="page_topbar">
    <a href="<?php  echo $this->createPluginMobileUrl('supplier/orderj',array('op'=>'order'))?>" class="back"><i class="fa fa-angle-left"></i></a>
    <%if order.status==1 && order.isverify=='1' && order.verifyied!='1'%><a href="javascript:;" class="btn" onclick="VerifyHandler.verify('<?php  echo $_GPC['id'];?>')"><i class="fa fa-qrcode"></i></a><%/if%>
    <div class="title">订单详情</div>
</div>
<div class="detail_topbar">
    <div class="ico"><i class="fa fa-file-text-o"></i></div>
    <div class="tips">
         <%if order.status==0 && order.paytype!=3%>等待付款<%/if%>
     <%if order.paytype==3 && order.status==0%>货到付款，等待发货<%/if%>
        <%if order.status==1%>已付款<%/if%>
        <%if order.status==2 %>已发货<%/if%>
        <%if order.status==3%>交易完成<%/if%>
        <%if order.status==-1%>交易关闭<%/if%>
        <br>
        <span>订单金额(含运费): ￥<%order.price%><span><br/>
        <span>运费: ￥<%order.dispatchprice%><span><br/></div>
</div>
 <%if order.addressid!=0%>
<div class="detail_user">
    <input type='hidden' id='addressid' value='<%address.id%>' />
    <div class="info">
        <div class="ico"><i class="fa fa-map-marker"></i></div>
         <div class='info1'>
                 <div class='inner'>
                        <div class="user">收件人：<span id='address_realname'><%address.realname%></span>(<span id='address_mobile'><%address.mobile%></span>)</div>
                        <div class="address"><span id='address_address'><%address.province%>/<%address.city%>/<%address.area%>/<%address.address%></span></div>
                 </div>
             </div>
   
    </div>
</div>
 <%/if%>
  <%if show==1%>
    <%if order.isverify==1 || order.virtual!='0'%>
    
    <div class="detail_user">
        <div class="info" >
            <div class="ico"><i class="fa fa-user"></i></div>
                <div class='info1'>
                     <div class='inner'>
                         <div class="user">联系人:  <%carrier.carrier_realname%></div>
                         <div class="address">联系电话: <span id='carrier_address'><%carrier.carrier_mobile%></span></div>
                     </div>
                 </div>
            </div>
          </div>
    </div>
    <%/if%>
<%/if%>
<!--<span>diyform</span>-->
<?php  if($diyform_flag == 1 && count($goods)==1) { ?>
<?php  $datas = iunserializer($goods[0]['diyformdata'])?>
<div class="diyform_info">
<?php  if(is_array($goods[0]['diyformfields'])) { foreach($goods[0]['diyformfields'] as $value) { ?>
<div class='dline   <?php  echo $value['tp_css'];?>'>
        <div class='dtitle'><?php  echo $value['tp_name'];?>：</div>
        <div class='dinfo'>
			<div class='dinner'>
		           <?php  echo $value['tp_value'];?>
			</div>
        </div>
</div>
<?php  } } ?>
</div>
<?php  } ?>	
<div class="detail_good">
    <div class="ico"><i class="fa fa-gift" style="color:#666; font-size:20px;"></i></div>
    <div class="shop"><%set.name%></div>
    <%each goods as g%>
     <div class="good">
            <div class="img"  onclick="location.href='<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%g.goodsid%>'"><img src="<%g.thumb%>"/></div>
            <div class='info' onclick="location.href='<?php  echo $this->createMobileUrl('shop/detail')?>&id=<%g.goodsid%>'">
                <div class='inner'>
                       <div class="name"><%g.title%></div>     
                       <div class='option'><%if g.optionid!='0'%>规格:  <%g.optiontitle%><%/if%></div>
                </div>
            </div>
            <div class="price">
                <div class='pnum'><span class='marketprice'>￥<%g.price%></span></div>
                <div class='pnum'><span class='total'>×<%g.total%></span></div>
            </div>
        </div>
    <%/each%>
</div> 
 <%if order.virtual_str!=''%>
<div class="detail_good" style='margin-bottom:10px;'>
    <div class="ico"><i class="fa fa-cubes" style="color:#666; font-size:20px;"></i></div>
    <div class="shop">发货信息</div>
    <div class='text'><%=order.virtual_str%></div>
</div> 
 
 <%/if%>
<div class="detail_price" >
    <input type="hidden" id="weight" value="<%weight%>" />
    <div class="price">
        <div class="line">商品小计:<span>￥<span class='goodsprice'><%order.goodsprice%></span></span></div>
        	
        <div class="line">运费:<span>￥<span class='dispatchprice'><%order.olddispatchprice%></span></span></div>
      
	
        <%if order.discountprice>0%>
        <div class="line">会员折扣:<span>-￥<span class='discountprice'><%order.discountprice%></span></span></div>
        <%/if%>
        <%if order.deductprice>0%>
        <div class="line">积分抵扣:<span>-￥<span class='deductprice'><%order.deductprice%></span></span></div>
        <%/if%>
        <%if order.deductcredit2>0%>
        <div class="line">余额抵扣:<span>-￥<span class='deductprice2'><%order.deductcredit2%></span></span></div>
        <%/if%>
        <%if order.changeprice!=0%>
        <div class="line">改价优惠:<span><%if order.changeprice>0%>+<%/if%>￥<span class='changeprice2'><%order.changeprice%></span></span></div>
        <%/if%>
        
        <%if order.changedispatchprice!=0%>
        <div class="line">运费改价:<span><%if order.changedispatchprice>0%>+<%/if%>￥<span class='changedispatchprice2'><%order.changedispatchprice%></span></span></div>
        <%/if%>

        <%if order.couponprice!=0%>
        <div class="line">优惠券优惠:<span><%if order.couponprice>0%>-<%/if%>￥<span class='changedispatchprice2'><%order.couponprice%></span></span></div>
        <%/if%>
        
        <div class="line">实付费(含运费):<span><span class='dispatchprice' style='color:#ff6600'>￥<%order.price%></span></span></div>
      </div> 
</div>
    <%if order.status==3%>
    <div class="detail_price" style="margin-top:15px;height:80px;">
    <div class="price" style="padding-top:10px;">
     <div class="line">订单号:<span><%order.ordersn%></span></div>
     <div class="line">交易完成时间:<span><%order.finishtime%></span></div>
    </div>
    </div>
     <%/if%>
     <%if order.status==1%>
    <div class="detail_price" style="margin-top:15px;height:80px;">
    <div class="price" style="padding-top:10px;">
     <div class="line">订单号:<span><%order.ordersn%></span></div>
     <div class="line">支付时间:<span><%order.paytime%></span></div>
    </div>
    </div>
     <%/if%>
     <%if order.status==0%>
    <div class="detail_price" style="margin-top:15px;height:80px;">
    <div class="price" style="padding-top:10px;">
     <div class="line">订单号:<span><%order.ordersn%></span></div>
     <div class="line">下单时间:<span><%order.createtime%></span></div>
    </div>
    </div>
     <%/if%>
<%if order.status == 1%>

<div class="detail_pay">
<input class='addressdata' type='hidden' value="<%order.address%>"  />
<input class='itemid'  type='hidden' value="<%order.id%>"  />
<a class="btn btn-primary btn-sm disbut paysub" href="javascript:;" onclick="send(this)" data-toggle="modal" data-target="#modal-confirmsend">确认发货</a>
</div>
<%/if%>
<div id="modal-confirmsend" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="width:70%;margin:0px auto;">
    <form class="form-horizontal form" action="<?php  echo $this->createPluginMobileUrl('supplier/detail')?>" method="post" enctype="multipart/form-data">
        <input type='hidden' name='id' value='' />
        <input type='hidden' name='op' value='deal' />
        <input type='hidden' name='to' value='confirmsend' />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h3>快递信息</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-xs-10 col-sm-3 col-md-3 control-label">收件人信息</label>
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <div class="form-control-static">
                                收  件 人: <span class="realname"></span> / <span class="mobile"></span><br>
                                收货地址: <span class="province"></span><span class="city"></span><span class="area"></span><span class="address"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递公司</label>
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <select class="form-control" name="express" id="express">
                                <option value="" data-name="">其他快递</option>
                                <option value="shunfeng" data-name="顺丰">顺丰</option>
                                <option value="shentong" data-name="申通">申通</option>
                                <option value="yunda" data-name="韵达快运">韵达快运</option>
                                <option value="tiantian" data-name="天天快递">天天快递</option>
                                <option value="yuantong" data-name="圆通速递">圆通速递</option>
                                <option value="zhongtong" data-name="中通速递">中通速递</option>
                                <option value="ems" data-name="ems快递">ems快递</option>
                                <option value="huitongkuaidi" data-name="汇通快运">汇通快运</option>
                                <option value="quanfengkuaidi" data-name="全峰快递">全峰快递</option>
                                <option value="zhaijisong" data-name="宅急送">宅急送</option>
                                <option value="aae" data-name="aae全球专递">aae全球专递</option>
                                <option value="anjie" data-name="安捷快递">安捷快递</option>
                                <option value="anxindakuaixi" data-name="安信达快递">安信达快递</option>
                                <option value="biaojikuaidi" data-name="彪记快递">彪记快递</option>
                                <option value="bht" data-name="bht">bht</option>
                                <option value="baifudongfang" data-name="百福东方国际物流">百福东方国际物流</option>
                                <option value="coe" data-name="中国东方（COE）">中国东方（COE）</option>
                                <option value="changyuwuliu" data-name="长宇物流">长宇物流</option>
                                <option value="datianwuliu" data-name="大田物流">大田物流</option>
                                <option value="debangwuliu" data-name="德邦物流">德邦物流</option>
                                <option value="dhl" data-name="dhl">dhl</option>
                                <option value="dpex" data-name="dpex">dpex</option>
                                <option value="dsukuaidi" data-name="d速快递">d速快递</option>
                                <option value="disifang" data-name="递四方">递四方</option>
                                <option value="fedex" data-name="fedex（国外）">fedex（国外）</option>
                                <option value="feikangda" data-name="飞康达物流">飞康达物流</option>
                                <option value="fenghuangkuaidi" data-name="凤凰快递">凤凰快递</option>
                                <option value="feikuaida" data-name="飞快达">飞快达</option>
                                <option value="guotongkuaidi" data-name="国通快递">国通快递</option>
                                <option value="ganzhongnengda" data-name="港中能达物流">港中能达物流</option>
                                <option value="guangdongyouzhengwuliu" data-name="广东邮政物流">广东邮政物流</option>
                                <option value="gongsuda" data-name="共速达">共速达</option>
                                <option value="hengluwuliu" data-name="恒路物流">恒路物流</option>
                                <option value="huaxialongwuliu" data-name="华夏龙物流">华夏龙物流</option>
                                <option value="haihongwangsong" data-name="海红">海红</option>
                                <option value="haiwaihuanqiu" data-name="海外环球">海外环球</option>
                                <option value="jiayiwuliu" data-name="佳怡物流">佳怡物流</option>
                                <option value="jinguangsudikuaijian" data-name="京广速递">京广速递</option>
                                <option value="jixianda" data-name="急先达">急先达</option>
                                <option value="jjwl" data-name="佳吉物流">佳吉物流</option>
                                <option value="jymwl" data-name="加运美物流">加运美物流</option>
                                <option value="jindawuliu" data-name="金大物流">金大物流</option>
                                <option value="jialidatong" data-name="嘉里大通">嘉里大通</option>
                                <option value="jykd" data-name="晋越快递">晋越快递</option>
                                <option value="kuaijiesudi" data-name="快捷速递">快捷速递</option>
                                <option value="lianb" data-name="联邦快递（国内）">联邦快递（国内）</option>
                                <option value="lianhaowuliu" data-name="联昊通物流">联昊通物流</option>
                                <option value="longbanwuliu" data-name="龙邦物流">龙邦物流</option>
                                <option value="lijisong" data-name="立即送">立即送</option>
                                <option value="lejiedi" data-name="乐捷递">乐捷递</option>
                                <option value="minghangkuaidi" data-name="民航快递">民航快递</option>
                                <option value="meiguokuaidi" data-name="美国快递">美国快递</option>
                                <option value="menduimen" data-name="门对门">门对门</option>
                                <option value="ocs" data-name="OCS">OCS</option>
                                <option value="peisihuoyunkuaidi" data-name="配思货运">配思货运</option>
                                <option value="quanchenkuaidi" data-name="全晨快递">全晨快递</option>
                                <option value="quanjitong" data-name="全际通物流">全际通物流</option>
                                <option value="quanritongkuaidi" data-name="全日通快递">全日通快递</option>
                                <option value="quanyikuaidi" data-name="全一快递">全一快递</option>
                                <option value="rufengda" data-name="如风达">如风达</option>
                                <option value="santaisudi" data-name="三态速递">三态速递</option>
                                <option value="shenghuiwuliu" data-name="盛辉物流">盛辉物流</option>
                                <option value="sue" data-name="速尔物流">速尔物流</option>
                                <option value="shengfeng" data-name="盛丰物流">盛丰物流</option>
                                <option value="saiaodi" data-name="赛澳递">赛澳递</option>
                                <option value="tiandihuayu" data-name="天地华宇">天地华宇</option>
                                <option value="tnt" data-name="tnt">tnt</option>
                                <option value="ups" data-name="ups">ups</option>
                                <option value="wanjiawuliu" data-name="万家物流">万家物流</option>
                                <option value="wenjiesudi" data-name="文捷航空速递">文捷航空速递</option>
                                <option value="wuyuan" data-name="伍圆">伍圆</option>
                                <option value="wxwl" data-name="万象物流">万象物流</option>
                                <option value="xinbangwuliu" data-name="新邦物流">新邦物流</option>
                                <option value="xinfengwuliu" data-name="信丰物流">信丰物流</option>
                                <option value="yafengsudi" data-name="亚风速递">亚风速递</option>
                                <option value="yibangwuliu" data-name="一邦速递">一邦速递</option>
                                <option value="youshuwuliu" data-name="优速物流">优速物流</option>
                                <option value="youzhengguonei" data-name="邮政包裹挂号信">邮政包裹挂号信</option>
                                <option value="youzhengguoji" data-name="邮政国际包裹挂号信">邮政国际包裹挂号信</option>
                                <option value="yuanchengwuliu" data-name="远成物流">远成物流</option>
                                <option value="yuanweifeng" data-name="源伟丰快递">源伟丰快递</option>
                                <option value="yuanzhijiecheng" data-name="元智捷诚快递">元智捷诚快递</option>
                                <option value="yuntongkuaidi" data-name="运通快递">运通快递</option>
                                <option value="yuefengwuliu" data-name="越丰物流">越丰物流</option>
                                <option value="yad" data-name="源安达">源安达</option>
                                <option value="yinjiesudi" data-name="银捷速递">银捷速递</option>
                                <option value="zhongtiekuaiyun" data-name="中铁快运">中铁快运</option>
                                <option value="zhongyouwuliu" data-name="中邮物流">中邮物流</option>
                                <option value="zhongxinda" data-name="忠信达">忠信达</option>
                                <option value="zhimakaimen" data-name="芝麻开门">芝麻开门</option>
                            </select>
                            <input type='hidden' name='expresscom' id='expresscom' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-10 col-sm-3 col-md-3 control-label">快递单号</label>
                        <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                            <input type="text" name="expresssn" class="form-control" />
                        </div>
                    </div>
                    <div id="module-menus"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary span2" name="confirmsend" value="yes">确认发货</button>
                    <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a>
                </div>
            </div>
        </div>
    </form>
</div>
</script>
<?php  if(p('verify')) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('verify/pop', TEMPLATE_INCLUDEPATH)) : (include template('verify/pop', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<script language='javascript'>
function send(btn){
    var modal =$('#modal-confirmsend');
    var itemid = $(btn).parent().find('.itemid').val();
        modal.find(':input[name=id]').val( itemid );
        var addressdata  = eval('(' +$(btn).parent().find('.addressdata').val()+')');
        modal.find('.realname').html(addressdata.realname);
        modal.find('.mobile').html(addressdata.mobile);
        modal.find('.province').html(addressdata.province);
        modal.find('.city').html(addressdata.city);
        modal.find('.area').html(addressdata.area);
        modal.find('.address').html(addressdata.address);
}
</script>
<script type="text/javascript">
    require(['tpl', 'core'], function(tpl, core) {
        core.pjson('supplier/detail',{orderid:'<?php  echo $_GPC['orderid'];?>'},function(json){
            if(json.status==0){
                core.message('订单已取消或不存在，无法查看!',"<?php  echo $this->createPluginMobileUrl('supplier/orderj',array('op'=>'order'))?>" ,'error');
                return;
            }
            $('#container').html(  tpl('tpl_detail',json.result) );
				var ua = navigator.userAgent.toLowerCase();
				var isWX = ua.match(/MicroMessenger/i) == "micromessenger";
				var z = []; 
				$(".diyform_info img").each(function() {
					z.push($(this).attr("src"));
				});
				var current;
					if (isWX) {
						$(".diyform_info img").click(function(e) {
							e.preventDefault();
							var startingIndex = $(".diyform_info img").index($(e.currentTarget));
							var current = null;
							$(".diyform_info img").each(function(B, A) {
							    if (B === startingIndex) {
									current = $(A).attr("src");
								}
							});
							WeixinJSBridge.invoke("imagePreview", {
								current: current,
								urls: z
							});
						});
					}
        },true);
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

