<?php defined('IN_IA') or exit('Access Denied');?><?php  if(empty($diyitem['params']['style']) || $diyitem['params']['style']=='default1') { ?>

<?php  $yue=$diyitem['info']['money']; $jifen=$diyitem['info']['credit']; ?>
    <div class="headinfo" style="height:8rem;background: <?php  if(!empty($diyitem['params']['backurl'])) { ?>url(<?php  echo tomedia($diyitem['params']['backurl'])?>) no-repeat;
	background-size:100% 100%<?php  } else { ?><?php  echo $diyitem['style']['background'];?><?php  } ?>; <?php  if(!empty($diyitem['style']['background'])) { ?>border: none;<?php  } ?>">
        <?php  if(!empty($diyitem['params']['seticon'])) { ?>
            <a class="setbtn" style="color: <?php  echo $diyitem['style']['textcolor'];?>;" href="<?php  echo $diyitem['params']['setlink'];?>" data-nocache="true"><i class="icon <?php  echo $diyitem['params']['seticon'];?>"></i></a>
        <?php  } ?>
       <div class="child">
         <!--   <div class="title" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['info']['textmoney'];?></div>
            <div class="num" style="color: <?php  echo $diyitem['style']['textlight'];?>;"><?php  echo $diyitem['info']['money'];?></div>
            <?php  if(!empty($diyitem['params']['leftnav'])) { ?>
                <a class="btn" style="color: <?php  echo $diyitem['style']['textcolor'];?>; border-color: <?php  echo $diyitem['style']['textcolor'];?>;" href="<?php  echo $diyitem['params']['leftnavlink'];?>" data-nocache="true"><?php  echo $diyitem['params']['leftnav'];?></a>
            <?php  } ?>-->
        </div>
        <div class="child userinfo" style="color: <?php  echo $diyitem['style']['textcolor'];?>;">
            <a href="<?php  echo mobileUrl('member/info/face')?>" data-nocache="true" style="color: <?php  echo $diyitem['style']['textcolor'];?>;">
                <div class="face <?php  echo $diyitem['style']['headstyle'];?>" 
				style="height:3.8rem;width:3.8rem;border-radius:3.8rem;background:url(<?php  echo $diyitem['info']['avatar'];?>) no-repeat;background-size:3.5rem 3.5rem;border:1px solid #fff;">
					<!--<img src="<?php  echo $diyitem['info']['avatar'];?>" style="height:3rem;width:3rem;border-radius:3rem;">-->
				</div>
                <div class="name" style="font-size:0.7rem"><?php  echo $diyitem['info']['nickname'];?></div>
            </a>
            <?php  if(!empty($diyitem['params']['levellink'])) { ?>
                <a class="level" style="font-size:0.7rem" href="<?php  echo $diyitem['params']['levellink'];?>">[<?php  echo $diyitem['info']['levelname'];?>] <i class="icon icon-question1" style="font-size: 0.6rem;"></i></a>
            <?php  } else { ?>
                <div class="level" style="font-size:0.7rem">[<?php  echo $diyitem['info']['levelname'];?>]</div>
            <?php  } ?>
        </div>
        <div class="child">
          <!--  <div class="title" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $diyitem['info']['textcredit'];?></div>
            <div class="num" style="color: <?php  echo $diyitem['style']['textlight'];?>;"><?php  echo $diyitem['info']['credit'];?></div>
            <?php  if(!empty($diyitem['params']['rightnav'])) { ?>
            <a class="btn" style="color: <?php  echo $diyitem['style']['textcolor'];?>; border-color: <?php  echo $diyitem['style']['textcolor'];?>;" href="<?php  echo $diyitem['params']['rightnavlink'];?>" data-nocache="true"><?php  echo $diyitem['params']['rightnav'];?></a>
            <?php  } ?>-->
        </div>
    </div>
<?php  } else if($diyitem['params']['style']=='default2') { ?>
    <div class="headinfo style-2" style="background: <?php  echo $diyitem['style']['background'];?>; <?php  if(!empty($diyitem['style']['background'])) { ?>border: none;<?php  } ?>">
        <?php  if(!empty($diyitem['params']['seticon'])) { ?>
        <a class="setbtn" style="color: <?php  echo $diyitem['style']['textcolor'];?>;" href="<?php  echo $diyitem['params']['setlink'];?>" data-nocache="true"><i class="icon <?php  echo $diyitem['params']['seticon'];?>"></i></a>
        <?php  } ?>
        <div class="face <?php  echo $diyitem['style']['headstyle'];?>"><img src="<?php  echo $diyitem['info']['avatar'];?>"></div>
        <div class="inner" style="color: <?php  echo $diyitem['style']['textcolor'];?>;">
            <div class="name"><?php  echo $diyitem['info']['nickname'];?></div>
            <?php  if(!empty($diyitem['params']['levellink'])) { ?>
            <a class="level" href="<?php  echo $diyitem['params']['levellink'];?>" style="color: <?php  echo $diyitem['style']['textcolor'];?>;">[<?php  echo $diyitem['info']['levelname'];?>] <i class="icon icon-question1" style="font-size: 0.6rem;"></i></a>
            <?php  } else { ?>
            <div class="level">[<?php  echo $diyitem['info']['levelname'];?>]</div>
            <?php  } ?>
            <div class="credit"><?php  echo $diyitem['info']['textmoney'];?>: <span style="color: <?php  echo $diyitem['style']['textlight'];?>;"><?php  echo $diyitem['info']['money'];?></span></div>
            <div class="credit"><?php  echo $diyitem['info']['textcredit'];?>: <span style="color: <?php  echo $diyitem['style']['textlight'];?>;"><?php  echo $diyitem['info']['credit'];?></span></div>
        </div>
    </div>
<?php  } ?>
