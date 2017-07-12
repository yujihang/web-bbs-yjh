<?php

$old_user = isset($_SESSION['valid_user']) ? $_SESSION['valid_user']:"";




?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
		<link rel="stylesheet" href="chajian/marquee/marquee1.css" />
  		<link rel="stylesheet" type="text/css" href="chajian/hightlight/highlight.css"/>
  		<link rel="stylesheet" href="css-yjh/login.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
			<div class="content1">
				<div class="content1_login">
					<!--登陆-->
					<div class="content1_login_form">
						<div class="center"><h1>提示页面</h1></div>
								<?php
								if (!empty($old_user)) {
								  if ($result_dest)  {
								    
								    echo '退出.<br />';
								    echo '<a href="login.php">登入</a><br /><br /><br />';
								  } else {
								   
								    echo '不能退出<br /><br />';
								  }
								} else {
								  
								  echo '<br />你未登入，请先登入.<br /><br /><br />';
								  echo '<p><a href="login.php">登入</a></p>';
								}
								
								
								?>
					</div>
				</div>

			</div>	
		<?php
			require './jiegou/content2.php';	
		?>	

		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
	
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/login.js"></script>
		<script>
			if(document.documentElement.clientWidth>=415){
				document.write("<script src='chajian/marquee/marquee1.js'><\/script>");
			}
		</script>
</html>

