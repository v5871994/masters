<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sider', TEMPLATE_INCLUDEPATH)) : (include template('sider', TEMPLATE_INCLUDEPATH));?> 
<?php  if($reply['status']==0 || $reply['status']=="") { ?>
<div class="alert alert-warning" style="text-align:center;position: fixed;top:40%;z-index: 2; width:80%;margin:0 10%;">活动已禁用！</div>
<div class="weui_mask"></div>
<?php  } ?>
<script type="text/javascript">
var intDiff = parseInt(<?php  echo $reply['endtime']-time();?>);//倒计时总秒数量
function timer(intDiff){
	window.setInterval(function(){
	var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值		
	if(intDiff > 0){
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
	}
	if (minute <= 9) minute = '0' + minute;
	if (second <= 9) second = '0' + second;
	$('#day_show').html(day+"天");
	$('#hour_show').html('<s id="h"></s>'+hour+'时');
	$('#minute_show').html('<s></s>'+minute+'分');
	$('#second_show').html('<s></s>'+second+'秒');
	intDiff--;
	}, 1000);
} 

$(function(){
	timer(intDiff);
});	
</script>




<div class="time-item">
    <div class="day">活动结束倒计时</div>
	<strong id="day_show">0天</strong>
	<strong id="hour_show">0时</strong>
	<strong id="minute_show">0分</strong>
	<strong id="second_show">0秒</strong>
</div>
<?php  if($reply['diamondmodel']==0) { ?>
<div class="paihang1 clearfix">

  <div class="divitem"> <a href="<?php  echo $this->createMobileUrl('ranking', array('rid' => $rid))?>">
    <div <?php  if($_GPC['ty']==0 or  $_GPC['ty']=="") { ?>class='divtxt'<?php  } ?>>票数榜</div>
    </a>
    <div class="divline"></div>
  </div>
  <div class="divitem"> <a href="<?php  echo $this->createMobileUrl('ranking', array('rid' => $rid,'ty' =>1))?>">
    <div <?php  if($_GPC['ty']==1) { ?>class='divtxt'<?php  } ?>>礼物榜</div>
    </a>
  </div>
</div>
  <?php  } ?>
<div class="paihang2">


  </div>
  <div id="list_more" class="box" style="margin-top: 16px; text-align: center;margin-bottom: 40px;"><span class="am-text-secondary" onclick="get_list();">点击加载数据</span></div>
  <script> 
var limit = 1;
function get_list(){	
	$("#list_more").html('<div class="am-text-secondary"><span class="am-icon-spinner am-icon-spin"></span> 卖命加载中...</div>');
	$.ajax({
	    type : "post",
	    url : "<?php  echo $this->createMobileUrl('ranking',array('rid'=>$rid,'ty'=>$_GPC['ty']))?>",
	    data : {
	    	limit:limit,
	    },
        dataType : "json",		
	    success : function(data) {
	    	if(data.status==200){
						var list = data.content;
						var content = '';
						$(".paihang2").append(list);
						for(var i=0; i<list.length; i++){
							  content = '<div class="datalist" '+list[i]['color']+'>'
								+'<a href="'+list[i]['url']+'">'
								+'<div class="tops">'
								+'<div class="itemhg"><img src="<?php echo MODULE_URL;?>/template/static/images/'+list[i]['hg']+'"></div>'
								+'<div class="item1"><img src="'+list[i]['avatar']+'"></div>'
								+'<div class="item2"><font style="font-size:15px;font-weight:bold">'+list[i]['name']+'&nbsp;&nbsp;'+list[i]['noid']+'号</font><br />'
								+'<font style="font-size:11px;">票数 '+list[i]['votenum']+'&nbsp;&nbsp;  '
								<?php  if($reply['diamondmodel']==0) { ?>
								+'礼物 '+list[i]['giftcount']
								<?php  } ?>
								+'<?php  echo $reply['giftunit'];?><br/>'+list[i]['introduction']+'</font></div>'
								+'<div class="item3" '+list[i]['item3color']+'>'+(i+1)+'</div>'
								+'</div></a><div class="bottoms"></div></div>';
							$(".paihang2").append(content);
						}
						/*
						if(list.length==10){
							$("#list_more").html('<span class="am-text-secondary" onclick="get_list();">查看更多</span>');
						}else{
							$("#list_more").html('<span></span>');
						}
						*/
						$("#list_more").html('<span></span>');
						limit++;		
		    }else if(data.status==-103){
	    		$("#list_more").html('<span>没有更多记录！</span>');
	    	}else{
			    $("#list_more").html('<span>没有更多记录！</span>');
			}    	
	    },
	    error : function(xhr, type) {

	    }
	});
}
get_list();
</script>
<style>

.datalist .item3:nth-child(3) {color:#444}

</style>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('nav_footer', TEMPLATE_INCLUDEPATH)) : (include template('nav_footer', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>