<div class="header">
	<div class="logo">
		<a href="<?php echo CMS_URL?>"><img src="images/logo.png?v=<?php echo rand()?>" alt="" /></a>
	</div>
	<div class="headerinner">
		<ul class="headmenu">				
				<li class="right">
                    <div class="userloggedinfo">
                        <img src="images/photos/thumb1.png" alt="" />
                        <div class="userinfo">
                            <h5><?php echo $_SESSION['FULLNAME']?></h5>
                            <ul>
                                <li><a href="#"><?php echo $_SESSION['EMAIL']?></a></li>
                                <li><a href="#">Edit Profile</a></li>                                
                                <li><a href="damin.php?act=logout">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
	</div>
</div>