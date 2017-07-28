<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
	<label class="col-sm-2 control-label must">方式</label>
	<div class="col-sm-9 col-xs-12">
		<label class="radio-inline"><input type="radio" class="product_advs_type" name="product_advs_type" value="0"  <?php  if($article['product_advs_type']==0) { ?>checked="true"<?php  } ?>> 关闭</label>
		<label  class="radio-inline"><input type="radio" class="product_advs_type" name="product_advs_type" value="1" <?php  if($article['product_advs_type']==1) { ?>checked="true"<?php  } ?>> 只显示第一张</label>
		<label  class="radio-inline"><input type="radio" class="product_advs_type" name="product_advs_type" value="2" <?php  if($article['product_advs_type']==2) { ?>checked="true"<?php  } ?>> 随机显示</label>
		<label  class="radio-inline"><input type="radio" class="product_advs_type" name="product_advs_type" value="3" <?php  if($article['product_advs_type']==3) { ?>checked="true"<?php  } ?>> 轮播显示</label>
	</div>
</div>

<div class="fart-product product" <?php  if($article[ 'product_advs_type']!=0) { ?>style="display:block;" <?php  } ?>>
	<div class="form-group">
		<label class="col-sm-2 control-label">标题</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="product_advs_title" class="form-control" value="<?php  echo $article['product_advs_title'];?>" bind-in="product_adv_title" bind-de="精品推荐" />
			<span class="help-block">不填写, 不显示标题</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">底部文字</label>
		<div class="col-sm-9 col-xs-12">
			<input type="text" name="product_advs_more" class="form-control" value="<?php  echo $article['product_advs_more'];?>" bind-in="product_adv_more" bind-de="更多精彩">
			<span class="help-block">不填写, 不显示底部标题</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label must">底部链接</label>
		<div class="col-sm-9 col-xs-12">
			<div class="input-group form-group" style="margin: 0;">
				<input type="text" id="product_advs_link" placeholder="" name="product_advs_link" class="form-control" value="<?php  echo $article['product_advs_link'];?>">
				<span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#product_advs_link">选择链接</span>
			</div>
		</div>
	</div>
	
	<div class="advs">
		<div id="advs">
			<?php  if(!empty($aid) && !empty($advs)) { ?>
				<?php  if(is_array($advs)) { foreach($advs as $i=>$adv) { ?>
					<div class="adv">
						<div class="del" onclick="$(this).parent().remove()">×</div>
						<div class="img"><img src="<?php  if(empty($adv['img'])) { ?>../addons/ewei_shopv2/plugin/article/static/css/nochooseimg.jpg<?php  } else { ?><?php  echo $adv['img'];?><?php  } ?>" data-id="PAI-<?php  echo time()+$i+1?>" /></div>
						<div class="info">
							<div class="input-group form-group" style="margin-top:5px; margin-bottom:0px; margin-right:5px;">
								<input type="text" class="form-control" name='adv_img[]' placeholder="推广广告图，可直接输入或者选择系统图片 (请以http://开头)" value="<?php  echo $adv['img'];?>" data-id="PAI-<?php  echo time()+$i+1?>">
									<span class="input-group-addon btn btn-default nav-imgc" data-id="PAI-<?php  echo time()+$i+1?>">选择图片</span>
							</div>
							<div class="input-group form-group" style="margin-top:10px; margin-bottom:0px; margin-right:5px;">
								<input type="text" class="form-control" name='adv_link[]' placeholder="推广广告链接，可直接输入或者选择系统链接 (请以http://开头，单规格商品可直接下单)" value="<?php  echo $adv['link'];?>" id="PAL-<?php  echo time()+$i+1?>" >
									<span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#PAL-<?php  echo time()+$i+1?>">选择链接</span>
							</div>
						</div>
					</div>
				<?php  } } ?>
			<?php  } ?>
		</div>
		<div class="addbtn"><i class="fa fa-plus"></i> 添加一个</div>
	</div>
</div>
<script language='javascript'>
    $(function(){
        
         // 监听按钮是否显示商品
        $(".product_advs_type").change(function(){
 
            check = $(".product_advs_type:checked").val();
            if(check!=0){
                $(".product").show();
            }else{
                $(".product").hide();
            }
        });
        
        $(".addbtn").click(function(){
        var id = new Date().getTime();
        var num = 0;
        $("#advs .adv").each(function(){
            num++;
        });
        if(num<5){
            var html = '<div class="adv">';
                  html+='<div class="del" onclick="$(this).parent().remove()">×</div>';
                  html+='<div class="img"><img src="../addons/ewei_shopv2/plugin/article/static/css/nochooseimg.jpg" data-id="PAI-'+id+'" /></div>';
                  html+='<div class="info">';
                  html+='<div class="input-group form-group" style="margin-top:5px; margin-bottom:0px; margin-right:5px;">';
                  html+='<input type="text" class="form-control" name="adv_img[]" placeholder="推广广告图，可直接输入或者选择系统图片 (请以http://开头)" data-id="PAI-'+id+'">';
                  html+='<span class="input-group-addon btn btn-default nav-imgc" style="background: #fff;" data-id="PAI-'+id+'">选择图片</span>';
                  html+='</div>';
                  html+='<div class="input-group form-group" style="margin-top:10px; margin-bottom:0px; margin-right:5px;">';
                  html+='<input type="text" class="form-control" name="adv_link[]" placeholder="推广广告链接，可直接输入或者选择系统链接 (请以http://开头，单规格商品可直接下单)" id="PAL-'+id+'" >';
                  html+='<span class="input-group-addon btn btn-default" data-toggle="selectUrl" data-input="#PAL-'+id+'">选择链接</span>'
                  html+='</div></div></div>';
                  $("#advs").append(html);
          }else{
              tip.msgbox.err("最多添加5张广告图! ");
          }
    });
    
    $(document).on("click",".nav-imgc",function(){
        var id = $(this).data("id");
        require(['jquery', 'util'], function($, util){
                    util.image('',function(data){
                        $("input[data-id="+id+"]").val(data.url);
                        $("img[data-id="+id+"]").attr("src",data.url);
                    });
        });
    });
    $(document).on("click",".nav-link",function(){
        var id = $(this).data("id");
        if(id){
            $("#modal-mylink").attr({"data-id":id});
            $("#modal-mylink").modal();
        }
    });
    
    })
</script>