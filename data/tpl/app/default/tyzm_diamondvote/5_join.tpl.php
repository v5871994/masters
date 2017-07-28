<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div style="height:10px;"></div>
<div class="fee_feedback_wrapper">
<div class="divbaoming4">
<div class="dlist1"><?php  if($reply['minupimg']==$reply['maxupimg']) { ?>选择上传<?php  echo $reply['maxupimg'];?>张照片，第一张为封面图。<?php  } else { ?>   选择上传<?php  echo $reply['minupimg'];?>-<?php  echo $reply['maxupimg'];?>张照片，第一张为封面图。<?php  } ?></div>
<div class="dlist2"></div>
<div class="dlist3" id="chooseImages"><img src="<?php echo MODULE_URL;?>/template/static/images/jia.gif" class="bmimg"></div>
</div>
<form id="formID">
	<div>
		<ul class="fd_list2">
			<li>
			<div class="tlt">本人姓名</div>
			<div class="cont">
				<input name="name"  type="text" placeholder="请输入姓名或昵称" class="tx"></div>
			</li>
			<li>
			<div class="tlt">参赛宣言</div>
			<div class="cont">
				<textarea name="introduction" class="ta" cols="" placeholder="一句话描述自己的参赛宣言"></textarea></div>
			</li>
<?php  echo $tplappye['0'];?>
			</ul>
		<div class="btn_area">
<div class="baomingtxt"><font color="#a0a0a0">请如实填写报名信息，提交信息位唯一获奖凭证</font></div>
<div class="baomingtxt"><font color="#a0a0a0"></font></div>
<div class="btn_bg_green">提交报名</div>
<div class="baomingtxt"><font color="#a0a0a0"></font></div>
	</div>

	</div>
	</form>
</div>
<div class="follow" id="follow" style="display:none">
<div class="weui-mask"></div>
<div id="guanzhubox" >
	<div class="box1" onclick="hidemod('follow');">
	<span class="span1">提示</span> 
	<span class="span2" >关闭</span></div>
	<div class="divtxt">
	<p>长按下方二维码，长按，识别二维码</p>
	<p><img src="<?php  echo $_W['account']['qrcode'];?>" width="80%"></p>
	<?php  echo $reply['followguide'];?>
	<?php  if($_W['account']['subscribeurl']!='') { ?>
	<a href="<?php  echo $_W['account']['subscribeurl'];?>" class="weui-btn weui-btn_primary">点击进入</a>
	<?php  } ?>
	
	</div>
</div>
</div>
<script>
 $(document).ready(function(){	
     var images = {
       localId: [],
       serverId: []
     };
	 
    $("#chooseImages").click(function(){
       wx.chooseImage({
	      count:<?php  echo $reply['maxupimg'];?>, // 默认9
          success: function (res) {
			images.localId = res.localIds;
			$("#chooseImages").html(""); 
			for(var i=0;i < images.localId.length; i++){
				$("#chooseImages").append("<img src='"+images.localId[i]+"' class='bmimg' />");
			}
          }
       });
	});
	
	$(".btn_bg_green").click(function(){
			var i = 0, length = images.localId.length;
			if(length < <?php  echo $reply['minupimg'];?> || length > <?php  echo $reply['maxupimg'];?>){
			   images.localId = [];
			   var upimgtip=<?php  if($reply['minupimg']==$reply['maxupimg']) { ?>"请上传<?php  echo $reply['maxupimg'];?>张图片。"<?php  } else { ?>"请上传<?php  echo $reply['minupimg'];?>-<?php  echo $reply['maxupimg'];?>张图片"<?php  } ?>;
			   dialog2(upimgtip);return false;//1-5张照片
			}
			var name=$("input[name='name']").val();
			if(name==''){dialog2("请输入姓名");return false;}
			var introduction=$("textarea[name='introduction']").val();
			if(introduction==''){dialog2("参赛宣言不能为空！");return false;}
		    <?php  echo $tplappye['1'];?>

			images.serverId = [];
			function upload() {
			  wx.uploadImage({
				 localId: images.localId[i],
				 isShowProgressTips:2,
				 success: function (res) {
				   i++; 
				   images.serverId.push(res.serverId);
				   if (i < length) {
					  upload(); 
				   } else {
						loadingToast("正在提交...");
						$(this).unbind();
						$.ajax({
							type: "POST",
							url: "<?php  echo $this->createMobileUrl('join', array('rid' => $reply['rid']))?>",
							data: {name:name,introduction:introduction,<?php  echo $tplappye['2'];?> picturearr:images.serverId},
							dataType: "json",
							success: function(str) {
								hidemod("loadingToast");
								if(str!=null && str!=''){
									if(str.status == 1){
										location.href="<?php  echo $this->createMobileUrl('view', array('rid' => $reply['rid']))?>&id="+str.id;
									}else if(str.status == 500){
										$("#follow").show();
									}else{
										dialog2(str.msg);
									}
								}
							},
							error: function(err) {
								hidemod("loadingToast");
								dialog2("发生错误，请刷新后重试！");
							}
						});
				   }
				 },
				 fail: function (res) {
					hidemod("loadingToast");
					dialog2("发现错误，请重试");return false;
				 }
			  });
			}
		   upload();
	   
	});
	<?php  if($nofollow==1) { ?>
	     setTimeout($("#follow").show(),30000);//延时3秒 
	<?php  } ?>
 });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>