<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>收银台</title>
<style type="text/css">
    body {margin:0px; background:#efefef; font-family:'微软雅黑'; -moz-appearance:none;}
    .info_main {height:auto;  background:#fff; margin-top:14px; border-bottom:1px solid #e8e8e8; border-top:1px solid #e8e8e8;}
    .info_main .line {margin:0 10px; height:40px; border-bottom:1px solid #e8e8e8; line-height:40px; color:#999;}
    .info_main .line .title {height:40px; width:160px; text-align:center;line-height:40px; background-color:#444; float:left; font-size:16px;}
     #a { text-decoration: none; font-size: 20px; color:#666; margin-left:40%; margin-top: 10% }
    .info_main .line .info { width:100%;float:right;margin-left:-160px; }
    .info_main .line .inner { margin-left:160px; }
    .info_main .line .inner input {height:40px; width:100%;display:block; padding:0px; margin:0px; border:0px; float:left; font-size:16px;}
    .info_main .line .inner .user_sex {line-height:40px;}
    .info_sub {height:44px; margin:14px 5px; background:#31cd00; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    .select { border:1px solid #ccc;height:25px;}
    .cashier_topbar {height:44px; width:100%; background:#fff; border-bottom:1px solid #e3e3e3;}
    .cashier_topbar .nav {height:44px; width:50%; line-height:44px; text-align:center; font-size:14px; float:left; color:#666;}
    .cashier_topbar .on {height:42px; color:#ff771b; border-bottom:2px solid #ff771b;}
    .create_qrcode {height:44px; margin:14px 5px; background:#ff771b; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
.bank-box{overflow: hidden;background: #fff;border-top: 1px #eee solid;margin-top: 10px}
.bank-box ul li{ width: 100%;border-bottom: 1px #eee solid;line-height: 58px}
.bank-box ul li a{display:block;padding-left: 58px;position: relative;color: #222;text-decoration: none;font-size: 14px;}
.bank-box ul li a img{position: absolute;left: 6px;top: 6px;width: 46px;height: 46px;border-radius: 6px;}
</style>

    <div class="page_topbar">
        <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
        <div class="title">收银台列表</div>
    </div>
    <div class="info main">
        
        <div class="line">
          <div class="bank-box">
            <ul>
            <?php  if(is_array($store)) { foreach($store as $row) { ?>
               <li>
                   <a href="<?php  echo $this->createPluginMobileUrl('cashier/store_set',array('id'=>$row['id']))?>">
                        <img src="<?php  echo $row['thumb'];?>">
                        <?php  echo $row['name'];?>
                   </a>
               </li>
            <?php  } } ?>  
            </ul>
          </div>
        </div>
        
    </div>

<?php  $show_footer=true?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
