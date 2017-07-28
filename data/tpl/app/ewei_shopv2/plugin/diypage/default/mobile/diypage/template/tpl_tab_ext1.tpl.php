<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($diyitem['params'])) { ?>
	<div class="fui-tab-ext1 " style="background:<?php  echo $diyitem['style']['background'];?>">
            <nav class="tab active" style="color: <?php  echo $diyitem['style']['activecolor'];?>; border-color: <?php  echo $diyitem['style']['activecolor'];?>;"><?php  echo $diyitem['params']['tab1'];?></nav>
            <nav class="tab" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['tab2'];?></nav>
            <nav class="tab" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['tab3'];?></nav>
            <nav class="tab" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['params']['tab4'];?></nav>
    </div>
<?php  } ?>