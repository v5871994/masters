<?php defined('IN_IA') or exit('Access Denied');?><?php  if($show_footer) { ?>
<div style='height:50px; width:100%;margin:0;padding:0;float:left;display:block;'></div>
<?php  if($this->footer['diymenu']) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('designer/menu', TEMPLATE_INCLUDEPATH)) : (include template('designer/menu', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>
<style type="text/css">
    <?php  if($this->footer['commission']) { ?>
    footer#footer-nav .menu-list li { width:20%}
    <?php  } ?>
 .btnclose {
    display: inline-block;
    outline: none;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font: 14px/100% Arial, Helvetica, sans-serif;
    padding: .5em 2em .55em;
    text-shadow: 0 1px 1px rgba(0,0,0,.3);
    -webkit-border-radius: .5em; 
    -moz-border-radius: .5em;
    border-radius: .5em;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
    box-shadow: 0 1px 2px rgba(0,0,0,.2);
    position:absolute; top: 87%;left: 55%;
}
#bg{ display: none; position: absolute; top: 0%; left: 0%; width: 100%; height: 100%; background-color: black; z-index:1001; -moz-opacity: 0.7; opacity:.70; filter: alpha(opacity=70);}
#show{display: none; position: fixed; bottom:52px; left: 20%; width: 20%; height: 72px; padding: 1px; border: 1px solid #BDBDBD; background-color: white; z-index:1002; }
   .doubule{ display: block;width: 100%;text-align: center;border-bottom: 1px solid #BDBDBD;height: 36px;color: #333;line-height: 36px;text-decoration: none;font-size: 12px}    
</style>
<link href="../addons/sz_yi/static/font/iconfont.css" rel="stylesheet">

<footer id="footer-nav">
                <ul class="menu-list" style="margin:0">
                    <li <?php  if($footer_current=='first') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->footer['first']['url']?>"><i class="iconfont icon-<?php  echo $this->footer['first']['ico']?>"></i><span><?php  echo $this->footer['first']['text']?></span></a></li>
                    <li <?php  if($footer_current=='second') { ?>class='active'<?php  } ?> id="shsh"><a<?php  if($shopset['category2']==1) { ?> <?php  } else { ?> href="<?php  echo $this->footer['second']['url']?>"<?php  } ?>><i class="iconfont icon-<?php  echo $this->footer['second']['ico']?>"></i><span><?php  echo $this->footer['second']['text']?></span></a></li>
                <?php  if($this->footer['commission']) { ?>
                    <li <?php  if($footer_current=='commission') { ?>class='active'<?php  } ?>>
                        <a href="<?php  echo $this->footer['commission']['url']?>">
                            <i class="iconfont icon-<?php  echo $this->footer['commission']['ico']?>"></i>
                            <span><?php  echo $this->footer['commission']['text']?></span>
                        </a>
                    </li>
                 <?php  } ?>
                    <li <?php  if($footer_current=='cart') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->createMobileUrl('shop/cart')?>"><i class="iconfont icon-cart"></i><span>购物车</span></a></li>
                    <li <?php  if($footer_current=='member') { ?>class='active'<?php  } ?>><a href="<?php  echo $this->createMobileUrl('member')?>"><i class="iconfont icon-user"></i><span>会员中心</span></a></li>
                </ul>
</footer>
<?php  if($shopset['category2']==1) { ?>
<div id="bg"></div>
<div id="show" data-type="1">
<div class="makg">
    <div class="bgfff">
    <ul>
        <li><a class="doubule" href='<?php  echo $this->createMobileUrl('shop/category')?>'>分类</a></li>
        <li><a class="doubule" href='<?php  echo $this->createMobileUrl('shop/category2')?>'><?php  echo $shopset['category2name']?>分类</a></li>
    </ul>
    </div>
<!--     <input class="btnclose" type="button" value="取消" onclick="hidediv();"/> -->
</div>
<?php  } ?>
<?php  } ?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer_base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer_base', TEMPLATE_INCLUDEPATH));?>
