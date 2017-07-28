<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($advs)) { ?>
	<div class='fui-swipe' style="position:absolute;width:100%;" > 
	    <div class='fui-swipe-wrapper'>
	    	<?php  if(is_array($advs)) { foreach($advs as $item) { ?>
	    		<div class='fui-swipe-item' <?php  if(!empty($item['link'])) { ?>onclick="location.href='<?php  echo $item['link'];?>'"<?php  } ?>><img src="<?php  echo tomedia($item['thumb'])?>" /></div>
			<?php  } } ?>
	    </div>
	    <div class='fui-swipe-page'></div>
	</div>
	<script>
		var swipe_w=$('.fui-swipe').width();
		$('.fui-swipe').css('height',swipe_w*0.75);
	</script>
<?php  } ?>