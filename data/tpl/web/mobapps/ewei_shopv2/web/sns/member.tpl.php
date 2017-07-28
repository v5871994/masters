<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> 
    <h2>会员管理</h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="sns.member" />
    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">

            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>
                <?php if(cv('sns.member.edit')) { ?>
	                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/member/setblack',array('isblack'=>0))?>"><i class='fa fa-circle'></i> 取消黑名单</button>
	                <button class="btn btn-default btn-sm" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('sns/member/setblack',array('isblack'=>1))?>"><i class='fa fa-circle-o'></i> 设置黑名单</button>
                <?php  } ?>

                <?php if(cv('sns.member.delete')) { ?>
                <button class="btn btn-default btn-sm" type="button" data-toggle='batch' data-href="<?php  echo webUrl('sns/member/delete')?>"><i class='fa fa-remove'></i> 删除</button>
                <?php  } ?>
              
            </div>
        </div>	


        <div class="col-sm-7 pull-right">
            <select name="level" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['level'] == '') { ?> selected<?php  } ?>>等级</option>
                <option value="" <?php  if($_GPC['level'] == '0') { ?> selected<?php  } ?>><?php echo empty($this->set['levelname'])?'社区粉丝':$this->set['levelname']?></option>
                <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                <option value="<?php  echo $level['id'];?>" <?php  if($_GPC['level']== $level['id']) { ?> selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                <?php  } } ?>
            </select>
            <select name="isblack" class='form-control input-sm select-sm'>
                <option value="" <?php  if($_GPC['isblack'] == '') { ?> selected<?php  } ?>>状态</option>
                <option value="1" <?php  if($_GPC['isblack']== '1') { ?> selected<?php  } ?>>黑名单</option>
                <option value="0" <?php  if($_GPC['isblack'] == '0') { ?> selected<?php  } ?>>正常</option>
            </select>	
            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">
                    		
                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>

        </div>
    </div>
</form>

<form action="" method="post">
    <?php  if(count($list)>0) { ?>

    <table class="table table-responsive table-hover" >
        <thead class="navbar-inner">
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th style="width:100px;">粉丝</th>
                <th style="width:120px;">会员信息</th>
                <th style="width:100px;">等级</th>
                <th style="width:100px;">注册时间</th>
                <th style="width:100px;">社区信息</th>
                <th style="width:100px;">关注/黑名单</th>
                <th style="width:70px;">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr rel="pop" data-title="ID: <?php  echo $row['id'];?> " data-content="推荐人 <br/>
                <?php  if(empty($row['agentid'])) { ?>
				  <?php  if($row['isagent']==1) { ?>
				      <label class='label label-primary'>总店</label>
				      <?php  } else { ?>
				       <label class='label label-default'>暂无</label>
				      <?php  } ?>
				<?php  } else { ?>

                    	<?php  if(!empty($row['agentavatar'])) { ?>
                         <img src='<?php  echo $row['agentavatar'];?>' style='width:20px;height:20px;padding1px;border:1px solid #ccc' />
                       <?php  } ?>
                       [<?php  echo $row['agentid'];?>]<?php  if(empty($row['agentnickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['agentnickname'];?><?php  } ?>
					   <?php  } ?>">


            <td style="position: relative; ">

                <input type='checkbox'   value="<?php  echo $row['sns_id'];?>"/></td>
            <td  >
                <div  >
                    <?php  if(!empty($row['avatar'])) { ?>
                    <img src='<?php  echo $row['avatar'];?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                    <?php  } ?>
                    <?php  if(empty($row['nickname'])) { ?>未更新<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?>
                </div>
            </td>
            <td><?php  echo $row['realname'];?><br/><?php  echo $row['mobile'];?></td>

            <td><span class="label label-default" style="background:<?php  echo $row['level']['bg'];?>;color:<?php  echo $row['level']['color'];?>"><?php  echo $row['level']['levelname'];?></span></td>
            <td><?php  echo date("Y-m-d",$row['createtime'])?><br/><?php  echo date("H:i:s",$row['createtime'])?></td>
            <td>
            <label class="label label-warning">积分: <?php  echo intval($row['sns_credit'])?></label><br/>
                <label class="label label-success">话题: <?php  echo intval($row['sns_postcount'])?></label><br/>
                <label class="label label-primary">评论: <?php  echo intval($row['sns_replycount'])?></label>
            </td>
            <td>

                <?php  if(empty($row['followed'])) { ?>
                <?php  if(empty($row['uid'])) { ?>
                <label class='label label-default'>未关注</label>
                <?php  } else { ?>
                <label class='label label-warning'>取消关注<?php  echo $row['fanid'];?></label>
                <?php  } ?>
                <?php  } else { ?>
                <label class='label label-success'>已关注</label>
                <?php  } ?>

                <br/><label class='label <?php  if($row['isblack']==1) { ?>label-error<?php  } else { ?>label-primary<?php  } ?>'
                <?php if(cv('sns.member.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $row['isblack'];?>'
                data-switch-value0='0|正常|label label-primary|<?php  echo webUrl('sns/member/setblack',array('isblack'=>1,'id'=>$row['sns_id']))?>'
                data-switch-value1='1|黑名单|label label-error|<?php  echo webUrl('sns/member/setblack',array('isblack'=>0,'id'=>$row['sns_id']))?>'
                <?php  } ?>
                >
                <?php  if($row['isblack']==1) { ?>黑名单<?php  } else { ?>正常<?php  } ?></label>

            </td>


            <td  style="overflow:visible;">

                <div class="btn-group btn-group-sm" >
                    <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">操作 <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left" role="menu" style='z-index: 9999'>

                        <?php if(cv('member.list.detail')) { ?>
                        <li><a href="<?php  echo webUrl('member/list/detail',array('id' => $row['id']));?>" title="会员详情" target="_blank"><i class='fa fa-edit'></i> 会员详情</a></li>
                        <?php  } ?>

                        <?php if(cv('sns.posts')) { ?>
                        <li><a href="<?php  echo webUrl('sns/posts',array('uid' => $row['id']));?>" title="查看话题"><i class='fa fa-comment'></i> 查看话题</a></li>
                        <?php  } ?>
                        <?php if(cv('sns.member.delete')) { ?><li><a  data-toggle='ajaxRemove'  href="<?php  echo webUrl('sns/member/delete',array('id' => $row['sns_id']));?>" title='删除会员' data-confirm="此会员话题及评论会全部删除，确定要删除该会员吗？"><i class='fa fa-remove'></i> 删除会员</a></li><?php  } ?>
                    </ul>
                </div>


            </td>
        </tr>
        <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>


    <script language="javascript">
        <?php  if($opencommission) { ?>
        require(['bootstrap'],function(){
            $("[rel=pop]").popover({
                trigger:'manual',
                placement : 'left',
                title : $(this).data('title'),
                html: 'true',
                content : $(this).data('content'),
                animation: false
            }).on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(this).siblings(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide")
                    }
                }, 100);
            });


        });
        <?php  } ?>

    </script>

        <?php  } else { ?>
        <div class='panel panel-default'>
            <div class='panel-body' style='text-align: center;padding:30px;'>
                暂时没有任何会员!
            </div>
        </div>
        <?php  } ?>

    </form>


    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>