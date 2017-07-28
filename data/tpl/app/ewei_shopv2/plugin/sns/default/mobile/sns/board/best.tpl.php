<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/sns/template/mobile/default/images/common.css"/>
<style type="text/css">
    .sns-content-info{max-height:4rem;line-height: 1rem;overflow: hidden;}
    .sns-card-show{padding:0 0.5rem 0.5rem;height:1.5rem;display: block;font-style: normal;color:#0290be;font-size:0.7rem;}
</style>
<div class='fui-page fui-page-current  fui-page-current sns-board-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">精华区</div>
        <div class="fui-header-right btn-edit">&nbsp;</div>
    </div>
    <div class="fui-content navbar">



        <div class="container"></div>
        <div class="empty" style="display:none;"><i class="icon icon-creditlevel" style="font-size:4rem;color:#ccc;"></i> <br/>暂时没有任何精华</div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
    </div>


    <script language='javascript'>
        require(['../addons/ewei_shopv2/plugin/sns/static/js/board_best.js'], function (modal) {
            modal.init({ bid: <?php  echo $board['id'];?>});
        });
    </script>

</div>



</div>
<!--投诉start-->
<div id="sns-board-complain-page" class='fui-page sns-board-reply-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back">取消</a>
        </div>
        <div class="title">投诉</div>
        <div class="fui-header-right"></div>
    </div>
    <div class="fui-content navbar">
        <div class="fui-cell-group" style="margin-top:0;">
            <div class="complain-title">
                我要投诉的是<span id="post_member"></span>的<span class="complain-type-span"></span>
            </div>
            <input type="hidden" id="complain_type" name="complain_type" value="">
            <div class="complain-type">
                <p>请您选择投诉类别：</p>
                <?php  if(is_array($catelist)) { foreach($catelist as $item) { ?>
                <span class="fui-lg-1 fui-md-2 fui-sm-3 fui-xs-4"><a href="javascript:void(0);" data-type="<?php  echo $item['id'];?>"><?php  echo $item['name'];?></a></span>
                <?php  } } ?>
                <span class="fui-lg-1 fui-md-2 fui-sm-3 fui-xs-4"><a href="javascript:void(0);" data-type="-1">其他</a></span>
                <div style="clear:both;"></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-info">
                    <textarea placeholder="内容 10-500个字" rows="8" id="complain_text"></textarea>
                </div>
            </div>
            <div class="fui-cell reply-func-cell">
                <div class="fui-cell-info post-func">
                    <i class="icon icon-pic" id="complain-pic"></i>
                </div>
            </div>

            <?php  if(empty($board['noimage'])) { ?>
            <div class='fui-cell complain-image'>
                <div class='fui-cell-info'>
                    <ul class="fui-images fui-images-md"></ul>
                    <div class="fui-uploader fui-uploader-md"
                         data-max="<?php  if($set['imagesnum']==0) { ?>5<?php  } else if($set['imagesnum'] > 0) { ?><?php  echo $set['imagesnum'];?><?php  } ?>"
                         data-count="0">
                        <input type="file" name='complainimg[]' id='complainimg<?php  echo $g['id'];?>' multiple="" accept="image/*" >
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
        <a href="javascript:void(0);" class="btn btn-sns-submit" id="btnCompSend">提交</a>
    </div>
</div>
<!--投诉end-->

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sns/board/board_item', TEMPLATE_INCLUDEPATH)) : (include template('sns/board/board_item', TEMPLATE_INCLUDEPATH));?>


<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
