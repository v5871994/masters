<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title><?php  echo $store['name'];?></title>
<style>
body {margin:0px; background:#efefef; font-family:'微软雅黑'; -moz-appearance:none;}
.info_main {height:auto;  background:#fff; margin-top:10px; border-bottom:1px solid #e8e8e8; border-top:1px solid #e8e8e8;}
.info_main .line {margin:0 10px; height:40px;line-height:40px; color:#999;}
.info_main .line .title {height:40px; width:85px; line-height:40px; color:#444; float:left; font-size:16px;}
.info_main .line .info { width:100%;float:right;margin-left:-85px; }
.info_main .line .inner { margin-left:85px; }
.info_main .line .inner input {height:40px; width:100%;display:block; padding:0px; margin:0px; border:0px; float:left; font-size:14px;}
.info_sub {height:44px; margin:14px 5px; background:#31cd00; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff; border:0; width:100%; }
    .carrier_input_info {height:auto;width:100%; background:#fff; margin-top:10px; border-bottom:1px solid #e8e8e8; border-top:1px solid #e8e8e8;}
    .carrier_input_info .row { padding:0 10px; height:40px; background:#fff; border-bottom:1px solid #e8e8e8; line-height:40px; color:#999;}
    .carrier_input_info .row .title {height:40px; width:85px; line-height:40px; color:#444; float:left; font-size:16px;}
    .carrier_input_info .row .info { width:100%;float:right;margin-left:-85px; }
    .carrier_input_info .row .inner { margin-left:85px; }
    .carrier_input_info .row .inner input {height:30px; color:#666;background:transparent;margin-top:0px; width:100%;border-radius:0;padding:0px; margin:0px; border:0px; float:left; font-size:16px;}
.addorder_price {height:auto;  background:#fff; padding:5px 10px; margin-top:16px; border-bottom:1px solid #eaeaea; border-top:1px solid #eaeaea;}
.addorder_price .price {height:auto; width:100%; border-bottom:1px solid #eaeaea;}
.addorder_price .price .line {height:33px; width:100%; font-size:14px; color:#666;cursor:pointer;}
.addorder_price .price .line span {height:33px; width:auto; float:right;}
.addorder_price .all {height:47px; width:100%; line-height:47px; font-size:16px; color:#666;}
.addorder_price .all span {height:47px; width:auto; float:right; color:#ff771b;}
.addorder_price .line .nav {height:22px; width:40px; background:#ccc; margin:3px 0px; float:right; border-radius:40px;}
.addorder_price .line .on {background:#4ad966;}
.addorder_price .line .nav nav {height:20px; width:20px; background:#fff; margin:1px; border-radius:20px;}
.addorder_price .line .nav .on {margin-left:19px;}
.addorder_pay {height:60px; width:94%; background:#fff; padding:0px 3%; margin-top:10px; border-top:1px solid #eaeaea;position: fixed;bottom: 0;left: 0}
.addorder_pay span {height:60px; width:auto; margin-right:16px; float:left; line-height:60px; color:#ff771b; font-size:14px;}
.addorder_pay .paysub {height:40px; width:auto; background:#ff771b;margin-top:10px; border-radius:2px; font-size: 14px;color:#fff; line-height:40px; float:right;width: 100px;text-align: center;}
.couponcount {float:right; margin-top:8px;  margin-right: 5px; height:16px; width:16px; background:#f30; border-radius:8px; font-size:12px; color:#fff; line-height:16px; text-align: center;}

.addorder_good {height:auto;padding:0 10px;background:#fff;  margin-top:10px; border-bottom:1px solid #eaeaea; border-top:1px solid #eaeaea;}
    .addorder_good .ico {height:6px; width:20px; line-height:36px; float:left; text-align:center;}
    .addorder_good .shop {height:36px; width:90%; padding-left:20px; border-bottom:1px solid #eaeaea; line-height:36px; font-size:18px; color:#333;}
    .addorder_good .good {height:auto; padding:10px 0px;position: relative;overflow: hidden; padding-left: 100px;}
    .addorder_good .img {height:100px; width:100px;    position: absolute;    left: 0;    top: 10px;}
    .addorder_good .img img {height:100%; width:100%; border-radius: 5px;}
    .addorder_good .info {width:100%;padding-left: 10px;}

    .addorder_good .info .inner .name {height:32px;line-height:32px; width:100%; float:left; font-size:16px; color:#555;overflow:hidden;}
    .addorder_good .info .inner .option {min-height:22px; width:100%; float:left; font-size:14px; color:#888;overflow:hidden;word-break: break-all;line-height: 18px}
    .addorder_good span { color:#666;}
    .addorder_good .price { float:right;height:54px;margin-left:-60px;;}
    .addorder_good .price .pnum { height:20px;width:100%;text-align:right;font-size:14px; }
    .addorder_good .price .num { height:20px;width:100%;text-align:right;}
    .addorder_good input {height:34px; width:97%; padding: 0 5px; background:#f7f7f7;  border:1px solid #e9e9e9; margin:14px 0px 0; -webkit-appearance: none; }
    .addorder_good .text {height:34px; width:100%; line-height:34px; text-align:right; font-size:16px; color:#999;}
</style>

<div id="container" style="padding-bottom: 62px">
<?php  if($operation == 'display') { ?>
<form method="post">
    <input type="hidden" name="sid" value="<?php  echo $sid;?>">
    <input type="hidden" name="c" value="entry">
    <input type="hidden" name="m" value="sz_yi">
    <input type="hidden" name="do" value="plugin">
    <input type="hidden" name="p" value="cashier">
    <input type="hidden" name="method" value="order_confirm">
    <!-- <input type="hidden" name="op" value="get-deduct"> -->

    <div class="addorder_good">
        <!-- <div class="ico"><i class="fa fa-gift" style="color:#666; font-size:20px;"></i></div>
        <div class="shop"></div> -->
        
        <div class="good" >
            
            <div class="img"  ><img src="<?php  echo $store['thumb'];?>"/></div>
            <div class='info' >
                <div class='inner'>
                       <div class="name">
                       <?php  echo $store['name'];?>
                        </div>     
                       <div class="option">
                       <?php  echo $store['contact'];?>
                        </div> 
                        <div class="option">
                       <?php  echo $store['mobile'];?>
                        </div> 
                        <div class="option">
                       <?php  echo $store['address'];?>
                        </div> 
                </div>
            </div>
            
        </div>

    </div>
     
    <div class="info_main">
        <div class="line">
            <div class="title">输入金额</div>
            <div class="info">
                <div class="inner">
                    <input type="text" id="orig_price" value="" name="orig_price" placeholder="0.00">
                </div>
            </div>
        </div>
    </div>
<!--     <button type="submit" class="info_sub">确认支付</button> -->
</form>

<input type="hidden" name="sid" id="sid" value="<?php  echo $sid;?>">
<?php  if($store['iscontact']==1) { ?>
<div class="carrier_input_info" >
          <div class="row">
            <div class='title'>联系人姓名</div>
            <div class='info'>
                <div class='inner'><input type="text" placeholder="联系人姓名" id="carrier_input_realname" value="<?php  echo $member['realname'];?>" style='height:40px;'/></div>
            </div>
          </div>
          <div class="row">
            <div class='title'>联系人手机</div>
            <div class='info'>
                <div class='inner'><input type="text" placeholder="联系人手机"  id="carrier_input_mobile" value="<?php  echo $member['mobile'];?>" style='height:40px;'/></div>
            </div>
          </div>
          </div> 
<?php  } ?>          
<!-- <div class="info_main">
    <div class="line">
        <div class="title">金额</div>
        <div class="info">
            <div class="inner">
                <input type="text" value="<?php  echo $orig_price;?>" name="orig_price" id="orig_price" readonly="readonly">
            </div>
        </div>
    </div>
</div> -->


<!-- <?php  if($hascouponplugin) { ?>
<div class="addorder_price" id="hascouponplugin">
    <div class="price" style="border:none;">
        <div id="coupondeduct_div" class="line" style="line-height:26px;display:none">
            <d id='coupondeduct_text'></d><span>-￥<span id="coupondeduct_money">0</span><span>
        </div>
    </div>
</div>

<?php  } ?> -->
<!-- <div id="coupon_container"></div> -->
<!-- <script id="tpl_coupon" type="text/html"> -->
<input type="hidden" id="couponid" value="" />
<div id="coupondiv" class="addorder_price" style="margin-top:10px;" >
    <div class="price" style="border:none;">
        <div class="line" style="line-height:32px;" id="selectcoupon">
            <d id="couponselect">我要使用优惠券</d>
            <div class="ico2" style="float:right;color:#999;margin-top:2px;"><i class='fa fa-angle-right fa-2x'></i></div>
            <div class="couponcount" id="couponcount"><?php  echo $couponcount;?></div>
        </div>
    </div>
</div>
<!-- </script> -->

<div id="deduct_container"></div>
<script id="tpl_deduct" type="text/html">
<%if deductcredit > 0 || deductcredit2 > 0%>
    <div class="addorder_price" style="margin-top:10px;">
        <div class="price" style="border:none;">
        <%if deductcredit > 0%>
        <div class="line" style="line-height:26px;"><d id="deductcredit_info"><%deductcredit%></d> 积分可抵扣 <d id="deductcredit_money" style='color:#ff6600'><%deductmoney%></d> 元
            <div id="deductcredit" class="nav" on="0" credit="<%deductcredit%>" money="<%deductmoney%>"><nav></nav></div>
        </div>
        <%/if%>

        <%if deductcredit2 > 0%>
        <div class="line" style="line-height:26px;">余额可抵扣 <d id="deductcredit2_money" style="color:#ff6600"><%deductcredit2%></d> 元
            <div id='deductcredit2' class="nav" on="0" credit2="<%deductcredit2%>"><nav></nav></div>
        </div>
        <%/if%>
        </div>
    </div>
<%/if%>
</script>
<div style="background: white">
<span style="color:#666;font-size: 12px;line-height: 18px;padding: 10px;display: block;">
通过收银台支付时,您可以获得额外的奖励!<br/>
余额奖励:订单总额的<?php  echo $store['creditpack'];?>%<br/>
红包奖励:订单总额的<?php  echo $store['redpack'];?>%<br/>
积分奖励:订单总额的<?php  echo $store['credit1'];?>%<br/>
<?php  if(!empty($store['couponid'])) { ?>
支付完成之后还有优惠券赠送哦!
<?php  } ?>    
</span>

</div>
<div class="addorder_pay">
    <div class="paysub">立即支付</div>
    <span>需付：￥<t class='totalprice'><?php  echo $orig_price;?></t>元</span>
</div>
<?php  } else if($operation == 'create-order') { ?>

<?php  } ?>
</div>

<?php  if($hascouponplugin) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('coupon/chooser', TEMPLATE_INCLUDEPATH)) : (include template('coupon/chooser', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<script>
require(['tpl', 'core'], function(tpl, core) {
    $('#orig_price').bind('input propertychange', function() {
        $('#hascouponplugin').hide();
        var orig_price = $('#orig_price').val();
        $('.totalprice').html('');
        $('.totalprice').html(orig_price);
        
            core.pjson('cashier/order_confirm', {op: 'get_deduct', orig_price: orig_price, sid:"<?php  echo $_GPC['sid'];?>"}, function (rjson) {
                    
                    if(rjson.status == 1){
                        $('#couponcount').html(rjson.result.couponcount);
                        $('#deduct_container').html(tpl('tpl_deduct',rjson.result.deduct));
                    }
                    
                    
                
            }, true, true);


        //core.pjson('cashier/order_confirm',{orig_price:orig_price},function(json){
        //         alert(json.status);
                 // $('.couponcount').html(json.result.couponcount);
            
            
        // }, true, true)
    });
    function calctotalprice() {
        var totalprice  = $('#orig_price').val();
        <?php  if($hascouponplugin) { ?>
            totalprice = calcCouponPrice(totalprice);
        <?php  } ?>
        var deductprice = 0;
        if ($("#deductcredit").length > 0) {
            if ($("#deductcredit").attr('on') == '1') {
                deductprice = parseFloat($("#deductcredit").attr('money').replace(',', ''))
                if ($("#deductcredit2").length > 0) {
                    var td1 = parseFloat( $("#deductcredit2").attr('credit2').replace(',','') );
                    if (totalprice - deductprice >= 0) {
                        var td = totalprice - deductprice;
                        if (td > td1) {
                            td = td1;
                        }
                        $("#deductcredit2_money").html(td.toFixed(2));
                    } else {
                        $("#deductcredit2").attr('on','0').removeClass('on');
                    }
               }
            } else {
                if ($("#deductcredit2").length > 0) {
                    var td = parseFloat($("#deductcredit2").attr('credit2').replace(',', ''));
                    $("#deductcredit2_money").html(td.toFixed(2));
                } 
            }
        }   
        var deductprice2 = 0;
        if ($("#deductcredit2").length > 0) {
            if ($("#deductcredit2").attr('on') == '1') {
                deductprice2 = parseFloat($("#deductcredit2_money").html().replace(',',''));
            }
        }

        totalprice = totalprice - deductprice - deductprice2;
        if (totalprice <= 0) { 
            totalprice = 0;
        }

        $('.totalprice').html(totalprice.toFixed(2));
        return totalprice;
    }
    
    $(document).on('click','#deductcredit',function(){
        var on = $(this).attr('on') == '0' ? '1' : '0';
        $(this).attr('on', on);
        if (on == '1') {
            $(this).addClass('on').find('nav').addClass('on');
        } else {
            $(this).removeClass('on').find('nav').removeClass('on');
        } 
        calctotalprice();
    });
    $(document).on('click','#deductcredit2',function(){
        var on = $(this).attr('on') == '0' ? '1' : '0';
        $(this).attr('on', on);
        if (on == '1') {
            $(this).addClass('on').find('nav').addClass('on');
        } else{
            $(this).removeClass('on').find('nav').removeClass('on');
        } 
        calctotalprice();
    });
    
    <?php  if($hascouponplugin) { ?>
    bindCouponEvents();
    function calcCouponPrice (totalprice) {
        $('#coupondeduct_div').hide();
        $('#coupondeduct_text').html('');
        $('#coupondeduct_money').html('0');
        if ($('#couponid').val() == '' || $('#couponid').val() == '0') {
            return totalprice;
        }
        var deduct   = parseFloat( $('#couponselect').data('deduct') );
        var discount = parseFloat( $('#couponselect').data('discount') );
        var backtype = parseFloat( $('#couponselect').data('backtype') );

        var deductprice = 0;
        if (deduct > 0 && backtype == 0) { //抵扣
            if (deduct > totalprice) {
                deduct = totalprice;
            }
            if (deduct <= 0) {
                deduct = 0;
            }
            deductprice = deduct;
            totalprice -= deduct;
            $('#coupondeduct_text').html('-优惠券优惠');
        } else if (discount > 0 && backtype == 1) {  //打折
            deductprice = totalprice *  (1 - discount/10 );
            if (deductprice > totalprice) {
                deductprice = totalprice;
            }
            if (deductprice <= 0) {
                deductprice = 0;
            }
            totalprice -= deductprice;
            $('#coupondeduct_text').html('-优惠券折扣(' + discount + '折)');
        }
        if (deductprice > 0) {
            $('#coupondeduct_div').show();
            $('#coupondeduct_money').html(deductprice.toFixed(2));    
        }
        return totalprice;
    }
    function bindCouponEvents () {
        
        $(document).on('click','#selectcoupon',function(){
            var money = parseFloat($('.totalprice').html().replace(",", ""));
            core.pjson('coupon/util', {op: 'query', money: money, type:0}, function (rjson) {
                if (rjson.status != 1) {
                    core.tip.show(rjson.result);
                    $('#couponid').val('');
                    calctotalprice(); 
                    return;
                }
                if (rjson.result.coupons.length > 0) {
                    CouponChooser.cancelCallback = function () {
                        $('#coupondeduct_div').hide();
                        $('#coupondeduct_text').html('');
                        $('#coupondeduct_money').html('0');
                        calctotalprice();
                    }
                    CouponChooser.confirmCallback = function(){
                        calctotalprice();
                    }
                    CouponChooser.open( rjson.result );
                }
            }, true, true);
        });
    }
    <?php  } ?>
    var carrier_realname = $.trim( $('#carrier_input_realname').val() );
    var carrier_mobile = $.trim( $('#carrier_input_mobile').val() );
    var data = {
        sid: $('#sid').val(),
        op: 'create-order',
        orig_price: $('#orig_price').val(),
        carrier:{
            carrier_realname:carrier_realname,
            carrier_mobile:carrier_mobile,
        }
    };

    $('.paysub').click(function() {
        if($('#orig_price').val()==''){
          core.tip.show("请填写金额!")
          return false;  
        }
        var iscontact = "<?php  echo $store['iscontact'];?>";
        if(iscontact == 1){
            if($('#carrier_input_realname').val()==''){
                core.tip.show("请填写联系人!")
                return false;  
            }
            if($('#carrier_input_mobile').val()==''){
                core.tip.show("请填写联系人电话!")
                return false;  
            }
        }
        if ($("#deductcredit").length > 0) {
            if ($("#deductcredit").attr('on') == '1') {
                var deduct = 1;
            }
        }
        if ($("#deductcredit2").length > 0) {
            if ($("#deductcredit2").attr('on') == '1') {
                var deduct2 = 1;
            }
        }

    var carrier_realname = $.trim( $('#carrier_input_realname').val() );
    var carrier_mobile = $.trim( $('#carrier_input_mobile').val() );
    var data = {
        sid: $('#sid').val(),
        op: 'create-order',
        orig_price: $('#orig_price').val(),
        carrier:{
            carrier_realname:carrier_realname,
            carrier_mobile:carrier_mobile,
        },
        deduct:deduct,
        deduct2:deduct2,
    };
    <?php  if($hascouponplugin) { ?>
        data.couponid = $('#couponid').val();
    <?php  } ?>
        core.pjson('cashier/order_confirm', data, function(create_json) {

            if (create_json.status == 1) {

                location.href = "<?php  echo $this->createPluginMobileUrl('cashier/order_pay')?>&orderid=" + create_json.result.orderid + "&openid=<?php  echo $openid;?>&mid=<?php  echo $_GPC['mid'];?>";
            }  else if (create_json.status == -1) {
                 $('.paysub').html('确认').removeAttr('submitting');
                 core.tip.show(create_json.result);
            }
            else {
                $('.paysub').html('确认').removeAttr('submitting');
                core.tip.show("生成订单失败!" + create_json.result)
            }

        }, true, true);
    });
});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
