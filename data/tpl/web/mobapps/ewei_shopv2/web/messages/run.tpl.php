<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-heading">
    <h2>消息群发任务编辑 <small><?php  if(!empty($item)) { ?>群发模板 <?php  echo $item['title'];?><?php  } ?></small></h2>
</div>

<form class="form-horizontal form-validate" enctype="multipart/form-data">
<div class="alert alert-info">
    <p>根据选择的用户群体不同，发送时间会不相同，发送期间请耐心等待! </p>
    <p>模板消息群发有风险，请谨慎使用，大用户量建议使用公众平台推送!</p>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label must" >任务名称</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'><?php  echo $item['title'];?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送总条数</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'><?php  echo $item['sendnum'];?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送未发送条数</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static' id="remain"><?php  echo $remainnum;?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送成功条数</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static' id ='success' ><?php  echo $item['successnum'];?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送失败条数</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static' id ='fail' ><?php  echo $item['failnum'];?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送状态</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static' id="status"><?php  echo $status;?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label must" >发送进度</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static' id="jindu">
            <?php  echo $jindu;?>%
        </div>
    </div>
</div>

<?php if(cv('messages')) { ?>
<div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label" ></label>
    <div class="col-sm-9 col-xs-12">
        <div class="help-block">
            <input type="button"   value="开始" class="btn btn-primary"  <?php  if($item['status']!=0) { ?>onclick="send()"<?php  } else { ?>onclick="tip.msgbox.err('未生成发送列表!')"<?php  } ?> />
            <input type="button"  value="暂停" class="btn btn-primary"  <?php  if($item['status']!=0) { ?>onclick="pause()"<?php  } else { ?>onclick="tip.msgbox.err('未生成发送列表!')"<?php  } ?>/>
            <input type="button"  onclick='history.back()' style='margin-left:10px;' value="返回列表" class="btn btn-default" />

        </div>
    </div>
</div>
<?php  } ?>
</form>

<script>

    var id = <?php  echo $id;?>;
    var count = <?php  echo intval($item['sendnum'])?>;
    var failnum = <?php  echo intval($item['failnum'])?>;
    var successnum = <?php  echo intval($item['successnum'])?>;
    var remain = <?php  echo intval($remainnum)?>;
    var pagecount = <?php  echo intval($item['pagecount'])?>;
    var hasnext=1;
    var sendstatus =0; //0正常,1暂停
    var jindu =0; //0正常,1暂停

    function send(){
        sendstatus =0;
        $("#status").html('开始发送...');

        sendmessage();
    }

    function pause(){
        if(sendstatus >0)
        {
            return;
        }
        sendstatus=1;

        $("#status").html('暂停中');

    }

    function sendmessage(){
        var btn = $('input[type=button]');
        if(btn.attr('sending')=='1'){
            return;
        }

        if(sendstatus==1){
            return;
        }


        if(hasnext==0){
            return;
        }

        $.ajax({
            url: "<?php  echo webUrl('messages/fetch')?>",
            type:'post',
            data: {'id':id,'pagecount': pagecount},
            dataType:'json',
            success:function(result2){
                if(result2.status==0)
                {
                    tip.msgbox.err(result2.onmessag);
                    return;
                }

                successnum = successnum + result2.result.successnum;
                failnum = failnum + result2.result.failnum;
                remain = remain -  result2.result.count;

                jindu =  (count-remain)/count*100

                $("#jindu").html(jindu.toFixed(2)+'%');
                $("#success").html(successnum);
                $("#fail").html(failnum);
                $("#remain").html(remain);

                if(result2.result.hasnext==0)
                {
                    sendstatus=2;
                    $("#status").html('已完成');
                    return;
                }

                if(sendstatus==0)
                {
                    sendmessage();
                }else
                {
                    $("#status").html('已暂停');
                }
            }
        });
    }
</script>





<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
