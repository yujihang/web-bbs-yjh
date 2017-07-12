<?php 
	session_start();

	//读取缓存，获得用户名
	$username="";
	if(isset($_SESSION['valid_user'])){
		$username=$_SESSION['valid_user'];
	}
	$f_board_id="";
	if(isset($_SESSION['f_board_id'])){
		$f_board_id=$_SESSION['f_board_id'];
	}
	
	//如果读取不到缓存，则提示用户登录
	if(empty($_SESSION['valid_user'])){
		include("none.php");
		exit;
	}

	$ip=$_SERVER['REMOTE_ADDR'];
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>用户注册</title>
		<?php
			require './jiegou/head.php';	
		?>
		<link rel="stylesheet" href="jiegou/all.css" />
		<link rel="stylesheet" href="jiegou/header.css" />
		<link rel="stylesheet" href="jiegou/content.css" />
		<link rel="stylesheet" href="jiegou/footer.css" />
  		<link rel="stylesheet" href="css-yjh/article.css" />
	</head>

	<body>
		<div class="bgcolor">
	    <div class="bbs-header">
	    	<div class="left">
	    		清水河畔
	    	</div>
	    	<div class="right">
	    		 <span id="username" data-ip="<?php echo $ip; ?>"><?php echo $username; ?></span> <span><a href="logout.php">退出   </a></span>
	    	</div>
	    </div>
		<div class="bbs-content" id='bbs-content'>
				<div class="content_article">
					<h1 class="center" id="title"></h1>
		
					<p class="center pfont"><span id="poster"></span><span id="post-time"></span></p>
		
					<p></p>
					<div id="content">
					</div>
				
				<hr>
				<div >
					<div id="reviewlist">
						<div id="messagebox"><textarea class="xheditor"  id="message"></textarea>
						<p>&nbsp</p><p id="hui" class="fright hover pfont inBlock lastone">回复</p></div>
					</div>
					
				</div>
				
				<!--<input type="button" value="返回" id="back">		-->		
			</div>
		</div>
		<?php
			require './jiegou/footer.php';	
		?>			
		</div>
	
	</body>
    <script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/article.js"></script>
	<script type="text/javascript" src="js/xheditor-1.2.2.min.js"></script>
	<script type="text/javascript" src="js/zh-cn.js"></script>
</html>