<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if($_GPC['op']=='order') { ?>

<style type="text/css">
    body {margin:0px; background:#efefef; -moz-appearance:none; -webkit-appearance: none;}
    .order_topbar {height:44px; width:100%; background:#fff; border-bottom:1px solid #e3e3e3;}
    .order_topbar .nav {height:44px; width:25%; line-height:44px; text-align:center; font-size:14px; float:left; color:#666;}
    .order_topbar .on {height:42px; color:#ff771b; border-bottom:2px solid #ff771b;}
    .order_noinfo {height:20px; width:150px; background:url(img/order_img1.png) top center no-repeat; margin:50px auto 0px; padding-top:100px; line-height:20px; font-size:14px; text-align:center; color:#c9c9c9;}
    .order_main {height:auto; width:94%; background:#fff; padding:0px 3%; margin-top:16px; border-bottom:1px solid #e2e2e2; border-top:1px solid #e2e2e2;}
    .order_main .title {height:42px; width:100%; border-bottom:1px solid #e2e2e2; font-size:14px; line-height:42px; color:#666;}
    .order_main .title span {height:42px; width:auto; float:right; color:#ff771b;}
   

    .order_main .good {height:50px; width:100%; padding:10px 0px; border-bottom:1px solid #eaeaea;}
    .order_main .good .img {height:50px; width:50px; float:left;}
    .order_main .good  .img img {height:100%; width:100%;}
    .order_main .good  .info {width:100%;float:left; margin-left:-50px;margin-right:-60px;}
    .order_main .good .info .inner { margin-left:60px;margin-right:60px; }
    .order_main .good .info .inner .name {height:32px; width:100%; float:left; font-size:12px; color:#555;overflow:hidden;}
    .order_main .good .info .inner .option {height:18px; width:100%; float:left; font-size:12px; color:#888;overflow:hidden;word-break: break-all}
    .order_main .good span { color:#666;}
    .order_main .good  .price { float:right;width:60px;;height:54px;margin-left:-60px;;}
    .order_main .good  .price .pnum { height:20px;width:100%;text-align:right;font-size:14px; }
    .order_main .good  .price .num { height:20px;width:100%;text-align:right;}
    .order_main .info1 {height:42px; width:100%; border-bottom:1px solid #e2e2e2; font-size:14px; color:#999; line-height:42px; text-align:right;}
    .order_main .info1 span {color:#666;}

    .order_main .sub {height:50px; width:100%;}
    .order_main .sub1 {height:30px; width:auto; padding:0px 10px; border:1px solid #ff771b; float:right; border-radius:5px; line-height:30px; font-size:14px; margin:10px 5px 10px 0px; color:#fff; background:#ff771b;}
    .order_main .sub2 {height:30px; width:auto; padding:0px 10px; border:1px solid #5f6e8b; float:right; border-radius:5px; line-height:30px; font-size:14px; margin:10px 5px 10px 0px; color:#5f6e8b;}
    select { width:80px;height:30px;position:absolute;left:0; filter:alpha(Opacity=0); opacity: 0;-webkit-appearance: none;background:#fff; -webkit-tap-highlight-color: transparent };
    .order_no {height:40px; width:100%;  padding-top:180px; margin:50px 0px;}

    .order_no {height:100px; width:100%; margin:50px 0px 60px; color:#ccc; font-size:12px; text-align:center;}
    .order_no_menu {height:40px; width:100%; text-align:center;}
    .order_no_nav {height:38px;padding:10px; width:100px; background:#eee; border:1px solid #d4d4d4; border-radius:5px; text-align:center; line-height:38px; color:#666;}
    #order_loading { width:94%;padding:10px;color:#666;text-align: center;}

</style>
<div id='container'></div>
<script id='tpl_order_list' type='text/html'>
    <div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
    <div class="title">我的订单</div>
</div>
    <div class="order_topbar">
        <div class="nav <?php  if($_GPC['status']=='') { ?>on<?php  } ?>" data-status="">全部</div>
        <div class="nav <?php  if($_GPC['status']=='1') { ?>on<?php  } ?>"  data-status="1">待发货</div>
        <div class="nav <?php  if($_GPC['status']=='2') { ?>on<?php  } ?>"  data-status="2">待收货</div>
        <div class="nav <?php  if($_GPC['status']=='3') { ?>on<?php  } ?>"  data-status="3">已完成</div>
    </div>
    <div id='order_container'></div>
</script>
<script id='tpl_order' type='text/html'>
    <%each list as order%>
    <div class="order_main" data-orderid="<%order.id%>">
        <div class="title">订单号：<%order.ordersn%><span><%order.status%></span></div>
        <%each order.goods as g%>      
        <div class="good">
            <div class="img"><img src="<%g.thumb%>"/></div>
            <div class='info'>
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
        <div class="info1">共 <%order.goodscount%> 件商品&nbsp;实付：<span>￥<%order.price%></span></div>
        <%if order.isstatus == 1%>
    <%/if%>
    </div>
    <%/each%>
    
</script>
<script id='tpl_empty' type='text/html'>
    <div class="order_no"><i class="fa fa-file-text-o" style="font-size:100px;"></i><br><span style="line-height:18px; font-size:16px;">您还没有供应商订单</span></div>
</script>
<script language='javascript'>

    var page = 1;
    require(['tpl', 'core'], function(tpl, core) {
             core.pjson('supplier/orderj', {'op':'<?php  echo $_GPC['op'];?>', page:page, status: '<?php  echo $_GPC['status'];?>'}, function(json) {

                    $("#container").html(tpl('tpl_order_list'));

                    $('.nav').click(function() {
                        var status = $(this).data('status');
                        location.href = core.getUrl('plugin/supplier/orderj', {'op':'order',status: status});
                    })
                    
                    if (json.result.list.length <= 0) {
                        $("#order_container").html(tpl('tpl_empty'));
                        return;
                    }
                    $("#order_container").html(tpl('tpl_order', json.result));
                    $('.order_main').click(function(){
                        var orderid = $(this).closest('.order_main').data('orderid');
                        location.href = core.getUrl('plugin/supplier/detail', {orderid: orderid});
                    });
                }, true);
      
    });
</script>
<?php  $show_footer = true?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>

<title>供应商中心</title>

<style type="text/css">

    body {margin:0px; background:#eee; font-family:'微软雅黑'; }

    a {text-decoration:none;}

    .topbar {height:40px; padding:10px; background:#fff;}

    .topbar .user_face {height:40px; width:40px; background:#ccc; float:left;}

    .topbar .user_face img {height:100%; width:100%;}

    .topbar .user_info {height:40px; width:auto; float:left; margin-left:12px;}

    .topbar .user_info .user_name {height:24px; width:100%; font-size:16px; line-height:24px; color:#666;}

       .topbar .user_info .user_name span { font-size:14px; color:#ff6600}

    .topbar .user_info .user_date {height:14px; width:100%; font-size:14px; line-height:14px; color:#999;}



    .top {height:180px;padding:5px; background:#cc3431;}

    .top .top_1 {height:114px; width:100%;}

    .top .top_1 .text {height:114px; width:auto; float:left; color:#fff; line-height:50px; font-size:14px; color:#fff;}

    .top .top_1 .ico {height:40px; width:30px; background:url(../addons/sz_yi/plugin/commission/template/mobile/default/static/images/gold_ico2.png) 0px 10px no-repeat; margin-bottom:74px; float:right;}

    .top .top_2 {height:66px; width:100%; font-size:40px; line-height:66px; color:#fff;}

    .top .top_2 span {height:32px; color:#fff; width:auto; border:1px solid #fff; font-size:14px; line-height:32px; margin-top:17px; padding:0px 15px;  float:right; border-radius:5px;}

    .top .top_2 .disabled { color:#999;border:1px solid #999;}

    .menu {overflow:hidden; background:#fff;}

    .menu .nav { width:33%; float:left;padding-top:10px;padding-bottom:10px;}

    

    .menu .nav .title {height:24px; width:100%; text-align:center; font-size:14px; color:#666;}

    .menu .nav .con {height:20px; width:100%; text-align:center; font-size:12px; color:#999;}

    .menu .nav .con span {color:#f90;}

    .menu .nav1 {border-bottom:1px solid #f1f1f1; border-right:1px solid #f1f1f1;  text-align:center; } .menu .nav1 i { color:#ff9901;}

    .menu .nav2 {border-bottom:1px solid #f1f1f1; border-right:1px solid #f1f1f1;text-align:center;} .menu .nav2 i { color:#98cd37}

    .menu .nav3 {border-bottom:1px solid #f1f1f1;text-align:center; } .menu .nav3 i { color:#ffcb05} 

    .menu .nav4 {border-right:1px solid #f1f1f1; text-align:center;} .menu .nav4 i { color:#ca81d1}

    .menu .nav5 {border-right:1px solid #f1f1f1; text-align:center;} .menu .nav5 i { color:#53bdec}

    .menu .nav6 {border-bottom:1px solid #f1f1f1; text-align:center;} .menu .nav6 i { color:#CC3431}
	
    .menu .nav7 {border-bottom:1px solid #f1f1f1; text-align:center;} .menu .nav7 i { color:#53bdec}
    .menu .nav8 {border-bottom:1px solid #f1f1f1; text-align:center;} .menu .nav8 i { color:#ff9901}
    .menu .nav9 {border-bottom:1px solid #f1f1f1; text-align:center;} .menu .nav9 i { color:#98cd37}

.gold_sub {height:44px; width:94%; background:#31cd00; line-height:44px; font-size:18px; color:#fff; text-align:center; margin:16px 3%; border-radius:5px;}
.gold_sub1 {height:44px; width:94%; background:#ccc; line-height:44px; font-size:18px; color:#fff; text-align:center; margin:16px 3%; border-radius:5px;}
</style>
<div id='container'></div>
<script id='tpl_main' type='text/html'>

    <div class="topbar">

        <div class="user_face"><img src="<%member.avatar%>"></div>

        <div class="user_info">

            <div class="user_name" <%if set.levelurl!=''%>onclick='location.href="<%set.levelurl%>"'<%/if%>><%member.realname%> <span>

                   <%if set.levelurl!=''%><i class='fa fa-question-circle' ></i></span><%/if%></div>

            <div class="user_date">用户名：<?php  echo $username;?></div>

        </div>

    </div> 

    <div class="top">

        <div class="top_1">

            <div class="text">累计提现金额：<?php  echo $commission_total?> 元<br>可提现金额（元）（订单完成后可获得）</div>

        </div>

        <div class="top_2"><?php  echo $commission_ok?><a <?php  if($commission_ok<=0 ) { ?>href="javascript:;"<?php  } else { ?>href="<?php  echo $this->createPluginMobileUrl('supplier/applyg')?>"<?php  } ?> id='withdraw' ><span <?php  if($commission_ok<=0 ) { ?>class='disabled'<?php  } ?> >提现</span></a></div>

    </div> 

    <div class="menu">  

        <a <?php  echo "href='".$this->createPluginMobileUrl('supplier/logg')."'";?>><div class="nav nav1"><i class="fa fa-cny fa-3x"></i><div class="title">提现记录</div><div class="con"><span><?php  echo $commission_total?></span>元</div></div></a>

        <a <?php  echo "href='".$this->createPluginMobileUrl('supplier/orderj',array('op' => 'order','type'=>$_GPC['type']))."'";?>><div class="nav nav3"><i class="fa fa-list fa-3x"></i><div class="title">我的订单</div><div class="con"><span><?php  echo $ordercount0;?></span>个订单</div></div></a>


    </div>
     
</script>


<script language="javascript">

    require(['tpl', 'core'], function(tpl, core) {

        core.pjson('supplier/applyg',{},function(json){
            
            var result = json.result;   

            $('#container').html(  tpl('tpl_main',result) );


            $('#withdraw').click(function(){

                if(!json.result.cansettle){

                     if(json.result.settlemoney>0){

                     //core.tip.show('需到'+json.result.settlemoney+'元才能申请提现!');    

                     }else{

                        core.tip.show('无可提佣金!');        

                     }

                }

            });

        },true);
    })

</script>
<?php  } ?>
<?php  $show_footer=true;$footer_current ='commission'?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

