<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  if(!empty($page)&&!empty($page['data']['page']['title'])) { ?><?php  echo $page['data']['page']['title'];?><?php  } else { ?><?php  echo $_W['shopset']['shop']['name'];?><?php  } ?>"; </script>
<link rel="stylesheet" href="../addons/ewei_shopv2/static/js/dist/swiper/swiper.min.css">
<link href="../addons/ewei_shopv2/plugin/diypage/static/css/foxui.diy.css?v=201612121750"rel="stylesheet"type="text/css"/>
<style type="text/css">
    <?php  if(is_h5app()&&is_ios()) { ?>
        .fui-header ~ .diy-fixedsearch {top: 3.2rem;}
    <?php  } ?>
</style>
<?php  if($page['type']==4) { ?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>


<!--cover-->
<style>


.cover_ch{width:100%;height:100%;z-index:200;display:none;position:fixed;background:rgba(0,0,0,0.4);transition:all 500ms ease; }
.cover_ch.open{width:80;height:100%;z-index:3000;position:fixed;display:block;background:rgba(100,100,100,0.7);
	transition:all 500ms ease; -webkit-transform: translateX(calc(100%));}


</style>
<div id='cover_ch' class="cover_ch " style="">
</div>

<div class='fui-page  fui-page-current <?php  if($page['type']==3) { ?>member-page<?php  } else if($page['type']==4) { ?>page-commission-index<?php  } ?>' style="top: 0; background-color: <?php  echo $page['data']['page']['background'];?>; ">
<?php  if(!empty($page['data']['page']['followbar'])) { ?>
    <?php  $this->followBar(true, $page['merch'])?>
<?php  } ?>
<?php  if(!is_weixin()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <?php  if($page['type']==1) { ?>
            <a href="<?php  echo mobileUrl()?>" class="external"><i class="icon icon-home"></i> </a>
            <?php  } ?>
        </div>
        <div class="title"><?php  if(!empty($page)&&!empty($page['data']['page']['title'])) { ?><?php  echo $page['data']['page']['title'];?><?php  } else { ?><?php  echo $_W['shopset']['shop']['name'];?><?php  } ?></div>
        <div class="fui-header-right"></div>
	</div>
<?php  } ?>


<?php  if(!empty($diyitem_search)) { ?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/template/tpl_fixedsearch', TEMPLATE_INCLUDEPATH)) : (include template('diypage/template/tpl_fixedsearch', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<?php  $yue=0;$jifen=0;?>

<div class="fui-content <?php  if($page['diymenu']>-1) { ?>navbar<?php  } ?>" id="container" style="background-color: <?php  echo $page['data']['page']['background'];?>; <?php  if($page['diymenu']>-1) { ?>padding-bottom: 0;<?php  } ?>">
    <?php  if(!empty($diyitems)) { ?>
	<?php  $ch_data='';?>
        <?php  if(is_array($diyitems)) { foreach($diyitems as $diyitemid => $diyitem) { ?>
			<?php  if($diyitem['id']=='sych') { ?><?php  $ch_data=$diyitem?><?php  } ?>
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH)) : (include template('diypage/template/tpl_'.$diyitem['id'], TEMPLATE_INCLUDEPATH));?>
        <?php  } } ?>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    <?php  } ?>
</div>

<?php  if($page['diymenu']>-1) { ?>
    <?php  $this->footerMenus($page['diymenu'])?>
<?php  } ?>

<?php  $diypage=true?>

<?php  if(!empty($page['data']['page']['diylayer'])) { ?>
    <?php  $this->diyLayer(false, false, $page['merch'])?>
<?php  } ?>
<?php  if(!empty($page['data']['page']['diygotop'])) { ?>
    <?php  $this->diyGotop(true, false, $page['merch'])?>
<?php  } ?>

<?php  if(!empty($page['data']['page']['danmu'])) { ?>
    <?php  $this->diyDanmu(true)?>
<?php  } ?>


<?php  if(!empty($startadv)) { ?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/startadv', TEMPLATE_INCLUDEPATH)) : (include template('diypage/startadv', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>


<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1"></script>
<script language="javascript">
    require(['../addons/ewei_shopv2/plugin/diypage/static/js/mobile.js'], function(modal){
        modal.init();
    });
</script>

</div>
<style>
.slid_ch_modal{height:100%;z-index:3000;position:fixed;top:0;background-color:white;display:block;padding-left:0.5rem;display:block;
	border-right:1px solid #A9A9A9;padding-right:1px;overflow-y:scroll;overflow-x:hide}
.slid_ch_modal nav{border-top:1px solid #dfdfdf;padding-left:0.5rem;width:96%;padding-top:0.5rem;padding-bottom:0.5rem}
.slid_ch_modal nav div{color:#454545 ;font-size:0.75rem;font-family:'华文细黑',Arial;height:2rem;line-height:2rem}

.ch_home{margin:1rem 0.5rem;background:url('../addons/ewei_shopv2/static/images/home1.png') no-repeat;background-size:1.3rem 1.3rem;height:1.3rem}
.ch_home i{font-size:1rem;display:inline-block;}
.ch_home span{padding-left:2.2rem;height:1.4rem;line-height:1.4rem;font-size:0.8rem;font-family:'华文细黑',Arial;}
</style>
<div id='slid_ch_modal' class='slid_ch_modal ' >
	<div class='ch_tag ch_home'><span onclick="javascript:location.href='<?php  echo mobileUrl()?>'">首页</span></div>
	<nav class='ch_nav_get'> 
		<?php  $ind_ch=0?>
		<?php  if(is_array($ch_data['data'])) { foreach($ch_data['data'] as $index => $ch) { ?>
		<?php  $ind_ch++;?>
			<?php  if($ind_ch>3) { ?>
			<div  onclick="javascript:location.href='<?php  echo $ch['linkurl'];?>'"><?php  echo $ch['text'];?></div>
			<?php  } ?>
		<?php  } } ?>
	</nav>
	<nav>
		
		<div onclick="javascript:location.href='<?php  echo mobileUrl('member')?>'">个人中心</div>
	</nav>
</div>
<script>
	var left_w=-($(window).width()-80);
	var m_w=($(window).width()-80);

	$(".slid_ch_modal").css({'left':left_w,'width':m_w});
	
	$('#slid_ch_modal nav div').click(function(){
		$(this).css('background','#D3D3D3');
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>