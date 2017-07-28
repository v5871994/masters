<?php defined('IN_IA') or exit('Access Denied');?><script type="text/html" id="tpl_navs">
    <nav class="btn btn-link" data-id="page"><i class="fa fa-cog"></i> <?php  if($pagetype=='mod') { ?>模块<?php  } else { ?>页面<?php  } ?>设置</nav>
    <%each initnav as nav %>
        <nav class="btn btn-link <%if nav.type==type%>special<%/if%>" data-id="<%nav.id%>"><i class="fa fa-plus"></i> <%nav.name%></nav>
    <%/each%>
</script>

<script type="text/html" id="edit-del">
    <div class="btn-edit-del">
        <div class="btn-edit">编辑</div>
        <div class="btn-del">删除</div>
    </div>
</script>


<script type="text/html" id="tpl_edit_page_mod">
    <div class="form-group">
        <div class="col-sm-2 control-label">模块名称</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind="name" data-placeholder="请输入名称" placeholder="请输入名称" value="<%name%>" />
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_page">

    <div class="form-group">
        <div class="col-sm-2 control-label">页面名称</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind="name" data-placeholder="请输入名称" placeholder="请输入名称" value="<%page.name%>" />
            <div class="help-block">注意：页面名称是便于后台查找，页面标题是手机端标题。</div>
        </div>
    </div>

    <%if page.type!=5 && page.type!=7 && page.type!=8%>
    <div class="form-group">
        <div class="col-sm-2 control-label">页面标题</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind="title" data-placeholder="请输入标题" placeholder="请输入标题" value="<%page.title%>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">关键字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind="keyword" data-placeholder="" placeholder="请输入标题" value="<%page.keyword%>" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">页面介绍</div>
        <div class="col-sm-10">
            <textarea class="form-control richtext diy-bind" cols="70" rows="3" placeholder="请输入页面介绍" data-bind="desc" data-placeholder=""><%page.desc%></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">封面图</div>
        <div class="col-sm-10">
            <div class="input-group">
                <input class="form-control input-sm diy-bind" data-bind="icon" data-placeholder="" placeholder="" value="<%page.icon%>" id="iconsrc" />
                <span data-input="#iconsrc" data-img="#iconimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
            <div class="input-group " style="margin-top:.5em;">
                <img src="<%imgsrc page.icon%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" width="150" id="iconimg">
                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="$('#iconsrc').val('').trigger('change');$(this).prev().attr('src', '')">×</em>
            </div>
        </div>
    </div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind="background" value="<%page.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fafafa').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <%if page.type!=5 && page.type!=8%>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部菜单</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="diymenu">
                <option value="-1"<%if page.diymenu=='-1'%>selected="selected"<%/if%>>不显示</option>
                <option value="0" <%if page.diymenu=='0'%>selected="selected"<%/if%>>系统默认</option>
                <%each diymenu as menu%>
                <option value="<%menu.id%>" <%if page.diymenu==menu.id%>selected="selected"<%/if%>><%menu.name%></option>
                <%/each%>
            </select>
        </div>
    </div>
    <%/if%>

	
	
	
    <div class="form-group">
        <div class="col-sm-2 control-label">悬浮按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="diylayer" value="0" class="diy-bind" data-bind="diylayer" <%if page.diylayer=='0' || !page.diylayer%>checked="checked"<%/if%> > 不显示</label>
            <label class="radio-inline"><input type="radio" name="diylayer" value="1" class="diy-bind" data-bind="diylayer" <%if page.diylayer=='1'%>checked="checked"<%/if%>> 显示</label>
            <div class="help-block">提示：按钮样式请至 <a href="<?php  echo webUrl('diypage/shop/layer')?>" target="_blank">浮动按钮</a> 中设置 未设置则不显示</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">返回顶部</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="diygotop" value="0" class="diy-bind" data-bind="diygotop" <%if page.diygotop=='0' || !page.diygotop%>checked="checked"<%/if%> > 不显示</label>
            <label class="radio-inline"><input type="radio" name="diygotop" value="1" class="diy-bind" data-bind="diygotop" <%if page.diygotop=='1'%>checked="checked"<%/if%>> 显示</label>
            <div class="help-block">提示：样式请至 <a href="<?php  echo webUrl('diypage/shop/gotop')?>" target="_blank">返回顶部</a> 中设置 未设置则不显示</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">关注条</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="followbar" value="0" class="diy-bind" data-bind="followbar" <%if page.followbar=='0' || !page.followbar%>checked="checked"<%/if%> > 不显示</label>
            <label class="radio-inline"><input type="radio" name="followbar" value="1" class="diy-bind" data-bind="followbar" <%if page.followbar=='1'%>checked="checked"<%/if%>> 显示</label>
            <div class="help-block">提示：关注条样式请至 <a href="<?php  echo webUrl('diypage/shop/followbar')?>" target="_blank">自定义关注条</a> 中设置 未设置则不显示</div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">启动广告</div>
        <div class="col-sm-10">
            <select class="form-control input-sm diy-bind" data-bind="diyadv">
                <option value="0" <%if page.diyadv=='0'||!page.diyadv%>selected="selected"<%/if%>>不显示</option>
                <%each diyadvs as diyadv%>
                <option value="<%diyadv.id%>" <%if page.diyadv==diyadv.id%>selected="selected"<%/if%>><%diyadv.name%></option>
                <%/each%>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">下单提醒</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="danmu" value="0" class="diy-bind" data-bind="danmu" <%if page.danmu=='0' || !page.danmu%>checked="checked"<%/if%> > 不显示</label>
            <label class="radio-inline"><input type="radio" name="danmu" value="1" class="diy-bind" data-bind="danmu" <%if page.danmu=='1'%>checked="checked"<%/if%>> 显示</label>
            <div class="help-block">提示：设置请至 <a href="<?php  echo webUrl('diypage/shop/danmu')?>" target="_blank">下单提醒</a> 中设置 未设置则不显示</div>
        </div>
    </div>

    <%if page.type==1%>
        <div class="line"></div>

        <div class="form-group">
            <div class="col-sm-2 control-label">访问权限</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="visit" value="0" class="diy-bind" data-bind="visit" data-bind-init="true" <%if page.visit=='0' || !page.visit%>checked="checked"<%/if%> > 不开启</label>
                <label class="radio-inline"><input type="radio" name="visit" value="1" class="diy-bind" data-bind="visit" data-bind-init="true" <%if page.visit=='1'%>checked="checked"<%/if%> > 开启</label>
            <%if page.visit==1%>
                <div class="help-block">提示：请勾选有访问权限的等级</div>
            <%/if%>
            </div>
        </div>

        <%if page.visit==1%>
            <div class="form-group">
                <div class="col-sm-2 control-label">会员等级</div>
                <div class="col-sm-10">
                    <%each levels.member as level%>
                    <label class="checkbox-inline"><input type="checkbox" value="<%level.id%>" class="diy-bind" data-bind-child="visitlevel" data-bind="member" <%if inArray(page.visitlevel.member, level.id)%>checked="checked"<%/if%>> <%level.levelname%></label>
                    <%/each%>
                </div>
            </div>

            <%if levels.commission%>
            <div class="form-group">
                <div class="col-sm-2 control-label">分销商等级</div>
                <div class="col-sm-10">
                    <%each levels.commission as level%>
                    <label class="checkbox-inline"><input type="checkbox" value="<%level.id%>" class="diy-bind" data-bind-child="visitlevel" data-bind="commission" <%if inArray(page.visitlevel.commission, level.id)%>checked="checked"<%/if%>> <%level.levelname%></label>
                    <%/each%>
                </div>
            </div>
            <%/if%>

            <div class="form-group">
                <div class="col-sm-2 control-label">无权提示</div>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">标题</span>
                        <input class="form-control input-sm diy-bind" data-bind-child="novisit" data-bind="title" data-placeholder="" placeholder="无权提示，请简单填写" value="<%page.novisit.title%>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 control-label"></div>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">链接</span>
                        <input class="form-control input-sm diy-bind" data-bind-child="novisit" data-bind="link" data-placeholder="" placeholder="确定跳转链接，不填则返回首页" value="<%page.novisit.link%>" id="noperm">
                        <span data-input="#noperm" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
                    </div>
                </div>
            </div>
        <%/if%>
    <%/if%>

</script>

<!--扩展区-->
<script type="text/html" id="tpl_edit_tab_ext1">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f7f7f7').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">激活颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="activecolor" value="<%style.activecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">tab1</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="tab1" value="<%params.tab1%>" data-placeholder="tab1" maxlength="4" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">tab2</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="tab2" value="<%params.tab2%>" data-placeholder="tab2" maxlength="4" />
        </div>
    </div>
	<div class="form-group">
        <div class="col-sm-2 control-label">tab3</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="tab3" value="<%params.tab3%>" data-placeholder="tab3" maxlength="4" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">tab4</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="tab4" value="<%params.tab4%>" data-placeholder="tab4" maxlength="4" />
        </div>
    </div>
</script>

<!--tab2-->
<script type="text/html" id="tpl_edit_tab2">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-items indent" data-min="1" data-max="4">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-form">
                       
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">文字颜色</span>
                            <input type="color" class="form-control input-sm diy-bind color" value="<%child.textcolor%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="textcolor" style="width: 107px;">
                        </div>
						<!--<div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
							<span class="input-group-addon">文字大小</span>
							<input type="text" class="form-control input-sm diy-bind" value="<%child.fontsize%>" placeholder="不输入则为默认大小" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="fontsize" maxlength="20">
						</div>-->
                       
                    </div>
                </div>
			<!--	
				<div class="item-image square">
                        <div class="text goods-selector" data-goodstype="">选择商品</div>
                        <img src="" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                        <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="" />
                    </div>-->
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>

<!--侧滑-->
<script type="text/html" id="tpl_edit_sych">

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</div>
                    <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" placeholder="请选择图片或输入图片地址" value="<%child.text%>" style="width: 60%" />
                        <input class="form-control input-sm diy-bind color " data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="color" value="<%child.color%>" type="color" style="width: 40%" />
                        <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置颜色</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
			<center><h3 style="color:red">*前三项请勿删除</h3></center>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

</script>



<script type="text/html" id="tpl_edit_banner">
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮形状</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotstyle" value="rectangle" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='rectangle'%>checked="checked"<%/if%> > 长方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="square" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='square'%>checked="checked"<%/if%>> 正方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="round" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='round'%>checked="checked"<%/if%>> 圆形</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮位置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotalign" value="left" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="center" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="right" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.leftright%>" data-min="5" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.leftright%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="leftright" value="<%style.leftright%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.bottom%>" data-min="5" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.bottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="bottom" value="<%style.bottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">透明度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8 " data-value="<%style.opacity%>" data-min="0" data-max="10" data-decimal="10"></div>
                <div class="col-sm-4 control-labe count"><span><%style.opacity%></span>(最大是1)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="opacity" value="<%style.opacity%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>

<script type="text/html" id="tpl_edit_richtext">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">边距设置</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.padding%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-richtext">
        <div id="rich"></div>
        <textarea id="richtext" class="diy-bind" data-bind-child="params" data-bind="content" style="display: none"></textarea>
    </div>
    <div class="alert alert-danger" style="margin-top: 10px; margin-bottom: 0;">注意：页面程序使用JS引擎，请勿将富文本里再填写JS代码块</div>

</script>

<script type="text/html" id="tpl_edit_notice">

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">小图标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fd5454').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">公告颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">公告图标</div>
        <div class="col-sm-10">
            <div class="input-group">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="iconurl" value="<%params.iconurl%>" id="iconsrc" />
                <span data-input="#iconsrc" data-img="#iconimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
            <div class="input-group " style="margin-top:.5em;">
                <img src="<%imgsrc params.iconurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" width="150" id="iconimg">
                <span class="close" style="position:absolute; top: -10px; right: -14px;" title="重置默认图片" onclick="$('#iconsrc').val('../addons/ewei_shopv2/static/images/hotdot.jpg').trigger('change');$(this).prev().attr('src', '../addons/ewei_shopv2/static/images/hotdot.jpg')">×</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">滚动速度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%params.speed%>" data-min="1" data-max="10"></div>
                <div class="col-sm-4 control-labe count"><span><%params.speed%></span>秒</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="speed" value="<%params.speed%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">公告内容</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="noticedata" value="0" class="diy-bind" data-bind-child="params" data-bind="noticedata" data-bind-init="true" <%if params.noticedata=='0'%>checked="checked"<%/if%> > 读取商城公告</label>
            <label class="radio-inline"><input type="radio" name="noticedata" value="1" class="diy-bind" data-bind-child="params" data-bind="noticedata" data-bind-init="true" <%if params.noticedata=='1'%>checked="checked"<%/if%>> 手动填写</label>
        </div>
    </div>

    <%if params.noticedata=='1'%>
        <div class="form-items indent" data-min="1">
            <div class="inner" id="form-items">
                <%each data as child itemid %>
                <div class="item" data-id="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image drag-btn square">拖动排序</div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">标题</span>
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="title" placeholder="请输入公告标题" value="<%child.title%>" />
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址(http://开头)" value="<%child.linkurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
                <%/each%>
            </div>
            <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
        </div>
    <%/if%>

    <%if params.noticedata=='0'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">读取数量</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="noticenum" value="5" class="diy-bind" data-bind-child="params" data-bind="noticenum" <%if params.noticenum=='5'%>checked="checked"<%/if%> > 5条</label>
                <label class="radio-inline"><input type="radio" name="noticenum" value="10" class="diy-bind" data-bind-child="params" data-bind="noticenum" <%if params.noticenum=='10'%>checked="checked"<%/if%>> 10条</label>
                <label class="radio-inline"><input type="radio" name="noticenum" value="20" class="diy-bind" data-bind-child="params" data-bind="noticenum" <%if params.noticenum=='20'%>checked="checked"<%/if%>> 20条</label>
            </div>
        </div>
    <%/if%>

</script>


<script type="text/html" id="tpl_edit_title">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <div class="input-group form-group" style="margin: 0;">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
                <input class="diy-bind" type="hidden" data-bind-child="params" data-bind="icon" value="<%params.icon%>" id="titleicon" />
                <span data-input="#titleicon" data-toggle="selectIcon" class="input-group-addon btn btn-default">选择图标</span>
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().prev().val('').trigger('change');">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题链接</div>
        <div class="col-sm-10">
            <div class="input-group form-group" style="margin: 0;">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="link" data-placeholder="" placeholder="" value="<%params.link%>" id="titlelink"/>
                <span data-input="#titlelink" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">对齐方向</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字大小</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.fontsize%>" data-min="9" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.fontsize%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="fontsize" value="<%style.fontsize%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
</script>


<script type="text/html" id="tpl_edit_search">

    <div class="form-group">
        <div class="col-sm-2 control-label">搜索类型</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 商城商品</label>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" <%if params.goodstype=='1'%>checked="checked"<%/if%> > 积分商城商品</label>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f1f1f2').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">输入框背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="inputbackground" value="<%style.inputbackground%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#b4b4b4').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">提示文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="placeholder" data-placeholder="" placeholder="请输入提示文字(不填则不显示，最长20字)" value="<%params.placeholder%>" maxlength="20" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="2" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">搜索框样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="searchstyle" value="" class="diy-bind" data-bind-child="style" data-bind="searchstyle" <%if style.searchstyle==''%>checked="checked"<%/if%> > 方形</label>
            <label class="radio-inline"><input type="radio" name="searchstyle" value="radius" class="diy-bind" data-bind-child="style" data-bind="searchstyle" <%if style.searchstyle=='radius'%>checked="checked"<%/if%>> 圆角</label>
            <label class="radio-inline"><input type="radio" name="searchstyle" value="round" class="diy-bind" data-bind-child="style" data-bind="searchstyle" <%if style.searchstyle=='round'%>checked="checked"<%/if%>> 圆弧</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字对齐</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>

</script>
<script type="text/html" id="tpl_edit_line">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="linestyle" value="solid" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='solid'%>checked="checked"<%/if%> > 实线</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dashed" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dashed'%>checked="checked"<%/if%>> 虚线(长方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="dotted" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='dotted'%>checked="checked"<%/if%>> 虚线(正方形)</label>
            <label class="radio-inline"><input type="radio" name="linestyle" value="double" class="diy-bind" data-bind-child="style" data-bind="linestyle" <%if style.linestyle=='double'%>checked="checked"<%/if%>> 双实线</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">线条高度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="20"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.padding%>" data-min="1" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="padding" value="<%style.padding%>" type="hidden" />
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_blank">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">元素高度</div>
            <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.height%>" data-min="1" data-max="200"></div>
                <div class="col-sm-4 control-labe count"><span><%style.height%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="height" value="<%style.height%>" type="hidden" />
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_menu">

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">按钮形状</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="navstyle" value="" class="diy-bind" data-bind-child="style" data-bind="navstyle" <%if style.navstyle==''%>checked="checked"<%/if%>> 正方形</label>
            <label class="radio-inline"><input type="radio" name="navstyle" value="radius" class="diy-bind" data-bind-child="style" data-bind="navstyle" <%if style.navstyle=='radius'%>checked="checked"<%/if%>> 圆角</label>
            <label class="radio-inline"><input type="radio" name="navstyle" value="circle" class="diy-bind" data-bind-child="style" data-bind="navstyle" <%if style.navstyle=='circle'%>checked="checked"<%/if%>> 圆形</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">显示方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="0" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='0'||!style.showtype%>checked="checked"<%/if%>>单页显示</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="style" data-bind="showtype" data-bind-init="true" <%if style.showtype=='1'%>checked="checked"<%/if%>> 多页滑动显示</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rownum" value="3" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='3'%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="4" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='4'%>checked="checked"<%/if%>> 4个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="5" class="diy-bind" data-bind-child="style" data-bind="rownum" <%if style.rownum=='5'%>checked="checked"<%/if%>> 5个</label>
        </div>
    </div>

    <%if style.showtype>0%>
    <div class="form-group">
        <div class="col-sm-2 control-label">每页数量</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.pagenum||8%>" data-min="3" data-max="20"></div>
                <div class="col-sm-4 control-labe count"><span><%style.pagenum||8%></span>个</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="pagenum" value="<%style.pagenum||8%>" type="hidden" />
            </div>
            <div class="help-block">超出设定数量自动分页</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">显示分页</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showdot" value="0" class="diy-bind" data-bind-child="style" data-bind="showdot" <%if style.showdot=='0'||!style.showdot%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="showdot" value="1" class="diy-bind" data-bind-child="style" data-bind="showdot" <%if style.showdot=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>
    <%/if%>

    <div class="form-items" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square">
                    <div class="text" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</div>
                    <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                    <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                </div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <span class="input-group-addon">文字</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" placeholder="请选择图片或输入图片地址" value="<%child.text%>" style="width: 60%" />
                        <input class="form-control input-sm diy-bind color " data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="color" value="<%child.color%>" type="color" style="width: 40%" />
                        <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置颜色</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

</script>

<script type="text/html" id="tpl_edit_menu2">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-items indent" data-min="1" data-max="3">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image drag-btn square" style="height: 110px; line-height: 110px;">拖动排序</div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <input class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" value="<%child.iconclass%>" type="hidden" id="iconclass-<%itemid%>" data-bind-init="true" />
                            <span class="input-group-addon" style="width: 55px; border-right: 0;"><i class="icon <%child.iconclass%>" id="iconshow-<%itemid%>"></i> <%if child.iconclass==''%>无图标<%/if%></span>
                            <span class="form-control input-sm btn btn-default" style="line-height: 28px; padding: 0 5px;" data-toggle="selectIcon" data-input="#iconclass-<%itemid%>" data-element="#iconshow-<%itemid%>">选择图标</span>
                            <span class="input-group-addon btn btn-default" style="border-left: 0; line-height: 28px; padding: 0 5px;" onclick="$('#iconclass-<%itemid%>').val('').trigger('change');">清除</span>
                            <span class="input-group-addon" style="border-left: 0; border-right: 0; padding: 0 8px;">图标颜色</span>
                            <input type="color" class="form-control input-sm diy-bind color" value="<%child.iconcolor%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconcolor" style="width: 105px;">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">文字颜色</span>
                            <input type="color" class="form-control input-sm diy-bind color" value="<%child.textcolor%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="textcolor" style="width: 107px;">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>


<script type="text/html" id="tpl_edit_picture">

    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-items indent" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
                <div class="item" data-id="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image">
                        <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

</script>


<script type="text/html" id="tpl_edit_picturew">

    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">布局方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="row" value="1" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='1'%>checked="checked"<%/if%>> 橱窗样式</label>
            <label class="radio-inline"><input type="radio" name="row" value="2" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='2'%>checked="checked"<%/if%>> 堆积两列</label>
            <label class="radio-inline"><input type="radio" name="row" value="3" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='3'%>checked="checked"<%/if%> > 堆积三列</label>
            <label class="radio-inline"><input type="radio" name="row" value="4" class="diy-bind" data-bind-child="params" data-bind="row" data-bind-init="true" <%if params.row=='4'%>checked="checked"<%/if%> > 堆积四列</label>

            <%if params.row==1%>
                <div class="help-block">橱窗样式布局请参考 <a href="<?php  echo webUrl('shop/cube')?>">首页魔方</a>，单组最多显示四个，超出隐藏</div>
            <%/if%>
            <%if params.row>1%>
            <div class="help-block">图片大小不限制，但请确保所有图片的尺寸/比例相同。</div>
            <%/if%>
        </div>
    </div>

    <%if params.row>1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">显示类型</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="showtype" value="0" class="diy-bind" data-bind-child="params" data-bind="showtype" data-bind-init="true" <%if params.showtype=='0'||!params.showtype%>checked="checked"<%/if%>> 普通模式</label>
                <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="params" data-bind="showtype" data-bind-init="true" <%if params.showtype=='1'%>checked="checked"<%/if%> > 多页滑动模式</label>
            </div>
        </div>
    <%/if%>

    <%if params.row>1&&params.showtype==1%>
    <div class="form-group">
        <div class="col-sm-2 control-label">每页数量</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.pagenum||2%>" data-min="2" data-max="12"></div>
                <div class="col-sm-4 control-labe count"><span><%style.pagenum||2%></span>个</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="pagenum" value="<%style.pagenum||2%>" type="hidden" />
            </div>
            <div class="help-block">超出设定数量自动分页</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">显示分页</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showdot" value="0" class="diy-bind" data-bind-child="style" data-bind="showdot" <%if style.showdot=='0'||!style.showdot%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="showdot" value="1" class="diy-bind" data-bind-child="style" data-bind="showdot" <%if style.showdot=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">分页按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showbtn" value="0" class="diy-bind" data-bind-child="style" data-bind="showbtn" <%if style.showbtn=='0'||!style.showbtn%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="showbtn" value="1" class="diy-bind" data-bind-child="style" data-bind="showbtn" <%if style.showbtn=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>
    <%/if%>

    <div class="form-items indent" data-min="2" data-max="20">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image">
                    <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                </div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

</script>

<script type="text/html" id="tpl_edit_goods">

    <div class="form-group">
        <div class="col-sm-2 control-label">商品类型</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodstype" value="0" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='0'||!params.goodstype%>checked="checked"<%/if%>> 商城商品</label>
            <%if (merch==0||!merch)&&plugins.creditshop==1%>
            <label class="radio-inline"><input type="radio" name="goodstype" value="1" class="diy-bind" data-bind-child="params" data-bind="goodstype" data-bind-init="true" <%if params.goodstype=='1'%>checked="checked"<%/if%> > 积分商城商品</label>
            <%/if%>
            <div class="help-block text-danger">注意：选择好商品类型后尽量不要更改</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">显示类型</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodsscroll" value="0" class="diy-bind" data-bind-child="params" data-bind="goodsscroll" data-bind-init="true" <%if params.goodsscroll=='0'||!params.goodsscroll%>checked="checked"<%/if%>> 普通模式</label>
            <label class="radio-inline"><input type="radio" name="goodsscroll" value="1" class="diy-bind" data-bind-child="params" data-bind="goodsscroll" data-bind-init="true" <%if params.goodsscroll=='1'%>checked="checked"<%/if%> > 单行滑动模式</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">列表样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="liststyle" value="block one" class="diy-bind" data-bind-child="style" data-bind="liststyle" data-bind-init="true" <%if style.liststyle=='block one'%>checked="checked"<%/if%> > 单列显示</label>
            <label class="radio-inline"><input type="radio" name="liststyle" value="block" class="diy-bind" data-bind-child="style" data-bind="liststyle" data-bind-init="true" <%if style.liststyle=='block'%>checked="checked"<%/if%>> 双列显示</label>
            <%if params.goodstype==0||!params.goodstype%>
                <label class="radio-inline"><input type="radio" name="liststyle" value="block three" class="diy-bind" data-bind-child="style" data-bind="liststyle" data-bind-init="true" <%if style.liststyle=='block three'%>checked="checked"<%/if%>> 三列显示</label>
            <%/if%>
            <%if params.goodsscroll=='0'||!params.goodsscroll%>
            <label class="radio-inline"><input type="radio" name="liststyle" value="" class="diy-bind" data-bind-child="style" data-bind="liststyle" data-bind-init="true" <%if style.liststyle==''%>checked="checked"<%/if%>> 列表显示</label>
            <%/if%>

            <%if style.liststyle=='block three' && params.goodstype!=1%>
                <div class="help-block text-danger">提示："三列显示商品"显示商品原价及销量可能会造成样式错乱</div>
            <%/if%>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fafafa').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <%if params.goodstype==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">商品标签</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="showtag" value="0" class="diy-bind" data-bind-child="params" data-bind="showtag" data-bind-init="true" <%if params.showtag=='0'||!params.showtag%>checked="checked"<%/if%>> 不显示</label>
                <label class="radio-inline"><input type="radio" name="showtag" value="1" class="diy-bind" data-bind-child="params" data-bind="showtag" data-bind-init="true" <%if params.showtag=='1'%>checked="checked"<%/if%>> 原价</label>
                <label class="radio-inline"><input type="radio" name="showtag" value="2" class="diy-bind" data-bind-child="params" data-bind="showtag" data-bind-init="true" <%if params.showtag=='2'%>checked="checked"<%/if%> > 商品类型</label>
                <label class="radio-inline"><input type="radio" name="showtag" value="3" class="diy-bind" data-bind-child="params" data-bind="showtag" data-bind-init="true" <%if params.showtag=='3'%>checked="checked"<%/if%> > 活动类型</label>
                <div class="help-block">商品类型: 商品、优惠券、红包、余额 活动类型: 兑换、抽奖</div>
            </div>
        </div>

        <%if params.showtag>0%>
            <div class="form-group">
                <div class="col-sm-2 control-label">标签背景</div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="tagbackground" value="<%style.tagbackground%>" type="color" />
                        <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fe5455').trigger('propertychange')">重置</span>
                    </div>
                </div>
            </div>
        <%/if%>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品名称</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtitle" value="0" class="diy-bind" data-bind-child="params" data-bind="showtitle" <%if params.showtitle=='0'%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="showtitle" value="1" class="diy-bind" data-bind-child="params" data-bind="showtitle" <%if params.showtitle=='1'%>checked="checked"<%/if%> > 显示</label>
        </div>
    </div>

    <%if params.showtitle=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">名称颜色</div>
            <div class="col-sm-4">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#262626').trigger('propertychange')">重置</span>
                </div>
            </div>
        </div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品价格</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showprice" value="0" class="diy-bind" data-bind-child="params" data-bind="showprice" data-bind-init="true" <%if params.showprice=='0'||!params.showprice%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="showprice" value="1" class="diy-bind" data-bind-child="params" data-bind="showprice" data-bind-init="true" <%if params.showprice=='1'%>checked="checked"<%/if%> > 显示</label>
        </div>
    </div>

    <%if params.showprice=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">价格颜色</div>
            <div class="col-sm-4">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="pricecolor" value="<%style.pricecolor%>" type="color" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ed2822').trigger('propertychange')">重置</span>
                </div>
            </div>
        </div>

        <%if params.goodstype=='0'||!params.goodstype%>
            <div class="form-group">
                <div class="col-sm-2 control-label">商品原价</div>
                <div class="col-sm-10">
                    <label class="radio-inline"><input type="radio" name="showproductprice" value="0" class="diy-bind" data-bind-child="params" data-bind="showproductprice" data-bind-init="true" <%if params.showproductprice=='0'||!params.showproductprice%>checked="checked"<%/if%>> 不显示</label>
                    <label class="radio-inline"><input type="radio" name="showproductprice" value="1" class="diy-bind" data-bind-child="params" data-bind="showproductprice" data-bind-init="true" <%if params.showproductprice=='1'%>checked="checked"<%/if%> > 显示</label>
                </div>
            </div>

            <%if params.showproductprice==1%>
                <div class="form-group">
                    <div class="col-sm-2 control-label">原价颜色</div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="productpricecolor" value="<%style.productpricecolor%>" type="color" />
                            <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#777777').trigger('propertychange')">重置</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">原价文字</div>
                    <div class="col-sm-10">
                        <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="productpricetext" value="<%params.productpricetext||'原价'%>" style="width: 128px;" />
                        <div class="help-block">提示：建议在三字以内</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">原价删除线</div>
                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="productpriceline" value="0" class="diy-bind" data-bind-child="params" data-bind="productpriceline" <%if params.productpriceline=='0'||!params.productpriceline%>checked="checked"<%/if%>> 不显示</label>
                        <label class="radio-inline"><input type="radio" name="productpriceline" value="1" class="diy-bind" data-bind-child="params" data-bind="productpriceline" <%if params.productpriceline=='1'%>checked="checked"<%/if%> > 显示</label>
                    </div>
                </div>
                <div class="line"></div>
            <%/if%>

            <div class="form-group">
                <div class="col-sm-2 control-label">商品销量</div>
                <div class="col-sm-10">
                    <label class="radio-inline"><input type="radio" name="showsales" value="0" class="diy-bind" data-bind-child="params" data-bind="showsales" data-bind-init="true" <%if params.showsales=='0'||!params.showsales%>checked="checked"<%/if%>> 不显示</label>
                    <label class="radio-inline"><input type="radio" name="showsales" value="1" class="diy-bind" data-bind-child="params" data-bind="showsales" data-bind-init="true" <%if params.showsales=='1'%>checked="checked"<%/if%> > 显示</label>
                </div>
            </div>

            <%if params.showsales==1%>
                <div class="form-group">
                    <div class="col-sm-2 control-label">销量颜色</div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="salescolor" value="<%style.salescolor%>" type="color" />
                            <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#777777').trigger('propertychange')">重置</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">销量文字</div>
                    <div class="col-sm-10">
                        <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="salestext" value="<%params.salestext||'销量'%>" style="width: 128px;" />
                        <div class="help-block">提示：建议在三字以内</div>
                    </div>
                </div>
                <div class="line"></div>
            <%/if%>
        <%/if%>
    <%/if%>

    <%if params.showprice=='1' && (params.goodstype=='0'||!params.goodstype)%>
        <div class="form-group">
            <div class="col-sm-2 control-label">购买按钮</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="buystyle" value="" class="diy-bind" data-bind-child="style" data-bind="buystyle" data-bind-init="true" <%if style.buystyle==''%>checked="checked"<%/if%> > 不显示</label>
                <label class="radio-inline"><input type="radio" name="buystyle" value="buybtn-1" class="diy-bind" data-bind-child="style" data-bind="buystyle" data-bind-init="true" <%if style.buystyle=='buybtn-1'%>checked="checked"<%/if%>> 样式一</label>
                <label class="radio-inline"><input type="radio" name="buystyle" value="buybtn-2" class="diy-bind" data-bind-child="style" data-bind="buystyle" data-bind-init="true" <%if style.buystyle=='buybtn-2'%>checked="checked"<%/if%>> 样式二</label>
                <label class="radio-inline"><input type="radio" name="buystyle" value="buybtn-3" class="diy-bind" data-bind-child="style" data-bind="buystyle" data-bind-init="true" <%if style.buystyle=='buybtn-3'%>checked="checked"<%/if%>> 样式三</label>
            </div>
        </div>
    <%/if%>

    <%if ((params.goodstype=='0'||!params.goodstype) && params.showprice=='1' && style.buystyle!='') || (params.goodstype=='1') && params.showprice=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">按钮颜色</div>
            <div class="col-sm-10">
                <div class="input-group" style="width: 130px;">
                    <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="buybtncolor" value="<%style.buybtncolor%>" type="color" />
                    <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fe5455').trigger('propertychange')">重置</span>
                </div>
                <?php  if(p('bargain')) { ?>
                <span class="help-block">砍价商品不支持自定义按钮样式，仅支持自定义按钮颜色</span>
                <?php  } ?>
            </div>
        </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品图标</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showicon" value="0" class="diy-bind" data-bind-child="params" data-bind="showicon" data-bind-init="true" <%if params.showicon=='0'%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="showicon" value="1" class="diy-bind" data-bind-child="params" data-bind="showicon" data-bind-init="true" <%if params.showicon=='1'%>checked="checked"<%/if%> > 系统图标</label>
            <label class="radio-inline"><input type="radio" name="showicon" value="2" class="diy-bind" data-bind-child="params" data-bind="showicon" data-bind-init="true" <%if params.showicon=='2'%>checked="checked"<%/if%> > 自定义</label>
        </div>
    </div>

    <%if params.showicon=='2'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">自定义图标</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="goodsiconsrc" placeholder="请输入图片地址或选择图片" value="<%params.goodsiconsrc%>" id="goodsiconsrc" />
                    <span data-input="#goodsiconsrc" data-img="#goodsicon" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
                </div>
                <div class="input-group " style="margin-top:.5em;">
                    <img src="<%imgsrc params.goodsiconsrc%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" id="goodsicon" style="width: 60px; height: 60px;">
                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="$('#goodsiconsrc').val('').trigger('change');$(this).prev().attr('src', '')">×</em>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.showicon=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">系统图标</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="goodsicon" value="recommand" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='recommand'%>checked="checked"<%/if%>> 推荐</label>
                <label class="radio-inline"><input type="radio" name="goodsicon" value="hotsale" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='hotsale'%>checked="checked"<%/if%>> 热销</label>
                <label class="radio-inline"><input type="radio" name="goodsicon" value="isnew" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='isnew'%>checked="checked"<%/if%>> 新上</label>
                <label class="radio-inline"><input type="radio" name="goodsicon" value="sendfree" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='sendfree'%>checked="checked"<%/if%>> 包邮</label>
                <label class="radio-inline"><input type="radio" name="goodsicon" value="istime" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='istime'%>checked="checked"<%/if%>> 限时卖</label>
                <label class="radio-inline"><input type="radio" name="goodsicon" value="bigsale" class="diy-bind" data-bind-child="style" data-bind="goodsicon" <%if style.goodsicon=='bigsale'%>checked="checked"<%/if%>> 促销</label>
            </div>
        </div>
    <%/if%>

    <%if params.showicon=='1' || params.showicon=='2'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">图标位置</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="iconposition" value="left top" class="diy-bind" data-bind-child="params" data-bind="iconposition" data-bind-init="true" <%if params.iconposition=='left top'%>checked="checked"<%/if%>> 左上</label>
                <label class="radio-inline"><input type="radio" name="iconposition" value="right top" class="diy-bind" data-bind-child="params" data-bind="iconposition" data-bind-init="true" <%if params.iconposition=='right top'%>checked="checked"<%/if%> > 右上</label>
                <label class="radio-inline"><input type="radio" name="iconposition" value="left bottom" class="diy-bind" data-bind-child="params" data-bind="iconposition" data-bind-init="true" <%if params.iconposition=='left bottom'%>checked="checked"<%/if%> > 左下</label>
                <label class="radio-inline"><input type="radio" name="iconposition" value="right bottom" class="diy-bind" data-bind-child="params" data-bind="iconposition" data-bind-init="true" <%if params.iconposition=='right bottom'%>checked="checked"<%/if%> > 右下</label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">上下偏移</div>
            <div class="col-sm-10">
                <div class="form-group">
                    <div class="slider col-sm-8" data-value="<%style.iconpaddingtop%>" data-min="0" data-max="30"></div>
                    <div class="col-sm-4 control-labe count"><span><%style.iconpaddingtop%></span>px(像素)</div>
                    <input class="diy-bind input" data-bind-child="style" data-bind="iconpaddingtop" value="<%style.iconpaddingtop%>" type="hidden" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">左右偏移</div>
            <div class="col-sm-10">
                <div class="form-group">
                    <div class="slider col-sm-8" data-value="<%style.iconpaddingleft%>" data-min="0" data-max="30"></div>
                    <div class="col-sm-4 control-labe count"><span><%style.iconpaddingleft%></span>px(像素)</div>
                    <input class="diy-bind input" data-bind-child="style" data-bind="iconpaddingleft" value="<%style.iconpaddingleft%>" type="hidden" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">图标缩放</div>
            <div class="col-sm-10">
                <div class="form-group">
                    <div class="slider col-sm-8" data-value="<%style.iconzoom%>" data-min="1" data-max="100"></div>
                    <div class="col-sm-4 control-labe count"><span><%style.iconzoom%></span>%</div>
                    <input class="diy-bind input" data-bind-child="style" data-bind="iconzoom" value="<%style.iconzoom%>" type="hidden" />
                </div>
            </div>
        </div>

    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">选择商品</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodsdata" value="0" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='0'%>checked="checked"<%/if%>> 手动选择</label>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="1" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='1'%>checked="checked"<%/if%> > 选择分类</label>
            <%if (merch==0||!merch)&&(!params.goodstype||params.goodstype==0)%>
                <label class="radio-inline"><input type="radio" name="goodsdata" value="2" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='2'%>checked="checked"<%/if%> > 选择分组</label>
            <%/if%>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">选择商品<br>(商品类型)</div>
        <div class="col-sm-10">
            <%if params.goodstype=='0'||!params.goodstype%>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="3" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='3'%>checked="checked"<%/if%> > 新品商品</label>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="4" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='4'%>checked="checked"<%/if%> > 热卖商品</label>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="6" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='6'%>checked="checked"<%/if%> > 促销商品</label>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="7" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='7'%>checked="checked"<%/if%> > 包邮商品</label>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="8" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='8'%>checked="checked"<%/if%> > 限时卖商品</label>
            <%/if%>
            <label class="radio-inline"><input type="radio" name="goodsdata" value="5" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='5'%>checked="checked"<%/if%> > 推荐商品</label>

            <%if params.goodstype==1%>
                <label class="radio-inline"><input type="radio" name="goodsdata" value="9" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='9'%>checked="checked"<%/if%> > 积分兑换商品</label>
                <label class="radio-inline"><input type="radio" name="goodsdata" value="10" class="diy-bind" data-bind-child="params" data-bind="goodsdata" data-bind-init="true" <%if params.goodsdata=='10'%>checked="checked"<%/if%> > 积分抽奖商品</label>
            <%/if%>
        </div>
    </div>

    <%if params.goodsdata=='0'%>
        <div class="form-items indent" data-min="1">
            <div class="inner" id="form-items">
                <%each data as child itemid %>
                <div class="item" data-id="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image square">
                        <div class="text goods-selector" data-goodstype="<%params.goodstype%>">选择商品</div>
                        <img src="<%imgsrc child.thumb%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                        <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">名称</span>
                            <input class="form-control input-sm" value="<%child.title||'未设置'%>" readonly="readonly" />
                        </div>
						
                        <%if params.goodstype==0||!params.goodstype%>
                            <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                                <span class="input-group-addon">价格</span>
                                <input class="form-control input-sm" value="￥<%child.price%>" readonly="readonly" />
                            </div>
                        <%else%>
                            <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                                <span class="input-group-addon">价格</span>
                                <input class="form-control input-sm" value="<%child.price%>" readonly="readonly" />
                                <span class="input-group-addon" style="border-left: 0; border-right: 0;">元</span>
                                <input class="form-control input-sm" value="<%child.credit%>" readonly="readonly" />
                                <span class="input-group-addon">积分</span>
                            </div>
                        <%/if%>
						
                    </div>
                </div>
                <%/each%>
            </div>
            <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
        </div>
    <%/if%>

    <%if params.goodsdata=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择分类</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="请点击选择分类" value="<%params.catename%>" readonly="readonly"/>
                    <span class="input-group-addon btn btn-default category-selector" data-goodstype="<%params.goodstype%>">选择分类</span>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.goodsdata=='2'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择分组</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="请点击选择分组" value="<%params.groupname%>" readonly="readonly"/>
                    <span class="input-group-addon btn btn-default group-selector">选择分组</span>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.goodsdata>0%>
    <div class="form-group">
        <div class="col-sm-2 control-label">商品排序</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="goodssort" value="0" class="diy-bind" data-bind-child="params" data-bind="goodssort" <%if params.goodssort=='0'%>checked="checked"<%/if%>> 综合</label>
            <label class="radio-inline"><input type="radio" name="goodssort" value="1" class="diy-bind" data-bind-child="params" data-bind="goodssort" <%if params.goodssort=='1'%>checked="checked"<%/if%> > 按销量</label>
            <label class="radio-inline"><input type="radio" name="goodssort" value="2" class="diy-bind" data-bind-child="params" data-bind="goodssort" <%if params.goodssort=='2'%>checked="checked"<%/if%> > 价格降序</label>
            <label class="radio-inline"><input type="radio" name="goodssort" value="3" class="diy-bind" data-bind-child="params" data-bind="goodssort" <%if params.goodssort=='3'%>checked="checked"<%/if%> > 价格升序</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">显示数量</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%params.goodsnum%>" data-min="1" data-max="20"></div>
                <div class="col-sm-4 control-labe count"><span><%params.goodsnum%></span>个</div>
                <input class="diy-bind input" data-bind-child="params" data-bind="goodsnum" value="<%params.goodsnum%>" type="hidden" />
            </div>
        </div>
    </div>
    <%/if%>

</script>

<script type="text/html" id="tpl_edit_diymod">
    <div class="form-group">
        <div class="col-sm-2 control-label">模块名称</div>
        <div class="col-sm-10">
            <input class="form-control input-sm" value="<%params.modname%>" readonly="readonly" />
            <div class="help-block">注意：公用模块请 <a href="<?php  echo weburl('diypage/page/mod/edit')?>&id=<%params.modid%>" target="_blank">点击此处进行修改</a></div>
        </div>
    </div>
</script>


<script type="text/html" id="tpl_edit_listmenu">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">提示文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="remarkcolor" value="<%style.remarkcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#888888').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>



    <div class="line"></div>

    <div class="form-items indent" data-min="1" data-max="8">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image square">
                        <span class="btn-del" title="清空图标" onclick="$('#cicon-<%itemid%>').val('').trigger('change')"></span>
                        <div class="icon-main">
                            <span class="icon <%child.iconclass%>" id="picon-<%itemid%>"></span>
                        </div>
                        <div class="text" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                        <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" data-bind-init="true">
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">提示</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.remark%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="remark" maxlength="6" style="width: 80px;">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
    <div class="alert alert-danger" style="margin: 10px 10px 0;">提示：选择链接后，系统会根据你选择的链接判断是否显示。</div>
</script>

<script type="text/html" id="tpl_edit_member">
    <div class="form-group">
        <div class="col-sm-2 control-label">样式选择</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="style" value="default1" class="diy-bind" data-bind-child="params" data-bind="style" data-bind-init="true" <%if params.style=='default1' || params.style==''%>checked="checked"<%/if%>> 样式一</label>
            <label class="radio-inline"><input type="radio" name="style" value="default2" class="diy-bind" data-bind-child="params" data-bind="style" data-bind-init="true" <%if params.style=='default2'%>checked="checked"<%/if%> > 样式二</label>
        </div>
    </div>
	<div class="form-group">
		<div class="col-sm-2 control-label">背景图选择</div>
        <div class="col-sm-10">
			<div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="backurl" value="<%params.backurl%>" id="backurl" />
                <span data-input="#backurl" data-img="#backurl" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
			</div>
		</div>
	</div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fe5455').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">高亮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textlight" value="<%style.textlight%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fef31f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">头像样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="headstyle" value="" class="diy-bind" data-bind-child="style" data-bind="headstyle" data-bind-init="true" <%if style.headstyle==''%>checked="checked"<%/if%>> 圆形</label>
            <label class="radio-inline"><input type="radio" name="headstyle" value="radius" class="diy-bind" data-bind-child="style" data-bind="headstyle" data-bind-init="true" <%if style.headstyle=='radius'%>checked="checked"<%/if%> > 圆角</label>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">等级说明链接</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" id="levellink" data-bind-child="params" data-bind="levellink" value="<%params.levellink%>" placeholder="等级说明链接, 不填则不跳转" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#levellink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">设置按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="icon <%params.seticon%>" id="seticonshow" style="line-height: 1;"></i></span>
                <span class="form-control input-sm btn btn-default" data-toggle="selectIcon" data-input="#seticon" data-element="#seticonshow" style="line-height: 28px;">选择图标</span>
                <input class="diy-bind" data-bind-child="params" data-bind="seticon" value="<%params.seticon%>" type="hidden" id="seticon" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="setlink" data-bind-child="params" data-bind="setlink" value="<%params.setlink%>" placeholder="设置按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#setlink">选择链接</span>
            </div>
        </div>
    </div>
    <%if params.style=='default1'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">左侧按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="leftnav" value="<%params.leftnav%>" style="width: 70px;" maxlength="4" placeholder="最大四字" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="leftnavlink" data-bind-child="params" data-bind="leftnavlink" value="<%params.leftnavlink%>" placeholder="左侧按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#leftnavlink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">右侧按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="rightnav" value="<%params.rightnav%>" style="width: 70px;" maxlength="4" placeholder="最大四字" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="rightnavlink" data-bind-child="params" data-bind="rightnavlink" value="<%params.rightnavlink%>" placeholder="右侧按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#rightnavlink">选择链接</span>
            </div>
        </div>
    </div>
    <%/if%>

</script>

<script type="text/html" id="tpl_edit_icongroup">
    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="style" value="3" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='3'%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="style" value="4" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='4' || params.style==''%>checked="checked"<%/if%>> 4个</label>
            <label class="radio-inline"><input type="radio" name="style" value="5" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='5'%>checked="checked"<%/if%> > 5个</label>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#aaaaaa').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7a7a7a').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">角标背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="dotcolor" value="<%style.dotcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">边框颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fafafa').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边框</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="bordertop" value="0" class="diy-bind" data-bind-child="params" data-bind="bordertop" data-bind-init="true" <%if params.bordertop=='0' || params.bordertop==''%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="bordertop" value="1" class="diy-bind" data-bind-child="params" data-bind="bordertop" data-bind-init="true" <%if params.bordertop=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">底部边框</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="borderbottom" value="0" class="diy-bind" data-bind-child="params" data-bind="borderbottom" data-bind-init="true" <%if params.borderbottom=='0' || params.borderbottom==''%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="borderbottom" value="1" class="diy-bind" data-bind-child="params" data-bind="borderbottom" data-bind-init="true" <%if params.borderbottom=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">中间边框</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="border" value="0" class="diy-bind" data-bind-child="params" data-bind="border" data-bind-init="true" <%if params.border=='0' || params.border==''%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="border" value="1" class="diy-bind" data-bind-child="params" data-bind="border" data-bind-init="true" <%if params.border=='1'%>checked="checked"<%/if%>> 显示</label>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-items indent" data-min="3" data-max="10">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image square">
                        <div class="icon-main">
                            <span class="icon <%child.iconclass%>" id="picon-<%itemid%>"></span>
                        </div>
                        <div class="text" data-toggle="selectIcon" data-input="#cicon-<%itemid%>" data-element="#picon-<%itemid%>">选择图标</div>
                        <input type="hidden" id="cicon-<%itemid%>" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" data-bind-init="true">
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
    <div class="alert alert-danger" style="margin: 10px 10px 0;">提示：选择链接后，系统会根据你选择的链接判断显示角标。</div>
</script>

<script type="text/html" id="tpl_edit_bindmobile">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标设置</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon" style="width: 50px;"><i class="icon <%params.iconclass%>" id="iconshow" style="line-height: 1;"></i></span>
                <span class="form-control input-sm btn btn-default" data-toggle="selectIcon" data-input="#iconclass" data-element="#iconshow" style="line-height: 28px; width: 70px;">选择图标</span>
                <span class="input-group-addon btn btn-default" onclick="$('#iconshow').attr('class', 'icon');$('#iconclass').val('').trigger('change');">清除图标</span>
                <input class="diy-bind" data-bind-child="params" data-bind="iconclass" value="" type="hidden" id="iconclass">
                <span class="input-group-addon noblr">颜色</span>
                <input class="form-control input-sm diy-bind" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" style="width: 95px;"/>
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="绑定手机号" placeholder="请输入标题" value="<%params.title%>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">介绍文字</div>
        <div class="col-sm-10">
            <textarea class="form-control richtext diy-bind" cols="70" rows="3" placeholder="请输入介绍文字" data-bind-child="params" data-bind="text" data-placeholder=""><%params.text%></textarea>
        </div>
    </div>
    <div class="alert alert-danger" style="margin: 10px 10px 0;">提示：此元素仅在开启wap功能并且用户未绑定手机时显示。</div>
</script>

<script type="text/html" id="tpl_edit_logout">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_memberc">
    <div class="form-group">
    <div class="col-sm-2 control-label">样式选择</div>
    <div class="col-sm-10">
        <label class="radio-inline"><input type="radio" name="style" value="default1" class="diy-bind" data-bind-child="params" data-bind="style" data-bind-init="true" <%if params.style=='default1' || params.style==''%>checked="checked"<%/if%>> 样式一</label>
        <label class="radio-inline"><input type="radio" name="style" value="default2" class="diy-bind" data-bind-child="params" data-bind="style" data-bind-init="true" <%if params.style=='default2'%>checked="checked"<%/if%> > 样式二</label>
    </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fe5455').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">高亮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textlight" value="<%style.textlight%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fef31f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">设置按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="icon <%params.seticon%>" id="seticonshow" style="line-height: 1;"></i></span>
                <span class="form-control input-sm btn btn-default" data-toggle="selectIcon" data-input="#seticon" data-element="#seticonshow" style="line-height: 28px;">选择图标</span>
                <input class="diy-bind" data-bind-child="params" data-bind="seticon" value="<%params.seticon%>" type="hidden" id="seticon" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="setlink" data-bind-child="params" data-bind="setlink" value="<%params.setlink%>" placeholder="设置按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#setlink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <%if params.style=='default2'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">左侧按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="leftnav" value="<%params.leftnav%>" style="width: 70px;" maxlength="4" placeholder="最大四字" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="leftnavlink" data-bind-child="params" data-bind="leftnavlink" value="<%params.leftnavlink%>" placeholder="左侧按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#leftnavlink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">右侧按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="rightnav" value="<%params.rightnav%>" style="width: 70px;" maxlength="4" placeholder="最大四字" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="rightnavlink" data-bind-child="params" data-bind="rightnavlink" value="<%params.rightnavlink%>" placeholder="右侧按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#rightnavlink">选择链接</span>
            </div>
        </div>
    </div>
    <%/if%>
    <%if params.style=='default1'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">提现按钮</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="centernav" value="<%params.centernav%>" style="width: 70px;" maxlength="4" placeholder="最大四字" />
                <span class="input-group-addon noblr">链接</span>
                <input class="form-control input-sm diy-bind" id="centernavlink" data-bind-child="params" data-bind="centernavlink" value="<%params.centernavlink%>" placeholder="提现按钮链接" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#centernavlink">选择链接</span>
            </div>
        </div>
    </div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">隐藏推荐人</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hideup" value="0" class="diy-bind" data-bind-child="params" data-bind="hideup" data-bind-init="true" <%if params.hideup==0 || !params.hideup%>checked="checked"<%/if%>> 不隐藏</label>
            <label class="radio-inline"><input type="radio" name="hideup" value="1" class="diy-bind" data-bind-child="params" data-bind="hideup" data-bind-init="true" <%if params.hideup==1%>checked="checked"<%/if%> > 隐藏</label>
        </div>
    </div>

</script>

<script type="text/html" id="tpl_edit_blockgroup">
    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rownum" value="2" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='2'%>checked="checked"<%/if%>> 2个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="3" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='3' || params.rownum==''%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="4" class="diy-bind" data-bind-child="params" data-bind="rownum" data-bind-init="true" <%if params.rownum=='4' || params.rownum==''%>checked="checked"<%/if%>> 4个</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">

        <div class="col-sm-2 control-label">提示数量颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="tipcolor" value="<%style.tipcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#feb312').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-items indent" data-min="2" data-max="16">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-body">
                    <div class="item-image drag-btn square" style="height: 110px; line-height: 110px;">拖动排序</div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <input class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconclass" value="<%child.iconclass%>" type="hidden" id="iconclass-<%itemid%>" />
                            <span class="input-group-addon" style="width: 55px; border-right: 0;"><i class="icon <%child.iconclass%>" id="iconshow-<%itemid%>"></i> </span>
                            <span class="form-control input-sm btn btn-default" style="line-height: 28px; padding: 0 5px; width: 100px;" data-toggle="selectIcon" data-input="#iconclass-<%itemid%>" data-element="#iconshow-<%itemid%>">选择图标</span>
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">图标颜色</span>
                            <input type="color" class="form-control input-sm diy-bind color" value="<%child.iconcolor%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="iconcolor" style="width: 105px;">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <span class="input-group-addon">文字</span>
                            <input type="text" class="form-control input-sm diy-bind" value="<%child.text%>" placeholder="留空则不显示" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" maxlength="20">
                            <span class="input-group-addon" style="border-left: 0; border-right: 0;">文字颜色</span>
                            <input type="color" class="form-control input-sm diy-bind color" value="<%child.textcolor%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="textcolor" style="width: 107px;">
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>">
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
    <div class="alert alert-danger" style="margin: 10px 10px 0;">提示：选择链接后，系统会根据你选择的链接判断显示数量。</div>

</script>

<!-- 商品详情页 -->
<script type="text/html" id="tpl_edit_detail_tab">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f7f7f7').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">激活颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="activecolor" value="<%style.activecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">商品文字</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="goodstext" value="<%params.goodstext%>" data-placeholder="商品" maxlength="4" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">详情文字</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="detailtext" value="<%params.detailtext%>" data-placeholder="详情" maxlength="4" />
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_swipe">
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮形状</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotstyle" value="rectangle" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='rectangle'%>checked="checked"<%/if%> > 长方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="square" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='square'%>checked="checked"<%/if%>> 正方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="round" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='round'%>checked="checked"<%/if%>> 圆形</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">按钮位置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotalign" value="left" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="center" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="right" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">按钮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.leftright%>" data-min="5" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.leftright%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="leftright" value="<%style.leftright%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.bottom%>" data-min="5" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.bottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="bottom" value="<%style.bottom%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">透明度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8 " data-value="<%style.opacity%>" data-min="0" data-max="10" data-decimal="10"></div>
                <div class="col-sm-4 control-labe count"><span><%style.opacity%></span>(最大是1)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="opacity" value="<%style.opacity%>" type="hidden" />
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_info">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">副标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="subtitlecolor" value="<%style.subtitlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">价格颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="pricecolor" value="<%style.pricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">副色调颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#c0c0c0').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">分享按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hideshare" value="0" class="diy-bind" data-bind-child="params" data-bind="hideshare" data-bind-init="true" <%if params.hideshare=='0' || !params.hideshare%>checked="checked"<%/if%> > 显示</label>
            <label class="radio-inline"><input type="radio" name="hideshare" value="1" class="diy-bind" data-bind-child="params" data-bind="hideshare" data-bind-init="true" <%if params.hideshare=='1'%>checked="checked"<%/if%>> 隐藏</label>
        </div>
    </div>
    <%if params.hideshare=='0'||!params.hideshare%>
        <div class="form-group">
            <div class="col-sm-2 control-label">自定义</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon">文字</span>
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="share" data-placeholder="分享" placeholder="分享" value="<%params.share%>" maxlength="2" style="width: 60px;" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0">链接</span>
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="share_link" value="<%params.share_link%>" id="sharelink" />
                    <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#sharelink">选择</span>
                </div>
                <div class="input-group" style="margin-top: 10px; width: 150px;">
                    <span class="input-group-addon">图标</span>
                    <span class="input-group-addon"><i class="icon <%params.share_icon||'icon-share'%>" id="showshareicon"></i> </span>
                    <input type="hidden" class="form-control input-sm diy-bind" data-bind-child="params" data-bind="share_icon" value="<%params.share_icon%>" id="shareicon" />
                    <span class="input-group-addon btn btn-default" data-toggle="selectIcon" data-input="#shareicon" data-element="#showshareicon">选择</span>
                </div>
                <span class="help-block">提示: 链接不填则读取系统默认</span>
            </div>
        </div>
    <%/if%>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">限时购颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolor" data-bind-init="true" value="<%style.timecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">倒计时颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timetextcolor" data-bind-init="true" value="<%style.timetextcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_sale">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" data-bind-init="true" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字高亮</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolorhigh" data-bind-init="true" value="<%style.textcolorhigh%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-items indent">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>" style="cursor: move">
                <div class="item-form">
                    <%if child.type=='yushou'%>
                        <span style="color: <%style.salecolor%>;"><label class="label label-default">预售</label> 预计发货时间：购买后<span class="text-danger" style="color: <%style.salecolorhigh%>;"> 7 </span>天发货</span>
                    <%/if%>
                    <%if child.type=='erci'%>
                    <span style="color: <%style.salecolor%>;">此商品二次购买 可享受<span class="text-danger" style="color: <%style.salecolorhigh%>;"> 5 </span>折优惠</span>
                    <%/if%>
                    <%if child.type=='huiyuan'%>
                    <span style="color: <%style.salecolor%>;">您的会员等级是<span class="text-danger" style="color: <%style.salecolorhigh%>;"> VIP </span>可享受￥10的价格</span>
                    <%/if%>
                    <%if child.type=='youhui'%>
                    <span style="color: <%style.salecolor%>;">优惠 全场满<span class="text-danger" style="color: <%style.salecolorhigh%>;"> ￥100 </span>包邮</span>
                    <%/if%>
                    <%if child.type=='jifen'%>
                    <span style="color: <%style.salecolor%>;">积分 购买赠送<span class="text-danger" style="color: <%style.salecolorhigh%>;"> 20 </span>积分</span>
                    <%/if%>
                    <%if child.type=='bupeisong'%>
                    <span style="color: <%style.salecolor%>;">不配送区域: 天津辖区 天津辖县 (拖动排序)</span>
                    <%/if%>
                    <%if child.type=='biaoqian'%>
                    <span>
                        <span class="label label-danger" style="border-radius: 5px;">货到付款</span>
                        <span class="label label-danger" style="border-radius: 5px;">正品保证</span>
                        <span class="label label-danger" style="border-radius: 5px;">保修</span>
                        <span class="label label-danger" style="border-radius: 5px;">发票</span>
                    </span>
                    <%/if%>
                    <%if child.type=='coupon'%>
                        <span style="color: <%style.salecolor%>;">领取可用优惠券</span>
                    <%/if%>
                    <%if child.type=='zengpin'%>
                        <span style="color: <%style.salecolor%>;">赠品: 赠品名称</span>
                    <%/if%>
                </div>
            </div>
            <%/each%>
        </div>
    </div>
    <div class="alert alert-danger" style="margin: 0 10px;">注意：此处仅对营销信息显示进行排序，营销信息、标签样式请到商品中设置(以上元素拖动可排序)</div>
</script>

<script type="text/html" id="tpl_edit_detail_spec">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_shop">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">logo样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="logostyle" value="" class="diy-bind" data-bind-child="params" data-bind="logostyle" <%if params.logostyle=='0' || !params.logostyle%>checked="checked"<%/if%> > 正方形</label>
            <label class="radio-inline"><input type="radio" name="logostyle" value="radius" class="diy-bind" data-bind-child="params" data-bind="logostyle" <%if params.logostyle=='radius'%>checked="checked"<%/if%>> 圆角</label>
            <label class="radio-inline"><input type="radio" name="logostyle" value="circle" class="diy-bind" data-bind-child="params" data-bind="logostyle" <%if params.logostyle=='circle'%>checked="checked"<%/if%>> 圆形</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">名称颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="shopnamecolor" value="<%style.shopnamecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">介绍颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="shopdesccolor" value="<%style.shopdesccolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#444444').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品数量</div>
        <div class="col-sm-4">
            <label class="radio-inline"><input type="radio" name="hidenum" value="0" class="diy-bind" data-bind-child="params" data-bind="hidenum" data-bind-init="true" <%if params.hidenum=='0' || !params.hidenum%>checked="checked"<%/if%> > 显示</label>
            <label class="radio-inline"><input type="radio" name="hidenum" value="1" class="diy-bind" data-bind-child="params" data-bind="hidenum" data-bind-init="true" <%if params.hidenum=='1'%>checked="checked"<%/if%>> 隐藏</label>
        </div>
    </div>

    <%if params.hidenum=='0' || !params.hidenum%>
    <div class="form-group">
        <div class="col-sm-2 control-label">数量颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="goodsnumcolor" value="<%style.goodsnumcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="goodstextcolor" value="<%style.goodstextcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7c7c7c').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左侧按钮</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="leftnavcolor" value="<%style.leftnavcolor%>" type="color" style="width: 90px;" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7c7c7c').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">右侧按钮</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="rightnavcolor" value="<%style.rightnavcolor%>" type="color" style="width: 90px;" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7c7c7c').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="alert alert-danger" style="margin: 10px 10px 0;">提示：信息读取商城、商品设置</div>

</script>

<script type="text/html" id="tpl_edit_detail_navbar">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="iconcolor" value="<%style.iconcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">角标颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="dotcolor" value="<%style.dotcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff0011').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <%if params.hidecart=='0' || !params.showcart%>
    <div class="form-group">
        <div class="col-sm-2 control-label">购物车颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="cartcolor" value="<%style.cartcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fe9402').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">购买按钮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="buycolor" value="<%style.buycolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fd5555').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">关注图标1</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hidelike" value="1" class="diy-bind" data-bind-child="params" data-bind="hidelike" data-bind-init="true" <%if params.hidelike=='1'%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="hidelike" value="0" class="diy-bind" data-bind-child="params" data-bind="hidelike" data-bind-init="true" <%if params.hidelike=='0' || !params.hidelike%>checked="checked"<%/if%> > 关注</label>
            <label class="radio-inline"><input type="radio" name="hidelike" value="-1" class="diy-bind" data-bind-child="params" data-bind="hidelike" data-bind-init="true" <%if params.hidelike=='-1'%>checked="checked"<%/if%>> 店铺</label>
            <label class="radio-inline"><input type="radio" name="hidelike" value="-2" class="diy-bind" data-bind-child="params" data-bind="hidelike" data-bind-init="true" <%if params.hidelike=='-2'%>checked="checked"<%/if%>> 购物车</label>
            <label class="radio-inline"><input type="radio" name="hidelike" value="-3" class="diy-bind" data-bind-child="params" data-bind="hidelike" data-bind-init="true" <%if params.hidelike=='-3'%>checked="checked"<%/if%>> 自定义</label>
        </div>
    </div>

    <%if params.hidelike=='-3'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">自定义设置</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="liketext" value="<%params.liketext||'关注'%>" data-placeholder="关注" maxlength="3" />
                <span class="input-group-addon" style="border-left: 0; border-right: 0;">图标</span>
                <span class="form-control" style="border-right: 0; line-height: 28px; text-align: center;"><i class="icon <%params.likeiconclass||'icon-like'%>" id="showlikeicon"></i></span>
                <span class="input-group-addon btn btn-default" data-toggle="selectIcon" data-input="#likeiconclass" data-element="#showlikeicon">选择图标</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="likeiconclass" value="<%params.shopiconclass%>" type="hidden" id="likeiconclass" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label"></div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="likelink" value="<%params.likelink%>" id="likelink" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#likelink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="line"></div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">店铺图标2</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hideshop" value="1" class="diy-bind" data-bind-child="params" data-bind="hideshop" data-bind-init="true" <%if params.hideshop=='1'%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="hideshop" value="-1" class="diy-bind" data-bind-child="params" data-bind="hideshop" data-bind-init="true" <%if params.hideshop=='-1' || !params.hideshop%>checked="checked"<%/if%> > 关注</label>
            <label class="radio-inline"><input type="radio" name="hideshop" value="0" class="diy-bind" data-bind-child="params" data-bind="hideshop" data-bind-init="true" <%if params.hideshop=='0' || !params.hideshop%>checked="checked"<%/if%> > 店铺</label>
            <label class="radio-inline"><input type="radio" name="hideshop" value="-2" class="diy-bind" data-bind-child="params" data-bind="hideshop" data-bind-init="true" <%if params.hideshop=='-2' || !params.hideshop%>checked="checked"<%/if%> > 购物车</label>
            <label class="radio-inline"><input type="radio" name="hideshop" value="-3" class="diy-bind" data-bind-child="params" data-bind="hideshop" data-bind-init="true" <%if params.hideshop=='-3' || !params.hideshop%>checked="checked"<%/if%> > 自定义</label>
        </div>
    </div>

    <%if params.hideshop=='-3'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">自定义设置</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="shoptext" value="<%params.shoptext||'店铺'%>" data-placeholder="店铺" maxlength="3" />
                <span class="input-group-addon" style="border-left: 0; border-right: 0;">图标</span>
                <span class="form-control" style="border-right: 0; line-height: 28px; text-align: center;"><i class="icon <%params.shopiconclass||'icon-shop'%>" id="showshopicon"></i></span>
                <span class="input-group-addon btn btn-default" data-toggle="selectIcon" data-input="#shopiconclass" data-element="#showshopicon">选择图标</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="shopiconclass" value="<%params.shopiconclass%>" type="hidden" id="shopiconclass" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label"></div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="shoplink" value="<%params.shoplink%>" id="shoplink" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#shoplink">选择链接</span>
            </div>
        </div>
    </div>

    <div class="line"></div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">购物车图标3</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hidecart" value="1" class="diy-bind" data-bind-child="params" data-bind="hidecart" data-bind-init="true" <%if params.hidecart=='1'%>checked="checked"<%/if%>> 隐藏</label>
            <label class="radio-inline"><input type="radio" name="hidecart" value="-1" class="diy-bind" data-bind-child="params" data-bind="hidecart" data-bind-init="true" <%if params.hidecart=='-1'%>checked="checked"<%/if%> > 关注</label>
            <label class="radio-inline"><input type="radio" name="hidecart" value="-2" class="diy-bind" data-bind-child="params" data-bind="hidecart" data-bind-init="true" <%if params.hidecart=='-2'%>checked="checked"<%/if%> > 店铺</label>
            <label class="radio-inline"><input type="radio" name="hidecart" value="0" class="diy-bind" data-bind-child="params" data-bind="hidecart" data-bind-init="true" <%if params.hidecart=='0' || !params.hidecart%>checked="checked"<%/if%> > 购物车</label>
            <label class="radio-inline"><input type="radio" name="hidecart" value="-3" class="diy-bind" data-bind-child="params" data-bind="hidecart" data-bind-init="true" <%if params.hidecart=='-3'%>checked="checked"<%/if%> > 自定义</label>
        </div>
    </div>

    <%if params.hidecart=='-3'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">自定义设置</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="carttext" value="<%params.carttext||'购物车'%>" data-placeholder="购物车" maxlength="3" />
                <span class="input-group-addon" style="border-left: 0; border-right: 0;">图标</span>
                <span class="form-control" style="border-right: 0; line-height: 28px; text-align: center;"><i class="icon <%params.carticonclass||'icon-cart'%>" id="showcarticon"></i></span>
                <span class="input-group-addon btn btn-default" data-toggle="selectIcon" data-input="#carticonclass" data-element="#showcarticon">选择图标</span>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="carticonclass" value="<%params.carticonclass%>" type="hidden" id="carticonclass" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label"></div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="cartlink" value="<%params.cartlink%>" id="cartlink" />
                <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#cartlink">选择链接</span>
            </div>
        </div>
    </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">购物车按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hidecartbtn" value="0" class="diy-bind" data-bind-child="params" data-bind="hidecartbtn" data-bind-init="true" <%if params.hidecartbtn=='0' || !params.hidecartbtn%>checked="checked"<%/if%> > 显示</label>
            <label class="radio-inline"><input type="radio" name="hidecartbtn" value="1" class="diy-bind" data-bind-child="params" data-bind="hidecartbtn" data-bind-init="true" <%if params.hidecartbtn=='1'%>checked="checked"<%/if%>> 隐藏</label>
            <div class="help-block">提示：此设置仅针对于可加入购物车的商品</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">购买文字</div>
        <div class="col-sm-4">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="textbuy" data-placeholder="立刻购买" placeholder="立刻购买" value="<%params.textbuy%>" maxlength="4" />
        </div>
    </div>

    <div class="alert alert-info" style="margin-bottom: 0; margin-top: 10px;">提示：左侧图标最多输入3个字，购买按钮最多输入4个字</div>
</script>

<script type="text/html" id="tpl_edit_detail_comment">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">主色调</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="maincolor" value="<%style.maincolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fd5454').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">副色调</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="subcolor" value="<%style.subcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7c7c7c').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">评价颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_pullup">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_buyshow">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="alert alert-info" style="margin-bottom: 0;">提示：这里是购买可见区域，购买可见内容请到商品中设置</div>
</script>

<script type="text/html" id="tpl_edit_detail_store">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">门店名称</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="shopnamecolor" value="<%style.shopnamecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">门店信息</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="shopinfocolor" value="<%style.shopinfocolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">电话按钮</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="navtelcolor" value="<%style.navtelcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#008000').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">定位按钮</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="navlocationcolor" value="<%style.navlocationcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff9900').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_detail_package">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7c7c7c').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_merchgroup">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">名称颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">介绍颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">距离颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="rangecolor" value="<%style.rangecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#008000').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">定位颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="locationcolor" value="<%style.locationcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff9900').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">开启定位</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="openlocation" value="0" class="diy-bind" data-bind-child="params" data-bind="openlocation" data-bind-init="true" <%if params.openlocation=='0' || !params.openlocation%>checked="checked"<%/if%> > 否</label>
            <label class="radio-inline"><input type="radio" name="openlocation" value="1" class="diy-bind" data-bind-child="params" data-bind="openlocation" data-bind-init="true" <%if params.openlocation=='1'%>checked="checked"<%/if%>> 是</label>
            <div class="help-block">注意：开启后用户进入页面会弹出“是否允许获取位置”字样的提示</div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">选择商户</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="merchdata" value="0" class="diy-bind" data-bind-child="params" data-bind="merchdata" data-bind-init="true" <%if params.merchdata=='0' || !params.merchdata%>checked="checked"<%/if%> > 手动选择</label>
            <label class="radio-inline"><input type="radio" name="merchdata" value="1" class="diy-bind" data-bind-child="params" data-bind="merchdata" data-bind-init="true" <%if params.merchdata=='1'%>checked="checked"<%/if%>> 选择分类</label>
            <label class="radio-inline"><input type="radio" name="merchdata" value="2" class="diy-bind" data-bind-child="params" data-bind="merchdata" data-bind-init="true" <%if params.merchdata=='2'%>checked="checked"<%/if%>> 选择分组</label>
            <label class="radio-inline"><input type="radio" name="merchdata" value="3" class="diy-bind" data-bind-child="params" data-bind="merchdata" data-bind-init="true" <%if params.merchdata=='3'%>checked="checked"<%/if%>> 推荐商户</label>
        </div>
    </div>

    <%if params.merchdata=='0' || !params.merchdata%>
        <div class="form-items indent" data-min="1">
            <div class="inner" id="form-items">
                <%each data as child itemid %>
                <div class="item" data-id="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image square">
                        <div class="text merch-selector" data-goodstype="<%params.goodstype%>">选择商户</div>
                        <img src="<%imgsrc child.thumb%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                        <input type="hidden" class="diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" value="<%child.imgurl%>" />
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <span class="input-group-addon">商户名称</span>
                            <input class="form-control input-sm" value="<%child.name||'未设置'%>" readonly="readonly" />
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <span class="input-group-addon">商户介绍</span>
                            <input class="form-control input-sm" value="<%child.desc%>" readonly="readonly" />
                        </div>
                    </div>
                </div>
                <%/each%>
            </div>
            <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
        </div>
    <%/if%>

    <%if params.merchdata=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择分类</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="请点击选择分类" value="<%params.catename%>" readonly="readonly"/>
                    <span class="input-group-addon btn btn-default merch-category-selector" data-goodstype="<%params.goodstype%>">选择分类</span>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.merchdata=='2'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择分组</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input type="text" class="form-control input-sm" placeholder="请点击选择分组" value="<%params.groupname%>" readonly="readonly"/>
                    <span class="input-group-addon btn btn-default merch-group-selector">选择分组</span>
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.merchdata>0%>
        <div class="form-group">
            <div class="col-sm-2 control-label">显示数量</div>
            <div class="col-sm-10">
                <div class="form-group">
                    <div class="slider col-sm-8" data-value="<%params.merchnum%>" data-min="1" data-max="20"></div>
                    <div class="col-sm-4 control-labe count"><span><%params.merchnum%></span>个</div>
                    <input class="diy-bind input" data-bind-child="params" data-bind="merchnum" value="<%params.merchnum%>" type="hidden" />
                </div>
            </div>
        </div>
    <%/if%>

    <%if params.openlocation==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">商品排序</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="merchsort" value="0" class="diy-bind" data-bind-child="params" data-bind="merchsort" <%if params.merchsort=='0'||!params.merchsort%>checked="checked"<%/if%>> 综合</label>
                <label class="radio-inline"><input type="radio" name="merchsort" value="1" class="diy-bind" data-bind-child="params" data-bind="merchsort" <%if params.merchsort=='1'%>checked="checked"<%/if%> > 距离降序</label>
                <label class="radio-inline"><input type="radio" name="merchsort" value="2" class="diy-bind" data-bind-child="params" data-bind="merchsort" <%if params.merchsort=='2'%>checked="checked"<%/if%> > 距离升序</label>
            </div>
        </div>
    <%/if%>

</script>

<script type="text/html" id="tpl_edit_detail_seckill">

    <div class="form-group">
        <div class="col-sm-2 control-label">左侧背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgleft" value="<%style.bgleft%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">右侧背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgright" value="<%style.bgright%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffef32').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标签文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="tagcolor" value="<%style.tagcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">状态文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="statuscolor" value="<%style.statuscolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2 control-label">价格颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="pricecolor" value="<%style.pricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">原价文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="marketpricecolor" value="<%style.marketpricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f7a7a7').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2 control-label">时间颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolor" value="<%style.timecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">时间背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timebgcolor" value="<%style.timebgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#582e19').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">已售颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="processtextcolor" value="<%style.processtextcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">进度条文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="processcolor" value="<%style.processcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#efd74f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>




    <div class="form-group">
        <div class="col-sm-2 control-label">等待左侧背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgleftwait" value="<%style.bgleftwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#00b950').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">等待右侧背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgrightwait" value="<%style.bgrightwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#00b950').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">等待标签颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="tagcolorwait" value="<%style.tagcolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">等待状态文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="statuscolorwait" value="<%style.statuscolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">等待时间颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolorwait" value="<%style.timecolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#003718').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">等待时间背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timebgcolorwait" value="<%style.timebgcolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#582e19').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">等待价格</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="pricecolorwait" value="<%style.pricecolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">等待原价</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="marketpricecolorwait" value="<%style.marketpricecolorwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#7fdca7').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2 control-label">等待购买按钮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="buybtntextwait" value="<%style.buybtntextwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>

        <div class="col-sm-2 control-label">等待购买按钮背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="buybtnbgwait" value="<%style.buybtnbgwait%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#00b950').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">等待购买文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="buybtn" value="<%params.buybtn%>" type="text" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('原价购买').trigger('propertychange')">重置</span>
            </div>
        </div>

    </div>


</script>
<script type="text/html" id="tpl_edit_seckillgroup">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">区域边框</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="hideborder" value="0" class="diy-bind" data-bind-child="params" data-bind="hideborder" <%if params.hideborder=='0' || !params.hideborder%>checked="checked"<%/if%> > 显示</label>
            <label class="radio-inline"><input type="radio" name="hideborder" value="1" class="diy-bind" data-bind-child="params" data-bind="hideborder" <%if params.hideborder=='1'%>checked="checked"<%/if%>> 隐藏</label>
            <div class="help-block">注意：边框颜色不可自定义，可根据样式需求选择是否显示</div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#444444').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">倒计时时间</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolor" value="<%style.timecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#444444').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">倒计时间隔符</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timesigncolor" value="<%style.timesigncolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#444444').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">倒计时边框</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timebordercolor" value="<%style.timebordercolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#d9d9d9').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">倒计时背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timebgcolor" value="<%style.timebgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#fffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">更多文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="morecolor" value="<%style.morecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#888888').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品原价颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="marketpricecolor" value="<%style.marketpricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">商品现价颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="productpricecolor" value="<%style.productpricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#999999').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">图标设置</div>
        <div class="col-sm-10">
            <div class="input-group">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="iconurl" value="<%params.iconurl%>" id="iconsrc" />
                <span data-input="#iconsrc" data-img="#iconimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
            </div>
            <div class="input-group " style="margin-top:.5em;">
                <img src="<%imgsrc params.iconurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" id="iconimg" style="height: 30px; width: 90px;">
                <span class="close" style="position:absolute; top: -10px; right: -14px;" title="删除图片" onclick="$('#iconsrc').val('').trigger('change');$(this).prev().attr('src', '../addons/ewei_shopv2/static/images/hotdot.jpg')">×</span>
            </div>
            <div class="help-block">注意：推荐尺寸 20*100像素或同比例，不设置则不显示</div>
        </div>
    </div>

</script>

<script type="text/html" id="tpl_edit_pictures">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">上下间距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">左右间距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">显示方式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="showtype" value="0" class="diy-bind" data-bind-child="params" data-bind="showtype" data-bind-init="true" <%if params.showtype=='0'||!params.showtype%>checked="checked"<%/if%>>单页显示</label>
            <label class="radio-inline"><input type="radio" name="showtype" value="1" class="diy-bind" data-bind-child="params" data-bind="showtype" data-bind-init="true" <%if params.showtype=='1'%>checked="checked"<%/if%>> 单行滑动模式</label>
        </div>
    </div>

    <%if params.showtype==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">分页按钮</div>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="showbtn" value="0" class="diy-bind" data-bind-child="params" data-bind="showbtn" data-bind-init="true" <%if params.showbtn=='0'||!params.showbtn%>checked="checked"<%/if%>>隐藏</label>
                <label class="radio-inline"><input type="radio" name="showbtn" value="1" class="diy-bind" data-bind-child="params" data-bind="showbtn" data-bind-init="true" <%if params.showbtn=='1'%>checked="checked"<%/if%>> 显示</label>
            </div>
        </div>
    <%/if%>

    <div class="form-group">
        <div class="col-sm-2 control-label">每行数量</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rownum" value="1" class="diy-bind" data-bind-child="params" data-bind="rownum" <%if params.rownum=='1'%>checked="checked"<%/if%>> 1个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="2" class="diy-bind" data-bind-child="params" data-bind="rownum" <%if params.rownum=='2'%>checked="checked"<%/if%>> 2个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="3" class="diy-bind" data-bind-child="params" data-bind="rownum" <%if params.rownum=='3'%>checked="checked"<%/if%>> 3个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="4" class="diy-bind" data-bind-child="params" data-bind="rownum" <%if params.rownum=='4'%>checked="checked"<%/if%>> 4个</label>
            <label class="radio-inline"><input type="radio" name="rownum" value="5" class="diy-bind" data-bind-child="params" data-bind="rownum" <%if params.rownum=='5'%>checked="checked"<%/if%>> 5个</label>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">上标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">下标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">上标题对齐</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="titlealign" value="left" class="diy-bind" data-bind-child="style" data-bind="titlealign" <%if style.titlealign=='left'||!style.titlealign%>checked="checked"<%/if%>> 左对齐</label>
            <label class="radio-inline"><input type="radio" name="titlealign" value="center" class="diy-bind" data-bind-child="style" data-bind="titlealign" <%if style.titlealign=='center'%>checked="checked"<%/if%>> 居中显示</label>
            <label class="radio-inline"><input type="radio" name="titlealign" value="right" class="diy-bind" data-bind-child="style" data-bind="titlealign" <%if style.titlealign=='right'%>checked="checked"<%/if%>> 右对齐</label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">下标题对齐</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="textalign" value="left" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='left'||!style.titlealign%>checked="checked"<%/if%>> 左对齐</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="center" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='center'%>checked="checked"<%/if%>> 居中显示</label>
            <label class="radio-inline"><input type="radio" name="textalign" value="right" class="diy-bind" data-bind-child="style" data-bind="textalign" <%if style.textalign=='right'%>checked="checked"<%/if%>> 右对齐</label>
        </div>
    </div>

    <div class="form-items indent" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image" style="height: 110px;">
                    <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" style="height: 100%; width: auto;" />
                </div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <span class="input-group-addon">上标题</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="title" placeholder="请输入上标题" value="<%child.title%>" />
                        <span class="input-group-addon" style="border-right: 0; border-left: 0;">下标题</span>
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="text" placeholder="请输入下标题" value="<%child.text%>" />
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                        <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>

    <div class="alert alert-info" style="margin-top: 10px; margin-bottom: 0;">注意：如果上标题 、下标题为空则不显示</div>
</script>

<script type="text/html" id="tpl_edit_audio">

    <div class="form-group">
        <div class="col-sm-2 control-label">选择音频</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control diy-bind" name="" placeholder="请点击右侧按钮选择音频" value="<%params.audiourl%>" data-bind-child="params" data-bind="audiourl" id="audiourl" data-bind-init="true" />
                <span class="input-group-addon btn audio-player" style="border-left: 0;"><i class="fa fa-play"></i></span>
                <audio src="<%imgsrc params.audiourl%>"></audio>
                <span class="input-group-addon btn btn-default" data-toggle="selectAudio" data-input="#audiourl">选择音频</span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">播放样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="playerstyle" value="0" class="diy-bind" data-bind-child="params" data-bind="playerstyle" data-bind-init="true" <%if params.playerstyle=='0'||!params.playerstyle%>checked="checked"<%/if%>> 音乐播放模式</label>
            <label class="radio-inline"><input type="radio" name="playerstyle" value="1" class="diy-bind" data-bind-child="params" data-bind="playerstyle" data-bind-init="true" <%if params.playerstyle=='1'%>checked="checked"<%/if%>> 语音消息模式</label>
        </div>
    </div>

    <%if params.playerstyle=='0'||!params.playerstyle%>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="" placeholder="请输入标题" value="<%params.title%>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">副标题</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="subtitle" data-placeholder="" placeholder="副标题，不填则不显示" value="<%params.subtitle%>" />
        </div>
    </div>
    <%/if%>
    <%if params.playerstyle==1%>
    <div class="form-group">
        <div class="col-sm-2 control-label">头像设置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="headtype" value="0" class="diy-bind" data-bind-child="params" data-bind="headtype" data-bind-init="true" <%if params.headtype=='0'||!params.headtype%>checked="checked"<%/if%>> 自定义</label>
            <label class="radio-inline"><input type="radio" name="headtype" value="1" class="diy-bind" data-bind-child="params" data-bind="headtype" data-bind-init="true" <%if params.headtype=='1'%>checked="checked"<%/if%>> 商城logo</label>
        </div>
    </div>
    <%if params.headtype==0||!params.headtype%>
    <div class="form-group">
        <div class="col-sm-2 control-label">选择头像</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input class="form-control diy-bind" placeholder="请点击右侧按钮选择图片" value="<%params.headurl%>" name="headurl" data-bind-child="params" data-bind="headurl" id="headurl" />
                <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#headurl">选择图片</span>
            </div>
            <div class="help-block">提示：如果自定义头像为空则也将显示商城logo</div>
        </div>
    </div>
    <%/if%>
    <div class="form-group">
        <div class="col-sm-2 control-label">头像位置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="headalign" value="left" class="diy-bind" data-bind-child="params" data-bind="headalign" <%if params.headalign=='left'||!params.headalign%>checked="checked"<%/if%>> 居左</label>
            <label class="radio-inline"><input type="radio" name="headalign" value="right" class="diy-bind" data-bind-child="params" data-bind="headalign" <%if params.headalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">上下间距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingtop%>" data-min="10" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingtop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingtop" value="<%style.paddingtop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右间距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.paddingleft%>" data-min="10" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.paddingleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="paddingleft" value="<%style.paddingleft%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">消息宽度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.width||'80'%>" data-min="80" data-max="180"></div>
                <div class="col-sm-4 control-labe count"><span><%style.width||'80'%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="width" value="<%style.width||'80'%>" type="hidden" />
            </div>
            <div class="help-block">提示：可根据消息的不同长度设置不同的宽度</div>
        </div>
    </div>
    <%if params.playerstyle=='0'||!params.playerstyle%>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f1f1f1').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">边框颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bordercolor" value="<%style.bordercolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ededed').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="textcolor" value="<%style.textcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">副标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="subtitlecolor" value="<%style.subtitlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">时间颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolor" value="<%style.timecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <%/if%>

    <div class="line"></div>

    <div class="form-group" style="display: none;">
        <div class="col-sm-2 control-label">自动播放</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="autoplay" value="0" class="diy-bind" data-bind-child="params" data-bind="autoplay" <%if params.autoplay=='0'||!params.autoplay%>checked="checked"<%/if%>> 关闭</label>
            <label class="radio-inline"><input type="radio" name="autoplay" value="1" class="diy-bind" data-bind-child="params" data-bind="autoplay" <%if params.autoplay=='1'%>checked="checked"<%/if%>> 启用</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">循环播放</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="loopplay" value="0" class="diy-bind" data-bind-child="params" data-bind="loopplay" <%if params.loopplay=='0'||!params.loopplay%>checked="checked"<%/if%>> 关闭</label>
            <label class="radio-inline"><input type="radio" name="loopplay" value="1" class="diy-bind" data-bind-child="params" data-bind="loopplay" <%if params.loopplay=='1'%>checked="checked"<%/if%>> 启用</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">播放设置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="pausestop" value="0" class="diy-bind" data-bind-child="params" data-bind="pausestop" <%if params.pausestop=='0'||!params.pausestop%>checked="checked"<%/if%>> 暂停后再恢复播放时，继续播放</label>
            <label class="radio-inline"><input type="radio" name="pausestop" value="1" class="diy-bind" data-bind-child="params" data-bind="pausestop" <%if params.pausestop=='1'%>checked="checked"<%/if%>> 暂停后再恢复播放时，从头播放</label>
        </div>
    </div>

    <div class="alert alert-info" style="margin-bottom: 0;">提示：编辑页面播放只提供播放/停止功能，更多动画、功能请在手机端查看</div>

</script>




<script type="text/html" id="tpl_edit_seckill_times">

    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgcolor" value="<%style.bgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#3333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">焦点背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="selectedbgcolor" value="<%style.selectedbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">焦点文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="selectedcolor" value="<%style.selectedcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#3333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


</script>




<script type="text/html" id="tpl_edit_seckill_rooms">

    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgcolor" value="<%style.bgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="color" value="<%style.color%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#3333333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">焦点背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="selectedbgcolor" value="<%style.selectedbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">焦点文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="selectedcolor" value="<%style.selectedcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


</script>
<script type="text/html" id="tpl_edit_seckill_advs">

    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginbottom%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginbottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginbottom" value="<%style.marginbottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgcolor" value="<%style.bgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>


</script>


<script type="text/html" id="tpl_edit_seckill_list">
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="bgcolor" value="<%style.bgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">顶部背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="topbgcolor" value="<%style.topbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f0f2f5').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">顶部文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="topcolor" value="<%style.topcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#464553').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">时间背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timebgcolor" value="<%style.timebgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333333').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">时间文字颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="timecolor" value="<%style.timecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">标题颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#333').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">价格颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="pricecolor" value="<%style.pricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">原价颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="marketpricecolor" value="<%style.marketpricecolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#949598').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">去抢购背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btnbgcolor" value="<%style.btnbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ef4f4f').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">去抢购文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btncolor" value="<%style.btncolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">等待抢购背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btnwaitbgcolor" value="<%style.btnwaitbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#04be02').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">等待抢购文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btnwaitcolor" value="<%style.btnwaitcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#04be02').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">已抢完背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btnoverbgcolor" value="<%style.btnoverbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#f7f7f7').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">已抢完文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="btnovercolor" value="<%style.btnovercolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">进度文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="processtextcolor" value="<%style.processtextcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#d0d1d2').trigger('propertychange')">重置</span>
            </div>
        </div>
        <div class="col-sm-2 control-label">进度文字</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="processbgcolor" value="<%style.processbgcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ff8f8f').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tpl_edit_coupon">
    <div class="form-group">
        <div class="col-sm-2 control-label">上下边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.margintop%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.margintop%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="margintop" value="<%style.margintop%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.marginleft%>" data-min="0" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.marginleft%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="marginleft" value="<%style.marginleft%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">选择样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="couponstyle" value="2" class="diy-bind" data-bind-child="params" data-bind="couponstyle" data-bind-init="true" <%if params.couponstyle=='2'%>checked="checked"<%/if%>> 每行2个</label>
            <label class="radio-inline"><input type="radio" name="couponstyle" value="3" class="diy-bind" data-bind-child="params" data-bind="couponstyle" data-bind-init="true" <%if params.couponstyle=='3'%>checked="checked"<%/if%> > 每行3个</label>
        </div>
    </div>
    <div class="line"></div>

    <div class="form-items indent" data-min="1">
        <div class="inner" id="form-items">
            <%each data as child itemid %>
            <div class="item" data-id="<%itemid%>">
                <span class="btn-del" title="删除"></span>
                <div class="item-image square drag-btn square" style="height: 110px; line-height: 110px;">拖动排序</div>
                <div class="item-form">
                    <div class="input-group" style="margin-bottom:0px; ">
                        <span class="input-group-addon">优惠券</span>
                        <input class="form-control input-sm diy-bind" value="<%child.name||'未设置'%>" readonly="readonly" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="price" />
                        <span class="input-group-addon btn btn-default coupon-selector">选择</span>
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px;">
                        <span class="input-group-addon">价值</span>
                        <input class="form-control input-sm diy-bind" value="<%child.price%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="price" readonly />
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">使用条件</span>
                        <input class="form-control input-sm diy-bind" value="<%child.desc%>" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="desc" readonly />
                    </div>
                    <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                        <span class="input-group-addon">文字</span>
                        <input class="form-control input-sm color diy-bind" value="<%child.textcolor%>" type="color" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="textcolor" />
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">边框</span>
                        <input class="form-control input-sm color diy-bind" value="<%child.bordercolor%>" type="color" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="bordercolor" />
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">背景</span>
                        <input class="form-control input-sm color diy-bind" value="<%child.background%>" type="color" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="background" />
                    </div>
                </div>
            </div>
            <%/each%>
        </div>
        <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
    </div>
</script>

<script type="text/html" id="tpl_edit_fixedsearch">
    <div class="form-group">
        <div class="col-sm-2 control-label">背景颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#000000').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">透明度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8 " data-value="<%style.opacity%>" data-min="0" data-max="10" data-decimal="10"></div>
                <div class="col-sm-4 control-labe count"><span><%style.opacity%></span>(最大是1)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="opacity" value="<%style.opacity%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">左侧按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="leftnav" value="0" class="diy-bind" data-bind-child="params" data-bind="leftnav" data-bind-init="true" <%if params.leftnav=='0'||!params.leftnav%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="leftnav" value="1" class="diy-bind" data-bind-child="params" data-bind="leftnav" data-bind-init="true" <%if params.leftnav=='1'%>checked="checked"<%/if%> > 图标</label>
            <label class="radio-inline"><input type="radio" name="leftnav" value="2" class="diy-bind" data-bind-child="params" data-bind="leftnav" data-bind-init="true" <%if params.leftnav=='2'%>checked="checked"<%/if%> > 图片</label>
        </div>
    </div>
    <%if params.leftnav==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">图标设置</div>
            <div class="col-sm-7">
                <div class="input-group input-group-sm">
                    <span class="form-control" style="line-height: 28px; text-align: center; width: 40px;"><i class="icon <%params.leftnavicon||'icon-shop'%>" id="showleftnavicon"></i></span>
                    <span data-input="#leftnavicon" data-element="#showleftnavicon" data-toggle="selectIcon" class="input-group-addon btn btn-default">选择图标</span>
                    <input type="hidden" class="diy-bind" data-bind-child="params" data-bind="leftnavicon" value="<%params.leftnavicon%>" id="leftnavicon" />
                    <div class="input-group-addon" style="border-left: 0; border-right: 0;">图标颜色</div>
                    <input class="form-control color diy-bind" type="color" style="width: 80px;" data-bind-child="style" data-bind="leftnavcolor" value="<%style.leftnavcolor%>"  />
                </div>
            </div>
        </div>
    <%/if%>
    <%if params.leftnav==2%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择图片</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="leftnavimg" value="<%params.leftnavimg%>" id="leftnavimg" />
                    <span data-input="#leftnavimg" data-img="#showleftnavimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
                </div>
                <div class="input-group " style="margin-top:.5em;">
                    <img src="<%imgsrc params.leftnavimg%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" style="height: 50px; background: #eee;" id="showleftnavimg">
                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="$('#leftnavimg').val('').trigger('change');$(this).prev().attr('src', '')">×</em>
                </div>
            </div>
        </div>
    <%/if%>
    <%if params.leftnav==1||params.leftnav==2%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择链接</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="leftnavlink"  value="<%params.leftnavlink%>" id="leftnavlink" />
                    <span data-input="#leftnavlink" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
                </div>
            </div>
        </div>
    <%/if%>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">右侧按钮</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="rightnav" value="0" class="diy-bind" data-bind-child="params" data-bind="rightnav" data-bind-init="true" <%if params.rightnav=='0'||!params.rightnav%>checked="checked"<%/if%>> 不显示</label>
            <label class="radio-inline"><input type="radio" name="rightnav" value="1" class="diy-bind" data-bind-child="params" data-bind="rightnav" data-bind-init="true" <%if params.rightnav=='1'%>checked="checked"<%/if%> > 图标</label>
            <label class="radio-inline"><input type="radio" name="rightnav" value="2" class="diy-bind" data-bind-child="params" data-bind="rightnav" data-bind-init="true" <%if params.rightnav=='2'%>checked="checked"<%/if%> > 图片</label>
        </div>
    </div>
    <%if params.rightnav==1%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择图标</div>
            <div class="col-sm-7">
                <div class="input-group input-group-sm">
                    <span class="form-control" style="line-height: 28px; text-align: center; width: 40px;"><i class="icon <%params.rightnavicon||'icon-shop'%>" id="showrightnavicon"></i></span>
                    <span data-input="#rightnavicon" data-element="#showrightnavicon" data-toggle="selectIcon" class="input-group-addon btn btn-default">选择图标</span>
                    <input type="hidden" class="diy-bind" data-bind-child="params" data-bind="rightnavicon" value="<%params.rightnavicon%>" id="rightnavicon" />
                    <div class="input-group-addon" style="border-left: 0; border-right: 0;">图标颜色</div>
                    <input class="form-control color diy-bind" type="color" style="width: 80px;" data-bind-child="style" data-bind="rightnavcolor" value="<%style.rightnavcolor%>"  />
                </div>
            </div>
        </div>
    <%/if%>
    <%if params.rightnav==2%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择图片</div>
            <div class="col-sm-10">
                <div class="input-group">
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="rightnavimg"  value="<%params.rightnavimg%>" id="rightnavimg" />
                    <span data-input="#rightnavimg" data-img="#showrightnavimg" data-toggle="selectImg" class="input-group-addon btn btn-default">选择图片</span>
                </div>
                <div class="input-group " style="margin-top:.5em;">
                    <img src="<%imgsrc params.rightnavimg%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" class="img-responsive img-thumbnail" style="height: 50px; background: #eee;" id="showrightnavimg">
                    <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="$('#rightnavimg').val('').trigger('change');$(this).prev().attr('src', '')">×</em>
                </div>
            </div>
        </div>
    <%/if%>
    <%if params.rightnav==1||params.rightnav==2%>
        <div class="form-group">
            <div class="col-sm-2 control-label">选择链接</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="rightnavlink"  value="<%params.rightnavlink%>" id="rightnavlink" />
                    <span data-input="#rightnavlink" data-toggle="selectUrl" class="input-group-addon btn btn-default">选择链接</span>
                </div>
            </div>
        </div>
    <%/if%>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">搜索框背景</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="searchbackground" value="<%style.searchbackground%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">重置</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">搜索文字颜色</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm" style="width: 127px;">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="searchtextcolor" value="<%style.searchtextcolor%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#666666').trigger('propertychange')">重置</span>
            </div>
            <div class="help-block">提示：此处是搜索文字颜色并不是提示文字颜色</div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">搜索框样式</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="searchstyle" value="" class="diy-bind" data-bind-child="params" data-bind="searchstyle"<%if params.searchstyle==''||!params.searchstyle%>checked="checked"<%/if%>> 直角</label>
            <label class="radio-inline"><input type="radio" name="searchstyle" value="round" class="diy-bind" data-bind-child="params" data-bind="searchstyle"<%if params.searchstyle=='round'%>checked="checked"<%/if%> > 圆弧</label>
            <label class="radio-inline"><input type="radio" name="searchstyle" value="circle" class="diy-bind" data-bind-child="params" data-bind="searchstyle" <%if params.searchstyle=='circle'%>checked="checked"<%/if%> > 圆角</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">搜索提示文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="placeholder" value="<%params.placeholder%>" data-placeholder="请输入关键字进行搜索" placeholder="请输入关键字进行搜索" />
        </div>
    </div>
    <div class="alert alert-danger" style="margin-bottom: 0;">注意：由于搜索框固定在页面顶部，有可能遮挡底层元素，建议页面首个元素放置幻灯片等较高高度的元素。</div>
</script>

<script type="text/html" id="tpl_edit_exchange_banner">
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮形状</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotstyle" value="rectangle" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='rectangle'%>checked="checked"<%/if%> > 长方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="square" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='square'%>checked="checked"<%/if%>> 正方形</label>
            <label class="radio-inline"><input type="radio" name="dotstyle" value="round" class="diy-bind" data-bind-child="style" data-bind="dotstyle" <%if style.dotstyle=='round'%>checked="checked"<%/if%>> 圆形</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮位置</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="dotalign" value="left" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='left'%>checked="checked"<%/if%> > 居左</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="center" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='center'%>checked="checked"<%/if%>> 居中</label>
            <label class="radio-inline"><input type="radio" name="dotalign" value="right" class="diy-bind" data-bind-child="style" data-bind="dotalign" <%if style.dotalign=='right'%>checked="checked"<%/if%>> 居右</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮颜色</div>
        <div class="col-sm-4">
            <div class="input-group input-group-sm">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="background" value="<%style.background%>" type="color" />
                <span class="input-group-addon btn btn-default" onclick="$(this).prev().val('#ffffff').trigger('propertychange')">清除</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮左右边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.leftright%>" data-min="5" data-max="50"></div>
                <div class="col-sm-4 control-labe count"><span><%style.leftright%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="leftright" value="<%style.leftright%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">按钮底部边距</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8" data-value="<%style.bottom%>" data-min="5" data-max="30"></div>
                <div class="col-sm-4 control-labe count"><span><%style.bottom%></span>px(像素)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="bottom" value="<%style.bottom%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">透明度</div>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="slider col-sm-8 " data-value="<%style.opacity%>" data-min="0" data-max="10" data-decimal="10"></div>
                <div class="col-sm-4 control-labe count"><span><%style.opacity%></span>(最大是1)</div>
                <input class="diy-bind input" data-bind-child="style" data-bind="opacity" value="<%style.opacity%>" type="hidden" />
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="form-group">
        <div class="col-sm-2 control-label">轮播数据</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="datatype" value="0" class="diy-bind" data-bind-child="params" data-bind="datatype" data-bind-init="true" <%if params.datatype=='0'||!params.datatype%>checked="checked"<%/if%> > 读取兑换任务数据</label>
            <label class="radio-inline"><input type="radio" name="datatype" value="1" class="diy-bind" data-bind-child="params" data-bind="datatype" data-bind-init="true" <%if params.datatype=='1'%>checked="checked"<%/if%>> 自定义</label>
        </div>
    </div>

    <%if params.datatype=='1'%>
        <div class="form-items" data-min="1">
            <div class="inner" id="form-items">
                <%each data as child itemid %>
                <div class="item" data-id="<%itemid%>">
                    <span class="btn-del" title="删除"></span>
                    <div class="item-image">
                        <img src="<%imgsrc child.imgurl%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic.jpg';" id="pimg-<%itemid%>" />
                    </div>
                    <div class="item-form">
                        <div class="input-group" style="margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="imgurl"  id="cimg-<%itemid%>" placeholder="请选择图片或输入图片地址" value="<%child.imgurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectImg" data-input="#cimg-<%itemid%>" data-img="#pimg-<%itemid%>">选择图片</span>
                        </div>
                        <div class="input-group" style="margin-top:10px; margin-bottom:0px; ">
                            <input type="text" class="form-control input-sm diy-bind" data-bind-parent="data" data-bind-child="<%itemid%>" data-bind="linkurl" id="curl-<%itemid%>" placeholder="请选择链接或输入链接地址" value="<%child.linkurl%>" />
                            <span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#curl-<%itemid%>">选择链接</span>
                        </div>
                    </div>
                </div>
                <%/each%>
            </div>
            <div class="btn btn-w-m btn-block btn-default btn-outline" id="addChild"><i class="fa fa-plus"></i> 添加一个</div>
        </div>
    <%/if%>
</script>

<script type="text/html" id="tpl_edit_exchange_input">
    <div class="form-group">
        <div class="col-sm-2 control-label">预览界面</div>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="preview" value="0" class="diy-bind" data-bind-child="params" data-bind="preview" data-bind-init="true" <%if params.preview=='0'||!params.preview%>checked="checked"<%/if%>> 输入兑换码</label>
            <label class="radio-inline"><input type="radio" name="preview" value="1" class="diy-bind" data-bind-child="params" data-bind="preview" data-bind-init="true" <%if params.preview=='1'%>checked="checked"<%/if%> > 兑换列表</label>
            <div class="help-block">手机端显示流程: 在输入兑换码界面数据点击兑换显示兑换列表</div>
        </div>
    </div>

    <div class="line"></div>

    <%if params.preview!='1'%>
    <div class="form-group">
        <div class="col-sm-2 control-label">兑换标题</div>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">文字</div>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="title" data-placeholder="兑换码兑换" placeholder="兑换码兑换" value="<%params.title%>" />
                <div class="input-group-addon" style="border-left: 0; border-right: 0;">颜色</div>
                <div class="input-group-addon" style="padding: 0; border: 0">
                    <input class="form-control input-sm diy-bind" type="color" style="width: 80px; cursor: pointer;" data-bind-child="style" data-bind="titlecolor" value="<%style.titlecolor%>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">输入框文字</div>
        <div class="col-sm-10">
            <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="placeholder" data-placeholder="请输入兑换码" placeholder="请输入兑换码" value="<%params.placeholder%>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">输入框颜色</div>
        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <span class="input-group-addon">文字</span>
                <input class="form-control color diy-bind" type="color" value="<%style.inputcolor%>" data-bind-child="style" data-bind="inputcolor" />
                <span class="input-group-addon" style="border-left: 0; border-right: 0;">背景</span>
                <input class="form-control color diy-bind" type="color" value="<%style.inputbackground%>" data-bind-child="style" data-bind="inputbackground" />
                <span class="input-group-addon" style="border-left: 0; border-right: 0;">边框</span>
                <input class="form-control color diy-bind" type="color" value="<%style.inputborder%>" data-bind-child="style" data-bind="inputborder" />
            </div>
            <div class="help-block">提示：文字颜色指的是输入的文字颜色，不是提示文字颜色</div>
        </div>
    </div>

    <div class="line"></div>

    <div class="form-group">
        <div class="col-sm-2 control-label">按钮文字</div>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">文字</div>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="btntext" data-placeholder="立即兑换" placeholder="立即兑换" value="<%params.btntext%>" />
                <div class="input-group-addon" style="border-left: 0; border-right: 0;">文字</div>
                <div class="input-group-addon " style="padding: 0; border: 0">
                    <input class="form-control input-sm diy-bind" type="color" style="width: 50px; cursor: pointer;" data-bind-child="style" data-bind="btncolor" value="<%style.btncolor%>"/>
                </div>
                <div class="input-group-addon" style="border-left: 0; border-right: 0;">背景</div>
                <div class="input-group-addon " style="padding: 0; border: 0">
                    <input class="form-control input-sm diy-bind" type="color" style="width: 50px; cursor: pointer;" data-bind-child="style" data-bind="btnbackground" value="<%style.btnbackground%>"/>
                </div>
            </div>
        </div>
    </div>
    <%/if%>

    <%if params.preview=='1'%>
        <div class="form-group">
            <div class="col-sm-2 control-label">兑换码颜色</div>
            <div class="col-sm-4">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="codecolor" value="<%style.codecolor%>" type="color" />
            </div>
            <div class="col-sm-2 control-label">查询次数颜色</div>
            <div class="col-sm-4">
                <input class="form-control input-sm diy-bind color" data-bind-child="style" data-bind="numcolor" value="<%style.numcolor%>" type="color" />
            </div>
        </div>

        <div class="line"></div>
        <div class="form-group">
            <div class="col-sm-2 control-label">商品样式</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="border-right: 0;">标题颜色</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.goodstitle%>" data-bind-child="style" data-bind="goodstitle" style="width: 113px;" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">面值颜色</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.goodsprice%>" data-bind-child="style" data-bind="goodsprice" style="width: 113px;" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">兑换按钮</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">文字</span>
                    <input class="form-control diy-bind" value="<%params.exbtntext||'兑换'%>" data-bind-child="params" data-bind="exbtntext" style="width: 90px;" placeholder="兑换" data-placeholder="兑换" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">文字</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.exbtncolor%>" data-bind-child="style" data-bind="exbtncolor" style="width: 70px;" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">背景</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.exbtnbackground%>" data-bind-child="style" data-bind="exbtnbackground" style="width: 70px;" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">已兑换按钮</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">文字</span>
                    <input class="form-control diy-bind" value="<%params.exbtn2text||'已兑换'%>" data-bind-child="params" data-bind="exbtn2text" style="width: 90px;" placeholder="已兑换" data-placeholder="已兑换" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">文字</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.exbtn2color%>" data-bind-child="style" data-bind="exbtn2color" style="width: 70px;" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">背景</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.exbtn2background%>" data-bind-child="style" data-bind="exbtn2background" style="width: 70px;" />
                </div>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="form-group">
            <div class="col-sm-2 control-label">余额图标</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="padding: 0; width: 30px;">
                        <img src="<%imgsrc params.moneyicon%>" style="height: 20px; width: 20px;" id="showmoneyicon">
                    </span>
                    <input class="form-control diy-bind" value="<%params.moneyicon||'已兑换'%>" data-bind-child="params" data-bind="moneyicon" placeholder="请选择图标或恢复默认" id="moneyicon" data-bind-init="true" />
                    <span class="input-group-addon btn" style="border-left: 0;" data-toggle="selectImg" data-input="#moneyicon" data-img="#showmoneyicon">选择图片</span>
                    <span class="input-group-addon btn" style="border-left: 0;" onclick="$('#moneyicon').val('../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_money.png').trigger('change');">恢复默认</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">积分图标</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="padding: 0; width: 30px;">
                        <img src="<%imgsrc params.crediticon%>" style="height: 20px; width: 20px;" id="showcrediticon">
                    </span>
                    <input class="form-control diy-bind" value="<%params.crediticon%>" data-bind-child="params" data-bind="crediticon" placeholder="请选择图标或恢复默认" id="crediticon" data-bind-init="true" />
                    <span class="input-group-addon btn" style="border-left: 0;" data-toggle="selectImg" data-input="#crediticon" data-img="#showcrediticon">选择图片</span>
                    <span class="input-group-addon btn" style="border-left: 0;" onclick="$('#crediticon').val('../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_credit.png').trigger('change')">恢复默认</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">优惠券图标</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="padding: 0; width: 30px;">
                        <img src="<%imgsrc params.couponicon%>" style="height: 20px; width: 20px;" id="showcouponicon">
                    </span>
                    <input class="form-control diy-bind" value="<%params.couponicon%>" data-bind-child="params" data-bind="couponicon" placeholder="请选择图标或恢复默认" id="couponicon" data-bind-init="true" />
                    <span class="input-group-addon btn" style="border-left: 0;" data-toggle="selectImg" data-input="#couponicon" data-img="#showcouponicon">选择图片</span>
                    <span class="input-group-addon btn" style="border-left: 0;" onclick="$('#couponicon').val('../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_coupon.png').trigger('change')">恢复默认</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">红包图标</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="padding: 0; width: 30px;">
                        <img src="<%imgsrc params.redbagicon%>" style="height: 20px; width: 20px;" id="showredbagicon">
                    </span>
                    <input class="form-control diy-bind" value="<%params.redbagicon%>" data-bind-child="params" data-bind="redbagicon" placeholder="请选择图标或恢复默认" id="redbagicon" data-bind-init="true" />
                    <span class="input-group-addon btn" style="border-left: 0;" data-toggle="selectImg" data-input="#redbagicon" data-img="#showredbagicon">选择图片</span>
                    <span class="input-group-addon btn" style="border-left: 0;" onclick="$('#redbagicon').val('../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_redbag.png').trigger('change')">恢复默认</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">红包图标</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" style="padding: 0; width: 30px;">
                        <img src="<%imgsrc params.goodsicon%>" style="height: 20px; width: 20px;" id="showgoodsicon">
                    </span>
                    <input class="form-control diy-bind" value="<%params.goodsicon%>" data-bind-child="params" data-bind="goodsicon" placeholder="请选择图标或恢复默认" id="goodsicon" data-bind-init="true" />
                    <span class="input-group-addon btn" style="border-left: 0;" data-toggle="selectImg" data-input="#goodsicon" data-img="#showgoodsicon">选择图片</span>
                    <span class="input-group-addon btn" style="border-left: 0;" onclick="$('#goodsicon').val('../addons/ewei_shopv2/plugin/diypage/static/images/default/icon_goods.png').trigger('change')">恢复默认</span>
                </div>
                <div class="help-block">提示：图标尺寸为正方形，建议80*80</div>
            </div>
        </div>

        <div class="line"></div>
        <div class="form-group">
            <div class="col-sm-2 control-label">返回按钮文字</div>
            <div class="col-sm-10">
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="backbtn" data-placeholder="返回重新输入兑换码" placeholder="返回重新输入兑换码" value="<%params.backbtn%>" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">返回按钮颜色</div>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon">文字</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.backbtncolor%>" data-bind-child="style" data-bind="backbtncolor" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">背景</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.backbtnbackground%>" data-bind-child="style" data-bind="backbtnbackground" />
                    <span class="input-group-addon" style="border-left: 0; border-right: 0;">边框</span>
                    <input class="form-control color diy-bind" type="color" value="<%style.backbtnborder%>" data-bind-child="style" data-bind="backbtnborder" />
                </div>
            </div>
        </div>
    <%/if%>
</script>

<script type="text/html" id="tpl_edit_exchange_rule">
    <div class="form-group">
        <div class="col-sm-2 control-label">标题</div>
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-addon">文字</div>
                <input class="form-control input-sm diy-bind" data-bind-child="params" data-bind="ruletitle" data-placeholder="兑换规则" placeholder="兑换规则" value="<%params.ruletitle%>" />
                <div class="input-group-addon" style="border-left: 0; border-right: 0;">颜色</div>
                <div class="input-group-addon" style="padding: 0; border: 0">
                    <input class="form-control input-sm diy-bind" type="color" style="width: 80px; cursor: pointer;" data-bind-child="style" data-bind="ruletitlecolor" value="<%style.ruletitlecolor%>"/>
                </div>
            </div>
        </div>
    </div>
</script>

