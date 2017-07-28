<?php defined('IN_IA') or exit('Access Denied');?><style type='text/css'>
    .diyform-container .short {border:1px solid red;}
</style>
<div class='fui-cell-group diyform-container'>
    <?php  $i=0;?>
    <?php  if(is_array($fields)) { foreach($fields as $k1 => $v1) { ?>
    <div class='fui-cell <?php  if($v1['tp_must'] == 1) { ?>must<?php  } ?>'
    data-must="<?php  echo $v1['tp_must'];?>"
    data-type="<?php  echo $v1['data_type'];?>"
    data-name="<?php  echo $v1['tp_name'];?>"
    data-name2="<?php  echo $v1['tp_name2'];?>"
    data-isdefault="<?php  echo $v1['tp_is_default'];?>"
    data-itemid="field_data<?php  echo $i?>"
    data-key="<?php  echo $k1;?>"
    >
    <div class='fui-cell-label' style="width: auto;padding-right: 15px;">
        <?php  echo $v1['tp_name']?>
        <?php  if($v1['data_type'] == 10) { ?>
        <br>
        <?php  echo $v1['tp_name2']?>
        <?php  } ?>
    </div>

    <div class='fui-cell-info'>

        <?php  if($v1['data_type'] == 0) { ?>

        <input type="text" class='fui-input' id='field_data<?php  echo $i?>' name='field_data<?php  echo $i?>' placeholder="<?php  if(!empty($v1['placeholder'])) { ?><?php  echo $v1['placeholder'];?><?php  } else { ?>请输入<?php  echo $v1['tp_name'];?><?php  } ?>"  value="<?php  echo $f_data[$k1]?>" />
        <?php  } else if($v1['data_type'] == 1) { ?>
        <textarea class="" id='field_data<?php  echo $i?>' name='field_data<?php  echo $i?>' placeholder="<?php  if(!empty($v1['placeholder'])) { ?><?php  echo $v1['placeholder'];?><?php  } else { ?>请输入<?php  echo $v1['tp_name'];?><?php  } ?>" ><?php  echo $f_data[$k1]?></textarea>

        <?php  } else if($v1['data_type'] == 2) { ?>
        <select id='field_data<?php  echo $i?>' name='field_data<?php  echo $i?>' >
            <option value=''>请选择<?php  echo $v1['tp_name'];?></option>
            <?php  if(is_array($v1['tp_text'])) { foreach($v1['tp_text'] as $k2 => $v2) { ?>
            <option value="<?php  echo $v2?>" <?php  if($f_data[$k1] == $v2) { ?>selected<?php  } ?>><?php  echo $v2?></option>
            <?php  } } ?>
        </select>

        <?php  } else if($v1['data_type'] == 3) { ?>
        <?php  if(is_array($v1['tp_text'])) { foreach($v1['tp_text'] as $k2 => $v2) { ?>
        <label class="checkbox-inline">
            <input type="checkbox" class='fui-checkbox fui-checkbox-success' name='field_data<?php  echo $i?>[]' <?php  if(is_array($f_data[$k1]) &&  in_array($v2, $f_data[$k1])) { ?>checked<?php  } ?> value="<?php  echo $v2?>"/> <?php  echo $v2?>
        </label>
        <?php  } } ?>

        <?php  } else if($v1['data_type'] == 5) { ?>
        <?php  $img_max=$v1['tp_max'];?>


        <ul class="fui-images fui-images-sm" id="field_data<?php  echo $i?>_images">
            <?php  if(!empty($f_data[$k1])) { ?>
            <?php  if(is_array($f_data[$k1])) { foreach($f_data[$k1] as $k2 => $v2) { ?>
            <input type="hidden" name="field_data<?php  echo $i?>[]" value="<?php  echo $v2;?>" />
            <li style="background-image:url(<?php  echo tomedia($v2)?>)" class="image image-sm" data-filename="<?php  echo $v2;?>"><span class="image-remove"><i class="icon icon-roundclose"></i></span></li>
            <?php  } } ?>
            <?php  } ?>

        </ul>
        <div class="fui-uploader fui-uploader-sm diyform-container-uploader" <?php  if(!empty($f_data[$k1])) { ?><?php  if($img_max == count($f_data[$k1])) { ?>style='display:none'<?php  } ?><?php  } ?>
        data-name="field_data<?php  echo $i?>[]"
        data-max="<?php  echo $img_max;?>"
        data-count="<?php  if(!empty($f_data[$k1])) { ?><?php  echo count($f_data[$k1])?><?php  } else { ?>0<?php  } ?>">
        <input type="file"name='imgFile<?php  echo $i?>' id='imgFile<?php  echo $i?>' <?php  if(!is_h5app() || (is_h5app() && is_ios())) { ?>multiple="" accept="image/*" <?php  } ?> >
    </div>




    <?php  } else if($v1['data_type'] == 6) { ?>
    <input type="text" class='fui-input' id='field_data<?php  echo $i?>' name='field_data<?php  echo $i?>' placeholder="请输入<?php  echo $v1['tp_name'];?>" maxlength="18" value="<?php  echo $f_data[$k1]?>" />

    <?php  } else if($v1['data_type'] == 7) { ?>
    <input type="text" class='fui-input datepicker' id="field_data<?php  echo $i?>" name='field_data<?php  echo $i?>' placeholder="请输入<?php  echo $v1['tp_name'];?>" value='<?php  if(!empty($f_data[$k1])) { ?><?php  echo $f_data[$k1]?><?php  } ?>' readonly/>

    <?php  } else if($v1['data_type'] == 8) { ?>

    <input type="text" class='fui-input datepicker'  id="field_data<?php  echo $i?>_0" name='field_data<?php  echo $i?>' placeholder="开始日期" value='<?php  if(!empty($f_data[$k1]['0'])) { ?><?php  echo $f_data[$k1]['0']?><?php  } ?>' style='width:40%;float:left;' readonly/>

    <input type="text" class='fui-input datepicker'  id="field_data<?php  echo $i?>_1" name='field_data<?php  echo $i?>' placeholder="结束日期" value='<?php  if(!empty($f_data[$k1]['1'])) { ?><?php  echo $f_data[$k1]['1']?><?php  } ?>' style='width:40%;float:left;margin-left:5px;' readonly/>

    <?php  } else if($v1['data_type'] == 9) { ?>
    <input type="text" class='fui-input citypicker' id="field_data<?php  echo $i?>" name='field_data<?php  echo $i?>' placeholder="请选择<?php  echo $v1['tp_name'];?>" value="" data-value="" data-area="<?php  echo intval($v1['tp_area'])?>" readonly/>

    <?php  } else if($v1['data_type'] == 10) { ?>
    <input type="text" class='fui-input' id='field_data<?php  echo $i?>' name='field_data<?php  echo $i?>' placeholder="请输入<?php  echo $v1['tp_name'];?>"  value="<?php  echo $f_data[$k1]['name1']?>" />
    <br/>
    <input type="text" class='fui-input' id='field_data<?php  echo $i?>_2' name='field_data<?php  echo $i?>_2' placeholder="请输入<?php  echo $v1['tp_name2'];?>"  value="<?php  echo $f_data[$k1]['name2']?>" />

    <?php  } else if($v1['data_type'] == 11) { ?>
    <input type="text" class='fui-input timepicker' id="field_data<?php  echo $i?>" name='field_data<?php  echo $i?>' placeholder="请选择<?php  echo $v1['tp_name'];?>"  readonly value='<?php  if(!empty($f_data[$k1])) { ?><?php  echo $f_data[$k1]?><?php  } ?>'/>

    <?php  } else if($v1['data_type'] == 12) { ?>
    <input type="text" class='fui-input timepicker'  id="field_data<?php  echo $i?>_0" name='field_data<?php  echo $i?>' placeholder="开始时间" value='<?php  if(!empty($f_data[$k1]['0'])) { ?><?php  echo $f_data[$k1]['0']?><?php  } ?>' style='width:40%;float:left;' readonly/>

    <input type="text" class='fui-input timepicker'  id="field_data<?php  echo $i?>_1" name='field_data<?php  echo $i?>' placeholder="结束时间" value='<?php  if(!empty($f_data[$k1]['1'])) { ?><?php  echo $f_data[$k1]['1']?><?php  } ?>' style='width:40%;float:left;margin-left:5px;' readonly/>

    <?php  } ?>

</div>
</div>


<?php  $i++;?>
<?php  } } ?>
<script language='javascript'>
    var new_area = <?php  echo intval($new_area)?>;
    var address_street = <?php  echo intval($address_street)?>;
    var showArea = false;

    var reqParams = ['foxui','foxui.picker'];
    if(new_area){
        reqParams = ['foxui','foxui.picker','foxui.citydatanew'];
    }

    if ($('.citypicker').attr('data-area') == 1) {
        showArea = true;
    }

    require(reqParams,function(){
        $('.diyform-container .datepicker').datePicker();
        $('.diyform-container .timepicker').timePicker();


        $('.diyform-container .citypicker').cityPicker({
            new_area: new_area,
            address_street: address_street,
            showArea:showArea,
            onShow:function(){

                <?php  if($inPicker) { ?>
                $('.option-picker').css('z-index',999);
                $('.fui-mask').unbind('click').click(function(){
                    $('.diyform-container .datepicker').cityPicker('close');
                });
                <?php  } ?>
            }
            ,onClose:function(){
                <?php  if($inPicker) { ?>
                $('.option-picker').css('z-index',1001);
                $('.fui-mask').unbind('click').click(function(){
                    FoxUI.mask.hide();
                    $('.option-picker').removeClass('in');
                });
                <?php  } ?>
            }
        });
        $('.diyform-container .diyform-container-uploader').uploader({
            uploadUrl: "<?php  echo mobileUrl('util/uploader')?>",
            removeUrl:"<?php  echo mobileUrl('util/uploader/remove')?>"
        });
    })
</script>
</div>
