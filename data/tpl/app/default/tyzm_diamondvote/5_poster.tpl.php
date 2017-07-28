<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>

<div class="main " style="margin:auto;">


        <div class="thumbnail">
          <img  src="/attachment/<?php  echo $poster;?>" data-holder-rendered="true" style=" width:100%; display: block;">
        </div>
				<div class="alert alert-warning alert-dismissible bill_hint" id="close">
  <button type="button" class="close"  onclick="hidemod('close');"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>提示：</strong> <?php  echo $reply['bill_hint'];?>
</div>
</div>

<style>

.weui_loading_toast{display:none}
a,a:hover{text-decoration:none;}
.weui_tabbar {position: fixed;}
.alert{    margin-bottom: 5px;}
.thumbnail{margin:10% 15%;}
.bill_hint{margin:10px;}
</style>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('nav_footer', TEMPLATE_INCLUDEPATH)) : (include template('nav_footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?> 