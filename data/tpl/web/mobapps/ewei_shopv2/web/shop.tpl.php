<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

 <link type="text/css" rel="stylesheet" href="../web/static/mobapps/css/dsh_style.css">
 
 <script src="../web/static/mobapps/js/hm.js"></script>
  <script src="../web/static/mobapps/js/jquery.min.js"></script>
  
  <script src="../web/static/mobapps/js/slides.min.jquery.js"></script>

<!--<div class="page-heading">
    <span class='pull-right'>
        <?php if(cv('goods.add')) { ?>
        <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('goods/add')?>"><i class='fa fa-plus'></i> 添加商品</a>
        <?php  } ?>
    </span>
    <h2>商城概述</h2>
</div>-->


<div class="container">
		
		<div class="body-content">
            
            
            
            <div class="body-content-bg gray">
                <div class="body-content1">
                    
                    <ul class="shuoming3">
                        <li class="" onclick="window.open('<?php  echo webUrl('sysset/shop')?>')" >
                            <div class="icon-xm icon11"></div>
                            <a href="javascript:;">商城设置</a>
                        </li>                      
                        <li class="" onclick="window.open('<?php  echo webUrl('goods')?>')">
                            <div class="icon-xm icon12"></div>
                            <a>商品管理</a>
                        </li>
						
                        <li  class="" onclick="window.open('<?php  echo webUrl('member')?>')" >
                            <div class="icon-xm icon24"></div>
                            <a href="<?php  echo webUrl('member')?>">会员管理</a>
                        </li>
						 <li class="" onclick="window.open('<?php  echo webUrl('commission')?>')">
                            <div class="icon-xm icon17"></div>
                            <a href="javascript:;">分销设置</a>
                        </li>
						<li class="" onclick="window.open('<?php  echo webUrl('diypage')?>')">
                            <div class="icon-xm icon18"></div>
                            <a href="javascript:;">店铺装修</a>
                        </li>
						
                        <li class="" onclick="window.open('<?php  echo webUrl('order')?>')" >
                            <div class="icon-xm icon25"></div>
                            <a href="javascript:;">订单管理</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('sale')?>')">
                            <div class="icon-xm icon21"></div>
                            <a href="javascript:;">营销设置</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('finance/log/recharge')?>')">
                            <div class="icon-xm icon28"></div>
                            <a href="javascript:;">财务统计</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('statistics')?>')">
                            <div class="icon-xm icon16"></div>
                            <a href="javascript:;">数据统计</a>
                        </li>
                       
                        <li class="" onclick="window.open('<?php  echo webUrl('creditshop')?>')">
                            <div class="icon-xm icon15"></div>
                            <a href="javascript:;">积分商城</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('groups')?>')">
                            <div class="icon-xm icon34"></div>
                            <a href="javascript:;">拼团设置</a>
                        </li>
						
						 <li class="" onclick="window.open('<?php  echo webUrl('bargain')?>')">
                            <div class="icon-xm icon21"></div>
                            <a href="javascript:;">砍价活动</a>
                        </li>
						
						
                        <li class="" onclick="window.open('<?php  echo webUrl('merch')?>')">
                           <div class="icon-xm icon19"></div>
                            <a href="javascript:;">多商户</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('globonus')?>')">
                            <div class="icon-xm icon33"></div>
                            <a href="javascript:;">全民股东</a>
                        </li>
						
						 <li class="" onclick="window.open('<?php  echo webUrl('abonus')?>')">
                           <div class="icon-xm icon40"></div>
                            <a href="javascript:;">区域代理</a>
                        </li>
						
                        <li class="" onclick="window.open('<?php  echo webUrl('poster')?>')">
                            <div class="icon-xm icon14"></div>
                            <a href="javascript:;">超级海报</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('postera')?>')">
                            <div class="icon-xm icon27"></div>
                            <a href="javascript:;">活动海报</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('sns')?>')">
                            <div class="icon-xm icon26"></div>
                            <a href="javascript:;">活动社区</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('taobao')?>')">
                            <div class="icon-xm icon23"></div>
                            <a href="javascript:;">商品助手</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('sign')?>')">
                            <div class="icon-xm icon40"></div>
                            <a href="javascript:;">积分签到</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('article')?>')">
                            <div class="icon-xm icon29"></div>
                            <a href="javascript:;">文章营销</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('diyform')?>')">
                            <div class="icon-xm icon22"></div>
                            <a href="javascript:;">自定表单</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('exhelper')?>')">
                            <div class="icon-xm icon31"></div>
                            <a href="javascript:;">快递打印</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('sysset/printer/printer_list')?>')">
                            <div class="icon-xm icon19"></div>
                            <a href="javascript:;">小票打印</a>
                        </li>
                       
                        
                        <li class="" onclick="window.open('<?php  echo webUrl('shop/verify/store')?>')">
                            <div class="icon-xm icon37"></div>
                            <a href="javascript:;">O2O核销</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('shop/dispatch')?>')"  >
                           <div class="icon-xm icon39"></div>
                            <a href="javascript:;">运费评价</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('sale/coupon')?>')"  >
                           <div class="icon-xm icon16"></div>
                            <a href="javascript:;">优惠券</a>
                        </li>
						
						
                        <li class="" onclick="window.open('<?php  echo webUrl('sysset/payset')?>')">
                            <div class="icon-xm icon30"></div>
                            <a href="javascript:;">支付设置</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('sysset/qiniu')?>')">
                            <div class="icon-xm icon32"></div>
                            <a href="javascript:;">七牛存储</a>
                        </li>
                        <li class="" onclick="window.open('<?php  echo webUrl('qa')?>')">
                            <div class="icon-xm icon13"></div>
                            <a href="javascript:;">帮助中心</a>
                        </li>
                  <li class="" onclick="window.open('<?php  echo webUrl('perm/role')?>')">
                            <div class="icon-xm icon38"></div>
                            <a href="javascript:;">分权管理</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('cashier')?>')">
                            <div class="icon-xm icon28"></div>
                            <a href="javascript:;">收银台</a>
                        </li>
						
						 <li class="" onclick="window.open('<?php  echo webUrl('seckill')?>')">
                            <div class="icon-xm icon21"></div>
                            <a href="javascript:;">整点秒杀</a>
                        </li>
						
						 <li class="" onclick="window.open('<?php  echo webUrl('task')?>')">
                            <div class="icon-xm icon23"></div>
                            <a href="javascript:;">任务中心</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('messages')?>')">
                            <div class="icon-xm icon29"></div>
                            <a href="javascript:;">消息群发</a>
                        </li>
						
						<li class="" onclick="window.open('<?php  echo webUrl('exchange')?>')">
                            <div class="icon-xm icon27"></div>
                            <a href="javascript:;">兑换中心</a>
                        </li>
						
						
						
                       
                    </ul>
                    <div class="purpose"></div>
                </div>
            </div>
           
           
		</div>
	</div>
	


<div class="row"  style="margin-top:100px;">
    <div class="col-md-12 col-sm-12">
        <div class="contact-box">
                <div class="col-sm-1" style="padding:0">

                        <img src="<?php  if(empty($shop_data['logo'])) { ?><?php echo EWEI_SHOPV2_LOCAL;?>static/images/nopic100.jpg<?php  } else { ?><?php  echo tomedia($shop_data['logo'])?><?php  } ?>" style="width:65px;height:65px;border-radius:5px">

                </div>
            <div class="col-sm-10"  style="padding-left:10px">
                    <h3><?php  if(empty($shop_data['name'])) { ?>未设置商城名称<?php  } else { ?><?php  echo $shop_data['name'];?><?php  } ?></h3>
                    <p><?php  if(empty($shop_data['name'])) { ?>未设置商城描述<?php  } else { ?><?php  echo $shop_data['description'];?><?php  } ?></p>
        </div>
        	<?php if(cv('sysset.shop.edit')) { ?>
            	<div class="col-sm-1" style="padding-left: 0"><a class="btn btn-primary btn-sm" href="<?php  echo webUrl('sysset/shop')?>" style="color: #fff"> 点击修改</a></div>
            <?php  } ?>
            <div class="clearfix"></div>

        </div>
    </div>

    <?php  if(count($notice)>0) { ?>
    <div class="col-md-12 col-sm-12">
        <div id="w0" class="list-group">
            <a class="list-group-item" href="#w0-1" data-toggle="collapse" data-parent="#w0" id="notice" onclick="$(this).find('b').toggleClass('deg180')">
                <span style="padding-left: 2rem;"><?php  echo $notice[0]['title'];?></span><b class="caret pull-right" style="margin-top: 8px;"></b>
            </a>
            <div id="w0-1" class="submenu panel-collapse collapse">
                <?php  if(is_array($notice)) { foreach($notice as $key => $value) { ?>
                <a class="list-group-item" href="javascript:" data-toggle="ajaxModal" data-href="<?php  echo webUrl('shop/index/view',array('id'=>$value['id']));?>">
                    <span style="padding-left: 2rem;"><?php  echo $value['title'];?></span>
                </a>
                <?php  } } ?>
            </div>
        </div>
    </div>
    <?php  } ?>

        <div class="col-md-12 col-sm-12">
        <div class="contact-box" style="border: 1px solid #e7eaec">
            <div class="forum-item">
                <div class="row">
                	<?php if(cv('goods')) { ?>
                    <a href="<?php  echo webUrl('goods',array('goodsfrom'=>'out'))?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number goods_totals">
                                                    --
                                                </span>
                            <div>
                                <small>已售罄商品</small>
                            </div>
                        </div>
                    </a>
                    <?php  } ?>
                    
                    <?php if(cv('order.list.status1')) { ?>
                    <a href="<?php  echo webUrl('order/list/status1')?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number status1">
                                                    --
                                                </span>
                            <div>
                                <small><?php  if($is_openmerch == 1) { ?>自营<?php  } ?>待发货订单</small>
                            </div>
                        </div>
                        </a>
                        <?php  } ?>
                        
                        <?php if(cv('order.list.status4')) { ?>
                    <a href="<?php  echo webUrl('order/list/status4')?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number status4">
                                                    --
                                                </span>
                            <div>
                                <small><?php  if($is_openmerch == 1) { ?>自营<?php  } ?>维权中订单</small>
                            </div>
                        </div>
                    </a>
                    <?php  } ?>
                    
                    <?php if(cv('finance.log.withdraw')) { ?>
                    <a href="<?php  echo webUrl('finance/log/withdraw',array('status'=>0))?>">
                    <div class="col-sm-3 forum-info">
                                            <span class="views-number finance_total">
                                                --
                                            </span>
                        <div>
                            <small>待审核提现</small>
                        </div>
                    </div>
                        </a>
                        <?php  } ?>
                </div>
            </div>

   <?php  if($hascommission) { ?>	    
            <div class="forum-item">
                <div class="row">
                	<?php if(cv('commission.agent')) { ?>
                    <a href="<?php  echo webUrl('commission/agent')?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number commission_agent_total">
                                                    --
                                                </span>
                            <div>
                                <small>分销商总数</small>
                            </div>
                        </div>
                    </a>

                    <a href="<?php  echo webUrl('commission/agent',array('status'=>0))?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number commission_agent_status0_total">
                                                   --
                                                </span>
                            <div>
                                <small>待审核分销商</small>
                            </div>
                        </div>
                    </a>
                    <?php  } ?>
                    
                    <?php if(cv('commission.apply.view1')) { ?>
                    <a href="<?php  echo webUrl('commission/apply',array('status'=>1))?>">
                        <div class="col-sm-3 forum-info">
                                            <span class="views-number commission_apply_status1_total">
                                               --
                                            </span>
                            <div>
                                <small>待审核佣金申请</small>
                            </div>
                        </div>
                    </a>
                    <?php  } ?>

					<?php if(cv('commission.apply.view2')) { ?>
                    <a href="<?php  echo webUrl('commission/apply',array('status'=>2))?>">
                        <div class="col-sm-3 forum-info">
                                                <span class="views-number commission_apply_status2_total">
                                                    --
                                                </span>
                            <div>
                                <small>待打款佣金申请</small>
                            </div>
                        </div>
                    </a>
                    <?php  } ?>
                </div>
            </div>
   <?php  } ?>

    </div>
</div>

    <div class="col-md-12 col-sm-12">
        <?php  if(!empty($order_ok)) { ?>
        <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
            <div class="ibox-title">
                <h5>用户购买待发货订单</h5>
            </div>
            <div class="ibox-content">
                <table class="table table-hover no-margins">
                    <thead>
                    <tr>
                        <th class="col-sm-1">状态</th>
                        <th class="col-sm-2">日期</th>
                        <th class="col-sm-1">金额</th>
                        <th class="col-sm-2">用户</th>
                        <th class="col-sm-3">订单号</th>
                        <th class="col-sm-2">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($order_ok)) { foreach($order_ok as $key => $value) { ?>
                    <tr>
                        <td><span class="label label-warning">待发货</span>
                        </td>
                        <td><?php  echo date('Y-m-d H:i',$value['createtime'])?></td>
                        <td class="text-navy"><?php  echo $value['price'];?></td>
                        <td><?php echo !empty($value['address']['realname']) ? $value['address']['realname'] : $value['invoicename']?></td>
                        <td class="text-navy"><?php  echo $value['ordersn'];?></td>
                        <td>
                        	<?php if(cv('order.detail')) { ?>
                        		<a href="<?php  echo webUrl('order/detail',array('id'=>$value['id']))?>" class="btn btn-xs btn-primary">查看详情</a></td>
                        	<?php  } ?>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php  } else { ?>
        <div class="panel panel-default">
            <div class="panel-body" style="text-align: center;padding:30px;">
                暂时没有任何待处理订单!
            </div>
        </div>
        <?php  } ?>
    </div>

</div>

<input type="hidden" name="len" value="0">
<input type="hidden" name="index" value="0">
<script>
    function selectImage(obj){
        util.image('',function(val){
            $(obj).attr('src',val.url);

            $.post("<?php  echo WebUrl('shop/index/ajaxshopconfig',array('type'=>'logo'))?>", { value: val.attachment},
                    function(data){
                        if (data.status == 1)
                        {
                            tip.msgbox.suc('修改成功!' || tip.lang.success);
                        }
                        else
                        {
                            tip.msgbox.err('修改失败!' || tip.lang.error);
                        }
                    }, "json");
        });
    }
</script>

<script type="text/javascript">
    function AutoScroll(obj,len){
        var text = $(obj).find("a span");
        var index = $("input[name='index']").val();
        $("input[name='index']").val(parseInt(index)+1);
        $("input[name='len']").val(text.length);
        if (text.length > index)
        {
            $("#notice span").text($(text[index]).text());
        }
        else
        {
            $("input[name='index']").val(parseInt(0));
            $("#notice span").text($(text[0]).text());
        }

    }
    $(document).ready(function(){
        var scrollDiv = setInterval('AutoScroll("#w0-1")',3000);
        $("#w0").hover(
                function () {
                    clearInterval(scrollDiv);
                },
                function () {
                    scrollDiv = setInterval('AutoScroll("#w0-1")',3000);
                }
        );

        $.ajax({
            type: "GET",
            url: "<?php  echo webUrl('order/list/ajaxgettotals', array('merch' => -1))?>",
            dataType: "json",
            success: function (data) {
                var res = data.result;
                $("span.status1").text(res.status1);
                $("span.status4").text(res.status4);
                $.ajax({
                    type: "GET",
                    url: "<?php  echo webUrl('shop/ajax')?>",
                    dataType: "json",
                    success: function (data) {
                        var res = data.result;
                        $("span.goods_totals").text(res.goods_totals);
                        $("span.finance_total").text(res.finance_total);
                        $("span.commission_agent_total").text(res.commission_agent_total);
                        $("span.commission_agent_status0_total").text(res.commission_agent_status0_total);
                        $("span.commission_apply_status1_total").text(res.commission_apply_status1_total);
                        $("span.commission_apply_status2_total").text(res.commission_apply_status2_total);
                    }
                });
            }
        });
    });
</script>


   <script type="text/javascript">
       $('.last ul li').hover(
          function(){
            $('.show-code',this).stop().animate({
                marginTop:'-260px' 
            });
        },function(){
            $('.show-code',this).stop().animate({
                marginTop:'0'
            });
        }); 
   
    $(function(){
        //顶部菜单
        $(".shuoming3 li").hover(function() {
            $(this).addClass("hover");
        },
        function() {
            $(this).removeClass("hover");
        });
    });

    $(function(){

        $(".choose2").hover(function(){
            $(".choose").stop().animate({
                left:"85px"
            }, 200)
        },function(){
            $(".choose").stop().animate({
                left:"0"
            }, 200)
        });

        $(".choose3").hover(function(){
            $(".choose").stop().animate({
                left:"168px"
            }, 200)
        },function(){
            $(".choose").stop().animate({
                left:"0"
            }, 200)
        });

        $(".choose4").hover(function(){
            $(".choose").stop().animate({
                left:"254px"
            }, 200)
        },function(){
            $(".choose").stop().animate({
                left:"0"
            }, 200)
        });

        $(".choose5").hover(function(){
            $(".choose").stop().animate({
                left:"337px"
            }, 200)
        },function(){
            $(".choose").stop().animate({
                left:"0"
            }, 200)
        });
    });
</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
