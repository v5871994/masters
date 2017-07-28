<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
<style>
.thumbadimg{border:1px;}
.nav_1,.nav_2,.nav_3,.nav_4{display:none}
.thumbnail>img{width:120px;height:120px;}
    .context-menu-list {
        color: #000;
    }
    .btn-warning .fa-remove {
        margin-right: 0;
    }
	.nav_8{display:none}
	.tanchuad img,.adimgbox img{background: url(../attachment/images/global/nopic.jpg);
    background-size: 100% 100%;}
	.thumbnail .caption {
  padding: 20px;
  color: #333;
}
</style>
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="<?php echo MODULE_URL;?>/template/static/js/jquery.contextMenu.css" rel="stylesheet">
<link href="<?php echo MODULE_URL;?>/template/static/js/poster.css" rel="stylesheet">
  <div class="panel panel-heading"> 
<ul class="nav nav-pills navtab">
  <li role="presentation" data-tab="nav_0" class="active"><a href="javascript:;">会员设置</a></li>
  <li role="presentation" data-tab="nav_1"><a href="javascript:;">套餐设置</a></li>
  <li><a href="<?php  echo $this->createWebUrl('viporder');?>" onclick="window.location.href='<?php  echo $this->createWebUrl('viporder');?>'">会员订单</a></li>
</ul>
 </div>
 <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default nav_tab nav_0">
    <div class="panel-heading" role="tab" id="headingOne">
      <h5 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">基本参数</a>
      </h5>
    </div>
  
      <div class="panel-body">
        <input type="hidden" name="friendship_id" value="<?php  echo $friendship['id'];?>" />
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动标题</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" value="<?php  echo $friendship['title'];?>" class="span2" name="title">
            <div class="help-block">活动的标题</div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动简介</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="eventrule"><?php  echo $friendship['eventrule'];?></textarea>
            <div class="help-block">交友介绍简介</div>
          </div>
        </div>
		<div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动状态</label>
          <div class="col-sm-2">
             <label><input type="radio" value="1" name="status" <?php  if($friendship['status'] == 1 ) { ?>checked<?php  } ?>>正常</label>
			 <label><input type="radio" value="0" name="status" <?php  if($friendship['status'] == 0 ) { ?>checked<?php  } ?>>禁用</label>
          </div>
        </div>

		
      </div>

  </div>
 


    <div class="panel panel-default nav_tab   nav_1">
    <div class="panel-heading" role="tab" id="heading7">
      <h5 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">套餐设置</a>
      </h5>
    </div>
      <div class="panel-body">
	  <div class="row">
<?php  if(is_array($packata)) { foreach($packata as $item) { ?>
<div class="col-sm-3 col-md-3 gzclas">
  <div class="thumbnail"><img src="<?php  echo $item['packicon'];?>"  alt="点击上传图标">
    <input type="hidden" value="<?php  echo $item['packicon'];?>" name="packicon[]">
    <span class="help-block">点击上传套餐图标，80*80px</span>
    <div class="caption">
      <div class="form-group">
        <div class="input-group"><span class="input-group-addon">名称</span>
          <input type="text" placeholder="输入名称" value="<?php  echo $item['packname'];?>" class="form-control" name="packname[]">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group"><span class="input-group-addon">价格</span>
          <input type="text" placeholder="输入支付价格" value="<?php  echo $item['packprice'];?>" class="form-control" name="packprice[]">
		  <span class="input-group-addon">元</span>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group"><span class="input-group-addon">查看数量</span>
          <input type="text" placeholder="输入套餐可查看的数量" value="<?php  echo $item['packnum'];?>" class="form-control" name="packnum[]">
		  <span class="input-group-addon">个</span>
        </div>
      </div>
	       <div class="form-group">
        <div class="input-group"><span class="input-group-addon">有效</span>
          <input type="text" placeholder="输入有效期天数" value="<?php  echo $item['packtime'];?>" class="form-control" name="packtime[]">
		  <span class="input-group-addon">天</span>
        </div>
      </div>
	  
      <span class="help-block"></span>
      <button type="button" class="btn btn-danger btn_del">删除</button>
    </div>
  </div>
</div>
<?php  } } ?> <span id="gift_insert_flag" style="display: none"></span>
<div class="form-group">
  <div class="col-sm-9">
    <button id="btn_add_gift" type="button" class="btn btn-warning"> <span class="glyphicon glyphicon-plus"></span> 添加 </button>
  </div>
</div>

<script type="text/javascript">
require(['jquery', 'util'], function($, util){
					$(function(){
						// 对象绑定点击事件
						$('.thumbnail img').click(function(){
						    thimg=$(this);
							util.image('',function(data){
								thimg.attr("src",data['url']);
								thimg.next().val(data['url']);
							},'',{'width'  :80,'height' : 80,'thumb': true} );
						});
	
$('#btn_add_gift').bind('click', function(){
		var content = '', v = '';
	content += '<div class="col-sm-3 col-md-3 gzclas">';
  content += '<div class="thumbnail"><img src="../attachment/images/global/nopic.jpg"  alt="点击上传图标">';
    content += '<input type="hidden" value="" name="packicon[]">';
    content += '<span class="help-block">点击上传礼物图标，80*80px</span>';
    content += '<div class="caption">';
      content += '<div class="form-group">';
        content += '<div class="input-group"><span class="input-group-addon">名称</span>';
          content += '<input type="text" placeholder="输入套餐名称" value="" class="form-control" name="packname[]">';
       content += '</div>';
     content += '</div>';
      content += '<div class="form-group">';
       content += ' <div class="input-group"><span class="input-group-addon">价格</span>';
        content += '  <input type="text" placeholder="输入支付价格" value="" class="form-control" name="packprice[]">';
		content += '  <span class="input-group-addon">元</span>';
        content += '</div>';
     content += ' </div>';
     content += ' <div class="form-group">';
       content += ' <div class="input-group"><span class="input-group-addon">查看数量</span>';
        content += '  <input type="text" placeholder="输入套餐可查看的数量" value="" class="form-control" name="packnum[]">';
		content += '  <span class="input-group-addon">个</span>';
       content += ' </div>';
     content += ' </div>';
     content += ' <div class="form-group">';
       content += ' <div class="input-group"><span class="input-group-addon">有效</span>';
        content += '  <input type="text" placeholder="输入有效期天数" value="" class="form-control" name="packtime[]">';
		content += '  <span class="input-group-addon">天</span>';
       content += ' </div>';
     content += ' </div>';
      content += '<span class="help-block"></span>';
     content += ' <button type="button" class="btn btn-danger btn_del">删除</button>';
   content += ' </div>';
 content += ' </div>';
  content += '</div>';
		$('#gift_insert_flag').before(content);
		$('.btn_del').bind('click', function(){
			var obj = $(this).parent().parent().parent();
			obj.slideUp(300, function() {
				obj.remove();
			});
		});
		$('.thumbnail img').click(function(){
				thimg=$(this);
				util.image('',function(data){
					thimg.attr("src",data['url']);
					thimg.next().val(data['url']);
				},'',{'width'  :80,'height' : 80,'thumb': true});
		});
	});
//						
					});
				});
				
	function removeItem(obj) {
	    $(obj).parent().parent().remove();
	}
	

	
               </script>

</div>
	  
        
      </div>

  </div>
 

     	

 
 </div>
		<div class="form-group col-sm-12">
			<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>



<script type="text/javascript">  
$(document).ready(function(){
  $('.btn_clear_ad').click(function(){ 
	$("input[name='voteadimg']").val("");
	$(".tanchuad .thumbadimg img").attr("src","");
	$("input[name='voteadurl']").val("");
  });
    //Default Action  
    $(".nav_tab").hide(); //Hide all content  
    $(".navtab li:first").addClass("active").show(); //Activate first tab  
    $(".nav_tab:first").show(); //Show first tab content  
      
    //On Click Event  
    $(".navtab li").click(function() {  
        $(".navtab li").removeClass("active"); //Remove any "active" class  
        $(this).addClass("active"); //Add "active" class to selected tab  
        $(".nav_tab").hide(); //Hide all tab content  
        var activeTab = $(this).attr("data-tab"); //Find the rel attribute value to identify the active tab + content  
        $("."+activeTab).show(); //Fade in the active content  
        return false;  
    });  
  
});  	
  window.initReplyController = function($scope) {
    
  };
  window.validateReplyForm = function(form, $, _, util, $scope) {
    
    return true;
  };

  $('.del_box').bind('click', function(){
			var obj = $(this).parent();
			obj.remove();
			
   });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>