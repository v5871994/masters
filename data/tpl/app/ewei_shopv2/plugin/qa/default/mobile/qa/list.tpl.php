<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/qa/static/css/common.css?v=2016063000">
<div class='fui-page  fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo m('plugin')->getName('qa')?></div>
        <div class="fui-header-right">
            <a class="icon icon-home external" href="<?php  echo mobileUrl('qa')?>"></a>
        </div>
    </div>
    <div class='fui-content'>
        <div class="fui-cell-group qa-title question-title" style="display: none">
            <div class="fui-cell">
                <div class="fui-cell-text"><?php  if(!empty($category['name'])) { ?><?php  echo $category['name'];?><?php  } else { ?>全部问题<?php  } ?></div>
            </div>
        </div>
        <div class="fui-message empty">
            <div class="icon ">
                <i class="icon icon-information"></i>
            </div>
            <div class="content">内容为空!</div>
            <div class="button">
                <a href="javascript:history.back(-1);" class="btn btn-default  external block">确认</a>
            </div>
        </div>
        <?php  if(empty($set['showtype'])) { ?>
        <div class="fui-according-group" id="container"></div>
        <?php  } else { ?>
        <div class="fui-list-group" id="container"></div>
        <?php  } ?>
    </div>
    <?php  if(empty($set['showtype'])) { ?>
    <script type="text/html" id="tpl_list">
        <%each list as item%>
        <div class="fui-according">
            <div class="fui-according-header">
                <span class="text"><%item.title%></span>
                <span class="remark"></span>
            </div>
            <div class="fui-according-content">
                <div class="content-block"><%=item.content%></div>
            </div>
        </div>
        <%/each%>
    </script>
    <?php  } else { ?>
    <script type="text/html" id="tpl_list">
        <%each list as item%>
        <a class="fui-list" href="<?php  echo mobileUrl('qa/detail')?>&id=<%item.id%>" data-nocache="true">
            <div class="fui-list-inner">
                <div class="title"><%item.title%></div>
            </div>
            <div class="fui-list-angle">
                <div class="angle"></div>
            </div>
        </a>
        <%/each%>
    </script>
    <?php  } ?>
    <script language="javascript">
        require(['../addons/ewei_shopv2/plugin/qa/static/js/common.js'],function(modal){
            modal.initList({cate: "<?php  echo $_GPC['cate'];?>", keyword:"<?php  echo $_GPC['keyword'];?>"});
        });
    </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>