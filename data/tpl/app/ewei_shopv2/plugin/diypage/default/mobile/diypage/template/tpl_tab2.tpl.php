<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['data'])) { ?>
<style>
.nav_box nav{display:inline;height:1.6rem;line-height:1.6rem;color:#7D7D7D}
.fui-tab2{height:2.2rem;background:white;}
.fui-tab2 .fui-menu-item:before{display:none}
.fui-tab2  a.point:after{content:'';position:absolute;width:80%;height:2px;background:#C2E5E3;left:0.3rem;bottom:0.4rem;}
</style>
  <div class="fui-tab2" >

	<?php  if(is_array($category)) { foreach($category as $index => $c) { ?>
		<?php  if($index<4) { ?>
		 <a  class="fui-menu-item <?php  if($index==0) { ?>point<?php  } ?>" style="color: <?php  echo $menuitem['textcolor'];?>;font-size:0.65rem;position:relative" 
		 href="<?php  echo mobileUrl('goods')?>&cate=<?php  echo $c['id'];?>" data-nocache="true"><?php  echo $c['name'];?> </a>
		<?php  } ?>
	<?php  } } ?>	
	<a style="width:0.5%;position:relative;display:table-cell;text-align:center;"><i class='icon icon-unfold' style='font-size:1rem;color:#696969' id='show_nav'></i></a>
    </div>
	<div class='fui-mask-m' id='nav_mask' style="display:none"></div>
	<div class="nav_box " style="width:100%;display:none;">
		<div style="width:100%;height:1.2rem;">
			<nav style="position:absolute;left:8px;color:#959595;font-size:0.7rem ">请选择</nav>
			<nav style="position:absolute;right:8px;z-index:2000"><i class='icon icon-fold' style='font-size:1rem' id='hide_nav'></i></nav>
		</div>
		<div  style="width:100%;height:auto;margin-top:5px;z-index:3000;position:relative;border-top:#F5F5F5 1px solid;font-size:0.7rem">
		   <?php  if(is_array($category)) { foreach($category as $ind => $c) { ?>
				<a  href="<?php  echo mobileUrl('goods')?>&cate=<?php  echo $c['id'];?>" class="fui-menu-item " style="color: #696969 ;text-align:center;width:25%;float:left;padding:5px;" ><?php  echo $c['name'];?></a>
		   <?php  } } ?>
		</div>
	</div>
	<script>
		$("#show_nav").click(function(){
			$("#nav_mask").show();
			$(".nav_box").show();
			$("#show_nav").hide();
		});
		
		$("#hide_nav").click(function(){
			$("#nav_mask").hide();
			$(".nav_box").hide();
			$("#show_nav").show();
		});
	</script>
<?php  } ?>