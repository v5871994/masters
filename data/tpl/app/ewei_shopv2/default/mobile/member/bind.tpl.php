<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current'>
 <!--   <div class="fui-header">
		<div class="fui-header-left">
			<a class="back" onclick='location.back()'></a>
		</div>
		<div class="title"><?php  if(!empty($bind)) { ?>更换绑定手机号<?php  } else { ?>绑定手机号<?php  } ?></div>
		<div class="fui-header-right">&nbsp;</div>
	</div>

	<div class='fui-content' style='margin-top:5px;background:yellow'>

		<style>.fui-cell-group .fui-cell .fui-cell-label {width: 4.5rem;}</style>

		<div class="fui-cell-group">

			<div class="fui-cell must">
				<div class="fui-cell-label">手机号</div>
				<div class="fui-cell-info"><input type="tel" class='fui-input' id='mobile' name='mobile' placeholder="请输入您的手机号"  value="<?php  echo $member['mobile'];?>" maxlength="11" /></div>
			</div>

			<?php  if(!empty($wapset['smsimgcode'])) { ?>
				<div class="fui-cell must">
					<div class="fui-cell-label">图形验证码</div>
					<div class="fui-cell-info">
						<input type="tel" class='fui-input' id='verifycode2' name='verifycode2' placeholder="请输入图形验证码"  value="" maxlength="4" />
					</div>
					<div class="fui-cell-remark noremark">
						<img src="../web/index.php?c=utility&a=code&r=<?php  echo time()?>" style="width: 3.5rem; height: 1.5rem; vertical-align: middle;" id="btnCode2">
					</div>
				</div>
			<?php  } ?>

			<div class="fui-cell must">
				<div class="fui-cell-label">验证码</div>
				<div class="fui-cell-info"><input type="tel" class='fui-input' id='verifycode' name='verifycode' placeholder="5位验证码"  value="" maxlength="5" /></div>
				<div class="fui-cell-remark noremark"><a class="btn btn-default btn-default-o btn-sm" id="btnCode">获取验证码</a></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label">登录密码</div>
				<div class="fui-cell-info"><input type="password" class='fui-input' id='pwd' name='pwd' placeholder="请输入您的登录密码"  value="" /></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label">确认密码</div>
				<div class="fui-cell-info"><input type="password" class='fui-input' id='pwd1' name='pwd1' placeholder="请输入确认登录密码"  value="" /></div>
			</div>

		</div>
		<img src='../addons/ewei_shopv2/static/images/home1.png'>

		<a href='#' id='btnSubmit' class='btn btn-success block'>立即绑定</a>
	</div>
	-->
<style>

.bind_main{width:100%;height:100%;font-family:'微软雅黑';background-color:white}

.bind_head{width:100%;height:3rem;padding:1rem 0;}
.bind_logo{width:40%;margin-left:30%;background:url('../addons/ewei_shopv2/static/images/logo-login.png');background-size:100% 100%;margin-top:1.2rem}

.bind_content{width:100%;height:auto;margin-top:1.5rem}
.bind_content_inp{width:90%;height:2.5rem;margin-left:5%;margin-top:0.5rem;padding-top:0.25rem ;border-bottom:1px solid #EBEBEB;}
.bind_content_inp input{width:100%;height:2.4rem;border-style:none;background:none;font-size:0.7rem;color:#333333;margin-top:0.25rem;padding-bottom:0.2rem}
.bind_content_inp input.verify{width:60%}
.bind_content_inp input::-webkit-input-placeholder{color:#adadad}

.bind_btn{width:90%;margin-left:5%;background:#3cb4b9;height:2.2rem;margin-top:2.8rem;color:white;text-align:center;font-size:0.8rem;line-height:2.2rem;border-radius:0.2rem}
.wechat-dv{color:#333;text-align:center;width:100%;margin-top:2rem;height:2.2rem;font-size:0.85rem;display:flex;align-items:center;justify-content:center}
.wechat{background:url('../addons/ewei_shopv2/static/images/wx001.png') no-repeat;background-size:1.8rem 1.8rem ;width:1.8rem;height:1.8rem;display:inline-block;font-size:0.9rem}
.close{font-size:1.5rem;margin-left:1rem;width:1rem;height:1rem;display:block;color:#333;background:url(../addons/ewei_shopv2/static/images/x001.png) no-repeat center;background-size:1rem 1rem}
.code_sp{display:inline;width:4.8rem;border-radius:0.7rem;border:1px solid #bebebe;height:1.6rem;font-size:0.7rem;color:#999999;position:absolute;
margin-top:0.3rem;padding-left:0.5rem;line-height:1.5rem}

</style>
	
	<div class='bind_main'>
		<div class='bind_head'>
			<i class='close' onclick="javascript:history.go(-1)"></i>
		</div>
		<div class='bind_logo'>
			
		</div>
		<div class='bind_content'>
			<div class='bind_content_inp'>
				<input type="text" placeholder='手机号' id='mobile'>
			</div>
			<div class='bind_content_inp'>
				<input type="text" class='verify' placeholder='验证码' id='verifycode' ><span class='code_sp' id="btnCode">获取验证码</sapn></input>
			</div>
		</div>
		<div id='btnSubmit' class='bind_btn'><span>登  录</span></div>
		
		<div class='wechat-dv' id='weixin_btn'><i class='wechat' style='font-size:1rem;margin-right:0.1rem'></i><span>微 信 登 录</span></div>
	
	</div>
	
	<script language='javascript'>
	var w_width=$(window).width();
	var logo_h=w_width*0.4*0.78;
	$('.bind_logo').css('height',logo_h);
	$("#btnCode").css('right',w_width*0.06);
	var w_height=$(window).height();
	$(window).resize(function(){
		if(w_height-$(this).height()>20){
			$('#weixin_btn').css('position','static');
		}else{
			$('#weixin_btn').css('position','fixed');
		}
	
	});
	
	$("#weixin_btn").click(function(){
	//location.href="<?php  echo mobileUrl('member')?>";
		$.post("<?php  echo mobileUrl('member/bind/passbind')?>",function(data){			if(data.status==1){
				location.href="<?php  echo mobileUrl('member')?>";
			}
		},'json');
	
	});
	
	
	require(['biz/member/account'], function (modal) {
		modal.initBind({
				endtime: <?php  echo intval($endtime)?>,
				backurl: "<?php  echo $_GPC['backurl'];?>",
				imgcode: <?php  echo intval($wapset['smsimgcode'])?>
		});
	});
</script>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

