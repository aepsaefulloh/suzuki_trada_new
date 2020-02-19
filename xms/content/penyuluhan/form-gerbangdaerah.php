
    <div class="rightpanel">
        <div class="pageheader">            
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">                
                <h1>Gerbang Daerah</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
        <div class="maincontentinner">
            
            <div class="widgetbox box-inverse">
                <h4 class="widgettitle">Form</h4>
                <div class="widgetcontent nopadding">
                    <form class="stdform stdform2" method="post" action="forms.html">
                            <p>
                                <label>Judul</label>
                                <span class="field"><input type="text" name="firstname" id="firstname2" class="input-xxlarge"></span>
                            </p>
                            
                            <p>
                                <label>Gambar</label>
                                <span class="field"><input type="text" name="lastname" id="lastname2" class="input-xxlarge"></span>
                            </p>
                            
                            <p>
                                <label>Sumber Gambar</label>
                                <span class="field"><input type="text" name="email" id="email2" class="input-xxlarge"></span>
                            </p>
                            
                            <p>
                                <label>Isi <small>You can put your own description for this field here.</small></label>
                                <span class="field"><textarea cols="80" rows="5" name="location" id="location2" class="span5"></textarea></span>
                            </p>
                            
                            <p>
                                <label>Aktif</label>
                                <span class="field">
									<input type="radio" name="radiofield" >	Ya
									<input type="radio" name="radiofield" >	Tidak
								</span>
                            </p>
                                                    
                            <p class="stdformbutton">
                                <button class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->
            
            <?php require_once CMS_PATH."/include/footer.php"?>
                
            </div>   
		</div><!--maincontent-->
        
    </div><!--rightpanel-->
    