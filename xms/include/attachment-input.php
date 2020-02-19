
							
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
							<script>
							$(document).ready(function() {
								var max_fields      = 3;
								var wrapper         = $(".container1");
								var add_button      = $(".add_form_field");
							  
								var x = 1;
								$(add_button).click(function(e){
									e.preventDefault();
									if(x < max_fields){
										x++;
										$(wrapper).append('<span><input type="text" name="FILENAME[]" class="input-block-level"/><a href="#" class="HAPUS">HAPUS</a></span>'); //add input box
									}
							  else
							  {
							  alert('You Reached the limits')
							  }
								});
							  
								$(wrapper).on("click",".HAPUS", function(e){
									e.preventDefault(); $(this).parent('span').remove(); x--;
								})
							});
							</script>
							
							 <p>
                                <label>Attachment</label>
                                <span class="field container1">
								
								<a href='#' class="add_form_field">TAMBAH LAMPIRAN</a>								
								
								<?php
                                
                                if($objDetail['ID']>0){
								$vga['CONTENT_ID']=$objDetail['ID'];
								$vga['STATUS']='1';
								$vga['LIMIT']='10';
								$listAg=getRecord('tbl_attachment',$vga);
								foreach($listAg['RESULT'] as $listAg){
								?>
								<span><input type="text" name="FILENAME[]" value='<?php echo $listAg['URL'] ?>' class="input-block-level"/><a href="#" class="HAPUS">HAPUS</a></span>
								
								<?php }}?>
								</span>
								
								<span></span>
                            </p>
                            
                            <p>
                            <label> Old Files</label>
                            <span class="field container1">
                            <?php
                                if($objDetail['PREVID']>0){
								$old['PREVID']=$objDetail['PREVID'];
								$old['CATEGORY']=$seo;
								$old['STATUS']='1';
								$old['LIMIT']='10';
								$listOld=getRecord('tbl_attachment',$old);
								//echo $listOld['SQL'];
                                
								foreach($listOld['RESULT'] as $listOld){
                                    echo $listOld['FILES'].'<br>' ;
                                }}
                            ?>
                            </span>
                            </p>
                            
