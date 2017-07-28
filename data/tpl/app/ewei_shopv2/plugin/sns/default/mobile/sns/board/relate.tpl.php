<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/sns/template/mobile/default/images/common.css"/>
<div class='fui-page fui-page-current  fui-page-current sns-board-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">相关版块</div>
        <div class="fui-header-right btn-edit">&nbsp;</div>
    </div>
    <div class="fui-content navbar">
        <div class='fui-list-group' style="margin-top:0">
            <?php  if(is_array($list)) { foreach($list as $value) { ?>
            <a class="fui-list" href="<?php  echo mobileUrl('sns/board',array('id'=>$value['id'],'page'=>1))?>" data-nocache="true">
                <div class="fui-list-media">
                    <img data-lazy="<?php  echo tomedia($value['logo'])?>" class="round">
                </div>
                <div class="fui-list-inner">
                    <div class="row">
                        <div class="row-text"><?php  echo $value['title'];?></div>
                        <div class="angle"></div>
                    </div>
                    <div class='text'>话题数: <span class='text-danger'><?php  echo $value['postcount'];?></span> 关注数:<span class="text-danger"><?php  echo $value['followcount'];?></span></div>
                    <div class="text"><?php  echo $value['desc'];?></div>
                </div>
            </a>
            <?php  } } ?>
        </div>
    </div>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
