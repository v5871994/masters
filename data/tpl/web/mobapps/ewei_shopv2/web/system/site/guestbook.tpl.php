<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='page-heading'><h2>留言内容  <?php if(cv('system.site.guestbook.edit')) { ?><small>拖动可以排序</small><?php  } ?></h2></div>

    <table class="table  table-responsive">
        <thead class="navbar-inner">
        <tr>
            <th style="width:60px;">ID</th>
            <th  style="width:100px;">昵称</th>
            <th style="width:80px;">标题</th>
            <th style="width:300px;">留言内容</th>
            <th>时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id='tbody-items'>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
            <td>
                <?php  echo $row['id'];?>
                <input type="hidden" name="catid[]" value="<?php  echo $row['id'];?>" >
            </td>

            <td>
                <?php  echo $row['nickname'];?>
            </td>
            <td>
                <?php  echo $row['title'];?>
            </td>
            <td>
                <?php  echo $row['content'];?>
            </td>
            <td>
                <?php  echo date('Y-m-d',$row['createtime'])?>
            </td>
            <td>
                <?php if(cv('system.site.guestbook.delete')) { ?>
                <a href="<?php  echo webUrl('system/site/guestbook/delete', array('id' => $row['id']))?>" data-toggle='ajaxRemove' class="btn btn-default btn-sm" data-confirm="确认删除此留言?"><i class="fa fa-trash"></i> 删除</a><?php  } ?>
                <a href="<?php  echo webUrl('system/site/guestbook/view', array('id' => $row['id']))?>" data-toggle='ajaxModal' class="btn btn-success btn-sm"><i class="fa fa-align-justify"></i> 查看</a>
            </td>

        </tr>
        <?php  } } ?>
        </tbody>

    </table>
    <?php  echo $pager;?>
<script>

    function addguestbook(){
        var html ='<tr>';
        html+='<td><i class="fa fa-plus"></i></td>';
        html+='<td>';
        html+='<input type="hidden" class="form-control" name="catid[]" value=""><input type="text" class="form-control" name="catname[]" value="">';
        html+='</td>';
        html+='<td>';
        html+='</td>';

        html+='<td></td></tr>';;
        $('#tbody-items').append(html);
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>