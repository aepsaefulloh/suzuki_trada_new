
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>Dashboard</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
                        
                        
						<table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">Rendering engine</th>
                                    <th class="head0">Statistik</th>
                                    <th class="head1">Total</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Message</td>
                                    <td>
									<?php
									$vM['CUSTOM']='STATUS <> 99';
									$rm=countRecord('tbl_contact',$vM);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Booking</td>
                                    <td><?php
									$vM['CUSTOM']='STATUS <> 99';
									$rm=countRecord('tbl_booking',$vM);									
									echo $rm['RESULT'][0]['TOTAL'];
									?></td>
                                    
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Test Drive</td>
                                    <td>
									<?php
									$vM['CUSTOM']='STATUS <> 99';
									$rm=countRecord('tbl_testdrive',$vM);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
								<tr>
                                    <td>Trident</td>
                                    <td>Berita</td>
                                    <td>
									<?php
									$vB['CUSTOM']='STATUS <> 99';
									$vB['CATEGORY']='2';
									$rm=countRecord('tbl_content',$vB);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
								<tr>
                                    <td>Trident</td>
                                    <td>CSR</td>
                                    <td>
									<?php
									$vC['CUSTOM']='STATUS <> 99';
									$vC['CATEGORY']='6';
									$rm=countRecord('tbl_content',$vC);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
								<tr>
                                    <td>Trident</td>
                                    <td>Promo</td>
                                    <td>
									<?php
									$vC['CUSTOM']='STATUS <> 99';
									$vC['CATEGORY']='7';
									$rm=countRecord('tbl_content',$vC);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
								<tr>
                                    <td>Trident</td>
                                    <td>Data Lead</td>
                                    <td>
									<?php
									$vM['CUSTOM']='STATUS <> 99';
									$rm=countRecord('tbl_lead',$vM);									
									echo $rm['RESULT'][0]['TOTAL'];
									?>
									</td>
                                   
                                </tr>
                            </tbody>
                        </table>
						
						<br>
						<h4 class='subtitle'>TOP 5 Product</h4>
						<table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">Rendering engine</th>
                                    <th class="head0">Product</th>
                                    <th class="head1">View</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$vP['LIMIT']=5;
							$vP['ORDER']='HIT DESC';
							$listPr=getRecord('tbl_product',$vP);
							foreach($listPr['RESULT'] as $list){
							?>
                                <tr>
                                    <td>Trident</td>
                                    <td><?php echo $list['PRODUCT']?></td>
                                    <td><?php echo $list['HIT']?></td>
                                   
                                </tr>
							<?php } ?>	
                            </tbody>
                        </table>
						
						<br>
						<h4 class='subtitle'>TOP 5 Content</h4>
						<table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">Rendering engine</th>
                                    <th class="head0">Content</th>
                                    <th class="head1">View</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$vP['LIMIT']=5;
							$vP['ORDER']='HIT DESC';
							$listPr=getRecord('tbl_content',$vP);
							foreach($listPr['RESULT'] as $list){
							?>
                                <tr>
                                    <td>Trident</td>
                                    <td><?php echo $list['TITLE']?></td>
                                    <td><?php echo $list['HIT']?></td>
                                   
                                </tr>
							<?php } ?>	
                            </tbody>
                        </table>
                        <!--ul class="shortcuts">
                            <li class="events">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-event"></span>
                                    <span class="shortcuts-label">Booking</span>
                                </a>
                            </li>
                            <li class="products">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-cart"></span>
                                    <span class="shortcuts-label">Products</span>
                                </a>
                            </li>
                            <li class="archive">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-archive"></span>
                                    <span class="shortcuts-label">Archives</span>
                                </a>
                            </li>
                            <li class="help">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-help"></span>
                                    <span class="shortcuts-label">Test Drive</span>
                                </a>
                            </li>
                            <li class="last images">
                                <a href="">
                                    <span class="shortcuts-icon iconsi-images"></span>
                                    <span class="shortcuts-label">Booking Service</span>
                                </a>
                            </li>
                        </ul-->
						
                        
                        <br>
                        
                        
                                            
                        <h4 class="widgettitle">Sekilas Info</h4>
                        <div class="widgetcontent">
                            <?php 
                            $varP['CATEGORY']='sekilasinfo';
                            $varP['LIMIT']=4;
                            $varP['ORDER']=' PUBLISH_TIMESTAMP DESC';
                            $listP=getRecord('tbl_content',$varP);
                            $i=0;
                            foreach($listP['RESULT'] as $list){
                                $i++;                                
                                
                                if(($i%2)==0) {
                                    $class='pull-right';
                                }else{
                                    $class='';
                                }
                                ?>
                        	<blockquote class='<?php echo $class?>'>
                              <p><?php echo $list['TITLE']?></p>
                              <p><?php echo $list['CONTENT']?></p>                              
                            </blockquote>
                            <div class="divider15"></div>
                            <?php } ?>                            
                            <div class="clearfix"></div>
                        </div><!--widgetcontent-->
                        
                    
                        
                        <div class="divider30"></div>
                        
                        <!--table class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th class="head1">Rendering engine</th>
                                    <th class="head0">Browser</th>
                                    <th class="head1">Platform(s)</th>
                                    <th class="head0">Engine version</th>
                                    <th class="head1">CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet  Explorer 5.5</td>
                                    <td>Win 95+</td>
                                    <td class="center">5.5</td>
                                    <td class="center">A</td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 6</td>
                                    <td>Win 98+</td>
                                    <td class="center">6</td>
                                    <td class="center">A</td>
                                </tr>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet Explorer 7</td>
                                    <td>Win XP SP2+</td>
                                    <td class="center">7</td>
                                    <td class="center">A</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <br /-->
                        
						<!--
                        <h4 class="widgettitle"><span class="icon-comment icon-white"></span> Rembug Admin</h4>
                        <div class="widgetcontent nopadding">
							<div class="">
                            <form class="" style='padding:8px 8px 8px 8px;border-bottom:1px solid #ccc'>
                                <input type="hidden" name='RSUBMIT' value='1' class="input-block-level" placeholder="pesan ...">
                                <input type="text" name='MESSAGE' class="input-block-level" placeholder="pesan ...">
								<input type='submit' value='kirim'>
                            </form>
                            <ul class="msglist">
								<?php
								$submit=isset($_REQUEST['RSUBMIT'])?$_REQUEST['RSUBMIT']:'0';
								$vRm['ACT']='ADD';								
								$vRm['ID_USER']=$_SESSION['EMAIL'];								
								$vRm['PUBLISH_TIMESTAMP']=date('Y-m-d H:i:s');								
								$vRm['MESSAGE']=isset($_REQUEST['MESSAGE'])?$_REQUEST['MESSAGE']:'';								
								if ($submit>0){
									saveRecord('tbl_rembug',$vRm);
								}
								
								
								$paramRm['ORDER']='PUBLISH_TIMESTAMP DESC';
								$paramRm['LIMIT']='10';
								$listRm=getRecord('tbl_rembug',$paramRm);								
								foreach($listRm['RESULT'] as $list){
								?>
                                <li class="">
                                    <div class="thumb"><img src="images/photos/thumb1.png" alt=""></div>
                                    <div class="summary">
                                        <span class="date pull-right"><small><?php tanggal($list['PUBLISH_TIMESTAMP'],'tipe3')?></small></span>
                                        <h4><?php echo $list['ID_USER']?></h4>
                                        <p><?php echo $list['MESSAGE']?></p>
                                    </div>
                                </li>
								<?php } ?>
                            </ul>
                        </div>
                        </div>
                        
                        <br />
                        -->
                        
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span4">
                        
						
						
						
                        <!--h5 class="subtitle">Announcements</h5>
                        
                        <div class="divider15"></div>
                        
                        <div class="alert alert-block">
                              <button data-dismiss="alert" class="close" type="button">&times;</button>
                              <h4>Warning!</h4>
                              <p style="margin: 8px 0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna.</p>
                        </div>
                        
                        <br />
                        
                        <h5 class="subtitle">Summaries</h5>
                            
                        <div class="divider15"></div>
                        
                        <div class="widgetbox">                        
                        <div class="headtitle">
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#">Action</a></li>
                                  <li><a href="#">Another action</a></li>
                                  <li><a href="#">Something else here</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <h4 class="widgettitle">Widget Box</h4>
                        </div>
                        <div class="widgetcontent">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>						
                        </div-->
                        
                        <!--h4 class="widgettitle">Event Calendar</h4>
                        <div class="widgetcontent nopadding">
                            <div id="datepicker"></div>
                        </div-->
                        
                        <div class="tabbedwidget tab-primary">
                            <!--ul>
                                <li><a href="#tabs-1"><span class="iconfa-user"></span></a></li>
                                <li><a href="#tabs-2"><span class="iconfa-star"></span></a></li>
                                <li><a href="#tabs-3"><span class="iconfa-comments"></span></a></li>
                            </ul-->
                            <div id="tabs-1" class="nopadding">
                                <h5 class="tabtitle">Last Log in</h5>
                                <ul class="userlist">
									<?php 
									$varLg['LIMIT']=10;
									$varLg['ORDER']=' LOG_TIMESTAMP DESC';
									$listLog=getRecord('tbl_log',$varLg);
									foreach($listLog['RESULT'] as $list){
									?>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb1.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <!--h5>Login</h5-->
                                                <span class="pos"><?php echo $list['ACC']?></span>
                                                <span><?php tanggal($list['LOG_TIMESTAMP'],'tipe3')?></span>
                                            </div>
                                        </div>
                                    </li>
									<?php } ?>
                                   
                                </ul>
                            </div>
							
							
                            <!--div id="tabs-2" class="nopadding">
                                <h5 class="tabtitle">Favorites</h5>
                                <ul class="userlist userlist-favorites">
                                                                        <li>
                                        <div>
                                            <img src="images/photos/thumb3.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Zaham Sindilmaca</h5>
                                                <p class="link">
                                                    <a href=""><i class="iconfa-envelope"></i> Message</a>
                                                    <a href=""><i class="iconfa-phone"></i> Call</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb4.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Annie Cerona</h5>
                                                <p class="link">
                                                    <a href=""><i class="iconfa-envelope"></i> Message</a>
                                                    <a href=""><i class="iconfa-phone"></i> Call</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb5.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Delher Carasbong</h5>
                                                <p class="link">
                                                    <a href=""><i class="iconfa-envelope"></i> Message</a>
                                                    <a href=""><i class="iconfa-phone"></i> Call</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb1.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Draniem Daamul</h5>
                                                <p class="link">
                                                    <a href=""><i class="iconfa-envelope"></i> Message</a>
                                                    <a href=""><i class="iconfa-phone"></i> Call</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb2.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Therineka Chonpe</h5>
                                                <p class="link">
                                                    <a href=""><i class="iconfa-envelope"></i> Message</a>
                                                    <a href=""><i class="iconfa-phone"></i> Call</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div-->
							
							
                            <!--div id="tabs-3" class="nopadding">
                                <h5 class="tabtitle">Top Comments</h5>
                                <ul class="userlist">
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb4.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Annie Cerona</h5>
                                                <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididun</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb5.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Delher Carasbong</h5>
                                                <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididun</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb1.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Draniem Daamul</h5>
                                                <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididun</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb2.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Therineka Chonpe</h5>
                                                <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididun</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <img src="images/photos/thumb3.png" alt="" class="pull-left" />
                                            <div class="uinfo">
                                                <h5>Zaham Sindilmaca</h5>
                                                <p class="par">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididun</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div-->
                        </div>
                        
                        <br />
                                                
                    </div><!--span4-->
                </div><!--row-fluid-->
                
               <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
