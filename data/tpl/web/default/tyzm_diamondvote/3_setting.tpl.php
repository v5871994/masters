<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-info">
	<div class="panel-heading">
		必须配置地区接口相关参数后，才能正常使用地区限制功能！
	</div>
	
</div>	<form id="reply-form" class="form-horizontal form"  method="post" enctype="multipart/form-data">
<div class="panel panel-success">

	<div class="panel-heading">
		参数设置
	</div>

	<div class="panel-body">
		<div class="form-group">
				  <label class="col-xs-12 col-sm-3 col-md-2 control-label">位置接口（腾讯地图）API_KEY</label>
				  <div class="col-sm-9">
					<input class="form-control" type="text" value="<?php  echo $settings['tencent_lbs_api_key'];?>" class="span2" name="tencent_lbs_api_key">
					<div class="help-block">设置地区限制时，请至”<a href="http://lbs.qq.com/mykey.html" target="_blank" >腾讯地图</a>“获取key，用qq登陆，并绑定手机号，即可获取。</div>
				  </div>
		</div>
		<div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否绑定开发者</label>
          <div class="col-sm-9">
             <label><input type="radio" value="1" name="isopenweixin" <?php  if($settings['isopenweixin'] == 1 ) { ?>checked<?php  } ?>>绑定</label>
			 <label><input type="radio" value="0" name="isopenweixin" <?php  if($settings['isopenweixin'] == 0 ) { ?>checked<?php  } ?>>未绑定</label>
			 <div class="help-block">认证订阅号，和借权服务号同时绑定在同一个开发者账号时，可以通过URL直接获取用户信息！仅对认证订阅号有效，其他默认即可。<a href="https://open.weixin.qq.com/" >点击进入开发者平台</a></div>
          </div>
        </div>		
		</div>
</div>
<div class="panel panel-success">
<div class="panel-heading"> 红包证书配置 </div>
<form id="reply-form" class="form-horizontal form"  method="post" enctype="multipart/form-data">
  <div class="panel-body">
     <div class="form-group">
				  <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span>身份标识(AppId)</label>
				  <div class="col-sm-9">
					<input class="form-control" type="text" value="<?php  echo $settings['key'];?>" class="span2" name="key">
					<span class="help-block">请填写微信公众平台后台的AppId</span>
				  </div>
	</div>
   <div class="form-group">
				  <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span>微信支付商户号(MchId)</label>
				  <div class="col-sm-9">
					<input class="form-control" type="text" value="<?php  echo $settings['mchid'];?>" class="span2" name="mchid">
					<div class="help-block">公众号支付请求中用于加密的密钥Key</div>
				  </div>
	</div>
   <div class="form-group">
				  <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="text-danger">*</span>商户支付密钥(API密钥)</label>
				  <div class="col-sm-9">
					<input class="form-control" type="text" value="<?php  echo $settings['apikey'];?>" class="span2" name="apikey">
					<div class="help-block">此值需要手动在腾讯商户后台API密钥保持一致。<a href="http://bbs.we7.cc/thread-5788-1-1.html" >查看设置教程</a></div>
				  </div>
	</div>		
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"><span class="text-danger">*</span>证书安全随机码<br>(第一次点击生成就可以)</label>
      <div class="input-group  col-sm-9 col-sm-8 col-xs-12" style="padding-left:15px;">
        <input type="text" name="certkey" class="form-control" value="<?php  echo $settings['certkey'];?>" >
        <span class="input-group-addon" style="cursor:pointer" onClick="tokenGen();">生成新的</span> </div>
    </div>
	
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商户支付证书</label>
      <div class="col-sm-8 col-xs-12">
        <textarea class="form-control" name="apiclient_cert" rows="5" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的
        <mark>apiclient_cert.pem</mark>
        用记事本打开并复制文件内容, 填至此处</span> </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">支付证书私钥</label>
      <div class="col-sm-8 col-xs-12">
        <textarea class="form-control" name="apiclient_key" rows="5" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的
        <mark>apiclient_key.pem</mark>
        用记事本打开并复制文件内容, 填至此处</span> </div>
    </div>
  </div>
  </div>
  <div class="panel panel-success">
<div class="panel-heading"> 远程附件 </div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">附件服务器类型</label>
		<div class="col-sm-9 col-xs-12">
			<label class="radio-inline">
				<input type="radio" name="type" value="0" onclick="$('.remote-qiniu').hide();$('.remote-alioss').hide();$('.remote-ftp').hide();$('.remote-close').show();$('.remote-cos').hide();" <?php  if(empty($remote['type']) || $remote['type'] == '0') { ?> checked="checked" <?php  } ?>> 关闭
			</label>
			<label class="radio-inline">
				<input type="radio" name="type" value="1" onclick="$('.remote-qiniu').hide();$('.remote-ftp').show();$('.remote-alioss').hide();$('.remote-close').hide();$('.remote-cos').hide();" <?php  if(!empty($remote['type']) && $remote['type'] == '1') { ?> checked="checked" <?php  } ?>> FTP服务器
			</label>
			<?php  if(IMS_VERSION>=0.8) { ?>
			<label class="radio-inline">
				<input type="radio" name="type" value="2" onclick="$('.remote-qiniu').hide();$('.remote-alioss').show();$('.remote-ftp').hide();$('.remote-close').hide();$('.remote-cos').hide();" <?php  if(!empty($remote['type']) && $remote['type'] == '2') { ?> checked="checked" <?php  } ?>> 阿里云OSS <span class="label label-success">推荐，快速稳定</span>
			</label>
			<?php  } ?>
			<label class="radio-inline">
				<input type="radio" name="type" value="3" onclick="$('.remote-qiniu').show();$('.remote-alioss').hide();$('.remote-ftp').hide();$('.remote-close').hide();$('.remote-cos').hide();" <?php  if(!empty($remote['type']) && $remote['type'] == '3') { ?> checked="checked" <?php  } ?>> 七牛云存储 <span class="label label-success">推荐，快速稳定</span>
			</label>
			<label class="radio-inline">
				<input type="radio" name="type" value="4" onclick="$('.remote-qiniu').hide();$('.remote-alioss').hide();$('.remote-ftp').hide();$('.remote-close').hide();$('.remote-cos').show();" <?php  if(!empty($remote['type']) && $remote['type'] == '4') { ?> checked="checked" <?php  } ?>> 腾讯云存储 <span class="label label-success">推荐，快速稳定</span>
			</label>
			<span class="help-block"></span>
		</div>
	</div>

	<div class="remote-ftp" <?php  if(empty($remote['type']) || $remote['type'] != '1') { ?> style="display:none;" <?php  } ?>>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用SSL连接</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="ftp[ssl]" value="1" <?php  if(!empty($remote['ftp']['ssl'])) { ?> checked="checked" <?php  } ?>> 是
				</label>
				<label class="radio-inline">
					<input type="radio" name="ftp[ssl]" value="0" <?php  if(empty($remote['ftp']['ssl'])) { ?> checked="checked" <?php  } ?>> 否
				</label>
				<span class="help-block">注意：选择是后，FTP 服务器必须开启了 SSL，一般情况选择否即可</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">FTP服务器地址</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[host]" class="form-control" value="<?php  echo $remote['ftp']['host'];?>" />
				<span class="help-block">可以是 FTP 服务器的 IP 地址或域名</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">FTP服务器端口</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[port]" class="form-control" value="<?php  if(empty($remote['ftp']['port'])) { ?>21<?php  } else { ?><?php  echo $remote['ftp']['port'];?><?php  } ?>" />
				<span class="help-block">默认为21</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">FTP帐号</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[username]" class="form-control" value="<?php  echo $remote['ftp']['username'];?>" />
				<span class="help-block">该帐号必须具有以下权限：读取文件、写入文件、删除文件、创建目录、子目录继承</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">FTP密码</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[password]" class="form-control encrypt" value="<?php  echo $remote['ftp']['password'];?>" />
				<span class="help-block">基于安全考虑将只显示 FTP 密码的第一位和最后一位，中间显示八个 * 号</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">被动模式(pasv)连接：</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="ftp[pasv]" value="1" <?php  if(!empty($remote['ftp']['pasv'])) { ?> checked="checked" <?php  } ?>> 是
				</label>
				<label class="radio-inline">
					<input type="radio" name="ftp[pasv]" value="0" <?php  if(empty($remote['ftp']['pasv'])) { ?> checked="checked" <?php  } ?>> 否
				</label>
				<span class="help-block">一般情况下非被动模式即可，如果存在上传失败问题，可尝试打开此设置</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">远程附件目录</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[dir]" class="form-control" value="<?php  echo $remote['ftp']['dir'];?>" />
				<span class="help-block">远程附件目录的绝对路径或相对于 FTP 主目录的相对路径，结尾不要加斜杠 "/" , 例如：/attachment</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">远程访问URL</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[url]" class="form-control" value="<?php  echo $remote['ftp']['url'];?>" />
				<span class="help-block">支持 HTTP 和 FTP 协议，结尾不要加斜杠 "/" ; 例如：http://mydomin.com/attachment 如果使用 FTP 协议，FTP 服务器必须支持 PASV 模式，为了安全起见，
				使用 FTP 连接的帐号不要设置可写权限和列表权限</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">FTP传输超时时间</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="ftp[overtime]" class="form-control" value="<?php  if(empty($remote['ftp']['overtime'])) { ?>0<?php  } else { ?><?php  echo $remote['ftp']['overtime'];?><?php  } ?>" />
				<span class="help-block">单位：秒，0为服务器默认</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<button name="button" type="button" class="btn btn-info js-checkremoteftp" value="check">测试配置（无需保存）</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</div>
	<?php  if(IMS_VERSION>=0.8) { ?>
	<div class="remote-alioss" <?php  if(empty($remote['type']) || $remote['type'] != '2') { ?> style="display:none;" <?php  } ?>>
		<div class="alert alert-info">
			启用阿里oss后，请把/attachment目录（不包括此目录）下的子文件及子目录上传至阿里云oss, 相关工具：<br>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<span class="text-danger" id="mistake" style="display: none;">
					填写的Access Key ID 或 Access Key Secret 错误，请重新填写。
				</span>
				<span class="text-danger" id="warning" style="display: none;">
					请填写完整Access Key ID  Access Key Secret。
				</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">Access Key ID</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="alioss[key]" class="form-control" value="<?php  echo $remote['alioss']['key'];?>" placeholder="" />
				<span class="help-block">
					Access Key ID是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。
				</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">Access Key Secret</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="alioss[secret]" class="form-control encrypt" value="<?php  echo $remote['alioss']['secret'];?>" placeholder="" />
				<span class="help-block">
					Access Key Secret是您访问阿里云API的密钥，具有该账户完全的权限，请您妥善保管。(填写完Access Key ID 和 Access Key Secret 后请选择bucket)
				</span>
			</div>
		</div>
		<div class="form-group" id="bucket" <?php  if(empty($remote['alioss']['key'])) { ?>style="display: none;<?php  } ?>">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">Bucket选择</label>
			<div class="col-sm-9 col-xs-12">
				<select name="alioss[bucket]" class="form-control">
					<?php  if(is_array($buckets)) { foreach($buckets as $value) { ?>
					<option value="<?php  echo $value['name'];?>@@<?php  echo $value['location'];?>" <?php  if($value['name'] == $remote['alioss']['bucket'] || $remote['alioss']['bucket'] == $value['name'].'@@'.$value['location']) { ?> selected<?php  } ?>><?php  echo $value['name'];?>@@<?php  echo $bucket_datacenter[$value['location']];?></option>
					<?php  } } ?>
				</select>
				<span class="help-block">
					完善Access Key ID和Access Key Secret资料后可以选择存在的Bucket(请保证bucket为可公共读取的)，否则请手动输入。
				</span>
			</div>
		</div>
		<div class="form-group">
		 <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义URL</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="custom[url]" class="form-control" <?php  if(!strexists($remote['alioss']['url'],'aliyuncs.com') && $_W['setting']['remote']['type'] == 2) { ?>value="<?php  echo $remote['alioss']['url'];?>"<?php  } ?> placeholder="默认URL不需要填写"/>
					<span class="help-block">
						阿里云oss支持用户自定义访问域名，如果自定义了URL则用自定义的URL，如果未自定义，则用系统生成出来的URL。注：自定义url开头加http://或https://结尾不加 ‘/’例：http://abc.com
					</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<button name="button" type="button" class="btn btn-info js-checkremoteoss" value="check">测试配置（无需保存）</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</div>
	<?php  } ?>
	<div class="remote-qiniu" <?php  if(empty($remote['type']) || $remote['type'] != '3') { ?> style="display:none;" <?php  } ?>>
	<div class="alert alert-info">
		启用七牛云存储后，请把/attachment目录（不包括此目录）下的子文件及子目录上传至七牛云存储, 相关工具：<br>
		<ul class="link-list">
			<li><a target="_blank" href="https://portal.qiniu.com/signin" class="product-grey-font" >七牛云存储</a></li>
		</ul>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Accesskey</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="qiniu[accesskey]" class="form-control" value="<?php  echo $remote['qiniu']['accesskey'];?>" placeholder="" />
			<span class="help-block">用于签名的公钥</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Secretkey</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="qiniu[secretkey]" class="form-control encrypt" value="<?php  echo $remote['qiniu']['secretkey'];?>" placeholder="" />
			<span class="help-block">用于签名的私钥</span>
		</div>
	</div>
	<div class="form-group" id="qiniubucket">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Bucket【空间名称】</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="qiniu[bucket]" class="form-control" value="<?php  echo $remote['qiniu']['bucket'];?>" placeholder="" />
			<span class="help-block">请保证bucket为可公共读取的</span>
		</div>
	</div>
	<div class="form-group" >
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">存储区域</label>
		<div class="col-sm-9 col-xs-12">
			<select class="form-control" name="qiniu[district]">
				<option value="1" <?php  if($remote['qiniu']['district'] == 1) { ?>selected<?php  } ?>>华东</option>
				<option value="2" <?php  if($remote['qiniu']['district'] == 2) { ?>selected<?php  } ?>>华北</option>
			</select>
			<span class="help-block">请查看bucket空间设置，并选择相应的存储区域。</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Url</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="qiniu[url]" class="form-control" value="<?php  echo $remote['qiniu']['url'];?>" placeholder="" />
			<span class="help-block">七牛支持用户自定义访问域名。注：url开头加http://或https://结尾不加 ‘/’例：http://abc.com</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<button name="button" type="button" class="btn btn-info js-checkremoteqiniu" value="check">测试配置（无需保存）</button>
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
	</div>
	<div class="remote-cos" <?php  if(empty($remote['type']) || $remote['type'] != '4') { ?> style="display:none;" <?php  } ?>>
	<div class="alert alert-info">
		启用腾讯云cos对象存储后，请把/attachment目录（不包括此目录）下的子文件及子目录上传至腾讯云存储, 相关工具：<br>
		<ul class="link-list">
			<li><a target="_blank" href="https://console.qcloud.com/cos/bucket" class="product-grey-font" >腾讯云存储</a></li>
		</ul>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">APPID</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="cos[appid]" class="form-control" value="<?php  echo $remote['cos']['appid'];?>" placeholder="" />
			<span class="help-block">APPID 是您项目的唯一ID</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">SecretID</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="cos[secretid]" class="form-control" value="<?php  echo $remote['cos']['secretid'];?>" placeholder="" />
			<span class="help-block">SecretID 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">SecretKEY</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="cos[secretkey]" class="form-control encrypt" value="<?php  echo $remote['cos']['secretkey'];?>" placeholder="" />
			<span class="help-block">SecretKEY 是您项目的安全秘钥，具有该账户完全的权限，请妥善保管</span>
		</div>
	</div>
	<div class="form-group" id="cosbucket">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Bucket</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="cos[bucket]" class="form-control" value="<?php  echo $remote['cos']['bucket'];?>" placeholder="" />
			<span class="help-block">请保证bucket为可公共读取的</span>
		</div>
	</div>
	<div class="form-group" >
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">Url</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="cos[url]" class="form-control" value="<?php  echo $remote['cos']['url'];?>" placeholder="" />
			<span class="help-block">腾讯云支持用户自定义访问域名。注：url开头加http://或https://结尾不加 ‘/’例：http://abc.com</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<button name="button" type="button" class="btn btn-info js-checkremotecos" value="check">测试配置（无需保存）</button>
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
	</div>
  </div>
<script type="text/javascript">
	$(function() {
		$('.encrypt').val(function() {
			return util.encrypt($(this).val());
		});
	});
	$('.js-checkremoteftp').on('click', function(){
		var ssl =  parseInt($(':radio[name="ftp[ssl]"]:checked').val());
		var pasv = parseInt($(':radio[name="ftp[pasv]"]:checked').val());
		var param = {
			'ssl' : ssl,
			'host' : $.trim($(':text[name="ftp[host]"]').val()),
			'username'  : $.trim($(':text[name="ftp[username]"]').val()),
			'password' : $.trim($(':text[name="ftp[password]"]').val()),
			'pasv' : pasv,
			'dir': $.trim($(':text[name="ftp[dir]"]').val()),
			'url': $.trim($(':text[name="ftp[url]"]').val()),
			'port' : parseInt($(':text[name="ftp[port]"]').val()),
			'overtime' : parseInt($(':text[name="ftp[overtime]"]').val())
		};
		$.post("<?php  echo url('utility/checkattach/ftp')?>", param, function(data){
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				util.message(data.message.message);
				return false;
			}
			if(data.message.errno < 0) {
				util.message(data.message.message);
				return false;
			}
		});
	});
	$('.js-checkremoteoss').on('click', function(){
		var bucket = $.trim($('select[name="alioss[bucket]"]').val());
		if (bucket == '') {
			bucket = $.trim($(':text[name="alioss[bucket]"]').val());
		}
		var param = {
			'key' : $.trim($(':text[name="alioss[key]"]').val()),
			'secret' : $.trim($(':text[name="alioss[secret]"]').val()),
			'url'  : $.trim($(':text[name="custom[url]"]').val()),
			'bucket' : bucket
		};
		$.post("<?php  echo url('utility/checkattach/oss')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				util.message('配置成功');
				return false;
			}
			if(data.message.errno < 0) {
				util.message(data.message.message);
				return false;
			}
		});
	});
	$('.js-checkremoteqiniu').on('click', function(){
		var key = $.trim($(':text[name="qiniu[accesskey]"]').val());
		if (key == '') {
			util.message('请填写Accesskey');
			return false;
		}
		var secret = $.trim($(':text[name="qiniu[secretkey]"]').val());
		if (secret == '') {
			util.message('请填写Secretkey');
			return false;
		}
		var param = {
			'accesskey' : $.trim($(':text[name="qiniu[accesskey]"]').val()),
			'secretkey' : $.trim($(':text[name="qiniu[secretkey]"]').val()),
			'url'  : $.trim($(':text[name="qiniu[url]"]').val()),
			'bucket' :  $.trim($(':text[name="qiniu[bucket]"]').val()),
			'district' :  $.trim($('[name="qiniu[district]"]').val())
		};
		$.post("<?php  echo url('utility/checkattach/qiniu')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				util.message('配置成功');
				return false;
			}
			if(data.message.errno < 0) {
				util.message(data.message.message);
				return false;
			}
		});
	});
	$('.js-checkremotecos').on('click', function(){
		var appid = $.trim($(':text[name="cos[appid]"]').val());
		if (appid == '') {
			util.message('请填写APPID');
			return false;
		}
		var secretid = $.trim($(':text[name="cos[secretid]"]').val());
		if (secretid == '') {
			util.message('请填写secretid');
			return false;
		}
		var secretkey = $.trim($(':text[name="cos[secretkey]"]').val());
		if (secretkey == '') {
			util.message('请填写Secretkey');
			return false;
		}
		var bucket = $.trim($(':text[name="cos[bucket]"]').val());
		if (bucket == '') {
			util.message('请填写bucket');
			return false;
		}
		var url = $.trim($(':text[name="cos[url]"]').val());
		var param = {
			'appid' : appid,
			'secretid' : secretid,
			'secretkey'  : secretkey,
			'bucket' :  bucket,
			'url' : url
		};
		$.post("<?php  echo url('utility/checkattach/cos')?>",param, function(data) {
			var data = $.parseJSON(data);
			if(data.message.errno == 0) {
				util.message('配置成功');
				return false;
			}
			if(data.message.errno < 0) {
				util.message(data.message.message);
				return false;
			}
		});
	});
	var buck =  function() {
		var key = $(':text[name="alioss[key]"]').val();
		var secret = $(':text[name="alioss[secret]"]').val();
		if (secret.indexOf('*') > 0) {
			secret = '<?php  echo $_W['setting']['remote']['alioss']['secret'];?>';
		}
		if (key == '' || secret == '') {
			$('#warning').show();
			$('#mistake').hide();
			$('[name="submit"]').prop('disabled', true);
			return false;
		}
		$.post("<?php  echo url('system/attachment/buckets')?>", {'key' : key, 'secret' : secret}, function(data) {
			var data = $.parseJSON(data);
			if (data.message.errno < 0 ) {
				$('#warning').hide();
				$('#mistake').show();
				$('[name="submit"]').prop('disabled', true);
				return false;
			} else {
				$('#bucket').show();
				$('#warning').hide();
				$('#mistake').hide();
				$('[name="submit"]').prop('disabled', false);
				var bucket = $('select[name="alioss[bucket]"]');
				bucket.empty();
				var buckets = eval(data.message.message);
				for (var i in buckets) {
					bucket.append('<option value='+buckets[i]['name']+'@@'+buckets[i]['location']+'>'+buckets[i]['loca_name']+'</option>');
				}
			}
		});
		var mistake_dis = $('#mistake').css('display');
		var warning_dis = $('#warning').css('display');
		if (mistake_dis == 'inline' || warning_dis == 'inline') {
			$(':text[name="alioss[key]"]').blur(buck);
		}
	};
	$(':text[name="alioss[secret]"]').blur(buck);
</script>
<div class="form-group">		
<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>			
<div class="col-sm-4"><input name="submit" type="submit" value="保存" class="btn btn-success btn-block" />				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />			
</div>		
</div>	
</div></form>
<script type="text/javascript">

function tokenGen() {
		var letters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		var token = '';
		for(var i = 0; i < 32; i++) {
			var j = parseInt(Math.random() * (31 + 1));
			token += letters[j];
		}
		$(':text[name="certkey"]').val(token);
	}

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>