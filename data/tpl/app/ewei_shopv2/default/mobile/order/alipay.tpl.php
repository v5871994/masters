<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .fui-content {background-color: #019fe8; background-image: url("../addons/ewei_shopv2/template/mobile/default/static/images/alipay.png"); background-repeat: no-repeat; background-size: 80%; background-position: center 8rem;}
    .layer {position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-image: url("../addons/ewei_shopv2/template/mobile/default/static/images/guide.png"); background-repeat: no-repeat; background-position: top right; background-size: 28%; color: #fff;}
    .layer .text{height: 10rem; width: 13rem; color: #fff; position: absolute; top: 2.5rem; left: 50%; margin-left: -5.5rem; font-size: 1.1rem;}
    .layer .tip {height: 1rem; left: 0; right: 0; bottom: 3rem; position: absolute; font-size: 0.8rem; text-align: center;}
</style>

<div class='fui-page  fui-page-current order-create-page'>
    <div class='fui-content'>
        <div class="layer">
            <div class="text">
                <p>① 请点击右上角</p>
                <p>② 通过【浏览器打开】</p>
                <p>③ 完成支付</p>
                <p>④ 返回此页面</p>
            </div>
            <div class="tip">TIP: 支付完成后自动跳转</div>
        </div>
    </div>
</div>

<script>
    require(['core'], function (core) {
        var orderid = "<?php  echo $_GPC['orderid'];?>";
        var type = "<?php  echo $_GPC['type'];?>";
        var id = "<?php  echo $_GPC['id'];?>";
        var logid = "<?php  echo $_GPC['logid'];?>";

        if(type==0){
            var url = core.getUrl('order/pay/orderstatus');
            var data = {id: orderid};
            var url_return = core.getUrl('order/pay/success', {id: orderid});
        }else if(type == 20){
            var url = core.getUrl('creditshop/detail/lottery');
            var data = {id: id,logid:logid };
            var url_return = core.getUrl('creditshop/log');
        }else if(type == 21){
            var url = core.getUrl('creditshop/log/payresult');
            var data = {id: id};
            var url_return = core.getUrl('creditshop/log/detail', {id: id});
        }else if(type == 6){
            var url = core.getUrl('threen/register/lottery');
            var data = {id: logid};
            var url_return = core.getUrl('threen');
        }else{
            var url = core.getUrl('member/recharge/getstatus');
            var data = {logno: orderid };
            var url_return = core.getUrl('member');
        }

        var settime = setInterval(function () {
            $.getJSON(url, data, function (ret) {
                if (ret.status >=1) {
                    clearInterval(settime);
                    location.href = url_return;
                }else{
                    //FoxUI.toast.show(JSON.stringify(ret));
                }
            })
        }, 1000);
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
