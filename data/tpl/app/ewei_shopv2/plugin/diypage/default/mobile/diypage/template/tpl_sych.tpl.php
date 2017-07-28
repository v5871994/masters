<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['data'])) { ?>

	<style>
		.ch_head{width:100%;position:relative;left:0px;right:0px;height:3.5rem;border-bottom:1px solid #F5F5F5;background:white}
		.ch_head_left{width:20%;float:left;height:3.5rem;padding-top:0.7rem}
		.ch_head_left i{position:absolute;left:0.3rem}
		.ch_head_mid{width:60%;float:left;height:3.5rem;}
		.ch_head_mid img{height:2.2rem;width:auto;margin-top:0.6rem}
		.ch_head_right{width:20%;float:left;height:3.5rem;padding-top:0.7rem}
		.ch_head_right i{position:absolute;right:0.3rem}
		.ch_icon{font-size:1.5rem;filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.7; }
		.ch_l_btn{width:1.2rem ;height:1.2rem;background-size:100% 100%;margin-top:0.3rem;filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.7;}
		.ch_r_btn{width:1.2rem ;height:1.2rem;background-size:100% 100%;margin-top:0.3rem;filter:alpha(Opacity=80);-moz-opacity:0.8;opacity: 0.7;}
	</style>
	<?php 
		$ind_ch=0;
		$ch_logo='';
		$ch_r_btn='';$ch_r_url="";$ch_l_btn='';
		foreach($diyitem['data'] as $temp){
			$ind_ch++;
			if($ind_ch==1){
				$ch_l_btn=$temp['imgurl'];
				
			}
			if($ind_ch==2){
				$ch_logo=$temp['imgurl'];
				
			}
			if($ind_ch==3){
				$ch_r_btn=$temp['imgurl'];
				$ch_r_url=$temp['linkurl'];
			}
		}
	?>
	 <div class="ch_head" >
		<div class='ch_head_left ' id='slid_ch_btn'><i class='ch_l_btn' style="background-image:url(<?php  echo tomedia($ch_l_btn)?>);"></i></div>
		<div class='ch_head_mid'><center><img src="<?php  echo tomedia($ch_logo)?>"></center></div>
		<div class='ch_head_right' ><i class='ch_r_btn' style="background-image:url(<?php  echo tomedia($ch_r_btn)?>);" onclick="javascript:location.href='<?php  echo $ch_r_url;?>'"></i></div>
	 </div>
	 
<script>
	var w_width=$(window).width();
	var trans_witdh_l=w_width-80;
	var trans_witdh_r=-100;
	$("#slid_ch_btn").click(function(){
		var slided=$(this).hasClass('slided');
		if(slided){
			close_ch();
		}else{
			open_ch();
		}
		
	});
	
	$("#cover_ch").click(function(){
		close_ch();
	});
	
	function open_ch(){
		var c_w=-(m_w+80);
		$("#slid_ch_btn").addClass('slided');
		$('.fui-page-group').css({'transition':'all 500ms ease','-webkit-transform':'translateX('+m_w+'px)'});
		$("#cover_ch").show()
		//setTimeout(function(){$("#cover_ch").show();},480);
		$('body').css('position','fixed');
		//$('body,html,.statusbar').css('overflow','hidden');
	}
	function close_ch(){
		$('.fui-page-group').css({'transition':'all 500ms ease','-webkit-transform':'translateX(0px)'});
		$("#cover_ch").hide();
		$("#slid_ch_btn").removeClass('slided');
		$('body').css('position','absolute');
	}
	
	
</script>
	
	
<?php  } ?>