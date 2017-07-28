<?php defined('IN_IA') or exit('Access Denied');?>    <form action="" <?php if( ce('commission.level' ,$level) ) { ?>action="" method="post"<?php  } ?>  class="form-horizontal form-validate" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $level['id'];?>" />
		 <input type="hidden" name="r" value="commission.level.<?php  if(empty($level['id'])) { ?>add<?php  } else { ?>edit<?php  } ?>" />
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><?php  if(!empty($level['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>分销商等级</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label must">等级名称</label>
                    <div class="col-sm-9 col-xs-12">
						<?php if( ce('member.level' ,$level) ) { ?>
                        <input type="text" name="levelname" class="form-control" value="<?php  echo $level['levelname'];?>" data-rule-required='true'/>
						<?php  } else { ?>
						<div class='form-control-static'><?php  echo $level['levelname'];?></div>
						<?php  } ?> 
                    </div>
                </div>
                <?php  if($set['level']>=1) { ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">一级佣金比例</label>
                          <div class="col-sm-9 col-xs-12">
							<?php if( ce('member.level' ,$level) ) { ?>
                                                            <div class='input-group'>
                        <input type="text" name="commission1" class="form-control" value="<?php  echo $level['commission1'];?>" />
                            <div class='input-group-addon'>%</div>
                        </div>
						<?php  } else { ?>
						<div class='form-control-static'><?php  echo $level['commission1'];?>%</div>
						<?php  } ?> 
                    </div>
                </div>
                <?php  } ?>
                  <?php  if($set['level']>=2) { ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">二级佣金比例</label>
                         <div class="col-sm-9 col-xs-12">
                       <?php if( ce('member.level' ,$level) ) { ?>
                       <div class='input-group'>
                        <input type="text" name="commission2" class="form-control" value="<?php  echo $level['commission2'];?>" />
                        <div class='input-group-addon'>%</div>
                        </div>
						<?php  } else { ?>
						<div class='form-control-static'><?php  echo $level['commission2'];?>%</div>
						<?php  } ?> 
                    </div>
                </div>
                    <?php  } ?>
                  <?php  if($set['level']>=3) { ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">三级佣金比例</label>
                          <div class="col-sm-9 col-xs-12">
                      <?php if( ce('member.level' ,$level) ) { ?>
                          <div class='input-group'>
                        <input type="text" name="commission3" class="form-control" value="<?php  echo $level['commission3'];?>" />
                          <div class='input-group-addon'>%</div>
                        </div>
						<?php  } else { ?>
						<div class='form-control-static'><?php  echo $level['commission3'];?>%</div>
						<?php  } ?> 
                    </div>
                </div>
                    <?php  } ?>
					<?php  if($level['id']!='default') { ?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">升级条件</label>
                    <div class="col-sm-9 col-xs-12">
						    <?php if( ce('member.level' ,$level) ) { ?>
                        <div class='input-group'>
							<?php  if($leveltype==0) { ?>
									<span class='input-group-addon'>分销订单金额满</span>
									<input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
									<span class='input-group-addon'>元</span>
								 
							<?php  } ?>
							
							<?php  if($leveltype==1) { ?>
									<span class='input-group-addon'>一级分销订单金额满</span>
									<input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
									<span class='input-group-addon'>元</span>
							<?php  } ?>
							 
							
							<?php  if($leveltype==2) { ?>
									<span class='input-group-addon'>分销订单数量满</span>
									<input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
									<span class='input-group-addon'>个</span>
							<?php  } ?>
							
							<?php  if($leveltype==3) { ?>
									<span class='input-group-addon'>一级分销订单数量满</span>
									<input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
									<span class='input-group-addon'>个</span>
							<?php  } ?>
							
							<?php  if($leveltype==4) { ?>
									<span class='input-group-addon'>自购订单金额满</span>
									<input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
									<span class='input-group-addon'>元</span>
							<?php  } ?>
							
							<?php  if($leveltype==5) { ?>
									<span class='input-group-addon'>自购订单数量满</span>
									<input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
									<span class='input-group-addon'>个</span>
							<?php  } ?>
							<?php  if($leveltype==6) { ?>
									<span class='input-group-addon'>下级总人数满</span>
									<input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
									<span class='input-group-addon'>个（分销商+非分销商）</span>
							<?php  } ?>
							<?php  if($leveltype==7) { ?>
									<span class='input-group-addon'>一级下级人数满</span>
									<input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
									<span class='input-group-addon'>个（分销商+非分销商）</span>
							<?php  } ?>
							<?php  if($leveltype==8) { ?>
									<span class='input-group-addon'>团队总人数满</span>
									<input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
									<span class='input-group-addon'>个（分销商）</span>
							<?php  } ?>
							<?php  if($leveltype==9) { ?>
									<span class='input-group-addon'>一级团队人数满</span>
									<input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
									<span class='input-group-addon'>个（分销商）</span>
							<?php  } ?>
							 
							<?php  if($leveltype==10) { ?>
									<span class='input-group-addon'>已提现佣金总金额满</span>
									<input type="text" name="commissionmoney" class="form-control" value="<?php  echo $level['commissionmoney'];?>" />
									<span class='input-group-addon'>元</span>
							<?php  } ?>
							
							
                        </div>
                        <span class='help-block'>分销商升级条件，不填写默认为不自动升级</span>
						
						<?php  } else { ?>
						
						          <?php  if($leveltype==0) { ?>
									 分销订单金额满 <?php  echo $level['ordermoney'];?> 元
							<?php  } ?>
							
							<?php  if($leveltype==1) { ?>
							                      一级分销订单金额满 <?php  echo $level['ordermoney'];?> 元
							<?php  } ?>
							<?php  if($leveltype==2) { ?>
							                    分销订单数量满 <?php  echo $level['ordercount'];?> 个
							<?php  } ?>
							
							<?php  if($leveltype==3) { ?>
							                一级分销订单数量满 <?php  echo $level['ordercount'];?> 个
							<?php  } ?>
							
							<?php  if($leveltype==4) { ?>
							       自购订单金额满 <?php  echo $level['ordermoney'];?> 元
							 <?php  } ?>
							
							<?php  if($leveltype==5) { ?>
							                   自购订单数量满 <?php  echo $level['ordercount'];?> 个
							<?php  } ?>
							<?php  if($leveltype==6) { ?>
							 下级总人数满 <?php  echo $level['downcount'];?> 个（分销商+非分销商）
									 
							<?php  } ?>
							<?php  if($leveltype==7) { ?>
							一级下级人数满 <?php  echo $level['downcount'];?> 个（分销商+非分销商）
									 
							<?php  } ?>
							<?php  if($leveltype==8) { ?>
								团队总人数满 <?php  echo $level['downcount'];?> 个（分销商）
							<?php  } ?>
							<?php  if($leveltype==9) { ?>
							          一级团队人数满 <?php  echo $level['downcount'];?> 个（分销商）
							<?php  } ?>
							 
							<?php  if($leveltype==10) { ?>
							          已提现佣金总金额满 <?php  echo $level['commissionmoney'];?> 元
							<?php  } ?>
						
						<?php  } ?>
                    </div>
                </div>
					<?php  } ?>
                
               
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">提交</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
            </div>
        </div>
</form>
