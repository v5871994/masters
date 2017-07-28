<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .page-goods-detail .basic-block {background: <?php  echo $diypage['background'];?>;}
    .fui-cell-group{width:100%;}

    .fui-header {background: <?php  echo $diypage['tab']['style']['background'];?>;}
    .fui-tab a {color: <?php  echo $diypage['tab']['style']['textcolor'];?>;}
    .fui-tab.fui-tab-danger a.active {color: <?php  echo $diypage['tab']['style']['activecolor'];?>; border-color: <?php  echo $diypage['tab']['style']['activecolor'];?>;}
    .page-goods-detail .fui-comment-group .fui-cell .comment .info .star .shine {color: <?php  echo $diypage['comment']['style']['maincolor'];?>;}
    .fui-list-media.radius img {border-radius: 0.3rem;}
    .fui-list-media.circle img {border-radius: 2.5rem;}

    .btn-like {color: <?php  echo $diypage['navbar']['style']['iconcolor'];?>}
    .btn-like.icon-likefill {color: #f01}
</style>
<link rel="stylesheet" href="../addons/ewei_shopv2/static/js/dist/swiper/swiper.min.css">
<link href="../addons/ewei_shopv2/plugin/diypage/static/css/foxui.diy.css?v=201610091000"rel="stylesheet"type="text/css"/>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">

<div class='fui-page fui-page-current  page-goods-detail' id='page-goods-detail-index'>
    <?php  if($diypage['followbar']) { ?>
        <?php  $this->followBar(true)?>
    <?php  } ?>

    <?php  if(empty($err)) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back" id="btn-back"></a>
            </div>
            <div class="title">
                <div id="tab" class="fui-tab fui-tab-danger">
                    <a data-tab="tab1" class="tab active"><?php  if(!empty($diypage['tab']['params']['goodstext'])) { ?><?php  echo $diypage['tab']['params']['goodstext'];?><?php  } else { ?>商品<?php  } ?></a>
                    <a data-tab="tab2" class="tab"><?php  if(!empty($diypage['tab']['params']['detailtext'])) { ?><?php  echo $diypage['tab']['params']['detailtext'];?><?php  } else { ?>详情<?php  } ?></a>
                    <?php  if(count($params)>0) { ?>
                    <a data-tab="tab3" class="tab">参数</a>
                    <?php  } ?>
                    <?php  if($getComments) { ?>
                    <a  data-tab="tab4" class="tab" style="display:none" id="tabcomment">评价</a>
                    <?php  } ?>
                </div>
            </div>
            <div class="fui-header-right"></div>
        </div>
    <?php  } else { ?>
        <div class="fui-header ">
            <div class="fui-header-left">
                <a class="back" id="btn-back"></a>
            </div>
            <div class="title">
                找不到宝贝
            </div>
        </div>
    <?php  } ?>

    <?php  if(empty($err)) { ?>
        <?php  if(count($params)>0) { ?>
            <div class="fui-content param-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
                <div class="fui-cell-group">
                    <?php  if(!empty($params)) { ?>
                        <?php  if(is_array($params)) { foreach($params as $p) { ?>
                        <div class="fui-cell">
                            <div class="fui-cell-label" ><?php  echo $p['title'];?></div>
                            <div class="fui-cell-info overflow"><?php  echo $p['value'];?></div>
                        </div>
                        <?php  } } ?>
                    <?php  } else { ?>
                        <div class="fui-cell">
                            <div class="fui-cell-info text-align">商品没有参数</div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        <?php  } ?>

        <div class='fui-content comment-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>' data-getcount='1' id='comments-list-container'>
            <div class='fui-icon-group col-5 '>
                <div class='fui-icon-col' data-level='all'><span class='text-danger'>全部<br/><span class="count"></span></span></div>
                <div class='fui-icon-col' data-level='good'><span>好评<br/><span class="count"></span></span></div>
                <div class='fui-icon-col' data-level='normal'><span>中评<br/><span class="count"></span></span></div>
                <div class='fui-icon-col' data-level='bad'><span>差评<br/><span class="count"></span></span></div>
                <div class='fui-icon-col' data-level='pic'><span>晒图<br/><span class="count"></span></span></div>
            </div>
            <div class='content-empty' style='display:none;'><i class='icon icon-community'></i><br/>暂时没有任何评价</div>
            <div class='container' id="comments-all"></div>
            <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
        </div>

        <div class="fui-content detail-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
            <div class="text-danger look-basic"><i class='icon icon-unfold'></i> <span>上拉返回商品详情</span></div>
            <div class='content-block content-images'></div>
        </div>

        <div class='fui-content basic-block pulldown <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>'>
        <?php  if(!empty($err)) { ?>
            <div class='content-empty'>
                <i class='icon icon-search'></i><br/> 宝贝找不到了~ 您看看别的吧 ~<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'>到处逛逛</a>
            </div>
        <?php  } else { ?>
            <?php  if($commission_data['qrcodeshare'] > 0) { ?>
                <i class="icon icon-qrcode" id="alert-click"></i>
            <?php  } ?>


            <?php  if(is_array($diypage['items'])) { foreach($diypage['items'] as $diyitem) { ?>
                <?php  if($diyitem['id']=='detail_comment') { ?>
                    <div id='comments-container'></div>
                <?php  } else if($diyitem['id']=='detail_pullup') { ?>
                    <?php  if(empty($diyitem['params']['hide'])) { ?>
                        <div class="fui-cell-group">
                            <div class="fui-cell">
                                <div class="fui-cell-text text-center look-detail"><i class='icon icon-fold'></i> <span>上拉查看图文详情</span></div>
                            </div>
                        </div>
                    <?php  } ?>
                <?php  } else { ?>
                    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH)) : (include template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH));?>
                <?php  } ?>
            <?php  } } ?>
<?php  } ?>
</div>

<?php  if($isgift && $goods['total'] > 0) { ?>
<div id='gift-picker-modal' style="margin:-100%;">
    <div class='gift-picker'>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>
            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    请选择赠品:
                    <div class="dispatching-info" style="max-height:12rem;overflow-y: auto ">
                        <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
                        <div class="fui-list goods-item align-start" data-giftid="<?php  echo $item['id'];?>">
                            <div class="fui-list-media">
                                <input type="radio" name="checkbox" class="fui-radio fui-radio-danger gift-item" value="<?php  echo $item['id'];?>" style="display: list-item;">
                            </div>
                            <div class="fui-list-inner">
                                <?php  if(is_array($item['gift'])) { foreach($item['gift'] as $gift) { ?>
                                <div class="fui-list">
                                    <div class="fui-list-media image-media" style="position: initial;">
                                        <a href="javascript:void(0);">
                                            <img class="round" src="<?php  echo tomedia($gift['thumb'])?>" data-lazyloaded="true">
                                        </a>
                                    </div>
                                    <div class="fui-list-inner">
                                        <a href="javascript:void(0);">
                                            <div class="text">
                                                <?php  echo $gift['title'];?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='fui-list-angle'>
                                        <span class="price">&yen;<del class='marketprice'><?php  echo $gift['marketprice'];?></del></span>
                                    </div>
                                </div>
                                <?php  } } ?>
                            </div>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php  } ?>

<?php  if($goods['canbuy']) { ?>
    <div class="fui-navbar bottom-buttons" style="background: <?php  echo $diypage['navbar']['style']['background'];?>;">

        <?php  if(!empty($diypage['diynavbar'])) { ?>
            <?php  if(is_array($diypage['diynavbar'])) { foreach($diypage['diynavbar'] as $navbaritem) { ?>
                <?php  if($navbaritem['type']=='like') { ?>
                    <a  class="nav-item favorite-item <?php  if($isFavorite) { ?>active<?php  } ?>" data-isfavorite="<?php  echo intval($isFavorite)?>">
                        <span class="icon btn-like <?php  if($isFavorite) { ?>icon-likefill<?php  } else { ?>icon-like<?php  } ?>"></span>
                        <span class="label" style="color: <?php  echo $diypage['navbar']['style']['textcolor'];?>">关注</span>
                    </a>
                <?php  } else { ?>
                    <a  class="nav-item external" href="<?php  if($navbaritem['type']=='shop') { ?><?php echo !empty($goods['merchid']) ? mobileUrl('merch',array('merchid'=>$goods['merchid'])) : mobileUrl('');?><?php  } else { ?><?php  echo $navbaritem['linkurl'];?><?php  } ?>">
                        <?php  if($navbaritem['type']=='cart' && $cartCount>0) { ?>
                        <span class='badge <?php  if($cartCount<=0) { ?>out<?php  } else { ?>in<?php  } ?>'><?php  echo $cartCount;?></span>
                        <?php  } ?>
                        <span class="icon <?php  echo $navbaritem['iconclass'];?>" style="color: <?php  echo $diypage['navbar']['style']['iconcolor'];?>"></span>
                        <span class="label" style="color: <?php  echo $diypage['navbar']['style']['textcolor'];?>"><?php  echo $navbaritem['icontext'];?></span>
                    </a>
                <?php  } ?>
            <?php  } } ?>
        <?php  } ?>

        <?php  if($canAddCart && empty($diypage['navbar']['params']['hidecartbtn'])) { ?>
        <a  class="nav-item btn cartbtn" style="background: <?php  echo $diypage['navbar']['style']['cartcolor'];?>;">加入购物车</a>
        <?php  } ?>
        <?php  if(empty($seckillinfo) || $seckillinfo['status']==0 || $seckillinfo['status']==-1) { ?>
        <a  class="nav-item btn buybtn" style="background: <?php  echo $diypage['navbar']['style']['buycolor'];?>;"><?php echo !empty($diypage['navbar']['params']['textbuy'])?$diypage['navbar']['params']['textbuy']:"立刻购买"?></a>
        <?php  } else { ?>

        <a  class="nav-item btn buybtn" style="color: <?php  echo $diypage['seckill']['style']['buybtntextwait'];?>;background: <?php  echo $diypage['seckill']['style']['buybtnbgwait'];?>;">
            <?php echo !empty($diypage['seckill']['params']['buybtn'])?$diypage['seckill']['params']['buybtn']:"原价购买"?>
        </a>

        <?php  } ?>
    </div>
<?php  } ?>

<?php  if($has_city) { ?>
<div id='city-picker-modal' style="margin: -100%;">
    <div class='city-picker'>
        <div class='fui-cell-title'>促销活动</div>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>
            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    <?php  if(empty($onlysent)) { ?>不<?php  } else { ?>只<?php  } ?>配送区域:
                    <div class="dispatching-info">
                        <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
                        <i><?php  echo $item;?></i>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php  } ?>

<div id='sale-picker-modal' style="margin: -100%;">
    <div class='sale-picker'>
        <div class='fui-cell-title'>促销活动</div>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0'>
            <?php  if($enoughfree && $enoughfree==-1) { ?>
            <div class="fui-cell"><div class="fui-cell-text">全场包邮</div></div>
            <?php  } else { ?>
            <?php  if($enoughfree>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text">全场满 <span class="text-danger">￥<?php  echo $enoughfree;?></span> 包邮</div>
            </div>
            <?php  } ?>
            <?php  if($goods['ednum']>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text">单品满 <span class="text-danger"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?'件':$goods['unit']?>包邮
                </div>
            </div>
            <?php  } ?>
            <?php  if($goods['edmoney']>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text">单品满 <span class="text-danger">￥<?php  echo $goods['edmoney'];?></span> 包邮
                </div>
            </div>
            <?php  } ?>
            <?php  } ?>
            <?php  if($enoughfree || ($enoughs && count($enoughs)>0)) { ?>
            <?php  if($enoughs && count($enoughs)>0) { ?>
            <div class='fui-according'>
                <div class='fui-according-header'>
                    <div class="text">
                        <div class="fui-cell-text">全场满 <span class="text-danger">￥<?php  echo $enoughs[0]['enough'];?></span> 立减 <span class="text-danger">￥<?php  echo $enoughs[0]['money'];?></span></div>
                    </div>
                    <?php  if(count($enoughs)>1) { ?><span class="remark">更多</span><?php  } ?>
                </div>
                <?php  if(count($enoughs)>1) { ?>
                <div class='fui-according-content'>
                    <?php  if(is_array($enoughs)) { foreach($enoughs as $key => $enough) { ?>
                    <?php  if($key>0) { ?>
                    <div class="fui-cell">
                        <div class="fui-cell-text">满 <span class="text-danger">￥<?php  echo $enough['enough'];?></span> 立减 <span class="text-danger">￥<?php  echo $enough['money'];?></span></div>
                    </div>
                    <?php  } ?>
                    <?php  } } ?>
                </div>
                <?php  } ?>
            </div>
            <?php  } ?>
            <?php  } ?>
            <div class='btn btn-danger block'>确定</div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>

<?php  if($getComments) { ?>
<script type='text/html' id='tpl_goods_detail_comments_list'>
    <div class="fui-cell-group fui-comment-group">
        <%each list as comment%>
        <div class="fui-cell">
            <div class="fui-cell-text comment ">
                <div class="info head">
                    <div class='img'><img src='<%comment.headimgurl%>'/></div>
                    <div class='nickname'><%comment.nickname%></div>

                    <div class="date"><%comment.createtime%></div>
                    <div class="star star1">
                        <span <%if comment.level>=1%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>>★</span>
                    </div>
                </div>
                <div class="remark"><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img">
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" /></div>
                    <%/each%>
                </div>
                <%/if%>

                <%if comment.reply_content%>
                    <div class="reply-content" style="background:#EDEDED;">
                        掌柜回复：<%comment.reply_content%>
                        <%if comment.reply_images.length>0%>
                        <div class="remark img">
                            <%each comment.reply_images as img%>
                            <div class="img"><img data-lazy="<%img%>" /></div>
                            <%/each%>
                        </div>
                        <%/if%>
                    </div>
                <%/if%>
                <%if comment.append_content && comment.replychecked==0%>
                    <div class="remark reply-title">用户追加评价</div>
                    <div class="remark"><%comment.append_content%></div>
                    <%if comment.append_images.length>0%>
                    <div class="remark img">
                        <%each comment.append_images as img%>
                        <div class="img"><img data-lazy="<%img%>" /></div>
                        <%/each%>
                    </div>
                    <%/if%>
                    <%if comment.append_reply_content%>
                        <div class="reply-content" style="background:#EDEDED;">
                            掌柜回复：<%comment.append_reply_content%>
                            <%if comment.append_reply_images.length>0%>
                            <div class="remark img">
                                <%each comment.append_reply_images as img%>
                                <div class="img"><img data-lazy="<%img%>" /></div>
                                <%/each%>
                            </div>
                            <%/if%>
                        </div>
                    <%/if%>
                <%/if%>
            </div>
        </div>
        <%/each%>
    </div>
</script>

<script type='text/html' id='tpl_goods_detail_comments'>
    <div class="fui-cell-group fui-comment-group" style="margin-top: <?php  echo $diypage['comment']['style']['margintop'];?>; margin-bottom: <?php  echo $diypage['comment']['style']['marginbottom'];?>; background: <?php  echo $diypage['comment']['style']['background'];?>;">
        <div class="fui-cell fui-cell-click">
            <div class="fui-cell-text desc" style="color: <?php  echo $diypage['comment']['style']['subcolor'];?>;">评价(<%count.all%>)</div>
            <div class="fui-cell-text desc label" style="color: <?php  echo $diypage['comment']['style']['subcolor'];?>;"><span style="color: <?php  echo $diypage['comment']['style']['maincolor'];?>;"><%percent%>%</span> 好评</div>
            <div class="fui-cell-remark"></div>
        </div>
        <%each list as comment%>
        <div class="fui-cell">
            <div class="fui-cell-text comment ">
                <div class="info">
                    <div class="star">
                        <span <%if comment.level>=1%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>>★</span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>>★</span>
                    </div>
                    <div class="date" style="color: <?php  echo $diypage['comment']['style']['subcolor'];?>;"><%comment.nickname%> <%comment.createtime%></div>
                </div>
                <div class="remark" style="color: <?php  echo $diypage['comment']['style']['textcolor'];?>;"><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img">
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" height="50" /></div>
                    <%/each%>
                </div>
                <%/if%>
            </div>
        </div>
        <%/each%>
    </div>
</script>
<?php  } ?>

<?php  } else { ?>

<div class='fui-content'>
    <div class='content-empty'>
        <i class='icon icon-searchlist'></i><br/> 商品已经下架，或者已经删除!<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'>到处逛逛</a>
    </div>
</div>
<?php  } ?>


<div id='cover'>
    <div class='fui-mask-m visible'></div>
    <div class='arrow'></div>
    <div class='content'>请点击右上角<br/>通过【发送给朋友】<br/>邀请好友购买</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH)) : (include template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH));?>

<script language="javascript">

    require(['biz/goods/detail'], function (modal) {
        modal.init({
            goodsid:"<?php  echo $goods['id'];?>",
            getComments : "<?php  echo $getComments;?>",
            seckillinfo: <?php  echo json_encode($seckillinfo)?>,
            attachurl_local:"<?php  echo $GLOBALS['_W']['attachurl_local'];?>",
            attachurl_remote:"<?php  echo $GLOBALS['_W']['attachurl_remote'];?>",
            coupons: <?php  echo json_encode($coupons)?>
        });
    });

    require(['../addons/ewei_shopv2/plugin/diypage/static/js/mobile.js'], function(diypagemodal){
        diypagemodal.init();
    });
</script>
</div>

<div id="alert-picker">
    <script type="text/javascript" src="../addons/ewei_shopv2/static/js/dist/jquery/jquery.qrcode.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".alert-qrcode-i").html('')
            $(".alert-qrcode-i").qrcode({
                typeNumber: 0,      //计算模式
                correctLevel: 0,//纠错等级
                text:"<?php  echo $_W['siteroot'].'app/'.mobileUrl('goods/detail', array('id'=>$goods['id']))?>"/*<?php  echo $_W['siteroot'].'app/'.mobileUrl('goods/detail', array('id'=>$goods['id']))?>*/
            });
        });
    </script>
    <div id="alert-mask"></div>
    <?php  if($commission_data['codeShare'] == 1) { ?>
    <div class="alert-content">
        <div class="alert">
            <i class="alert-close alert-close1 icon icon-close"></i>
            <div class="fui-list alert-header">
                <div class="fui-list-media">
                    <img class="round" src="<?php  echo tomedia($_W['shopset']['shop']['logo'])?>">
                </div>
                <div class="fui-list-inner">
                    <?php  echo $_W['shopset']['shop']['name'];?>
                </div>
            </div>
            <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert-goods-img" alt="">
            <div class="fui-list alert-qrcode">
                <div class="fui-list-media">
                    <i class="alert-qrcode-i"></i>
                </div>
                <div class="fui-list-inner alert-content">
                    <h2 class="alert-title"><?php  echo $goods['title'];?></h2>
                    <span>&yen;<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>&yen;<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>&yen;<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="share-text1">截屏保存分享给您的朋友</div>
        </div>
    </div>
    <?php  } else { ?>
        <div class="alert-content">
        <div class="alert2">
            <div class="fui-list alert2-goods">
                <div class="fui-list-media">
                    <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert2-goods-img" alt="">
                </div>
                <div class="fui-list-inner">
                    <h2 class="alert2-title"><?php  echo $goods['title'];?></h2>
                    <span>&yen;<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>&yen;<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>&yen;<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="alert2-qrcode">
                <i class="alert-qrcode-i"></i>
            </div>
            <div class="share-text2">截屏保存分享给您的朋友</div>
            <a href="javascript:void(0);" class="alert-close2"><?php  echo $_W['shopset']['shop']['name'];?></a>
        </div>
        </div>
    <?php  } ?>
</div>
<style type="text/css">
    .share-text1{text-align: center;padding:0.5rem 0.5rem 0;font-size:0.6rem;color:#666;line-height: 1rem;}
    .share-text2{text-align: center;padding:0 0.5rem 0.5rem;font-size:0.6rem;color:#666;line-height: 1rem;}
</style>


<?php  if(!empty($diypage['diylayer'])) { ?>
        <?php  echo $this->diyLayer(false, false, $goods['merchid'])?>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>