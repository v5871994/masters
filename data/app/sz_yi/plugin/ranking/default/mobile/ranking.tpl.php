<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title><?php  echo $set['rankingname'];?></title>
<style type="text/css">
    body {margin:0px; background:#eee; font-family:'微软雅黑'; -moz-appearance:none;}
    .credit_list {height:40px; width:94%; background:#fff; padding:10px 3%;margin-top:5px;}
    
    .credit_list .info {height:40px; width:50%; float:left;  font-size:16px; color:#666; line-height:20px; text-align:left;}
    .credit_list .info span {font-size:14px; color:#999;}
    .credit_list .num {height:40px; border-left:1px solid #eaeaea; width:40%;line-height:20px; float:right; text-align:left; font-size:16px; color:#666;}
    .credit_list .num span {font-size:14px; color:#999;}
    .credit_tab {height:30px; margin:5px; border:1px solid #eb5f5f; border-radius:2px; overflow:hidden;font-size:13px;background:#fff;padding-right: -2px;}
    .credit_nav {height:30px; width:<?php  echo $style_width;?>%;background:#fff; color:#666; text-align:center; line-height:30px; float:left;}
    .credit_navon {color:#fff; background:#eb5f5f;}
    .credit_no {height:100px; width:100%; margin:50px 0px 60px; color:#ccc; font-size:12px; text-align:center;}
    #credit_loading { padding:10px;color:#666;text-align: center;}
    .new-list ul li p{width: 40%}

</style>
<div class="page_topbar">
    <a href="javascript:;" class="back" onclick="history.back()"><i class="fa fa-angle-left"></i></a>
    <div class="title"><?php  echo $set['rankingname'];?></div>
</div>

<div class="credit_tab">

<?php  if($set['isintegral']) { ?>
    <div class="credit_nav <?php  if($_GPC['type']==0) { ?>credit_navon<?php  } ?>" data-type='0' ><?php  echo $set['integralname'];?></div>
<?php  } ?>
<?php  if($set['isexpense']) { ?>
    <div class="credit_nav <?php  if($_GPC['type']==1) { ?>credit_navon<?php  } ?>"  data-type='1'><?php  echo $set['expensename'];?></div>
<?php  } ?>
<?php  if($set['iscommission']) { ?>
    <div class="credit_nav <?php  if($_GPC['type']==2) { ?>credit_navon<?php  } ?>"  data-type='2'><?php  echo $set['commissionname'];?></div>
<?php  } ?>   
</div>



    <div class="report">
        <div class="report-img">
            <p>我的名次</p>
            <h1 id='m_num'></h1>
            <div class="report-photo">
                <img id="m_avatar" src="">
                <h2 id="m_credit1"></h2>
            </div>
        </div>

        <div class="new-list">
            <ul>
<div id='container'></div>

<script id='tpl_log' type='text/html'>

    <%if type==0%>

                <%each list as log%>
                    <%if log.credit1 > 0 %>
                        <%if log.number == 1%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/01.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>积分：<i class="red"><%log.credit1%></i></p>
                            </li>
                        <%else if log.number == 2%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/02.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>积分：<i class="red"><%log.credit1%></i></p>
                            </li>
                        <%else if log.number == 3%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/03.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>积分：<i class="red"><%log.credit1%></i></p>
                            </li>
                        <%else%>
                            <li>
                                <span class="one-icon"><%log.number%></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>积分：<i class="red"><%log.credit1%></i></p>
                            </li>
                        <%/if%>
                    <%/if%>
                <%/each%>

    <%/if%>
    <%if type==1%>

                <%each list as log%>
                    <%if log.ordermoney > 0 %>
                        <%if log.number == 1%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/01.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>消费：<i class="red"><%log.ordermoney%></i></p>
                            </li>
                        <%else if log.number == 2%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/02.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>消费：<i class="red"><%log.ordermoney%></i></p>
                            </li>
                        <%else if log.number == 3%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/03.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>消费：<i class="red"><%log.ordermoney%></i></p>
                            </li>
                        <%else%>
                            <li>
                                <span class="one-icon"><%log.number%></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>消费：<i class="red"><%log.ordermoney%></i></p>
                            </li>
                        <%/if%>
                    <%/if%>
                <%/each%>
 
    <%/if%>
    <%if type==2%>

                <%each list as log%>
                    <%if log.credit > 0 %>
                        <%if log.number == 1%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/01.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>佣金：<i class="red"><%log.credit%></i></p>
                            </li>
                        <%else if log.number == 2%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/02.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>佣金：<i class="red"><%log.credit%></i></p>
                            </li>
                        <%else if log.number == 3%>
                            <li>
                                <span class="one-icon"><img src="../addons/sz_yi/static/images/03.png"></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>佣金：<i class="red"><%log.credit%></i></p>
                            </li>
                        <%else%>
                            <li>
                                <span class="one-icon"><%log.number%></span>
                                <div><img src="<%log.avatar%>"><em><%log.realname%></em></div>
                                <p>佣金：<i class="red"><%log.credit%></i></p>
                            </li>
                        <%/if%>
                    <%/if%>
                <%/each%>
 
    <%/if%>
</script>
            </ul>
            
        </div>
    </div>
<script id='tpl_empty' type='text/html'>
    <div class="credit_no"><i class="fa fa-file-text-o" style="font-size:100px;"></i><br><span style="line-height:18px; font-size:16px;">暂时没有任何记录~</span></div>
</script>

<script language="javascript">
    var page = 1;
    var scrolled = false;
    var current_type = "<?php  echo intval($_GPC['type'])?>";
    var goodsid = "<?php  echo intval($_GPC['goodsid'])?>";
    require(['tpl', 'core'], function (tpl, core) {

function bindScroller(){
        var loaded = false;
        var stop = true;

        $(window).scroll(function () {

            if (loaded) {
                return;
            }
            totalheight = parseFloat($(window).height()) + parseFloat($(window).scrollTop());
            if ($(document).height() <= totalheight) {
                if (stop == true) {
                    stop = false; scrolled = true;
                    $('#container').append('<div id="credit_loading"><i class="fa fa-spinner fa-spin"></i> 正在加载...</div>');
                    page++;
   
                    core.pjson('ranking/ranking', {type: current_type,page: page}, function (json) {
                        stop = true;
                        $('#credit_loading').remove();
                        $("#container").append(tpl('tpl_log', json.result));
                     
                        var m_num = json.result.m_credit1!=0?json.result.m_num:'未上榜';
                        var m_avatar = json.result.m_avatar?json.result.m_avatar:'../addons/sz_yi/template/mobile/default/static/images/photo-mr.jpg';
                        var m_credit1 = json.result.m_credit1!=0?json.result.m_credit1:'0';
                        $('#m_num').html(m_num);
                        $('#m_avatar').attr('src',m_avatar);
                        $('#m_credit1').html(json.result.m_credit_name+":"+m_credit1); 
                            if(page==10)
                            {
                               $('#credit_loading').remove();
                                //$('#credit_loading').html('已经加载完全部记录');
                                $("#tpl_container").append('<div id="credit_loading">已经加载完全部记录</div>');
                                loaded = true;
                                //console.log('loaded:'+loaded);
                                $(window).scroll = null;
                                return;
                            }
                        
                        if (json.result.list.length < json.result.pagesize) {
                            $('#credit_loading').remove();
                            //$('#credit_loading').html('已经加载完全部记录');
                            $("#container").append('<div id="credit_loading">已经加载完全部记录</div>');
                            loaded = true;
                            //console.log('loaded:'+loaded);
                            $(window).scroll = null;
                            return;
                        }
                    }, true);
                }
            }
        });
}
        function getLog(type) {
            if(goodsid==0)
            {
                $('.credit_nav').removeClass('credit_navon');
                $('.credit_nav[data-type=' + type + ']').addClass('credit_navon'); 
            }

            core.pjson('ranking/ranking', {type:type,page: page}, function (json) {
                if (json.result.list.length <= 0) {
                    $('#container').html(tpl('tpl_empty'));
                    $('.report-img').hide();
                    return;
                }
                $('#container').html(tpl('tpl_log', json.result));

                var m_num = json.result.m_credit1!=0?json.result.m_num:'未上榜';
                var m_avatar = json.result.m_avatar?json.result.m_avatar:'../addons/sz_yi/template/mobile/default/static/images/photo-mr.jpg';
                var m_credit1 = json.result.m_credit1!=0?json.result.m_credit1:'0';
                    $('#m_num').html(m_num);
                    $('#m_avatar').attr('src',m_avatar);
                    $('#m_credit1').html(json.result.m_credit_name+":"+m_credit1);                   
               
  

                bindScroller();
            }, true);
        }

        $('.credit_nav').unbind('click').click(function () {
            page = 1;
            current_type = $(this).data('type');
            getLog(current_type);

        });
        getLog(current_type);
    })
</script>
<?php  $show_footer=true?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
