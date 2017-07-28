<?php defined('IN_IA') or exit('Access Denied');?><style>
.dv-tabs{width:100%;display: inline;white-space: nowrap;overflow-x:scroll;float:left;overflow-y:hidden;border-bottom:1px solid rgba(192,192,192,0.6);box-shadow:0 3px 6px 0 rgba(220,220,220,0.8)  }
.dv-tabs nav{display:inline-block;width:80px;height:40px;text-align:center;font-size:0.72rem;color:#454545;line-height:40px;}
.dv-tabs nav.active{border-bottom:2px solid #FF4522;color:#FF4522 }
.dv-tab-show{padding-top:50px;}
</style>

<div class="dv-tabs" >
		<?php  if(is_array($category)) { foreach($category as $index => $c) { ?>
			<nav class="dv-tab <?php  if($index==0) { ?>active<?php  } ?>" data-cid="<?php  echo $c['id'];?>" ><?php  echo $c['name'];?></nav>
		<?php  } } ?>
</div>
<div class="fui-content " id='dv_main'>
	<div class='fui-content-inner'>
	    <div class='content-empty' style='display:none;'>
		<i class='icon icon-searchlist'></i><br/>暂时没有任何商品
	    </div>
	    <div class="fui-goods-group container block" id="goods-list-container" ></div>
	    <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
	</div>
		
</div>


<script type="text/html" id="tpl_dv_goods" >
<%each list as g%>
	<div class="fui-goods-item" data-goodsid="<%g.id%>" data-type="<%g.type%>" > 
	  <a <%if g.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%g.bargain%>"<%else%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>"<%/if%>>
	  <div class="image" data-lazy-background="<%g.thumb%>" > 
		  <%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
	  </div>
        </a>
	<div class="detail">
	   <a <%if g.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%g.bargain%>"<%else%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>"<%/if%>>
	           <div class="name"><%g.title%></div>
	   </a>
	           <div class="price">
		   <span class="text">￥<%g.minprice%></span>
           <span class="buy"><%if g.bargain >0%>砍价活动<%else%><i class="icon icon-cart"></i><%/if%></span></div>
 	    </div>
	</div>
<%/each%>
</script>


<script language='javascript'>
	//var swipe_w=$('.fui-swipe').width();
	//$('.fui-swipe').css('height',swipe_w*0.75);
	var top_h=$('.follow_topbar').height();
	$('#dv_main').css('top',top_h);
	require(['biz/dv-show'], function (modal) {
		modal.init({fromDetail:false,category:<?php  echo $category[0]['id'];?>});
	});
</script>
